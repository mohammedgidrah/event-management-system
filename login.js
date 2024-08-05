// document.addEventListener('DOMContentLoaded', () => {
//     const form = document.getElementById('sign-up-form');

//     form.addEventListener('submit', (e) => {
//         e.preventDefault(); // Prevent the default form submission

//         const fnameInput = document.getElementById('firstName-input-sign-up').value.trim();
//         const lnameInput = document.getElementById('lastName-input-sign-up').value.trim();
//         const emailInput = document.getElementById('email-input-sign-up').value.trim();
//         const passwordInput = document.getElementById('password-input-sign-up').value.trim();

//         const fnameError = document.getElementById('fname-error');
//         const lnameError = document.getElementById('lname-error');
//         const emailError = document.getElementById('email-error');
//         const passwordError = document.getElementById('password-error');

//         const nameRegex = /^[a-zA-Z]+(?:[' -][a-zA-Z]+)*$/;
//         const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
//         const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

//         let isValid = true;

//         // Reset error messages
//         fnameError.textContent = '';
//         lnameError.textContent = '';
//         emailError.textContent = '';
//         passwordError.textContent = '';

//         // Validate Name
//         if (!nameRegex.test(fnameInput)) {
//             fnameError.textContent = "Please enter a valid first name.";
//             isValid = false;
//         }

//         // Validate Email
//         if (!nameRegex.test(lnameInput)) {
//             lnameError.textContent = "Please enter a valid last name.";
//             isValid = false;
//         }

//         // Validate Password
//         if (!emailRegex.test(emailInput)) {
//             emailError.textContent = "Please enter a valid email addres.";
//             isValid = false;
//         }
//         if (!passwordRegex.test(passwordInput)) {
//             passwordError.textContent = "Password must be at least 8 characters long, including an uppercase letter, a lowercase letter, a number, and a special character.";
//             isValid = false;
//         }

//         // If all inputs are valid, submit the form or perform other actions
//         if (isValid) {
//             form.submit();
//         }
//     });
// });


////from the othere one


document.write


document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('sign-up-form');

    form.addEventListener('submit', (e) => {
        e.preventDefault(); // Prevent the default form submission

        const fnameInput = document.getElementById('firstName-input-sign-up').value.trim();
        const lnameInput = document.getElementById('lastName-input-sign-up').value.trim();
        const emailInput = document.getElementById('email-input-sign-up').value.trim();
        const passwordInput = document.getElementById('password-input-sign-up').value.trim();

        const fnameError = document.getElementById('fname-error');
        const lnameError = document.getElementById('lname-error');
        const emailError = document.getElementById('email-error');
        const passwordError = document.getElementById('password-error');

        const nameRegex = /^[a-zA-Z]+(?:[' -][a-zA-Z]+)*$/;
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        let isValid = true;

        // Reset error messages
        fnameError.textContent = '';
        lnameError.textContent = '';
        emailError.textContent = '';
        passwordError.textContent = '';

        // Validate Name
        if (!nameRegex.test(fnameInput)) {
            fnameError.textContent = "Please enter a valid first name.";
            isValid = false;
        }

        // Validate Email
        if (!nameRegex.test(lnameInput)) {
            lnameError.textContent = "Please enter a valid last name.";
            isValid = false;
        }

        // Validate Password
        if (!emailRegex.test(emailInput)) {
            emailError.textContent = "Please enter a valid email addres.";
            isValid = false;
        }
        if (!passwordRegex.test(passwordInput)) {
            passwordError.textContent = "Password must be at least 8 characters long, including an uppercase letter, a lowercase letter, a number, and a special character.";
            isValid = false;
        }

        // If all inputs are valid, submit the form or perform other actions
        if (isValid) {
            form.submit();
        }
    });
});


