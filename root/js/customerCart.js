let cartList = document.getElementById("cart-list");
let cartWarning = document.getElementById("cart-container-warning");
let cartListCard = cartList.getElementsByClassName("cart-card");
let popupTag = document.getElementById("cart-popup");
let pageTag = document.getElementById("customerCart");
let closePopup = document.getElementById("cart-popup-close");
let confirmPopup = document.getElementById("cart-popup-confirm");
let confirmPopupId = confirmPopup.getElementsByClassName("text-bold")[0];


function openPopup(id){
    popupTag.style.display = "flex";
    pageTag.classList.add("body-modal");
    confirmPopupId.setAttribute("id", id);
}

function removePopup(){
    popupTag.style.display = "none";
    pageTag.classList.remove("body-modal");
}

function removeItem(){
    let tmpId = confirmPopupId.id;
    localStorage.removeItem(tmpId);
    removePopup();
    renderCart();
}

let renderCart = function(){
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
        cartList.style.display = "none";
        cartWarning.style.display = "block";
    }else{
        let tmpCart = "";
        for(let i = 0; i < itemIdList.length; i++){
            let tmpValue = localStorage.getItem(itemIdList[i]);
            tmpValue = tmpValue.split(";");
            tmpCart += `
            <div class="cart-card">
                <figure class="cart-card-image">
                    <img src="${tmpValue[0]}" alt="thumbnail">
                </figure>

                <div class="cart-card-info">
                    <div class="cart-card-info-detail">
                        <div class="cart-card-info-detail-basic">
                            <p class="text-para">${tmpValue[1]}</p>
                                    
                            <p class="text-sub">${tmpValue[2]}</p>
                        </div>

                        <div class="cart-card-info-detail-remove">
                            <span class="text-sub" onclick="openPopup('${itemIdList[i]}')">Remove</span>
                        </div>
                    </div>

                    <p class="text-bold cart-card-info-price">
                        ${tmpValue[3]}
                    </p>
                </div>
            </div>
            `
        }
        cartList.innerHTML = tmpCart;
    }
}

renderCart();

closePopup.addEventListener("click", removePopup);
confirmPopup.addEventListener("click", removeItem);