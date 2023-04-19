const todoInputBox = $("#todo #inputBox");

$("#todo ul").sortable();

todoInputBox.on("keypress", function (event) {
	if (event.key === "Enter") {
		addTodoItem();
	}
});

$("#todo .addButton").on("click", addTodoItem);

$("#todo #task-list").on("click", "li", removeTodoItem);

function removeTodoItem() {
	const taskId = $(this).data("task-id");
	const liItem = $(this);
	$.ajax({
		url: "components/todo-list/closeTask.php",
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

function addTodoItem() {
	const inputContent = $("#todo #inputBox").val();
	if (inputContent != "") {
		$.ajax({
			url: "components/todo-list/addTask.php",
			method: "POST",
			data: { content: inputContent },
			dataType: "json",
			success: function (response) {
				if (response.success) {
					var taskList = document.querySelector("#todo #task-list");
					var newTask = document.createElement("li");
					newTask.innerHTML = response.content;
					newTask.setAttribute("data-task-id", response.taskId);
					taskList.appendChild(newTask);
					document.querySelector("#todo #inputBox").value = "";
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
