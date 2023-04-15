<?php
require_once 'credentials.php';
?>
<script>
const apiKey = "<?php echo $weather['api_key']?>";

navigator.geolocation.getCurrentPosition((position) => {
  const lat = position.coords.latitude;
  const lon = position.coords.longitude;

  fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric`)
    .then(response => response.json())
    .then(data => {
      const weatherCode = data.weather[0].id;

      let iconClass = '';
      if (weatherCode >= 200 && weatherCode < 300) {
        iconClass = 'fas fa-bolt';
      } else if (weatherCode >= 300 && weatherCode < 600) {
        iconClass = 'fas fa-cloud-rain';
      } else if (weatherCode >= 600 && weatherCode < 700) {
        iconClass = 'fas fa-snowflake';
      } else if (weatherCode >= 700 && weatherCode < 800) {
        iconClass = 'fas fa-smog';
      } else if (weatherCode === 800) {
        iconClass = 'fas fa-sun';
      } else if (weatherCode > 800 && weatherCode < 900) {
        iconClass = 'fas fa-cloud';
      } else {
        iconClass = 'fas fa-question';
      }

      const temperature = Math.round(data.main.temp);
      const humidity = data.main.humidity;
      const windSpeed = data.wind.speed;
      const chanceOfRain = data.hasOwnProperty('rain') ? `${data.rain['1h']} mm/h` : '0 mm/h';

      const cityName = data.name;
      //const lastUpdate = new Date(data.dt * 1000).toLocaleTimeString();
      const eventName = data.weather[0].description;

      const weatherLeftDiv = document.getElementById('weather-left');
      const weatherRightDiv = document.getElementById('weather-right');
      weatherLeftDiv.innerHTML = `
        <div id='weather-left-main'>
        <i class="${iconClass}"></i>
        <div>${temperature}°C</div>
        </div>
        <div id='weather-left-secondary'>
        <div><i class="fas fa-water"></i> ${humidity}%</div>
        <div><i class="fas fa-wind"></i> ${windSpeed} m/s</div>
        <div><i class="fas fa-cloud-rain"></i></i> ${chanceOfRain}</div>
        </div>
      `;
      weatherRightDiv.innerHTML = `
        <div id="cityName">${cityName}</div>
        <div>${eventName}</div>
      `;
    })
    .catch(error => {
      console.error(error);
    });
}, (error) => {
  console.error(error);
});
</script>