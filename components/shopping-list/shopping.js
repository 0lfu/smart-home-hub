const shoppingInputBox = $("#shopping #inputBox");

$("#shopping ul").sortable();

shoppingInputBox.on("keypress", function (event) {
	if (event.key === "Enter") {
		addShoppingItem();
	}
});

$("#shopping .addButton").on("click", addShoppingItem);

$("#shopping #task-list").on("click", "li", removeShoppingItem);

function removeShoppingItem() {
	const taskId = $(this).data("task-id");
	const liItem = $(this);
	$.ajax({
		url: "components/shopping-list/closeTask.php",
		method: "POST",
		data: { taskId: taskId },
		dataType: "json",
		success: function (response) {
			console.log(response);
			if (response.success) {
				liItem.closest("li").remove();
			} else {
				console.error("Error closing task");
			}
		},
		error: function (xhr, status, error) {
			console.log(xhr);
			console.error(xhr.responseText);
		},
	});
}

function addShoppingItem() {
	const inputContent = $("#shopping #inputBox").val();
	if (inputContent != "") {
		$.ajax({
			url: "components/shopping-list/addTask.php",
			method: "POST",
			data: { content: inputContent },
			dataType: "json",
			success: function (response) {
				if (response.success) {
					var taskList = document.querySelector("#shopping #task-list");;
					var newTask = document.createElement("li");
					newTask.innerHTML = response.content;
					newTask.setAttribute("data-task-id", response.taskId);
					taskList.appendChild(newTask);
					document.querySelector("#shopping #inputBox").value = "";
				} else {
					console.error("Error closing task");
				}
			},
			error: function (xhr, status, error) {
				console.log(xhr);
				console.error(xhr.responseText);
			},
		});
	}
}
