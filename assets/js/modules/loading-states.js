export function initLoadingStates() {
  window.addEventListener("load", function () {
    const loadingSpinner = document.querySelector(".loading-spinner");
    if (loadingSpinner) {
      loadingSpinner.classList.add("fade-out");
      setTimeout(() => {
        loadingSpinner.remove();
      }, 300);
    }

    document.body.classList.add("page-loaded");
  });

  window.showLoadingSpinner = function (container) {
    if (typeof container === "string") {
      container = document.querySelector(container);
    }

    if (container) {
      container.classList.add("is-loading");
      container.setAttribute("aria-busy", "true");
    }
  };

  window.hideLoadingSpinner = function (container) {
    if (typeof container === "string") {
      container = document.querySelector(container);
    }

    if (container) {
      container.classList.remove("is-loading");
      container.setAttribute("aria-busy", "false");
    }
  };
}