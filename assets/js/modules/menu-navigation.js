export function toggleMenuCategories() {
  const navItems = document.querySelectorAll(".menu-navigation__item");
  const categories = document.querySelectorAll(".menu-category");
  if (!navItems.length || !categories.length) return;
  // Determine active category from URL search param
  const urlParams = new URLSearchParams(window.location.search);
  const activeCategory = urlParams.get("category");
  let initialNavItem = navItems[0];
  let initialCategory = categories[0];
  if (activeCategory) {
    navItems.forEach((navItem) => {
      if (navItem.dataset.category === activeCategory) {
        initialNavItem = navItem;
      }
    });
    categories.forEach((category) => {
      if (category.id === activeCategory) {
        initialCategory = category;
      }
    });
  }
  // Set initial active tab and category
  navItems.forEach((item) => item.classList.remove("is-active"));
  categories.forEach((category) => category.classList.remove("active"));
  initialNavItem.classList.add("is-active");
  initialCategory.classList.add("active");
  navItems.forEach((navItem) => {
    navItem.addEventListener("click", (e) => {
      e.preventDefault();
      const targetCategory = navItem.getAttribute("data-category");
      const url = new URL(window.location);
      url.searchParams.set("category", navItem.dataset.category);
      window.history.pushState({}, "", url);
      // Remove is-active from all navItems
      navItems.forEach((item) => item.classList.remove("is-active"));
      // Remove active from all categories
      categories.forEach((category) => category.classList.remove("active"));
      // Add is-active to the clicked navItem
      navItem.classList.add("is-active");
      // Add active to the corresponding category
      categories.forEach((category) => {
        if (category.id === targetCategory) {
          category.classList.add("active");
        }
      });
    });
  });
}
