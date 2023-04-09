const inputBox = $("#todo #inputBox");
const addButton = $("#todo .addButton");
const itemList = $("#todo ul");

$("#todo ul").sortable();

addButton.click(addItem);

inputBox.on("keypress", function (event) {
    if (event.key === "Enter") {
        addItem();
    }
});

itemList.click(removeItem);

function addItem() {
    const newItem = inputBox[0].value;
    if (newItem !== "") {
        const li = $("<li>").text(newItem);
        itemList.append(li);
        inputBox[0].value = "";
    }
}

function removeItem(event) {
    if (event.target.tagName === "LI") {
        $(event.target).remove();
    }
}