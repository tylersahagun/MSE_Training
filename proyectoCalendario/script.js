let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();
let selectYear = document.getElementById("year");
let selectMonth = document.getElementById("month");

let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

let monthAndYear = document.getElementById("monthAndYear");
showCalendar(currentMonth, currentYear);


function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
    loadEvents();
}

function previous() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
    loadEvents();
}

function jump() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    showCalendar(currentMonth, currentYear);
    loadEvents();
}

function showCalendar(month, year) {

    let firstDay = (new Date(year, month)).getDay();
    let daysInMonth = 32 - new Date(year, month, 32).getDate();

    let tbl = document.getElementById("calendar-body"); // body of the calendar

    // clearing all previous cells
    tbl.innerHTML = "";

    // filing data about month and in the page via DOM.
    monthAndYear.innerHTML = months[month] + " " + year;
    selectYear.value = year;
    selectMonth.value = month;

    // creating all cells
    let date = 1;
    for (let i = 0; i < 6; i++) {
        // creates a table row
        let row = document.createElement("tr");

        //creating individual cells, filing them up with data.
        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDay) {
                let cell = document.createElement("td");
                let cellText = document.createTextNode("");
                cell.appendChild(cellText);
                row.appendChild(cell);
            }
            else if (date > daysInMonth) {
                break;
            }

            else {
                let cell = document.createElement("td");
                let cellText = document.createTextNode(date);
                if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                    cell.classList.add("bg-primary");
                } // color today's date

                if(date < 10 && month < 10) {
                    referenceID = year + "-0" + (month + 1) + "-0" + date;
                } 
                else if (date < 10 && month > 10) {
                    referenceID = year + "-" + (month + 1) + "-0" + date;
                }
                else if (date >= 10 && month < 10) {
                    referenceID = year + "-0" + (month + 1) + "-" + date;
                }
                else {
                    referenceID = year + "-" + (month + 1) + "-" + date;
                }
                    
                cell.id = referenceID;
                cell.appendChild(cellText);
                row.appendChild(cell);
                date++;
            }


        }
        tbl.appendChild(row); // appending each row into calendar body.
    }

}

function showForm() {
    $('#form').show();
    $("#showButton").hide();
}
  
function hideForm() {
    $('#form').hide();
    $('#showButton').show();
}

function submitEvent() {
    $('#form').hide();

    JSONstring = {eventTitle:document.getElementById('event').value,eventDescription:document.getElementById('description').value,eventTime:document.getElementById('time').value}

    $.post("submit.php", {data: JSON.stringify(JSONstring)}, function(result){
    });

    $('#showButton').show();
    loadEvents();
}

function loadEvents() {
    $.get("eventGet.php", function(data) {
      var eventsJSON = JSON.parse(data);

      for (let i = 0; i < eventsJSON.length; i++) {
        let time = eventsJSON[i]["scheduledTime"];
        time = JSON.stringify(time);
        let month = time.substring(6, 8);
        let date = time.substring(1, 11);
        let hours = time.substring(12, 20);
        let firstHours = time.substring(12,17);
        let title = eventsJSON[i]["title"];
        let des = eventsJSON[i]["event_description"];
        let output = title + "<br>" + firstHours;
        let location = document.getElementById(date);


        if(month == currentMonth + 1) {
            if (hours == "00:00:00") {
                output = title;
                location.innerHTML = location.innerHTML + "<p style='color: black'>" + output + "</p>";
            } else {
                location.innerHTML = location.innerHTML + "<p style='color: black'>" + output + "</p>";
            }
        }
      }
    });
  }