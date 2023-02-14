let addToDoButton = document.getElementById("addToDo");
let toDoContainer = document.getElementById("toDoContainer");
let inputField = document.getElementById("inputField");

addToDoButton.addEventListener("click", () => {
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
    paragraph.removeChild(paragraph);
  });
});
