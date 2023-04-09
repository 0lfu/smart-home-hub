const ShoppingInputBox = $("#shopping #inputBox");
const ShoppingAddButton = $("#shopping .addButton");
const ShoppingItemList = $("#shopping ul");

$("#shopping ul").sortable();

ShoppingAddButton.click(addShoppingItem);

ShoppingInputBox.on("keypress", function (event) {
    if (event.key === "Enter") {
        addShoppingItem();
    }
});

ShoppingItemList.click(removeShoppingItem);

function addShoppingItem() {
    const newItem = ShoppingInputBox[0].value;
    if (newItem !== "") {
        const li = $("<li>").text(newItem);
        ShoppingItemList.append(li);
        ShoppingInputBox[0].value = "";
    }
}

function removeShoppingItem(event) {
    if (event.target.tagName === "LI") {
        $(event.target).remove();
    }
}