const registerForm = document.getElementById('register-form');
const proName = document.getElementById('proName');
const proPrice = document.getElementById('proPrice');
const proDesc = document.getElementById('proDesc');

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

const isValidProduct = username => {
    const reUsername = /^([a-zA-Z0-9 !@#$%^&*]+){10,20}$/;
    return reUsername.test(String(username));
}

const isValidPrice = password => {
    const rePassword = /^[+]?\d+\.([0-9][0-9])$/;
    return rePassword.test(String(password));
}

const isValidOther = other => {
    // const reOther = /^([a-zA-Z0-9 !@#$%^&*]+){1,500}$/;
    const reOther = /^([a-zA-Z0-9 :,.\-\\?\\(\\)!@#$%^&*]+){5,500}$/;
    return reOther.test(String(other));
}

const validateInputs = () => {
    const proNameValue = proName.value;
    const proPriceValue = proPrice.value;
    const proDescValue = proDesc.value;

    let check = 0;

    if(proNameValue === '') {
        setError(proName, 'Product name is required');
    } else if (!isValidProduct(proNameValue)) {
        setError(proName, 'Provide a valid product name (text, 10 to 20 characters)');
    }else {
        check++;
        setSuccess(proName);    
    }

    if(proPriceValue === '') {
        setError(proPrice, 'Price is required');
    } else if (!isValidPrice(proPriceValue)) {
        setError(proPrice, 'Provide a valid price (number with 2 number after decimal)');
    }else {
        check++;
        setSuccess(proPrice);
    }

    if(proDescValue === '') {
        setError(proDesc, 'Description is required');
    } else if (!isValidOther(proDescValue)) {
        setError(proDesc, 'Provide a valid description (text, from 5 to 500 characters)');
    }else {
        check++;
        setSuccess(proDesc);
    }

    if (check == 3) {
        return 1;
    } else {
        return 0;
    }

};

