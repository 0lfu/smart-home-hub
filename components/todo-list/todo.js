const inputBox = $("#todo #inputBox");

$("#todo ul").sortable();

inputBox.on("keypress", function (event) {
	if (event.key === "Enter") {
		addItem();
	}
});

$(".addButton").on("click", addItem);

$("#task-list").on("click", "li", removeItem);

function removeItem() {
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

function addItem() {
	const inputContent = $("#inputBox").val();
	if (inputContent != "") {
		$.ajax({
			url: "components/todo-list/addTask.php",
			method: "POST",
			data: { content: inputContent },
			dataType: "json",
			success: function (response) {
				if (response.success) {
					var taskList = document.getElementById("task-list");
					var newTask = document.createElement("li");
					newTask.innerHTML = response.content;
					newTask.setAttribute("data-task-id", response.taskId);
					taskList.appendChild(newTask);
					document.getElementById("inputBox").value = "";
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
