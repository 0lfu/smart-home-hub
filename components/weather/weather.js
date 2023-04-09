// Set your OpenWeatherMap API key
const apiKey = '433f32924ecebe72d3ff2b702ac1e498';

navigator.geolocation.getCurrentPosition((position) => {
    const lat = position.coords.latitude;
    const lon = position.coords.longitude;
  
    // Make a request to the OpenWeatherMap API
    fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric`)
      .then(response => response.json())
      .then(data => {
        // Get the weather condition code
        const weatherCode = data.weather[0].id;
  
        // Get the FontAwesome icon class based on the weather condition code
        let iconClass = '';
        if (weatherCode >= 200 && weatherCode < 300) {
          iconClass = 'fas fa-bolt'; // Thunderstorm
        } else if (weatherCode >= 300 && weatherCode < 600) {
          iconClass = 'fas fa-cloud-rain'; // Rain
        } else if (weatherCode >= 600 && weatherCode < 700) {
          iconClass = 'fas fa-snowflake'; // Snow
        } else if (weatherCode >= 700 && weatherCode < 800) {
          iconClass = 'fas fa-smog'; // Atmosphere
        } else if (weatherCode === 800) {
          iconClass = 'fas fa-sun'; // Clear sky
        } else if (weatherCode > 800 && weatherCode < 900) {
          iconClass = 'fas fa-cloud'; // Clouds
        } else {
          iconClass = 'fas fa-question'; // Unknown
        }
  
        // Get the temperature and city name
        const temperature = Math.round(data.main.temp);
        const cityName = data.name;
  
        // Show the FontAwesome icon, temperature, and city name in the current-weather div
        const currentWeatherDiv = document.getElementById('current-weather');
        currentWeatherDiv.innerHTML = `<i class="${iconClass}"></i> ${temperature}°C ${cityName}`;
      })
      .catch(error => {
        console.error(error);
      });
  }, (error) => {
    console.error(error);
  });