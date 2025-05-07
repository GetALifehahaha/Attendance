// const open_form = document.querySelector("#open_form");
// const form = document.querySelector(".full_screen_container");
// const close_form = document.querySelector("#close_form");
// const confirm = document.querySelector("#confirm");
// const import_file = document.querySelector("#import_file");
// const pending_class_list = document.querySelector(".pending_class_list");

// open_form.addEventListener("click", function(){
//     form.classList.toggle("show");
// })

// close_form.addEventListener("click", function(){
//     form.classList.toggle("show");
// })

// confirm.addEventListener("click", function(){
//     form.classList.toggle("show");
// })

// import_file.addEventListener("click", function(){
//     pending_class_list.classList.toggle("show");
// })

let urlParams = new URLSearchParams(window.location.search);
let scheduleID = urlParams.get('schedule_ID');

addEventListener("DOMContentLoaded", loadSchedule());
addEventListener("DOMContentLoaded", loadEnrolledStudents());

function loadSchedule(){

    fetch(`../api/schedule_api.php?schedule_ID=${scheduleID}`)
    .then(response => response.json())
    .then(resp => {

        if (resp.status === "success"){
            document.getElementById("scheduleID").textContent = resp.schedule.schedule_ID;
            document.getElementById("scheduleName").textContent = resp.schedule.schedule_name;
            document.getElementById("schedulePageName").textContent = resp.schedule.schedule_name;
            document.getElementById("scheduleStartTime").textContent = convertTo12Hour(resp.schedule.schedule_start_time);
            document.getElementById("scheduleEndTime").textContent = convertTo12Hour(resp.schedule.schedule_end_time);
            document.getElementById("scheduleDayOfTheWeek").textContent = resp.schedule.schedule_day_of_the_week;
            document.getElementById("scheduleRoom").textContent = resp.schedule.schedule_room;
            document.getElementById("scheduleCapacity").textContent = resp.schedule.schedule_capacity;

            document.getElementById("edit_schedule").onclick = editSchedule(resp.schedule.schedule_name, resp.schedule.schedule_department, resp.schedule.schedule_year, resp.schedule.schedule_section, resp.schedule.schedule_start_time, resp.schedule.schedule_end_time, resp.schedule.schedule_day_of_the_week, resp.schedule.schedule_room, resp.schedule.schedule_capacity);
        } else {
            document.querySelector(".schedule_information").innerHTML = "Schedule not found :<"
        }
    })
}

function loadEnrolledStudents(){
    let studentTableBody = document.getElementById("studentTableBody");
    studentTableBody.innerHTML = "";

    fetch(`../api/schedule_enrolled_api.php?schedule_ID=${scheduleID}`)
    .then(response => response.json())
    .then(resp => {
        if (resp.status === "success"){
            resp.students.forEach(student => {
                studentTableBody.innerHTML += `
                    <tr>
                        <td>${student.student_ID}</td>
                        <td>${student.student_name}</td>
                        <td>:></td>
                    </tr>
                `
            })
        }
    })

}

// function checkAttendanceSession(){
//     fetch(`../api/attendance_api.php?schedule_ID=${scheduleID}`)
//     .then(response => response.json())
// }

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

  const open_edit_schedule_form = document.getElementById("edit_schedule");
  const form = document.querySelector(".full_screen_container");
  const close_schedule_form = document.querySelector("#close_form");
  
  open_edit_schedule_form.addEventListener("click", function (event) {
      form.classList.toggle("show");
  })
  
  close_schedule_form.addEventListener("click", function () {
      form.classList.toggle("show");
  })
  
function editSchedule(scheduleName, scheduleDepartment, scheduleYear, scheduleSection, scheduleStartTime, scheduleEndTime, scheduleDayOfTheWeek, scheduleRoom, scheduleCapacity){
    document.getElementById("editScheduleName").value = scheduleName;
    const editScheduleDepartment = document.querySelector(`input[name="editScheduleDepartment"][value="${scheduleDepartment}"]`);
    editScheduleDepartment.checked = true;
    const editScheduleYear = document.querySelector(`input[name="editScheduleYear"][value="${scheduleYear}"]`);
    editScheduleYear.checked = true;
    const editScheduleSection = document.querySelector(`input[name="editScheduleSection"][value="${scheduleSection}"]`);
    editScheduleSection.checked = true;
    document.getElementById("editScheduleStartTime").value = scheduleStartTime;
    document.getElementById("editScheduleEndTime").value = scheduleEndTime;
    document.getElementById("editScheduleDayOfTheWeek").value = scheduleDayOfTheWeek;
    document.getElementById("editScheduleRoom").value = scheduleRoom;
    document.getElementById("editScheduleCapacity").value = scheduleCapacity;
}

function updateSchedule(){
    let scheduleName = document.getElementById("editScheduleName").value;
    let scheduleDepartment = document.getElementById("editScheduleDepartment").value;
    let scheduleYear = document.getElementById("editScheduleYear").value;
    let scheduleSection = document.getElementById("editScheduleSection").value;
    let scheduleStartTime = document.getElementById("editScheduleStartTime").value;
    let scheduleEndTime = document.getElementById("editScheduleEndTime").value;
    let scheduleDayOfTheWeek = document.getElementById("editScheduleDayOfTheWeek").value;
    let scheduleRoom = document.getElementById("editScheduleRoom").value;
    let scheduleCapacity = document.getElementById("editScheduleCapacity").value

    if (!(scheduleName && scheduleDepartment && scheduleYear && scheduleSection && scheduleStartTime && scheduleEndTime &&scheduleDayOfTheWeek && scheduleRoom && scheduleCapacity)){
        feedback("error", "Don't leave any empty fields");
        return;
    }

    fetch('../api/schedule_api.php', {
        method: 'PUT',
        body: JSON.stringify({
            schedule_ID: scheduleID,
            schedule_name: scheduleName,
            schedule_department: scheduleDepartment,
            schedule_year: scheduleYear,
            schedule_section: scheduleSection,
            schedule_start_time: scheduleStartTime,
            schedule_end_time: scheduleEndTime,
            schedule_day_of_the_week: scheduleDayOfTheWeek,
            schedule_room: scheduleRoom,
            schedule_capacity: scheduleCapacity
        }),
        headers: {'Content-Type': 'application/json'}
    })
    .then(response => response.json())
    .then(data => {
        feedback(data.status, data.message);
        loadSchedule();
        form.classList.remove('show');
    })
}

