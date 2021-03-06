// =====================CACHE DOM ELEMENTS=====================
const hamburger = document.querySelector("#hamburger");
const nav = document.querySelector(".header-menu");
const labelTransform = document.querySelectorAll(".label-transform");

const submitContact = document.querySelector(".submit-contact");
const allFieldsRequiredMessage_p = document.querySelector(
  ".all-fields-required-message"
);

//FOOTER
const currentYearSpan = document.querySelector(".current-year-span");

// =========== General Functions =================

// Check if element exists before calling function
const elementExists = (element) => {
  return element != undefined && element != null;
};

//hide image if it has error
const allImages = document.querySelectorAll("img");
const hideImagesWithErrors = () => {
  allImages.forEach((image) => {
    image.addEventListener("error", () => {
      image.style.display = "none";
    });
  });
};
if (allImages) {
  hideImagesWithErrors();
}

// Preloader============
const preloader = document.querySelector(".preloader");
const hidePreloader = () => {
  preloader.classList.add("hide");
};

// ========================HEADER============================

//Navbar on mobile===========
const navToggle = () => {
  nav.classList.toggle("show-nav");
  if (nav.classList.contains("show-nav")) {
    nav.style.animation = `navSlideIn 0.7s forwards`;
  } else {
    nav.style.animation = `navSlideOut 0.7s`;
  }
  hamburger.classList.toggle("toggle-burger");
};
const closeNav = () => {
  nav.classList.remove("show-nav");
  nav.style.animation = `navSlideOut 0.7s`;
  hamburger.classList.remove("toggle-burger");
};

// ===========CAROUSELS=============================
//initialize main carousel
const mainCarousel = document.querySelector(".main-carousel");
if (mainCarousel) {
  var flkty = new Flickity(".main-carousel", {
    cellAlign: "left",
    lazyLoad: true,
    contain: true,
  });
}

//hide carousel dots if carousel has only 1 element
const carouselDotsLists = document.querySelectorAll(".flickity-page-dots");
if (carouselDotsLists) {
  carouselDotsLists.forEach((dotsList) => {
    if (dotsList.querySelectorAll("li").length <= 1) {
      dotsList.style.display = "none";
    }
  });
}
// ==============================Forms validation======================
function validateEmail(email) {
  var re =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

const validateFormInput = (event, condition, item) => {
  //set input bg
  item.style.backgroundColor = "transparent";
  //show warning message

  if (condition) {
    event.preventDefault();
    item.style.backgroundColor = "#d9534f55";
    allFieldsRequiredMessage_p.style.display = "block";
  } else {
    allFieldsRequiredMessage_p.style.display = "none";
  }
};

function validateForm(event) {
  const currentForm = event.target.parentNode;
  const requiredFields = currentForm.querySelectorAll(".required-field");
  // check required inputs
  requiredFields.forEach((field) => {
    validateFormInput(event, field.value == "", field);
    field.addEventListener("input", function () {
      validateFormInput(event, field.value == "", field);
    });
    //validate required checkbox
    //has to be wrapped in a p which gets the bg color
    if (field.type.toLowerCase() == "checkbox") {
      validateFormInput(event, field.checked == false, field.parentNode);
      field.addEventListener("input", function () {
        validateFormInput(event, field.checked == false, field.parentNode);
      });
    }
    //validate email
    if (field.type.toLowerCase() == "email") {
      validateFormInput(event, validateEmail(field.value) == false, field);
      field.addEventListener("input", function () {
        validateFormInput(event, validateEmail(field.value) == false, field);
      });
    }
    //validate select
    if (field.tagName.toLowerCase() == "select") {
      validateFormInput(
        event,
        field.value == "0" || field.value == undefined,
        field
      );
    }
  });
}
// ************************************************************

// ==============FORMS=========================================
// Floating labels
const moveUp = (input) => {
  const currenLabel = input.previousElementSibling;
  input.classList.add("current-input");
  currenLabel.classList.add("moveUp");
};

const moveDown = (input) => {
  const currenLabel = input.previousElementSibling;
  if (input.value == "") {
    input.classList.remove("current-input");
    currenLabel.classList.remove("moveUp");
  }
};

//  ##############################################################
// ================show/hide top & bottom fades

const simplePageDescriptionContainer = document.querySelector(
  ".simple-page-description-container"
);
const simplePageDescription = document.querySelector(
  ".simple-page-description"
);
const topFade = document.querySelector(".top-fade");
const bottomFade = document.querySelector(".bottom-fade");

const showHideTopFade = () => {
  if (simplePageDescription.scrollTop > 1) {
    topFade.style.opacity = "1";
  } else {
    topFade.style.opacity = "0";
  }
};

const showHideBottomFade = () => {
  if (
    simplePageDescription.clientHeight + simplePageDescription.scrollTop + 1 >=
    simplePageDescription.scrollHeight
  ) {
    // you're at the bottom of the div
    bottomFade.style.opacity = "0";
  } else {
    bottomFade.style.opacity = "1";
  }
};

if (simplePageDescription && topFade && bottomFade) {
  simplePageDescription.onscroll = function () {
    showHideTopFade();
    showHideBottomFade();
  };
}

//=========FOOTER===========
const getCurrentYear = () => {
  let currentDate = new Date();
  return currentDate.getFullYear();
};

if (elementExists(currentYearSpan)) {
  currentYearSpan.innerHTML = getCurrentYear();
}

//=========================EVENT LISTENERS=====================

// show nav on hamburger tap
hamburger.addEventListener("click", navToggle);

//floating labels
if (elementExists(labelTransform)) {
  // Input labels event listeners
  labelTransform.forEach((input) =>
    input.addEventListener("focus", () => moveUp(input))
  );
  labelTransform.forEach((input) =>
    input.addEventListener("focusout", () => moveDown(input))
  );
  labelTransform.forEach((input) => {
    if (input.value !== "") {
      moveUp(input);
    } else {
      moveDown(input);
    }
  });
}

//Validate contact form
if (elementExists(submitContact)) {
  submitContact.addEventListener("click", validateForm);
}

window.onload = () => {
  if (elementExists(preloader)) {
    hidePreloader();
  }
  if (simplePageDescription && topFade && bottomFade) {
    showHideTopFade();
    showHideBottomFade();
  }
};
