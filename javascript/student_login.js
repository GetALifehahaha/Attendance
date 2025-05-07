function login(){
    let this_student_id = document.getElementById("student_id");
    let this_password = document.getElementById("password");

    fetch('../api/student_api.php', {
        method: 'POST',
        body: JSON.stringify({
            student_ID: this_student_id,
            password: this_password
        }),
        headers: {'Control-Type': 'application/json'}
    })
    .then(response = response.json())
    .then(data => {
        alert(data.message);
    })
}

function signup(){
    let feedback = document.getElementById("feedback");
    feedback.innerHTML = '<h3></h3> '

    let this_student_id = document.getElementById("student_id").value;
    let this_first_name = document.getElementById("first_name").value;
    let this_middle_name = document.getElementById("middle_name").value;
    let this_last_name = document.getElementById("last_name").value;
    let this_password = document.getElementById("password").value;
    let confirm_password = document.getElementById("confirm_password").value;

    console.log(this_password + confirm_password);
    
    if (this_password != confirm_password){
        feedback.innerHTML = `
            <h3>Password is not matching</h3>
        `;
        return;
    }

    if (!(this_student_id && this_first_name && this_middle_name && this_last_name && this_password && confirm_password)){
        feedback.innerHTML = `
            <h3>Don't leave input fields blank</h3>
        `
        return;

    }

    fetch("../api/student_api.php", {
        method: "POST",
        body: JSON.stringify({
            student_ID: this_student_id,
            first_name: this_first_name,
            middle_name: this_middle_name,
            last_name: this_last_name,
            password: this_password
        }),
        headers: {"Control-Type": "application/json"}
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
    })
}