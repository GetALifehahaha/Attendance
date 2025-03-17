const open_form = document.querySelector("#open_form");
const form = document.querySelector(".full_screen_container");
const close_form = document.querySelector("#close_form");
const confirm = document.querySelector("#confirm");
const import_file = document.querySelector("#import_file");
const pending_class_list = document.querySelector(".pending_class_list");

open_form.addEventListener("click", function(){
    form.classList.toggle("show");
})

close_form.addEventListener("click", function(){
    form.classList.toggle("show");
})

confirm.addEventListener("click", function(){
    form.classList.toggle("show");
})

import_file.addEventListener("click", function(){
    pending_class_list.classList.toggle("show");
})