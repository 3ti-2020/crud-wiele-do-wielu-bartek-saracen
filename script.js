const modal = document.querySelector(".modal");
document.getElementById("signin").addEventListener('click',() => {
    modal.style.display="flex";
});
document.querySelector(".close").addEventListener('click',() => {
    modal.style.display="none";
});