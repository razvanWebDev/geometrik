window.onload = () => {
  // =====================CACHE DOM ELEMENTS=====================
  const hamburger = document.querySelector("#hamburger");
  const nav = document.querySelector(".header-menu");
  const labelTransform = document.querySelectorAll(".label-transform");

  const submitContact = document.querySelector(".submit-contact");
  const allFieldsRequiredMessage_p = document.querySelector(
    ".all-fields-required-message"
  );

  //FOOTER
  const upArrow = document.querySelector(".to-top-arrow");
  const currentYearSpan = document.querySelector(".current-year-span");

  // =========== General Functions =================

  // Check if element exists before calling function
  const elementExists = (element) => {
    return element != undefined && element != null;
  };

  // Preloader============
  const preloader = document.querySelector(".preloader");
  if (elementExists(preloader)) {
    preloader.classList.add("hide");
  }

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
  // Scroll to top arrow==================
  const scrollToTop = () => window.scroll({ top: 0, behavior: "smooth" });
  // Show scroll up arrow
  const showItem = (item, scrollHeight) => {
    const y = window.scrollY;
    if (y >= scrollHeight) {
      item.classList.add("show");
    } else {
      item.classList.remove("show");
    }
  };

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

  // Show scroll to top arrow
  if (elementExists(upArrow)) {
    window.addEventListener("scroll", () => showItem(upArrow, 300));
  }
  // scroll page to top
  if (elementExists(upArrow)) {
    upArrow.addEventListener("click", scrollToTop);
  }

  //Validate contact form
  if (elementExists(submitContact)) {
    submitContact.addEventListener("click", validateForm);
  }
};
