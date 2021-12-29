window.onload = () => {
  //HTML elements
  const sidebarLinks = document.querySelectorAll(".nav-treeview .nav-link");

  // Check if element exists before calling function
  const elementExists = (element) => {
    return element != undefined && element != null;
  };

  //Get current sideBar page==========
  const getCurrentSidebarPage = () => {
    let currentPageURL = window.location.href;

    if (currentPageURL.indexOf("?") > 0) {
      currentPageURL = currentPageURL.substring(0, currentPageURL.indexOf("?"));
    }

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

  //Initialize Custom file input
  $(function () {
    bsCustomFileInput.init();
  });
};
