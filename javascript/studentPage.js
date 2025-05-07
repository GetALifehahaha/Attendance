let studentID = 202300049;

let days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
let date = new Date();

let currDay = (days[date.getDay()]);

addEventListener("DOMContentLoaded", loadSchedules());

function openForm(){
    document.querySelector(".full_screen_container").classList.add("show");
}

function closeForm(){
    document.querySelector(".full_screen_container").classList.remove("show");
}

function loadSchedules(){
    let scheduleWeekBody = document.querySelectorAll("#scheduleWeekBody tr td");

    scheduleWeekBody.forEach(td => {
        td.innerHTML = "";
    })

    let scheduleTodayBody = document.querySelector("#scheduleTodayBody");
    scheduleTodayBody.innerHTML = "";

    let notificationBox = document.querySelector(".notification_box");
    notificationBox.innerHTML = "";

    fetch(`../api/schedule_enrolled_api.php?student_ID=${studentID}`)
    .then(response => response.json())
    .then(resp => {
        resp.schedules.forEach(schedule => {
            document.getElementById(schedule.schedule_day_of_the_week).innerHTML += `
                <div class="schedule">
                    <strong>${schedule.schedule_name}</strong><br>
                    ${convertTo12Hour(schedule.schedule_start_time)} - ${convertTo12Hour(schedule.schedule_end_time)}
                    <button onclick="openDeleteConfirmation('${schedule.schedule_ID}')" class="delete_schedule">&times;</button>
                </div>
            `;

            if (schedule.schedule_day_of_the_week == currDay){
                scheduleTodayBody.innerHTML += `
                
                <tr>
                    <td>
                        ${convertTo12Hour(schedule.schedule_start_time)} - ${convertTo12Hour(schedule.schedule_end_time)}
                    </td>
                    <td>
                        <strong>${schedule.schedule_name}</strong><br>
                    </td>
                    <td>
                        ${schedule.schedule_room}
                    </td>
                </tr>
            `;
            }
            if (schedule.number_of_absences >= 3){
                notificationBox.innerHTML += `
                    <h4>You have been absent in ${schedule.schedule_name} for ${schedule.number_of_absences} days.</h4>
                `
            }
        })
    })
}

function addSchedule(){

    let scheduleID = document.getElementById("scheduleID").value;

    if (!scheduleID){
        feedback("error", "Schedule ID field is empty");
        return;
    }

    fetch('../api/schedule_enrolled_api.php', {
        method: 'POST',
        body: JSON.stringify({
            student_ID: studentID,
            schedule_ID: scheduleID
        }),
        headers: {"Control-Type": "application/json"}
    })
    .then(response => response.json())
    .then(resp => {

        if (resp.status === "success"){
            feedback(resp.status, resp.message);
            loadSchedules();
            clearForm();
        } else {
            feedback(resp.status, resp.message);
        }

    })
}

function clearForm(){
    document.getElementById("scheduleID").value = "";
}

function convertTo12Hour(time24) {
    const [hours, minutes] = time24.split(':');
    let period = 'AM';
    let hours12 = parseInt(hours);
  
    if (hours12 >= 12) {
        period = 'PM';
        if (hours12 > 12) {
            hours12 -= 12;
        }
    } else if (hours12 === 0) {
      hours12 = 12;
    }
  
    return `${hours12}:${minutes} ${period}`;
}

function feedback(type, message){
    let feedbackBar = document.querySelector(".feedback")
    
    feedbackBar.innerHTML = `<h3>${message}</h3>`;
    feedbackBar.classList.add(type);

    setTimeout(() => {
        feedbackBar.classList.remove(type);
    }, 3000)
}

function deleteSchedules(em){
    let deleteButtons = document.querySelectorAll("#scheduleWeekBody tr td div .delete_schedule");

    if (em.textContent == "Delete"){
        deleteButtons.forEach(buttons => {
            buttons.classList.add("show");
        })
        em.textContent = "Cancel";
    } else if (em.textContent == "Cancel"){
            deleteButtons.forEach(buttons => {
            buttons.classList.remove("show");
        })
        em.textContent = "Delete";
    }
}

function openDeleteConfirmation(schedule_ID){
    let remove_confirmation = document.getElementById("remove_schedule");
    remove_confirmation.classList.add("show");

    document.getElementById("deleteSchedule").addEventListener("click", function(){
        fetch('../api/schedule_enrolled_api.php', {
            method: 'DELETE',
            body: JSON.stringify({
                student_ID: studentID,
                schedule_ID: schedule_ID
            }),
            headers: {"Control-Type": "application/json"}
        })
        .then(response => response.json())
        .then(resp => {
            feedback(resp.status, resp.message)
            loadSchedules();
            closeDeleteConfirmation();
        })
    })

}
function closeDeleteConfirmation(){
    let remove_confirmation = document.getElementById("remove_schedule");
    remove_confirmation.classList.remove("show");
}

function showNotification(){
    let notif = document.querySelector(".notification_box");
    notif.classList.toggle("show");
}