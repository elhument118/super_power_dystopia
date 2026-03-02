// js/interaction.js
import { renderCharacters } from "./render.js";

document.addEventListener("DOMContentLoaded", () => {
  renderCharacters();

  const buttons = document.querySelectorAll(".filter-btn");

  buttons.forEach((btn) => {
    btn.addEventListener("click", () => {
      const type = btn.dataset.type;
      renderCharacters(type);
    });
  });
});
