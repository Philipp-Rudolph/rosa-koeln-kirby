import { initMobileNavigation } from './mobile-navigation.js';
import { initIntersectionObserver } from './intersection-observer.js';
import { initFormHandling } from './form-handling.js';
import { initLightbox } from './lightbox.js';
import { toggleMenuCategories } from './menu-navigation.js';
import { initLoadingStates } from './loading-states.js';
import { initScrollToTop } from './scroll-to-top.js';
import { initMobileInteractions } from './mobile-interactions.js';

export function initializeApp() {
  try {
    initMobileNavigation();
    initIntersectionObserver();
    initLoadingStates();
    initFormHandling();
    initScrollToTop();
    initLightbox();
    toggleMenuCategories();
    initMobileInteractions();

    window.restaurantApp = {
      menu: { toggleMenuCategories }
    };

    initErrorHandling();
    initPerformanceMonitoring();
  } catch (error) {
    console.error('App initialization failed:', error);
  }
}

function initErrorHandling() {
  window.addEventListener("error", function (e) {
    console.error("JavaScript Error:", e.error);
  });
}

function initPerformanceMonitoring() {
  if ("performance" in window) {
    window.addEventListener("load", function () {
      setTimeout(function () {
        const perfData = performance.getEntriesByType("navigation")[0];
        console.log(
          "Page Load Time:",
          perfData.loadEventEnd - perfData.loadEventStart,
          "ms"
        );
      }, 0);
    });
  }
}
