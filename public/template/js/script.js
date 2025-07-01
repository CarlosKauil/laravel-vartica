document.addEventListener("DOMContentLoaded", function() {
    fetch("/artistas")
        .then(response => response.json())
        .then(data => {
            let container = document.getElementById("lista-artistas");
            data.forEach(artista => {
                let card = document.createElement("div");
                card.classList.add("artista-card");
                card.innerHTML = `
                    <img src="/images/artistas/${artista.imagen}" alt="${artista.aleas}">
                    <h3>${artista.aleas}</h3>
                    <p>Área: ${artista.area_id}</p>
                `;
                container.appendChild(card);
            });
        })
        .catch(error => console.error("Error al cargar los artistas:", error));
});
