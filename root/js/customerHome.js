// Scroll horizontal slider
const slider = document.getElementById("suggestion-list");
let mouseDown = false;
let startX, scrollLeft;

let startDragging = function (e) {
  mouseDown = true;
  startX = e.pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
};
let stopDragging = function (event) {
  mouseDown = false;
};

slider.addEventListener('mousemove', (e) => {
  e.preventDefault();
  if(!mouseDown) { return; }
  const x = e.pageX - slider.offsetLeft;
  const scroll = x - startX;
  slider.scrollLeft = scrollLeft - scroll;
});

  // Add the event listeners
slider.addEventListener('mousedown', startDragging, false);
slider.addEventListener('mouseup', stopDragging, false);
slider.addEventListener('mouseleave', stopDragging, false);



// Extended-button
const categoryList = document.getElementById("category-list");
const categoryCards = categoryList.getElementsByClassName("card");

const categoryListNoti = document.getElementById("category-list-notification");
const categoryExtendedBtn = document.getElementById("category-extended-btn");

const extendedBtn = categoryExtendedBtn.getElementsByClassName("extended-btn")[0];

if(categoryCards.length > 9){
  categoryList.style.display = "grid";
  categoryExtendedBtn.style.display = "flex";
  for(let i = 9; i < categoryCards.length; i++){
    if(!(categoryCards[i].classList.contains("card-extended"))){
      categoryCards[i].classList.add("card-extended");
      categoryCards[i].classList.add("card-extended-unact");
    }
  }
}else{
  if(categoryCards.length == 0){
    categoryList.style.display = "none";
    categoryListNoti.style.display = "block";
  }
  categoryExtendedBtn.style.display = "none";
}

let checkExtended = 0;

const extendedCards = categoryList.getElementsByClassName("card-extended");

function displayExtendedCards(){
  checkExtended++;

  for(let i = 0; i < extendedCards.length; i++){
    extendedCards[i].classList.toggle("card-extended-unact");
  }

  if(checkExtended % 2){
    extendedBtn.getElementsByTagName("p")[0].innerHTML = "VIEW LESS";
  }else{
    extendedBtn.getElementsByTagName("p")[0].innerHTML = "VIEW MORE";
  }
}

extendedBtn.addEventListener("click", displayExtendedCards);

let customerIndex = document.getElementById("customerIndex");
let overlay = document.getElementById("filter-category");
let closeFilterBtn = document.getElementById("close-filter-btn");
let submitFilterBtn = document.getElementById("submit-filter-btn");
let filterBtn = document.getElementById("filter-btn");
let overlayBg = document.getElementById("filter-category-background");

function closeOverlay(){
    overlay.style.display = "none";
    customerIndex.classList.remove("body-modal");
}

function openOverlay(){
    overlay.style.display = "flex";
    customerIndex.classList.add("body-modal");
}

filterBtn.addEventListener("click", openOverlay);
closeFilterBtn.addEventListener("click", closeOverlay);
submitFilterBtn.addEventListener("click", closeOverlay);
overlayBg.addEventListener("click", closeOverlay);

let updateBtn = document.getElementById("update-submit");
let updateEmailInput = document.getElementById("emailUpdate");

function removeInput(){
  updateEmailInput.value = "";
}

updateBtn.addEventListener("click", removeInput);

let submitSearch = document.getElementById("category-heading-search-icon");
let searchForm = document.getElementById("category-heading-search");

function submitSearchForm(){
  searchForm.submit();
}

submitSearch.addEventListener("click", submitSearchForm);