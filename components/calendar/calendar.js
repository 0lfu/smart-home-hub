let date = new Date();
let year = date.getFullYear();
let month = date.getMonth();
  
const day = document.querySelector(".calendar-dates");
const currdate = document.querySelector(".calendar-current-date");
const icons = document.querySelectorAll(".calendar-navigation i");

const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
];

const manipulate = () => {
    let dayone = new Date(year, month, 1).getDay();
    dayone = dayone === 0 ? 6 : dayone - 1; // adjust for Monday start
    let lastdate = new Date(year, month + 1, 0).getDate();
    let dayend = new Date(year, month, lastdate).getDay();
    dayend = dayend === 0 ? 6 : dayend - 1; // adjust for Monday start
    let prevLastDate = new Date(year, month, 0).getDate();
    let lit = "";
  
    for (let i = dayone; i > 0; i--) {
      lit += `<li class="inactive">${prevLastDate - i + 1}</li>`;
    }
  
    for (let i = 1; i <= lastdate; i++) {
      let isToday =
        i === date.getDate() &&
        month === new Date().getMonth() &&
        year === new Date().getFullYear()
          ? "active"
          : "";
      lit += `<li class="${isToday}">${i}</li>`;
    }
  
    for (let i = dayend; i < 6; i++) {
      lit += `<li class="inactive">${i - dayend + 1}</li>`;
    }
    currdate.innerText = `${months[month]} ${year}`;
    day.innerHTML = lit;
  };
  
  
manipulate();

day.addEventListener('click', (event) => {
  const li = event.target.closest('li');
  const isActive = !event.target.classList.contains('inactive');
  if (li && isActive) {
    const clickedDate = event.target.innerText.padStart(2, '0');;
    const clickedMonth = (month + 1).toString().padStart(2, '0');
    const clickedYear = year;
    const googleCalendarUrl = `https://www.google.com/calendar/render?action=TEMPLATE&text=Event+Title&dates=${clickedYear}${clickedMonth}${clickedDate}`;
    window.open(googleCalendarUrl);
  }
});


icons.forEach(icon => {
    icon.addEventListener("click", () => {
        month = icon.id === "calendar-prev" ? month - 1 : month + 1;
        if (month < 0 || month > 11) {
            date = new Date(year, month, new Date().getDate());
            year = date.getFullYear();
            month = date.getMonth();
        }
  
        else {
            date = new Date();
        }
        manipulate();
    });
});