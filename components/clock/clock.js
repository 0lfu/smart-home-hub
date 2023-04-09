const clockContainer = $('#clock .component-body').get(0);

if (clockContainer) {
  setInterval(() => {
    const now = new Date();
    const hours = now.getHours().toString().padStart(2, "0");
    const minutes = now.getMinutes().toString().padStart(2, "0");
    const seconds = now.getSeconds().toString().padStart(2, "0");
    const timeString = `${hours}:${minutes}:${seconds}`;
    clockContainer.innerText = timeString;
  }, 1000);
}
