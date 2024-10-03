const gameDataUrl = 'games.json';
let games = [];
let cart = [];

// Functie om games op te halen en weer te geven
async function fetchAndDisplayGames() {
    try {
        const response = await fetch(gameDataUrl);
        if (!response.ok) throw new Error('Netwerkfout');
        games = await response.json();
        displayGames(games);
    } catch (error) {
        console.error('Fout bij het ophalen van games:', error);
    }
}

// Functie om games weer te geven
function displayGames(gameList) {
    const overviewDiv = document.getElementById('game-overview');
    overviewDiv.innerHTML = gameList.map(game => `
        <div class="game-card">
            <h3>${game.title}</h3>
            <p>Prijs: €${game.price}</p>
            <p>Genre: ${game.genre}</p>
            <p>Rating: ${game.rating}</p>
            <button onclick="addToCart('${game.title}')">Voeg toe aan winkelmandje</button>
        </div>
    `).join('');
}

// Functie om een game aan het winkelmandje toe te voegen
function addToCart(gameTitle) {
    const game = games.find(g => g.title === gameTitle);
    if (game) {
        cart.push(game);
        alert(`${game.title} is toegevoegd!`);
    }
}

// Functie om de totaalprijs te berekenen
function calculateTotalPrice() {
    return cart.reduce((total, game) => total + game.price, 0);
}

// Functie om het winkelmandje weer te geven
function displayCart() {
    const cartItemsDiv = document.getElementById('cart-items');
    cartItemsDiv.innerHTML = cart.map((game, index) => `
        <div>
            <h4>${game.title}</h4>
            <p>Prijs: €${game.price}</p> <!-- Prijs toegevoegd -->
            <button onclick="removeFromCart(${index})">Verwijder</button>
        </div>
    `).join('');

    const totalPrice = calculateTotalPrice();
    document.getElementById('total-price').textContent = `Totaalprijs: €${totalPrice}`;
}

// Functie om een item uit het winkelmandje te verwijderen
function removeFromCart(index) {
    cart.splice(index, 1);
    displayCart();
}

// Filters toepassen
document.getElementById('apply-filters').addEventListener('click', () => {
    const maxPrice = parseFloat(document.getElementById('max-price').value) || Infinity;
    const genre = document.getElementById('genre-filter').value;
    const maxRating = parseFloat(document.getElementById('max-rating').value) || Infinity;

    const filteredGames = games.filter(game => 
        game.price <= maxPrice &&
        (!genre || game.genre === genre) &&
        game.rating <= maxRating
    );

    displayGames(filteredGames);
});

// Winkelmandje tonen
document.getElementById('show-cart').addEventListener('click', () => {
    document.getElementById('game-overview').style.display = 'none';
    document.getElementById('shopping-cart').style.display = 'block';
    displayCart();
});

// Prijs berekenen en tonen
document.getElementById('calculate-price').addEventListener('click', () => {
    const totalPrice = calculateTotalPrice();
    alert(`De totaalprijs is: €${totalPrice}`);
});

// Leeg winkelmandje
document.getElementById('clear-cart').addEventListener('click', () => {
    cart = [];
    displayCart();
});

// Roep de fetchAndDisplayGames functie aan
fetchAndDisplayGames();
