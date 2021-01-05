document.addEventListener("DOMContentLoaded", initCalendarIcons);
window.addEventListener("scroll", scrollCalendarIcons);
window.addEventListener("resize", updateCalendarIconsConstants);

let activities = new Array();

function initCalendarIcons(){
    document.querySelectorAll(".activity").forEach(el => {
        var calendarIcon = el.querySelector(".to-schedule-cell");
        if(calendarIcon !== null){
            activity = {
                container: el,
                calendarIcon: calendarIcon,
                iconSize: calendarIcon.clientHeight                
            };
            activities.push(activity);
        }
    });
    scrollCalendarIcons();    
}

function scrollCalendarIcons(){
    activities.map(el => {
        var distanceFromTop = el.container.offsetTop - scrollY;
        var distanceFromBottom = el.container.offsetTop + el.container.offsetHeight - scrollY;

        var clampedDTop = Math.min(window.innerHeight, Math.max(0, distanceFromTop));
        var clampedDBottom = Math.min(window.innerHeight, Math.max(0, distanceFromBottom));

        var distance = Math.max(clampedDBottom, clampedDTop);
        var averagePercent = 1 - distance / window.innerHeight;
        
        el.calendarIcon.style.top = `calc(${25 + 0.75 * averagePercent * 100}% - ${el.iconSize / 2}px)`;
    });
}

function updateCalendarIconsConstants(){
    activities.map(el => {
        el.centerPos = 0.5 * el.container.offsetHeight;        
    });
    scrollCalendarIcons();
}