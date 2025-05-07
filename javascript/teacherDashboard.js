function loadDashboardData(){
    fetch('../api/dashboard_api.php')
    .then(response => response.json())
    .then(resp => {
        console.log(resp.countStudents)
        document.getElementById("studentCount").textContent = resp.countStudents.student_count;
        document.getElementById("scheduleCount").textContent = resp.countSchedules.schedule_count;
        // document.getElementById("")

        let absentList = document.getElementById("absentList");
        absentList.innerHTML = "";

        resp.topAbsences.forEach(absence => {
            absentList.innerHTML += `
                <tr>
                    <td>${absence.student_name}<td>
                    <td>${absence.number_of_absences}<td>
                </tr>
                    `
        })

        let scheduleList = document.getElementById("scheduleList");
        scheduleList.innerHTML = "";

        resp.schedules.forEach(schedules => {
            scheduleList.innerHTML += `
                <tr>
                    <td>${schedules.schedule_name}</td>
                    <td>${schedules.section}</td>
                    <td>${convertTo12Hour(schedules.schedule_start_time)} - ${convertTo12Hour(schedules.schedule_end_time)}</td>
                    <td>${schedules.schedule_room}</td>
                </tr>
                    `

        })
    })
}

addEventListener("DOMContentLoaded", loadDashboardData())

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