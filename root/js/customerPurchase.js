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
                <p class="text-para purchase-payment-summary-product-card-price">$${tmpPrice}</p>
            </div>

            <div id="purchase-payment-summary-price-shipping" class="purchase-payment-summary-price-card">
                <p class="text-bold purchase-payment-summary-price-card-name">Shipping</p>
                <p class="text-para purchase-payment-summary-product-card-price">$10</p>
            </div>

            <div id="purchase-payment-summary-price-total" class="purchase-payment-summary-price-card">
                <p class="text-bold purchase-payment-summary-price-card-name">Total</p>
                <p class="text-para purchase-payment-summary-product-card-price">$${tmpPrice + 10}</p>
            </div>

            <p id="purchase-payment-summary-price-vat" class="text-sub">(VAT included)</p>
        `;
    }
}

renderOrder();