function deleteSchedule(){
    fetch('../api/schedule_api.php', {
        method: 'DELETE',
        body: JSON.stringify({
            schedule_ID: scheduleID
        }),
        headers: {'Content-Type': 'application/json'}
    })
    .then(response => response.json())
    .then(data => {
        feedback(data.status, data.message);
        form.classList.remove('show');
        setTimeout(() => {
            window.location.href = "teacherSchedule.php";
        }, 3000)
    })
}

function setAttendance(){
    fetch('../api/attendance_api.php', {
        method: 'POST',
        body: JSON.stringify({
            schedule_ID: scheduleID,
            status: "start"
        }),
        headers: {'Control-Type': 'application/json'}
    })
    .then(response => response.json())
    .then(resp => {
        if (resp.status == 'error'){
            feedback(resp.status, resp.message);
            return;
        }

        document.getElementById("endAttendance").style.display = "inline-block";
        feedback(resp.status, resp.message);
        let studentTableBodyAttendance = document.querySelectorAll("#studentTableBody tr");
            studentTableBodyAttendance.forEach(rows => {
                    rows.children[2].innerHTML = `<button onclick="setPresent(${rows.children[0].textContent})">Present</button>`;
            })
    })
}

function endAttendance(){
    fetch('../api/attendance_api.php', {
        method: 'PUT',
        body: JSON.stringify({
            schedule_ID: scheduleID
        }),
        headers: {'Control-Type': 'application/json'}
    })
    .then(response => response.json())
    .then(resp => {
        feedback(resp.status, resp.message);
        document.getElementById("endAttendance").style.display = "none";
        loadEnrolledStudents();
        })
    }

function setPresent(student_ID){
    fetch('../api/attendance_api.php', {
        method: 'PUT',
        body: JSON.stringify({
            student_ID: student_ID,
            schedule_ID: scheduleID
        }),
        headers: {'Control-Type': 'application/json'}
    })
    .then(response => response.json())
    .then(resp => {
        feedback(resp.status, resp.message);
    })
}

  document.addEventListener('DOMContentLoaded', () => {
    const steps = document.querySelectorAll('.form-step');
    let currentStep = 0;

    function showStep(stepIndex) {
        steps.forEach((step, index) => {
            step.classList.toggle('active', index === stepIndex);
        });
    }

    document.getElementById('next-to-step-2').addEventListener('click', () => {
        currentStep = 1;
        showStep(currentStep);
    });

    document.getElementById('prev-to-step-1').addEventListener('click', () => {
        currentStep = 0;
        showStep(currentStep);
    });

    document.getElementById('next-to-step-3').addEventListener('click', () => {
        currentStep = 2;
        showStep(currentStep);
    });

    document.getElementById('prev-to-step-2').addEventListener('click', () => {
        currentStep = 1;
        showStep(currentStep);
    });

    showStep(currentStep);
});

function feedback(type, message){
    let feedbackBar = document.querySelector(".feedback")
    
    feedbackBar.innerHTML = `<h3>${message}</h3>`;
    feedbackBar.classList.add(type);

    setTimeout(() => {
        feedbackBar.classList.remove(type);
    }, 3000)
}

function capitalize(string){
    return string[0].toUpperCase() + string.slice(1);
}

function showAttendanceHistory(){
    document.querySelector(".background").classList.add("show");
    loadAttendanceHistory();
}

function hideAttendanceHistory(){
    document.querySelector(".background").classList.remove("show");
}

function loadAttendanceHistory(){
    let attendanceBody = document.querySelector(".attendanceBody");
    attendanceBody.innerHTML = "";

    fetch(`../api/attendance_api.php?schedule_ID=${scheduleID}`)
    .then(response => response.json())
    .then(resp => {

        if (resp.status === "error"){
            feedback(resp.status, resp.message);
            return;
        }

        resp.attendanceHistory.forEach(rows => {
            attendanceBody.innerHTML += `
                <table id="${rows.attendance_date}">
                    <h4>Date: ${rows.attendance_date}</h4>
                    <thead>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Attendance Status</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            `
        })

        // Only run this once, after all tables are in the DOM
        // const tableCache = {};
        // document.querySelectorAll(".attendanceBody table").forEach(table => {
        //     const date = table.id;
        //     if (!tableCache[date]) {
        //         const tbody = table.querySelector("tbody");
        //         if (tbody) tableCache[date] = tbody;
        //     }
        // });

        // // Make sure this block is not inside a loop or duplicate call
        // resp.attendanceHistory.forEach(row => {
        //     const tbody = tableCache[row.attendance_date];
        //     if (tbody) {
        //         tbody.insertAdjacentHTML('beforeend', `
        //             <tr>
        //                 <td>${row.student_ID}</td>
        //                 <td>${row.student_name}</td>
        //                 <td>${capitalize(row.attendance_status)}</td>
        //             </tr>
        //         `);
        //     }
        // });

    })
}