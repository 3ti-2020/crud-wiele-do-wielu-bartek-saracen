const loginbtn = document.querySelector('.log-in');
const closebtn = document.querySelector('.close');

loginbtn.addEventListener('click',()=>{
    document.querySelector('.modallogbackground').style.display="flex";
});
closebtn.addEventListener('click',()=>{
    document.querySelector('.modallogbackground').style.display="none";
});