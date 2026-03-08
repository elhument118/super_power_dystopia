import characterData from "./data.js";

const container = document.getElementById("character-container");

export function renderCharacters(filterType = "All") {
  if (!container) return;
  container.innerHTML = "";

  const filtered = filterType === "All"
    ? characterData
    : characterData.filter((char) => char.type === filterType);

  filtered.forEach((char) => {
    const card = document.createElement("div");
    card.className = "card";
    card.style.setProperty('--type-color', char.color);

    card.innerHTML = `
      <div class="type-badge">${char.type}</div>
      <h2>${char.name} (${char.gender})</h2>
      <p class="description hidden">${char.description}</p>
      <div class="likes hidden"><strong>호감 대상:</strong> ${char.likes}</div>
    `;

    // Fix: 중복 선택 제거
    card.addEventListener("click", () => {
      card.querySelectorAll(".description, .likes").forEach(el => {
        el.classList.toggle("hidden");
      });
    });

    container.appendChild(card);
  });
}
