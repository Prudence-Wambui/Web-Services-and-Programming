function validateForm() {
    let fname = document.getElementById("fname").value;
    let lname = document.getElementById("lname").value;
    let valid = true;

    if (fname === "") {
        document.getElementById("fnameError").innerText = "First name is required!";
        valid = false;
    }

    if (lname === "") {
        document.getElementById("lnameError").innerText = "Last name is required!";
        valid = false;
    }

    return valid;
}
