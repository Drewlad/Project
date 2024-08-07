

var button = document.getElementById("button");

button.onclick = function () {

    var textElement = document.getElementById("input").value; 
    var text = textElement;
    let task = document.createElement('div');
    task.textContent = text;
    task.classList.add("tasks");

    document.body.append(task);
    document.getElementById("input").value = "" ;
};

