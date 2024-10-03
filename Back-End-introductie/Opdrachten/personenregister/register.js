// Functie om het JSON-bestand te laden en de gegevens op het scherm te tonen
function laadGegevens() {
    fetch('opdracht2_bijlage.json') // Laad het JSON-bestand met meerdere personen
        .then(response => {
            if (!response.ok) {
                throw new Error('Netwerkrespons was niet ok');
            }
            return response.json(); // Converteer de response naar JSON
        })
        .then(data => {
            toonGegevens(data); // Roep de functie aan om de gegevens weer te geven
        })
        .catch(error => {
            console.error('Fout bij het laden van JSON:', error);
        });
}

// Functie om de gegevens van meerdere personen in de DOM te plaatsen
function toonGegevens(personenData) {
    const gegevensDiv = document.getElementById('gegevens');
    let output = '';

    // Itereer door elk persoon in het JSON-bestand
    personenData.forEach(persoon => {
        output += `
            <div class="persoon">
                <p><strong>Voornaam:</strong> ${persoon.voornaam}</p>
                <p><strong>Achternaam:</strong> ${persoon.achternaam}</p>
                <p><strong>Nationaliteit:</strong> ${persoon.nationaliteit}</p>
                <p><strong>Leeftijd:</strong> ${persoon.leeftijd}</p>
                <p><strong>Gewicht:</strong> ${persoon.gewicht} kg</p>
                <hr>
            </div>
        `;
    });

    // Voeg de gegenereerde HTML toe aan de div
    gegevensDiv.innerHTML = output;
}

// Roep de functie aan om de gegevens te laden
laadGegevens();
