import { renderCharacters } from "./render.js";

document.addEventListener("DOMContentLoaded", () => {
  renderCharacters();

  const buttons = document.querySelectorAll(".filter-btn");

  buttons.forEach((btn) => {
    btn.addEventListener("click", () => {
      // Fix: active 클래스 갱신
      buttons.forEach(b => b.classList.remove("active"));
      btn.classList.add("active");

      const type = btn.dataset.type;
      renderCharacters(type);
    });
  });
});
