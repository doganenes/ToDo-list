let addToDoButton = document.getElementById("addToDo");
let toDoContainer = document.getElementById("toDoContainer");
let inputField = document.getElementById("inputField");

function addTodo() {
  var paragraph = document.createElement("p");
  paragraph.classList.add("paragraph-styling");
  paragraph.classList.add("w-100");
  paragraph.innerText = inputField.value;
  toDoContainer.appendChild(paragraph);
  inputField.value = "";

  paragraph.addEventListener("click", function () {
    paragraph.style.textDecoration = "line-through";
    paragraph.style.textDecorationColor = "red";
    paragraph.style.textDecorationThickness = "0.15rem";
  });

  paragraph.addEventListener("dblclick", function () {
    toDoContainer.removeChild(paragraph);
  });
}

addToDoButton.addEventListener("click", function (event) {
  event.preventDefault();
  addTodo();
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "get_todos.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var todos = JSON.parse(xhr.responseText);

      todos.forEach(function (todo) {
        var paragraph = document.createElement("p");
        paragraph.classList.add("paragraph-styling");
        paragraph.classList.add("w-100");
        paragraph.innerText = todo.task;
        toDoContainer.appendChild(paragraph);
      });
    }
  };
  xhr.send();
});

inputField.addEventListener("keydown", function (e) {
  if (e.key === "Enter") {
    e.preventDefault();
    addTodo();
  }
});
