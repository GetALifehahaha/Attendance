let qrCode = document.getElementById("qr_code");
let schoolId = document.getElementById("")

qrCode.src = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" + 202300049;

const open_subject_form =  document.getElementById("add_subject");
const form = document.querySelector(".full_screen_container");
const close_subject_form = document.querySelector("#close_form");

open_subject_form.addEventListener("click", function(event){
    form.classList.toggle("show");
})

close_subject_form.addEventListener("click", function(){
    document.getElementById("subjectCode").value = "";
    form.classList.toggle("show");
    error_message.remove();
    success_message.remove();
})

const add_subject = document.querySelector(".add_subject");

//creates an element for errors
let error_message = document.createElement("h4");
error_message.className = "error"

//creates an element for success
let success_message = document.createElement("h4");
success_message.className = "success"


class Subject{
    constructor(sname, sday, stime, sroom, scode){
        this.subject_name = sname
        this.subject_day = sday
        this.subject_time = stime
        this.subject_room = sroom
        this.subject_code = scode
    }
}

let subject1 = new Subject("IT Elective", "tue", "10:00 AM - 12:30 PM", "LR1", 123)
let subject2 = new Subject("IT Elective LAB", "wed", "10:00 AM - 12:30 PM", "LR1", 456)
let subject3 = new Subject("Advanced Database System", "wed", "2:00 PM - 4:00 PM", "LR1", 789)

const subjects = [subject1, subject2, subject3];
function addSubject(){
    let id = document.getElementById("subjectCode").value;
    success_message.remove()
    error_message.remove()


    if (id == ''){
        error_message.textContent = "Empty ID input field is not allowed!"
        add_subject.append(error_message)
        return;
    }
    
    for (let i = 0; i<subjects.length; i++){
        if (subjects[i].subject_code == id){
            let subject_name = document.createElement("h4");
            let subject_time = document.createElement("p");
            let table_column = document.getElementById(subjects[i].subject_day);
            subject_name.textContent = subjects[i].subject_name;
            subject_time.textContent = subjects[i].subject_time;
            table_column.append(subject_name, subject_time)

            if(subjects[i].subject_day == today){
                showScheduleToday(subjects[i]);
            }

            success_message.textContent = "Subject added successfully!"
            add_subject.append(success_message)
            return;
        }
    };

    error_message.textContent = "Subject not found! Please enter a correct subject code.";
    add_subject.append(error_message)
}

let days = ["sun", "mon", "tue", "wed", "thu", "fri", "sat"];
let date = new Date();
let today = days[date.getDay()]

function showScheduleToday(subject){
    let schedule = document.querySelector(".schedule_today");
    let schedule_table = schedule.querySelector("table");
    let schedule_row = document.createElement("tr");
    let schedule_name = document.createElement("td");
    schedule_name.textContent = subject.subject_name;
    let schedule_time = document.createElement("td");
    schedule_time.textContent = subject.subject_time;
    let schedule_room = document.createElement("td");
    schedule_room.textContent = subject.subject_room;

    schedule_row.append(schedule_name, schedule_time, schedule_room)
    schedule_table.append(schedule_row);
}