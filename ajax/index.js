const themesSelect = document.querySelector("#themesSelect");
const regionsSelect = document.querySelector("#regionsSelect");
const travaelContainer = document.querySelector(".travel-list");
const nameInput = document.querySelector("#nameInput");

const AllSelect = document.querySelectorAll("select, #nameInput");
fetch(`../ajax/filter.php`)
  .then((res) => res.text())
  .then((data) => (travaelContainer.innerHTML = data));

AllSelect.forEach((select) => {
  select.addEventListener("input", () => {
    fetch(
      `../ajax/filter.php?regions=${regionsSelect.value}&name=${nameInput.value}&themes=${themesSelect.value}`
    )
      .then((res) => res.text())
      .then((data) => (travaelContainer.innerHTML = data));
  });
});
