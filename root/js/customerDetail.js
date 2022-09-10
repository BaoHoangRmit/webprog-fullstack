let addBtn = document.getElementsByClassName("add-cart-btn")[0];
let popupTag = document.getElementById("product-popup");
let pageTag = document.getElementById("customerDetail");
let closePopup = document.getElementById("product-popup-close");

function addItem(){
    let webUrl = window.location.href;
    let itemNameTag = document.getElementById("product-detail-info-name");
    let vendorNameTag = document.getElementById("product-detail-info-vendor");
    let itemPriceTag = document.getElementById("product-detail-info-price");
    let imgTag = document.getElementById("product-detail-image-img");

    if(webUrl.includes("?")){
        let urlParams = new URLSearchParams(window.location.search);
        let itemId = urlParams.get('productID');

        let itemName = itemNameTag.innerText;

        let vendorName = vendorNameTag.innerText;

        let itemPrice = itemPriceTag.innerText;

        let imgVal = imgTag.getAttribute("src");

        let localValue = imgVal + ";" + itemName + ";" + vendorName + ";" + itemPrice;

        localStorage.setItem(`${itemId}`, localValue);

        popupTag.style.display = "flex";
        pageTag.classList.add("body-modal");
    }
}

function removePopup(){
    popupTag.style.display = "none";
    pageTag.classList.remove("body-modal");
}

addBtn.addEventListener("click", addItem);
closePopup.addEventListener("click", removePopup);