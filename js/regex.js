const inputs = document.querySelectorAll('input');


/**
 * Regular expression patterns for validating different types of input.
*/
const patterns = {
    fullname: /^[A-Za-z\s]+$/,
    name: /^[a-zA-Z]+$/,
    surname: /^[a-zA-Z]+$/,
    email: /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,4})(\.[a-z]{2,4})?$/, 
    subject: /^[a-z A-Z\d]{5,30}$/,
    password:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[a-zA-Z\d@$!%*?&]{8,}$/,
    contactnumber:/^\d{8}$/,
};

function validate(field, regex) {
    //console.log(regex.test(field.value));
    //checks if input is valid
    if (regex.test(field.value) == true) {
        // If the field value matches the pattern, add 'valid' class and remove 'invalid'.
        field.classList.add('valid');
        field.classList.remove('invalid');
        // Return true for valid input.
        return true;
    } else {
        // If the field value doesn't match, add 'invalid' class and remove 'valid'.
        field.classList.add('invalid');
        field.classList.remove('valid');
        // Return false for invalid input.
        return false;
    }
}

// Contact me form - contact.php
$('#ContactMeform').on('submit', function () {
    var contactNameValid = validate($('#contactName')[0], patterns.fullname);
    var contactEmailValid = validate($('#contactEmail')[0], patterns.email);
    var contactSubjectValid = validate($('#contactSubject')[0], patterns.subject);
    // If all fields are valid, allow the form to be submitted.
    if (contactNameValid && contactEmailValid && contactSubjectValid) {
        return true;
    }
    // If any field is invalid, prevent form submission.
    return false;
});

// SignUp Form - createAccount.php
/**
 * Attach an event listener to the form with the id "SignUpform" to handle the form submission.
 * This function validates the input fields for name, surname, email, password, and contact number
 * using the provided patterns. If all fields pass validation, the form is submitted. Otherwise, the
 * form submission is prevented.
 * @returns {boolean} - Returns true if all fields pass validation and the form should be submitted,
 *                     otherwise returns false.
 */
$('#SignUpform').on('submit', function () {
    var SignUpNameValid = validate($('#name-input')[0], patterns.name);
    var SignUpSurnameValid = validate($('#surname-input')[0], patterns.surname);
    var SignUpEmailValid = validate($('#email-input')[0], patterns.email);
    var SignUpPasswordValid = validate($('#password-input')[0], patterns.password);
    var SignUpContactNumberValid = validate($('#contactnumber-input')[0], patterns.contactnumber);
    // If all fields are valid, allow the form to be submitted.
    if (SignUpNameValid && SignUpSurnameValid && SignUpEmailValid && SignUpPasswordValid && SignUpContactNumberValid) {
        return true;
    }
    // If any field is invalid, prevent form submission.
    return false;
});

// Customers Form - checkout.php
$('#customerDetailsForm').on('submit', function () {
    var customerNameValid = validate($('#user-firstname-input')[0], patterns.name);
    var customerSurnameValid = validate($('#user-lastname-input')[0], patterns.surname);
    var customerEmailValid = validate($('#email-input')[0], patterns.email);
    var customerPasswordValid = validate($('#password-input')[0], patterns.password);
    var customerContactNumberValid = validate($('#user-phone-input')[0], patterns.contactnumber);
    // If all fields are valid, allow the form to be submitted.
    if (customerNameValid && customerSurnameValid && customerEmailValid && customerPasswordValid && customerContactNumberValid) {
        return true;
    }
    // If any field is invalid, prevent form submission.
    return false;
});

// forgot password input - forgotPassword.php
/**
 * Attaches a submit event handler to the element with the ID "forgotPassword".
 * Validates the email input field using the provided regular expression pattern.
 * If the email is valid, the form is submitted. Otherwise, the form submission is prevented.
 * @returns {boolean} - Returns true if the form is valid and can be submitted, false otherwise.
 */
$('#forgotPassword').on('submit', function () {
    var forgotEmailValid = validate($('#password-reset')[0], patterns.email);
    // If all fields are valid, allow the form to be submitted.
    if (forgotEmailValid) {
        return true;
    }
    // If any field is invalid, prevent form submission.
    return false;
});

// Reset password - Account-Details section
$('#accountPassword').on('submit', function () {
    var accountnewPasswordValid = validate($('#newPassword')[0], patterns.password);
    var accountconfirmPasswordValid = validate($('#confirmPassword')[0], patterns.password);
    // If all fields are valid, allow the form to be submitted.
    if (accountnewPasswordValid && accountconfirmPasswordValid) {
        return true;
    }
    // If any field is invalid, prevent form submission.
    return false;
});

// Reset Email - Account-Details section
$('#accountEmail').on('submit', function () {
    var accountEmailValid = validate($('#email-input')[0], patterns.email);
    // If all fields are valid, allow the form to be submitted.
    if (accountEmailValid) {
        return true;
    }
    // If any field is invalid, prevent form submission.
    return false;
});

// Change User Details - Account-Details section
/**
 * Attaches a submit event handler to the element with the ID "accountDetails".
 * Validates the values of the input fields for account name, surname, and contact number
 * using the provided patterns. If all validations pass, the form is submitted.
 * @returns {boolean} - Returns true if all validations pass and the form is submitted,
 * otherwise returns false.
 */
$('#accountDetails').on('submit', function () {
    var AccountNameValid = validate($('#firstname')[0], patterns.name);
    var AccountSurnameValid = validate($('#lastname')[0], patterns.surname);
    var AccountContactNumberValid = validate($('#mobilenumber')[0], patterns.contactnumber);
    // If all fields are valid, allow the form to be submitted.
    if (AccountNameValid && AccountSurnameValid && AccountContactNumberValid) {
        return true;
    }
    // If any field is invalid, prevent form submission.
    return false;
});