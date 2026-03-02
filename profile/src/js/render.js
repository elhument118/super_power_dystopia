// js/render.js
import characterData from "./data.js";

const container = document.getElementById("character-container");

export function renderCharacters(filterType = "ALL") {
  container.innerHTML = "";

  const filtered =
    filterType === "ALL"
      ? characterData
      : characterData.filter((char) => char.type === filterType);

  filtered.forEach((char) => {
    const card = document.createElement("div");
    card.className = "character-card";
    card.style.borderTop = `6px solid ${char.color}`;

    card.innerHTML = `
      <div class="card-header">
        <h2>${char.name}</h2>
        <span>${char.gender}</span>
      </div>
      <p class="type">${char.type}</p>
      <p class="description hidden">${char.description}</p>
      <p class="likes hidden"><strong>Likes:</strong> ${char.likes}</p>
    `;

    card.addEventListener("click", () => {
      card.querySelectorAll(".hidden").forEach((el) => {
        el.classList.toggle("hidden");
      });
    });

    container.appendChild(card);
  });
}
