<?php

namespace App\Livewire\Map;

use App\Http\Services\MapService;
use App\Livewire\Traits\DateTime;
use App\Livewire\Traits\ResetsPage;
use App\Models\Map;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\WireUiActions;

class Index extends Component
{
    //TODO : PODEMOS AÑADIR LA OPCIÓN DE IMPORTAR MAPAS O INLCUSO DE AÑADIR UN DISEÑADOR DE MAPAS INTERACTIVO

    use DateTime, WireUiActions, WithPagination, ResetsPage;

    public Map $map;

    #[On('refresh')]
    public function refresh(): void
    {
        $this->resetPage();
    }

    public $search = '';

    public $filters = [
        'date_start' => null,
        'extension' => null,
    ];

    public $sortField = 'name';

    public $sortDirection = 'asc';

    public $playersToShow = 1;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function sortBy(string $field)
    {
        $this->sortField = $field;
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function loadRecords()
    {
        return $this->maps;
    }

    #[Computed()]
    public function allFilters()
    {
        return [
            [
                'type' => 'text',
                'label' => __('maps.filters.search.placeholder'),
            ],
            [
                'type' => 'date',
                'label' => __('maps.filters.date_start.label'),
                'placeholder' => __('maps.filters.date_start.placeholder'),
                'model' => 'filters.date_start',
            ],
            [
                'type' => 'select',
                'data' => MapService::getExtensions(),
                'label' => __('maps.filters.extension.select'),
                'placeholder' => __('maps.filters.extension.select'),
                'filter' => 'filters.extension',
                'isMultiple' => true,
            ],
        ];
    }

    #[Computed()]
    public function maps()
    {
        //TODAVIA HAY QUE AÑADIR QUE EL ADMIN PUEDA VER TODAS LOS MAPAS

        return MapService::getMaps($this->search, $this->filters, $this->sortField, $this->sortDirection)->paginate(8);
    }

    public function confirm(int $id)
    {
        $this->dialog()->confirm([
            'title' => __('maps.actions.delete.title'),
            'description' => __('maps.actions.delete.description'),
            'icon' => 'trash',
            'accept' => [
                'label' => __('maps.actions.delete.accept'),
                'method' => 'remove',
                'params' => $id,
                'class' => 'bg-red-500 text-white hover:bg-red-600 hover:text-white',
            ],
            'reject' => [
                'label' => __('maps.actions.delete.reject'),
            ],
        ]);
    }

    public function remove(int $id)
    {
        $result = MapService::remove($id);

        if ($result) {
            $this->notification()->send([
                'icon' => 'success',
                'title' => __('maps.actions.delete.success.title'),
                'description' => __('maps.actions.delete.success.description'),
            ]);
        } else {
            $this->notification()->send([
                'icon' => 'error',
                'title' => __('maps.actions.delete.error.title'),
                'description' => __('maps.actions.delete.error.description'),
            ]);
        }
    }

    public function openSidePanel(): void
    {
        $this->dispatch(
            'openPanel',
            title: __('maps.actions.create.title'),
            component: 'map.create',
            icon: 'map',
        );
    }

    public function updateMap(int $id)
    {
        $this->dispatch(
            'openPanel',
            title: __('maps.actions.update.title'),
            component: 'map.update',
            icon: 'map',
            params: [
                'id' => $id,
            ]
        );
    }

    public function previewMap(int $id)
    {
        $this->map = MapService::getMapById($id);
        $this->dispatch('loadModal');
    }

    public function render()
    {
        return view('livewire.map.index');
    }
}
