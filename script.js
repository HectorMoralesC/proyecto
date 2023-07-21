document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const pokemonList = document.getElementById('pokemon-list');

    // Cargar los datos de los Pokémon
    fetch('pokedex.php')
        .then(response => response.json())
        .then(pokemonData => {
            displayPokemonList(pokemonData);

            searchInput.addEventListener('input', function() {
                filterPokemonList(pokemonData, this.value);
            });
        });

    function displayPokemonList(pokemonData) {
        pokemonList.innerHTML = '';
        pokemonData.forEach(pokemon => {
            const listItem = document.createElement('div');
            listItem.innerHTML = `<strong>${pokemon.number}</strong>: ${pokemon.name} - Type: ${pokemon.type}`;
            pokemonList.appendChild(listItem);
        });
    }

    function filterPokemonList(pokemonData, searchTerm) {
        const filteredPokemon = pokemonData.filter(pokemon =>
            pokemon.name.toLowerCase().includes(searchTerm.toLowerCase())
        );
        displayPokemonList(filteredPokemon);
    }
});
