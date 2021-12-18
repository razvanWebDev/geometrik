window.onload = () => {
  //HTML elements
  const sidebarLinks = document.querySelectorAll(".nav-treeview .nav-link");

  // Check if element exists before calling function
  const elementExists = (element) => {
    return element != undefined && element != null;
  };

  //Get current sideBar page==========
  const getCurrentSidebarPage = () => {
    const currentPageURL = window.location.href;

    sidebarLinks.forEach((sidebarLink) => {
      sidebarLink.classList.remove("active");
      const currentLink = sidebarLink.href;
      if (currentPageURL === currentLink) {
        //activate link
        sidebarLink.classList.add("active");
        //open sidebar dropdown
        const currentPageHeader = sidebarLink.closest(".sidebar-page-header");
        currentPageHeader.classList.add("menu-open");
        //add blue color to dropdown header
        const sidebarPageTitle = currentPageHeader.querySelector(
          ".sidebar-page-title"
        );
        sidebarPageTitle.classList.add("active");
        //set active icon
        const navIcon = sidebarLink.querySelector(".nav-icon");
        navIcon.classList.remove("fa-circle");
        navIcon.classList.add("fa-dot-circle");
      }
    });
  };

  if (elementExists(sidebarLinks)) {
    getCurrentSidebarPage();
  }
  // #################################

  //FORMS VALIDATION
  // User forms validation
  $(function () {
    $("#user-form").validate({
      rules: {
        firstname: {
          required: true,
        },
        lastname: {
          required: true,
        },
        username: {
          required: true,
          minlength: 6,
        },
        email: {
          required: true,
          email: true,
        },
        phone: {
          required: true,
        },
        user_password: {
          required: true,
          minlength: 8,
        },
        repeat_user_password: {
          required: true,
          equalTo: "#user_password",
        },
      },
      messages: {
        username: {
          required: "Please provide a username",
          minlength: "Your username must be at least 6 characters long",
        },
        email: {
          required: "Please enter a email address",
          email: "Please enter a vaild email address",
        },
        user_password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 8 characters long",
        },
        repeat_user_password: {
          required: "Please enter the same a password",
          equalTo: "Your password must be the same",
        },
      },
      errorElement: "span",
      errorPlacement: function (error, element) {
        error.addClass("invalid-feedback");
        element.closest(".form-group").append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass("is-invalid");
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass("is-invalid");
      },
    });
  });

  //reset password form validation
  $(function () {
    $("#reset-password-form").validate({
      rules: {
        pwd: {
          required: true,
          minlength: 8,
        },
        pwd_repeat: {
          required: true,
          equalTo: "#pwd",
        },
      },
      messages: {
        pwd: {
          required: "Please provide a password",
          minlength: "Your password must be at least 8 characters long",
        },
        pwd_repeat: {
          required: "Please enter the same a password",
          equalTo: "Your password must be the same",
        },
      },
      errorElement: "span",
      errorPlacement: function (error, element) {
        error.addClass("invalid-feedback");
        element.closest(".form-group").append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass("is-invalid");
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass("is-invalid");
      },
    });
  });

  //Initialize Custom file input
  $(function () {
    bsCustomFileInput.init();
  });
};
