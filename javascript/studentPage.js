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
    form.classList.toggle("show");
})

function addSubject(){
    let id = document.getElementById("subjectCode").value;

    //if blanl, prevent submission

    close_subject_form.addEventListener("click", function(){
        form.classList.toggle("show");
    })

    //find 123

    //display
}