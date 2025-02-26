<?php

namespace App\Livewire\User;

use App\Http\Services\UserService;
use App\Livewire\Traits\ResetsPage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\WireUiActions;

class Index extends Component
{
    use WireUiActions, WithPagination, ResetsPage;

    #[On('refresh')]
    public function refresh(): void
    {
        $this->resetPage();
    }

    public string $search = '';

    public $filters = [
        'is_admin' => null,
    ];

    public $sortField = 'name';

    public $sortDirection = 'asc';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function sortBy(string $field)
    {
        $this->sortField = $field;
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        $this->resetPage();
    }

    public function loadRecords()
    {
        return $this->users;
    }

    #[Computed()]
    public function allFilters()
    {
        return [
            [
                'type' => 'text',
                'label' => __('users.filters.search.placeholder'),
            ]
            // TODO : AÑADIR LOS FILTROS FALTANTES : IS_ADMIN, TIMEZONE
        ];
    }

    #[Computed()]
    public function users()
    {
        return UserService::getUsers($this->search, $this->filters, $this->sortField, $this->sortDirection)
            ->paginate(8);
    }


    public function openSidePanel(): void
    {
        $this->dispatch(
            'openPanel',
            title: __('users.actions.create.title'),
            component: Create::class,
            icon: 'user-plus',
        );
    }

    public function render()
    {
        return view('livewire.user.index');
    }
}
