<div x-data="diceRoller()">
    <p>Resultado: <span x-text="rollResult"></span></p>
    <button @click="rollDice">Tirar Dados</button>
</div>
