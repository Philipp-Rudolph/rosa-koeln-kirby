export function initScrollToTop() {
  const scrollToTopBtn = document.createElement("button");
  scrollToTopBtn.innerHTML = "↑";
  scrollToTopBtn.classList.add("scroll-to-top");
  scrollToTopBtn.setAttribute("aria-label", "Nach oben scrollen");
  document.body.appendChild(scrollToTopBtn);

  window.addEventListener("scroll", function () {
    if (window.pageYOffset > 300) {
      scrollToTopBtn.classList.add("is-visible");
    } else {
      scrollToTopBtn.classList.remove("is-visible");
    }
  });

  scrollToTopBtn.addEventListener("click", function () {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
}