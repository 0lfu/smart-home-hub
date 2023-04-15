<script>
var bright_slider = document.querySelector('input[name="brightness"]');
var temp_slider = document.querySelector('input[name="temperature"]');
var switches = document.querySelectorAll('[data-command]');
var timeoutId;

function setBrightness() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'components/lights/commands.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var params = 'command=bright_value_v2&value=' + bright_slider.value;
    xhr.send(params);
}

function setTemperature() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'components/lights/commands.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var params = 'command=temp_value_v2&value=' + temp_slider.value;
    xhr.send(params);
}

bright_slider.addEventListener('input', function() {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(setBrightness, 400);
});

temp_slider.addEventListener('input', function() {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(setTemperature, 400);
});

switches.forEach(function(button) {
    button.addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'components/lights/commands.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        var params = 'command=' + button.dataset.command + '&value=' + button.dataset.value;
        xhr.send(params);
    });
});
</script>