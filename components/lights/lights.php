<script>
var slider = document.querySelector('input[name="brightness"]');
var buttons = document.querySelectorAll('[data-command]');
var timeoutId;

function setBrightness() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'components/lights/commands.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var params = 'command=bright_value_v2&value=' + slider.value;
    xhr.send(params);
}

slider.addEventListener('input', function() {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(setBrightness, 1000);
});

buttons.forEach(function(button) {
    button.addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'components/lights/commands.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        var params = 'command=' + button.dataset.command + '&value=' + button.dataset.value;
        xhr.send(params);
    });
});
</script>