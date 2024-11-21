const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");
//accordions
accordionItemHeaders.forEach(accordionItemHeader => 
{
    accordionItemHeader.addEventListener("click", event => {
        accordionItemHeader.classList.toggle("active");


        const accordionItemBody = accordionItemHeader.nextElementSibling;
        if(accordionItemHeader.classList.contains("active")) {
            accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
        }
        else{
            accordionItemBody.style.maxHeight= 0;
        }
    });
    });
    //international numbers
    const phoneInputFields = document.querySelectorAll(".phone");
    phoneInputFields.forEach(phoneInputField => {
        const phoneInput = window.intlTelInput(phoneInputField, {
            utilsScript:
                "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
    });
        //no future dates
        const dateInputs = [document.getElementById('dob1'), document.getElementById('dob2')];
        dateInputs.forEach(dateInput => {
            dateInput.max = new Date().toISOString().split("T")[0];
        });
        

    
    function calculateAge(dobId, resultId){
        //get the dob data
        const dobInput = document.getElementById(dobId).value;
      
        // If date of birth is selected
        if (dobInput) {
          // from string to date (date of birth & todays date)
          const dob = new Date(dobInput);
          const today = new Date();
  
          // substract the birth year from this year (but doesnt account for bd not occuring this year yet)
          let age = today.getFullYear() - dob.getFullYear();

          //so we find the and subtract the birth month and subtract it from the current month
          const monthDifference = today.getMonth() - dob.getMonth();
          // Adjust if the birthday hasn't occurred yet this year
          if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < dob.getDate())) {
            age--;
          }
  
          // Set the calculated age in the age input
          document.getElementById(resultId).value = age;
    }}

    function InputConstraints(IDtype,IDnumber){

        const documentType = document.getElementById(IDtype).value;
        const documentInput = document.getElementById(IDnumber);

        if (documentType === 'id') {
            // Set validation for ID (example: numeric, 9 digits)
            documentInput.setAttribute('pattern', '\\d{9}');
            documentInput.setAttribute('maxlength', '9');
            documentInput.setAttribute('placeholder', 'Enter ID number');
            documentInput.setCustomValidity("ID must be exactly 9 digits.");
          } else if (documentType === 'passport') {
            // Set validation for Passport (example: alphanumeric, 6-9 characters)
            documentInput.setAttribute('pattern', '[A-Za-z0-9]{6,9}');
            documentInput.setAttribute('maxlength', '9');
            documentInput.setAttribute('placeholder', 'Enter Passport number');
            documentInput.setCustomValidity("Passport must be 6 to 9 characters, alphanumeric.");
          }

        // Clear any previous validation errors
        documentInput.reportValidity();

    }