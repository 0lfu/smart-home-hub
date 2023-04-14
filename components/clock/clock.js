const clockContainer = $('#clock .component-body').get(0);

if (clockContainer) {
  const weekdays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
  const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  const updateClock = () => {
    const now = new Date();
    const [day, weekday, month, year, hours, minutes, seconds] = [      now.getDate().toString().padStart(2, "0"),      weekdays[now.getDay()],
      months[now.getMonth()],
      now.getFullYear(),
      now.getHours().toString().padStart(2, "0"),
      now.getMinutes().toString().padStart(2, "0"),
      now.getSeconds().toString().padStart(2, "0")
    ];
    clockContainer.innerHTML = `${hours}:${minutes}:${seconds}<span class='date-time'>${weekday}, ${day} ${month} ${year}</span>`;
  };
  updateClock();
  setInterval(updateClock, 1000);
}
