document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("patientForm").addEventListener("submit", function(event) {
        let valid = true;

        // Validate Patient ID
        let patientID = document.getElementById("patientID");
        if (!/^\d+$/.test(patientID.value)) {
            valid = false;
            alert("Patient ID must be numeric.");
        }

        // Validate Name Fields
        let fields = ["firstName", "surname"];
        fields.forEach(id => {
            let field = document.getElementById(id);
            if (field.value.trim() === "") {
                valid = false;
                field.style.border = "2px solid red";
            } else {
                field.style.border = "";
            }
        });

        // Validate Date of Birth
        let dob = document.getElementById("dob").value;
        if (!dob) {
            valid = false;
            alert("Date of Birth is required.");
        }

        if (!valid) {
            event.preventDefault();
        }
    });
});
