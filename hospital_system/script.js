document.getElementById("patientForm").addEventListener("submit", function(event) {
    let patientID = document.getElementById("patientID").value;
    let firstName = document.getElementById("firstName").value;
    let surname = document.getElementById("surname").value;
    
    if (!patientID || !firstName || !surname) {
        alert("Please fill all required fields!");
        event.preventDefault();
    }
});

// Populate County Dropdown
const counties = ["Nairobi", "Mombasa", "Kisumu", "Nakuru"];
const countySelect = document.getElementById("county");
counties.forEach(county => {
    let option = document.createElement("option");
    option.value = county;
    option.text = county;
    countySelect.appendChild(option);
});