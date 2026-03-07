import characterData from "./data.js";

const container = document.getElementById("character-container");

export function renderCharacters(filterType = "ALL") {
  if (!container) return; // 컨테이너가 없으면 실행 방지
  container.innerHTML = "";

  const filtered = filterType === "ALL"
    ? characterData
    : characterData.filter((char) => char.type === filterType);

  filtered.forEach((char) => {
    const card = document.createElement("div");
    card.className = "card"; // CSS 클래스와 일치
    card.style.setProperty('--type-color', char.color);

    card.innerHTML = `
      <div class="type-badge">${char.type}</div>
      <h2>${char.name} (${char.gender})</h2>
      <p class="description hidden">${char.description}</p>
      <div class="likes hidden"><strong>호감 대상:</strong> ${char.likes}</div>
    `;

    card.addEventListener("click", () => {
      card.querySelectorAll(".hidden, .description, .likes").forEach(el => {
        el.classList.toggle("hidden");
      });
    });

    container.appendChild(card);
  });
}
