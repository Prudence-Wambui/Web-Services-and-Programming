// File: assets/js/validation.js

document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("patientForm");
  
    form.addEventListener("submit", (e) => {
      let hasError = false;
  
      const fields = ["patientID", "firstName", "surname", "dob", "gender", "county"];
      fields.forEach(field => {
        const input = document.getElementById(field);
        const error = document.getElementById(field + "Error");
  
        if (!input.value.trim()) {
          error.textContent = `Please enter a valid ${field}`;
          input.classList.add("error-border");
          hasError = true;
        } else {
          error.textContent = "";
          input.classList.remove("error-border");
        }
      });
  
      if (hasError) e.preventDefault();
    });
  });
  