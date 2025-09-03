<?php
// Erweiterte Version mit Lightbox
$galleryImages = $page->gallery_images()->toFiles();
$galleryTitle = $page->gallery_title()->or('Impressionen');

if ($galleryImages->count() > 0):
?>

<section class="gallery">
    <?php if ($galleryTitle->isNotEmpty()): ?>
    <h3><?= $galleryTitle ?></h3>
    <?php endif ?>
    
    <div class="gallery-grid">
        <?php 
        $counter = 1;
        $displayImages = $galleryImages->limit(12);
        
        foreach ($displayImages as $image): 
            $altText = $image->alt()->isNotEmpty() ? $image->alt() : 'Galerie-Bild ' . $counter;
        ?>
        <div class="alt-item" data-index="<?= $counter - 1 ?>">
            <a href="<?= $image->crop(1200, 800)->url() ?>" 
               class="gallery-link" 
               data-lightbox="gallery" 
               data-title="<?= $altText ?>">
                <img src="<?= $image->crop(1200, 900)->url() ?>" 
                     alt="<?= $altText ?>" 
                     loading="lazy">
                <div class="gallery__overlay">
                    <span class="gallery__icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                        </svg>
                    </span>
                </div>
            </a>
        </div>
        <?php 
        $counter++;
        endforeach;
        
        // Platzhalter für fehlende Bilder
        while ($counter <= 12): 
        ?>
        <div class="alt-item">
            <span>Bild <?= $counter ?></span>
        </div>
        <?php 
        $counter++;
        endwhile;
        ?>
    </div>
</section>

<?php endif ?>
