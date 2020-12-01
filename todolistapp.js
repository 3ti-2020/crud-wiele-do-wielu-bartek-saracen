const input = document.getElementById('input');
const addBtn = document.getElementById('add');
const toDoContainer = document.getElementById('toDoContainer');

addBtn.addEventListener('click',()=>{
    if(input.value!==""){
    const taskContainer = document.createElement('div');
    taskContainer.className="taskContainer";
    toDoContainer.appendChild(taskContainer);
    const task = document.createElement('a');
    task.className="task";
    const close = document.createElement('button');
    close.className="closetask";
    close.innerText="X";
    task.innerText = input.value;
    taskContainer.appendChild(task);
    taskContainer.appendChild(close);
    }
})