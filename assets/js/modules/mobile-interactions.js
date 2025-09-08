export const initMobileInteractions = () => {
  const galleryItems = document.querySelectorAll('.gallery-item');
  let isActive = false;

  if (!galleryItems.length) return;

  galleryItems.forEach((item) => {
    item.addEventListener('touchstart', () => {
      isActive = !isActive;
      item.classList.toggle('is-active', isActive);
    });
    item.addEventListener('touchend', () => {
      setTimeout(() => {
        isActive = false;
        item.classList.remove('is-active');
      }, 300); // Delay to allow user to see the effect
    });
  });
};
