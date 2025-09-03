export function initLightbox() {
  const galleryLinks = document.querySelectorAll('[data-lightbox="gallery"]');
  if (!galleryLinks.length) return;

  const lightbox = document.createElement("div");
  lightbox.classList.add("lightbox");
  lightbox.innerHTML = `
        <div class="lightbox__content">
            <button class="lightbox__close" aria-label="Schließen">&times;</button>
            <img class="lightbox__image" alt="">
            <button class="lightbox__nav lightbox__nav--prev" aria-label="Vorheriges Bild">&#8249;</button>
            <button class="lightbox__nav lightbox__nav--next" aria-label="Nächstes Bild">&#8250;</button>
        </div>
    `;
  document.body.appendChild(lightbox);

  const lightboxImage = lightbox.querySelector(".lightbox__image");
  const closeBtn = lightbox.querySelector(".lightbox__close");
  const prevBtn = lightbox.querySelector(".lightbox__nav--prev");
  const nextBtn = lightbox.querySelector(".lightbox__nav--next");

  let currentIndex = 0;
  const images = Array.from(galleryLinks).map((link) => ({
    src: link.href,
    alt: link.dataset.title || "",
  }));

  galleryLinks.forEach((link, index) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      currentIndex = index;
      showImage(currentIndex);
      lightbox.classList.add("is-active");
      document.body.style.overflow = "hidden";
    });
  });

  closeBtn.addEventListener("click", closeLightbox);
  lightbox.addEventListener("click", (e) => {
    if (e.target === lightbox) closeLightbox();
  });

  prevBtn.addEventListener("click", () => {
    currentIndex = currentIndex > 0 ? currentIndex - 1 : images.length - 1;
    showImage(currentIndex);
  });

  nextBtn.addEventListener("click", () => {
    currentIndex = currentIndex < images.length - 1 ? currentIndex + 1 : 0;
    showImage(currentIndex);
  });

  document.addEventListener("keydown", (e) => {
    if (!lightbox.classList.contains("is-active")) return;

    if (e.key === "Escape") closeLightbox();
    if (e.key === "ArrowLeft") prevBtn.click();
    if (e.key === "ArrowRight") nextBtn.click();
  });

  function showImage(index) {
    const image = images[index];
    lightboxImage.src = image.src;
    lightboxImage.alt = image.alt;
  }

  function closeLightbox() {
    lightbox.classList.remove("is-active");
    document.body.style.overflow = "";
  }
}