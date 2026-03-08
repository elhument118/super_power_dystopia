// render.js - PHP(character_list.php)에서 데이터 fetch

const container = document.getElementById("character-container");

export async function renderCharacters(filterType = "All") {
  if (!container) return;
  container.innerHTML = "<p style='text-align:center;opacity:0.5'>로딩 중...</p>";

  try {
    const res = await fetch(`../character_list.php?type=${filterType}`);
    const characters = await res.json();

    container.innerHTML = "";

    if (characters.length === 0) {
      container.innerHTML = "<p style='text-align:center;opacity:0.5'>캐릭터 없음</p>";
      return;
    }

    characters.forEach((char) => {
      const card = document.createElement("div");
      card.className = "card";
      card.style.setProperty("--type-color", char.color);

      const imgSrc = char.image
        ? `../product/${char.image}`
        : `../product/nopic.png`;

      card.innerHTML = `
        <div class="type-badge">${char.type}</div>
        <img src="${imgSrc}" alt="${char.name}" class="char-img">
        <h2>${char.name} (${char.gender})</h2>
        <p class="description hidden">${char.description}</p>
        <div class="likes hidden"><strong>호감 대상:</strong> ${char.likes}</div>
      `;

      card.addEventListener("click", () => {
        card.querySelectorAll(".description, .likes").forEach(el => {
          el.classList.toggle("hidden");
        });
      });

      container.appendChild(card);
    });

  } catch (err) {
    container.innerHTML = "<p style='color:red;text-align:center'>데이터 로드 실패: " + err.message + "</p>";
  }
}
