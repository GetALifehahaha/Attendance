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