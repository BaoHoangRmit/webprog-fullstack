let orderIdInput = document.getElementById("purchase-customer-cartId");

function renderCartId(){
    let cnt = localStorage.length;
    let itemIdList = [];
    let loopCnt = 0;
    for(let key in localStorage){
        if(loopCnt == cnt){
            break;
        }
        if(key.includes('itemFS')){
            itemIdList.push(key);
            loopCnt++;
        }
    }
    let orderValue = '';
    let tmpOrderValue = '';
    for(let i = 0; i < itemIdList.length; i++){
        tmpOrderValue = itemIdList[i];
        tmpOrderValue = tmpOrderValue.replace("itemFS", "");
        orderValue += tmpOrderValue;
    }
    orderIdInput.value = orderValue;
}

renderCartId();

let orderContain = document.getElementById("purchase-payment-summary-contain");
let orderContainProduct = document.getElementById("purchase-payment-summary-contain-product");
let orderBtn = document.getElementsByClassName("customer-purchase-buy-btn")[0];
let orderSummary = document.getElementById("purchase-payment-summary-contain-price");

function renderOrder(){
    let cnt = localStorage.length;
    let itemIdList = [];
    let loopCnt = 0;
    for(let key in localStorage){
        if(loopCnt == cnt){
            break;
        }
        if(key.includes('itemFS')){
            itemIdList.push(key);
            loopCnt++;
        }
    }

    if(itemIdList.length == 0){
        orderContain.style.display = "none";
        orderBtn.disabled = true;
    }else{
        orderBtn.disabled = false;
        orderContain.style.display = "block";
        let tmpOrder = "";
        let tmpPrice = 0;
        for(let i = 0; i < itemIdList.length; i++){
            let tmpValue = localStorage.getItem(itemIdList[i]);
            tmpValue = tmpValue.split(";");
            tmpValue[3] = tmpValue[3].replace("$", "");
            tmpPrice += Number(tmpValue[3]);
            tmpOrder += `
                <div class="purchase-payment-summary-product-card">
                    <p class="text-para purchase-payment-summary-product-card-name">${tmpValue[1]}</p>
                    <p class="text-para purchase-payment-summary-product-card-price">$${tmpValue[3]}</p>
                </div>
            `;
        }
        orderContainProduct.innerHTML = tmpOrder;
        orderSummary.innerHTML = `
            <div id="purchase-payment-summary-price-subtotal" class="purchase-payment-summary-price-card">
                <p class="text-bold purchase-payment-summary-price-card-name">Subtotal</p>
                <p class="text-para purchase-payment-summary-product-card-price">$${tmpPrice.toFixed(2)}</p>
            </div>

            <div id="purchase-payment-summary-price-shipping" class="purchase-payment-summary-price-card">
                <p class="text-bold purchase-payment-summary-price-card-name">Shipping</p>
                <p class="text-para purchase-payment-summary-product-card-price">$10.00</p>
            </div>

            <div id="purchase-payment-summary-price-total" class="purchase-payment-summary-price-card">
                <p class="text-bold purchase-payment-summary-price-card-name">Total</p>
                <p class="text-para purchase-payment-summary-product-card-price">$${(tmpPrice + 10).toFixed(2)}</p>
            </div>

            <p id="purchase-payment-summary-price-vat" class="text-sub">(VAT included)</p>
        `;
    }
}

let deliveryForm = document.getElementById("customer-purchase-info-detail");
let nameInput = document.getElementById("purchase-customer-name");
let phoneInput = document.getElementById("purchase-customer-phone");
let addInput = document.getElementById("purchase-customer-location");

let nameVali = function(){
    let cusName = nameInput.value;
    cusName = cusName.trim();
    if(cusName.length == 0 || typeof(cusName) == undefined){
        return "Name section is required";
    }
    let isname = /^[a-zA-Z]+$/.test(cusName);

    if(cusName.length >= 5 || cusName.length <= 20 || isname){
        return true;
    }else{
        return "Your name should contains only 5-20 valid characters";
    }
}

let phoneVali = function(){
    let cusPhone = document.getElementById("purchase-customer-phone").value;
    if(cusPhone.length == 0 || typeof(cusPhone) == undefined){
        return "Phone section is required";
    }

    let isphone = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g.test(cusPhone);
    if(isphone){
        return true;
    }else{
        return "Your phone should contains only '+' and/ or 9-12 digits";
    }
}

let addVali = function(){
    let cusAdd = addInput.value;
    cusAdd = cusAdd.trim();
    if(cusAdd.length == 0 || typeof(cusAdd) == undefined){
        return "Address section is required";
    }else{
        return true;
    }
}

function submitForm(){
    let check = 0;
    let warningTag = document.createElement("p");
    warningTag.classList.add("text-sub");
    warningTag.classList.add("customer-input-warning");
    if(nameVali(nameInput.value) == true){
        check++;
    }else{
        let warningName = warningTag.cloneNode(true);
        warningName.innerText = nameVali(nameInput.value);
        nameInput.style.borderColor = "#e85146";
        document.getElementById("customer-purchase-info-detail-name").appendChild(warningName);
    }

    if(phoneVali(phoneInput.value) == true){
        check++;
    }else{
        let warningPhone = warningTag.cloneNode(true);
        warningPhone.innerText = phoneVali(phoneInput.value);
        phoneInput.style.borderColor = "#e85146";
        document.getElementById("customer-purchase-info-detail-phone").appendChild(warningPhone);
    }

    if(addVali(addInput.value) == true){
        check++;
    }else{
        let warningLocation = warningTag.cloneNode(true);
        warningLocation.innerText = addVali(addInput.value);
        addInput.style.borderColor = "#e85146";
        document.getElementById("customer-purchase-info-detail-location").appendChild(warningLocation);
    }


    if(check == 3){
        orderBtn.form = "customer-purchase-info-detail";
        deliveryForm.submit();
    }
}

orderBtn.addEventListener("click", submitForm);

renderOrder();