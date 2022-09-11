const registerForm = document.getElementById('register-form');
const shipUsername = document.getElementById('shipUsername');
const shipPassword = document.getElementById('shipPassword');
const shipPassword2 = document.getElementById('shipPassword2');

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

const validateInputs = () => {
    const shipUsernameValue = shipUsername.value;
    const shipPasswordValue = shipPassword.value;
    const shipPassword2Value = shipPassword2.value;
    console.log(shipPassword2);
    console.log(shipPassword2Value);
    let check = 0;

    if(shipUsernameValue === '') {
        setError(shipUsername, 'Username is required');
    } else if (!isValidUsername(shipUsernameValue)) {
        setError(shipUsername, 'Provide a valid username (letters, digits, 8 to 15 characters)');
    }else {
        check++;
        setSuccess(shipUsername);    
    }

    if(shipPasswordValue === '') {
        setError(shipPassword, 'Password is required');
    } else if (!isValidPassword(shipPasswordValue)) {
        setError(shipPassword, 'Provide a valid password (at least one upper case letter, one lower case letter, one digit, one special letter in the set !@#$%^&*, NO other kind of characters, 8 to 20 characters)')
    } else {
        check++;
        setSuccess(shipPassword);
    }

    if(shipPassword2Value === '') {
        setError(shipPassword2, 'Please confirm your password');
    } else if (shipPassword2Value !== shipPasswordValue) {
        setError(shipPassword2, "Passwords doesn't match");
    } else {
        check++;
        setSuccess(shipPassword2);
    }

    if (check == 3) {
        return 1;
    } else {
        return 0;
    }

};

