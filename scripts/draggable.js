$(document).ready(function() {
    $(".component").draggable({
        revert: true,
        helper: "clone",
        start: function() {
            $(this).fadeTo("fast", 0.5); // reduce opacity while dragging
        },
        stop: function() {
            $(this).fadeTo("fast", 1); // restore opacity after dragging
        }
    });
    
    $(".column").droppable({
        accept: ".component",
        drop: function(event, ui) {
            $(this).append(ui.draggable);
        }
    }).sortable({
        axis: "y",
        handle: ".component",
        containment: "parent",
        tolerance: "pointer"
    });
});
