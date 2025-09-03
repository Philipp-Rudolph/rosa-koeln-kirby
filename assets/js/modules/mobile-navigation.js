export function initMobileNavigation() {
  const navToggle = document.querySelector("[data-nav-toggle]");
  const navDrawer = document.querySelector("[data-nav-drawer]");
  const navBackdrop = document.querySelector("[data-nav-backdrop]");
  const navClose = document.querySelector("[data-nav-close]");
  const body = document.body;

  if (!navToggle || !navDrawer || !navBackdrop) return;

  function toggleNav() {
    const isOpen = navDrawer.classList.contains("is-active");

    if (isOpen) {
      closeNav();
    } else {
      openNav();
    }
  }

  function openNav() {
    navDrawer.style.width = "350px";
    navDrawer.classList.add("is-active");
    navBackdrop.classList.add("is-active");
    body.style.overflow = "hidden"; // Prevent background scrolling
  }

  function closeNav() {
    navDrawer.style.width = "0";
    navDrawer.classList.remove("is-active");
    navBackdrop.classList.remove("is-active");
    body.style.overflow = ""; // Restore background scrolling
  }

  // Toggle navigation on button click
  navToggle.addEventListener("click", toggleNav);
  // toggle navigation on hover
  navToggle.addEventListener("mouseover", openNav);
  navDrawer.addEventListener("mouseleave", closeNav);
  // toggle navigation on touch (for mobile devices)
  navToggle.addEventListener("touchstart", function(e) {
    e.preventDefault(); // Prevents the click event from firing
    toggleNav();
  });
  navDrawer.addEventListener("touchstart", function(e) {
    e.stopPropagation(); // Prevents the touch event from propagating to navToggle
  });

  // Close navigation when clicking close button
  if (navClose) {
    navClose.addEventListener("click", closeNav);
  }

  // Close navigation when clicking on backdrop
  navBackdrop.addEventListener("click", closeNav);

  // Close navigation when clicking on nav links
  const navLinks = navDrawer.querySelectorAll(".mobile-nav__link");
  navLinks.forEach((link) => {
    link.addEventListener("click", closeNav);
  });

  // Close navigation with Escape key
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && navDrawer.classList.contains("is-active")) {
      closeNav();
    }
  });

  // Close navigation when window is resized (prevents issues)
  let resizeTimer;
  window.addEventListener("resize", function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
      if (navDrawer.classList.contains("is-active")) {
        closeNav();
      }
    }, 250);
  });

  // Trap focus within navigation when open
  document.addEventListener("keydown", function(e) {
    if (!navDrawer.classList.contains("is-active")) return;

    if (e.key === "Tab") {
      const focusableElements = navDrawer.querySelectorAll(
        'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
      );
      const firstFocusable = focusableElements[0];
      const lastFocusable = focusableElements[focusableElements.length - 1];

      if (e.shiftKey) {
        if (document.activeElement === firstFocusable) {
          lastFocusable.focus();
          e.preventDefault();
        }
      } else {
        if (document.activeElement === lastFocusable) {
          firstFocusable.focus();
          e.preventDefault();
        }
      }
    }
  });
}
