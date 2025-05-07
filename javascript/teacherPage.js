//teacher side

addEventListener('DOMContentLoaded', loadSchedules())

const open_schedule_form = document.getElementById("add_schedule");
const form = document.querySelector(".full_screen_container");
const close_schedule_form = document.querySelector("#close_form");

open_schedule_form.addEventListener("click", function (event) {
    form.classList.toggle("show");
})

close_schedule_form.addEventListener("click", function () {
    form.classList.toggle("show");
})

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

function loadSchedules(){    
    fetch('../api/schedule_api.php')
    .then(response => response.json())
    .then(resp => {
        let schedule_grid = document.querySelector(".schedules_grid");
        schedule_grid.innerHTML = "";

        if (resp.status == "success"){
            resp.schedules.forEach(schedule => {
                schedule_grid.innerHTML += `
                    <div class="schedule_container" onclick="redirectToScheduleByID('${schedule.schedule_ID}')"">
                        <h4>${schedule.schedule_name}</h4>
                        <div class="details">
                            <div class="dys"> 
                                <h5>${schedule.schedule_department}</h5>
                                <h5>${schedule.schedule_year}-${schedule.schedule_section}</h5><br>
                            </div>

                            <p>${convertTo12Hour(schedule.schedule_start_time)} - ${convertTo12Hour(schedule.schedule_end_time)}</p>
                        </div>
                    </div>
                `
            })
        } else {
        }
    })
}

function addSchedule(){
    let scheduleID = document.getElementById("scheduleID").value;
    let scheduleName = document.getElementById("scheduleName").value;
    let scheduleDepartment = document.getElementById("scheduleDepartment").value;
    let scheduleYear = document.getElementById("scheduleYear").value;
    let scheduleSection = document.getElementById("scheduleSection").value;
    let scheduleStartTime = document.getElementById("scheduleStartTime").value;
    let scheduleEndTime = document.getElementById("scheduleEndTime").value;
    let scheduleDayOfTheWeek = document.getElementById("scheduleDayOfTheWeek").value;
    let scheduleRoom = document.getElementById("scheduleRoom").value;
    let scheduleCapacity = document.getElementById("scheduleCapacity").value;

    if (!(scheduleID && scheduleName && scheduleDepartment && scheduleYear && scheduleSection && scheduleStartTime && scheduleEndTime &&scheduleDayOfTheWeek && scheduleRoom && scheduleCapacity)){
        feedback("error", "Don't leave any empty fields");
        return;
    }
    if (scheduleID.length != 6){
        feedback("error", "Schedule ID must be exactly 6 alphanumeric digits long");
        return;
    }

    fetch('../api/schedule_api.php', {
        method: 'POST',
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
        if (data.status === 'success') {
            feedback(data.status, data.message);
            loadSchedules();
            form.classList.remove('show');
        }
    })

}

function feedback(type, message){
    let feedbackBar = document.querySelector(".feedback")
    
    feedbackBar.innerHTML = `<h3>${message}</h3>`;
    feedbackBar.classList.add(type);

    setTimeout(() => {
        feedbackBar.classList.remove(type);
    }, 3000)
}

function redirectToScheduleByID(scheduleID){
    window.location.href = `teacherScheduleSection.php?schedule_ID=${scheduleID}`;
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

function filterSchedules(){
    let filterByDepartment = document.getElementById("filterByDepartment").value.toLowerCase();
    let filterByYear = document.getElementById("filterByYear").value.toLowerCase();
    let filterBySection = document.getElementById("filterBySection").value.toLowerCase();
    let filterByName = document.getElementById("filterByName").value.toLowerCase();


    let allSchedules = document.querySelectorAll(".schedules_grid .schedule_container");

    allSchedules.forEach(schedule => {
        let department = schedule.children[1].children[0].children[0].textContent.toLowerCase();
        let yearAndSection = schedule.children[1].children[0].children[1].textContent.toLowerCase();
        let name = schedule.children[0].textContent.toLowerCase();
        
        let matchName = name.includes(filterByName) || filterByName == "";
        let matchDepartment = department.includes(filterByDepartment) || filterByDepartment == "";
        let matchYear = yearAndSection.includes(filterByYear) || filterByYear == "";
        let matchSection = yearAndSection.includes(filterBySection) ||filterBySection == "";

        schedule.style.display = (matchDepartment && matchYear && matchSection && matchName) ? "" : "none";
    })
}