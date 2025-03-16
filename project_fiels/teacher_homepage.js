//teacher side


const open_schedule_form =  document.getElementById("add_schedule");
const schedule_form = document.querySelector(".full_screen_container");
const close_schedule_form = document.querySelector("#close_schedule_form");

open_schedule_form.addEventListener("click", function(event){
    schedule_form.classList.toggle("show");
})

close_schedule_form.addEventListener("click", function(){
    schedule_form.classList.toggle("show");
})