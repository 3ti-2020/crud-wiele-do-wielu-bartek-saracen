const modal = document.querySelector(".modal");
const container = document.querySelector(".container");
document.getElementById("signin").addEventListener('click',() => {
    modal.style.display="flex";
    container.style.display="none";
});
document.querySelector(".close").addEventListener('click',() => {
    modal.style.display="none";
    container.style.display="flex";
});