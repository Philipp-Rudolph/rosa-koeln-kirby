import { initMobileNavigation } from "./mobile-navigation.js";
import { initIntersectionObserver } from "./intersection-observer.js";
import { initFormHandling } from "./form-handling.js";
import { initLightbox } from "./lightbox.js";
import { toggleMenuCategories } from "./menu-navigation.js";
import { initScrollToTop } from "./scroll-to-top.js";
import { initMobileInteractions } from "./mobile-interactions.js";
import { showLoadingSpinner, hideLoadingSpinner } from "./loading-spinner.js";

export function initializeApp() {
  try {
    // Erst alle Funktionen definieren, dann initialisieren
    initLoadingStates();
    initMobileNavigation();
    initIntersectionObserver();
    initFormHandling();
    initScrollToTop();
    initLightbox();
    toggleMenuCategories();
    initMobileInteractions();

    // restaurantApp Objekt EINMAL komplett definieren
    window.restaurantApp = {
      menu: {
        toggleMenuCategories,
      },
      loading: {
        showLoadingSpinner,
        hideLoadingSpinner,
      },
    };

    // Auch global verfügbar machen (für einfacheren Zugriff)
    window.showLoadingSpinner = showLoadingSpinner;
    window.hideLoadingSpinner = hideLoadingSpinner;

    initErrorHandling();
    initPerformanceMonitoring();

  } catch (error) {
    console.error("❌ App initialization failed:", error);
  }
}

function initErrorHandling() {
  window.addEventListener("error", function (e) {
    console.error("JavaScript Error:", e.error);
    // Optional: Loading Spinner verstecken bei Fehlern
    if (window.hideLoadingSpinner) {
      window.hideLoadingSpinner();
    }
  });
}

function initLoadingStates() {
  // Prüfen ob Loading Spinner Element existiert
  const spinnerElement = document.querySelector(".loading-spinner");

  if (!spinnerElement) {
    console.warn(
      "⚠️ Loading spinner element (.loading-spinner) not found in DOM"
    );
    return;
  }

  window.addEventListener("load", () => {
    // Kleine Verzögerung für bessere UX
    setTimeout(() => {
      hideLoadingSpinner();
    }, 500);
  });
}

function initPerformanceMonitoring() {
  if ("performance" in window) {
    window.addEventListener("load", function () {
      setTimeout(function () {
        try {
          const perfData = performance.getEntriesByType("navigation")[0];
          if (perfData) {
            console.log(
              "📊 Page Load Time:",
              Math.round(perfData.loadEventEnd - perfData.loadEventStart),
              "ms"
            );
          }
        } catch (error) {
          console.warn("Performance monitoring failed:", error);
        }
      }, 0);
    });
  }
}
