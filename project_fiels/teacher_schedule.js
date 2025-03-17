//teacher side


const open_schedule_form =  document.getElementById("add_schedule");
const form = document.querySelector(".full_screen_container");
const close_schedule_form = document.querySelector("#close_form");

open_schedule_form.addEventListener("click", function(event){
    form.classList.toggle("show");
})

close_schedule_form.addEventListener("click", function(){
    form.classList.toggle("show");
})


//hover effects
