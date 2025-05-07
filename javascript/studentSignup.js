const feedback = document.getElementById("feedback");

function signup(){
    feedback.classList.remove("show");
    feedback.innerHTML = '';

    let schoolID = document.getElementById("studentID").value;
    let firstName = document.getElementById("firstName").value;
    let middleName = document.getElementById("middleName").value;
    let lastName = document.getElementById("lastName").value;
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirmPassword").value;

    if (!(schoolID && firstName && lastName && password && confirmPassword)){
        feedback.classList.add("show");
        feedback.innerHTML = `
            <h3>Don't leave input fields blank</h3>
        `
        setTimeout(() => {
            feedback.classList.remove("show");
        }, 3000)
        return;
    }

    if (password != confirmPassword){
        feedback.classList.add("show");
        feedback.innerHTML = `
            <h3>Password is not matching</h3>
        `;
        setTimeout(() => {
            feedback.classList.remove("show");
        }, 3000)
        return;

        
    }

    if(schoolID.length != 9){
        feedback.classList.add("show");
        feedback.innerHTML = `
            <h3>Invalid School ID</h3>
        `;
        setTimeout(() => {
            feedback.classList.remove("show");
        }, 3000)
        return;
    }

    fetch("../api/student_api.php", {
        method: "POST",
        body: JSON.stringify({
            student_ID: schoolID,
            first_name: firstName,
            middle_name: middleName,
            last_name: lastName,
            password: password
        }),
        headers: {"Control-Type": "application/json"}
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
    })
}