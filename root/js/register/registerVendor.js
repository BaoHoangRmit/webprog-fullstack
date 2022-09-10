const registerForm = document.getElementById('register-form');
const venUsername = document.getElementById('venUsername');
const venPassword = document.getElementById('venPassword');
const venPassword2 = document.getElementById('venPassword2');
const venName = document.getElementById('venName');
const venAddress = document.getElementById('venAddress');

registerForm.addEventListener('submit', e => {
    let checkValidate = validateInputs();
    if (checkValidate == 1) {
        
    } else {
        e.preventDefault();
    }
});

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

const isValidUsername = username => {
    const reUsername = /^([a-zA-Z0-9 ]){8,15}$/;
    return reUsername.test(String(username));
}

const isValidPassword = password => {
    const rePassword = /^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*])(.{8,20})$/;
    return rePassword.test(String(password));
}

const isValidOther = other => {
    const reOther = /^(.{5,})$/;
    return reOther.test(String(other));
}

const validateInputs = () => {
    const venUsernameValue = venUsername.value;
    const venPasswordValue = venPassword.value;
    const venPassword2Value = venPassword2.value;
    const venNameValue = venName.value;
    const venAddressValue = venAddress.value;

    let check = 0;

    // const emailValue = email.value.trim();
    // const passwordValue = password.value.trim();
    // const password2Value = password2.value.trim();

    if(venUsernameValue === '') {
        setError(venUsername, 'Username is required');
    } else if (!isValidUsername(venUsernameValue)) {
        setError(venUsername, 'Provide a valid username (letters, digits, 8 to 15 characters)');
    }else {
        check++;
        setSuccess(venUsername);    
    }

    if(venNameValue === '') {
        setError(venName, 'Name is required');
    } else if (!isValidOther(venNameValue)) {
        setError(venName, 'Provide a valid name (minimun of 5 characters)');
    }else {
        check++;
        setSuccess(venName);
    }

    if(venAddressValue === '') {
        setError(venAddress, 'Address is required');
    } else if (!isValidOther(venAddressValue)) {
        setError(venAddress, 'Provide a valid address (minimun of 5 characters)');
    }else {
        check++;
        setSuccess(venAddress);
    }

    if(venPasswordValue === '') {
        setError(venPassword, 'Password is required');
    } else if (!isValidPassword(venPasswordValue)) {
        setError(venPassword, 'Provide a valid password (at least one upper case letter, one lower case letter, one digit, one special letter in the set !@#$%^&*, NO other kind of characters, 8 to 20 characters)')
    } else {
        check++;
        setSuccess(venPassword);
    }

    if(venPassword2Value === '') {
        setError(venPassword2, 'Please confirm your password');
    } else if (venPassword2Value !== venPasswordValue) {
        setError(venPassword2, "Passwords doesn't match");
    } else {
        check++;
        setSuccess(venPassword2);
    }

    if (check == 5) {
        return 1;
    } else {
        return 0;
    }

};

