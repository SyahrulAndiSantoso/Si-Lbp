/** @format */
let menu = document.querySelector(".menu-toggle");
let menuWrapper = document.querySelector(".menu-wrapper");
menu.addEventListener("click", function () {
  menu.classList.toggle("bxs-grid-alt");
  menu.classList.toggle("bx-x");
  menuWrapper.classList.toggle("active");
});

let arrowDown = document.querySelector(".down-arrow");
let listMateri = document.querySelector(".list-materi");
arrowDown.addEventListener("click", function () {
  listMateri.classList.toggle("inactive");
});
