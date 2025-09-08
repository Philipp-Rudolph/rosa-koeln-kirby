export function initIntersectionObserver() {
  // Use passive observation and optimized thresholds
  const observerOptions = {
    threshold: 0.05, // Reduced threshold for earlier triggering
    rootMargin: "0px 0px -20px 0px", // Reduced margin for smoother experience
  };

  // Batch DOM updates using requestAnimationFrame for better performance
  let pendingUpdates = [];
  let isUpdateScheduled = false;

  function flushUpdates() {
    pendingUpdates.forEach(({ element, shouldAdd }) => {
      if (shouldAdd) {
        element.classList.add("is-visible");
        // Stop observing once visible to save resources
        observer.unobserve(element);
      }
    });
    pendingUpdates = [];
    isUpdateScheduled = false;
  }

  function scheduleUpdate(element, shouldAdd) {
    pendingUpdates.push({ element, shouldAdd });

    if (!isUpdateScheduled) {
      isUpdateScheduled = true;
      requestAnimationFrame(flushUpdates);
    }
  }

  const observer = new IntersectionObserver(function (entries) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        scheduleUpdate(entry.target, true);
      }
    });
  }, observerOptions);

  const elementsToObserve = document.querySelectorAll(
    ".dish-item, .highlight-card, .contact-info__item, .hero__content, .welcome__content, .alt-item, .category-header, .highlights__grid, .dishes-grid, .gallery-item, .contact-sections, .map-section"
  );

  elementsToObserve.forEach((element) => {
    element.classList.add("fade-in-up");
    observer.observe(element);
  });

  // Add staggered animation for child elements
  const containerSelectors = [".highlights__grid", ".dishes-grid", ".gallery-grid", ".contact-sections"];

  containerSelectors.forEach(selector => {
    const containers = document.querySelectorAll(selector);
    containers.forEach(container => {
      const children = Array.from(container.children);
      children.forEach((child, index) => {
        // Add slight delay for staggered effect
        child.style.transitionDelay = `${index * 0.05}s`;
        child.classList.add("fade-in-child");

        // Remove transitionDelay after fade-in completes
        child.addEventListener("transitionend", function handler(e) {
          if (e.propertyName === "opacity") {
            child.style.transitionDelay = "";
            child.removeEventListener("transitionend", handler);
          }
        });
        child.classList.add("fade-in-child");
      });
    });
  });

  // Cleanup function to remove observer when page unloads
  window.addEventListener('beforeunload', () => {
    observer.disconnect();
  });
}
