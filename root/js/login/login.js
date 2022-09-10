const registerForm = document.getElementById('register-form');
const logUsername = document.getElementById('logUsername');
const logPassword = document.getElementById('logPassword');

registerForm.addEventListener('submit', e => {
    let checkValidate = validateInputs();
    if (checkValidate == 1) {
        
    } else {
        e.preventDefault();
    }
});

// registerForm.onsubmit =  e => {
//     e.preventDefault();

//     validateInputs();
// };

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerHTML = `<p>${message}</p>`;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const validateInputs = () => {
    const cusUsernameValue = cusUsername.value;
    const cusPasswordValue = cusPassword.value;
    const cusPassword2Value = cusPassword2.value;
    const cusNameValue = cusName.value;
    const cusAddressValue = cusAddress.value;

    let check = 0;

    // const emailValue = email.value.trim();
    // const passwordValue = password.value.trim();
    // const password2Value = password2.value.trim();

    if(cusUsernameValue === '') {
        setError(cusUsername, 'Username is required');
    } else if (!isValidUsername(cusUsernameValue)) {
        setError(cusUsername, 'Provide a valid username (letters, digits, 8 to 15 characters)');
    }else {
        check++;
        setSuccess(cusUsername);    
    }

    if(cusNameValue === '') {
        setError(cusName, 'Name is required');
    } else if (!isValidOther(cusNameValue)) {
        setError(cusName, 'Provide a valid name (minimun of 5 characters)');
    }else {
        check++;
        setSuccess(cusName);
    }

    if(cusAddressValue === '') {
        setError(cusAddress, 'Address is required');
    } else if (!isValidOther(cusAddressValue)) {
        setError(cusAddress, 'Provide a valid address (minimun of 5 characters)');
    }else {
        check++;
        setSuccess(cusAddress);
    }

    if(cusPasswordValue === '') {
        setError(cusPassword, 'Password is required');
    } else if (!isValidPassword(cusPasswordValue)) {
        setError(cusPassword, 'Provide a valid password (at least one upper case letter, one lower case letter, one digit, one special letter in the set !@#$%^&*, NO other kind of characters, 8 to 20 characters)')
    } else {
        check++;
        setSuccess(cusPassword);
    }

    if(cusPassword2Value === '') {
        setError(cusPassword2, 'Please confirm your password');
    } else if (cusPassword2Value !== cusPasswordValue) {
        setError(cusPassword2, "Passwords doesn't match");
    } else {
        check++;
        setSuccess(cusPassword2);
    }

    if (check == 5) {
        return 1;
    } else {
        return 0;
    }

};

