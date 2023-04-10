$(document).ready(function() {
    $(".component-header").mousedown(function() {
        $(this).closest(".component").draggable({
            revert: true,
            helper: "clone",
            start: function() {
                $(this).fadeTo("fast", 0.5);
            },
            stop: function() {
                $(this).fadeTo("fast", 1);
            }
        });
    });

    $(".column").droppable({
        accept: ".component",
        drop: function(event, ui) {
            var droppedComponent = ui.draggable;
            var newColumn = $(this);
            droppedComponent.draggable("destroy");
            droppedComponent.draggable({
                revert: true,
                helper: "clone",
                containment: newColumn,
                handle: ".component-header",
                start: function() {
                    $(this).fadeTo("fast", 0.5);
                },
                stop: function() {
                    $(this).fadeTo("fast", 1);
                }
            });

            newColumn.append(droppedComponent);
        }
    }).sortable({
        axis: "y",
        handle: ".component-header",
        containment: "parent",
        tolerance: "pointer"
    });
});
