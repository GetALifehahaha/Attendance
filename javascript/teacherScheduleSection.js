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
                        <td>Absent</td>
                    </tr>
                `
            })
        }
    })

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