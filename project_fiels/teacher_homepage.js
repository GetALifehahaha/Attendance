//teacher side

const table_expander = document.getElementById("table_expander");
const student_table = document.querySelector(".student_table");

table_expander.addEventListener("click", function(event){
    console.log('clicked');
    student_table.classList.toggle("open");
})