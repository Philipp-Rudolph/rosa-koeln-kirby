<!-- Highlights Section -->
<?php if ($page->highlights()->isNotEmpty()): ?>
  <section class="highlights">
    <div class="highlights__container">
      <?php if ($page->highlights_title()->isNotEmpty()): ?>
        <div class="highlights__header">
          <h3 class="highlights__title"><?= $page->highlights_title() ?></h3>
          <div class="highlights__decoration">
            <div class="decoration-line"></div>
            <div class="decoration-diamond"></div>
            <div class="decoration-line"></div>
          </div>
        </div>
      <?php endif ?>

      <div class="highlights__gallery">
        <?php
        $highlights = $page->highlights()->toStructure()->limit(4);
        foreach ($highlights as $index => $highlight):
        ?>
          <a href="/menu?category=drinks" class="gallery-item" data-reveal="<?= $index ?>">
            <?php if ($image = $highlight->image()->toFile()): ?>
              <img src="<?= $image->crop(1200, 900)->url() ?>" alt="<?= $highlight->title() ?>" loading="lazy">
              <div class="overlay">
                <h3><?= $highlight->title() ?></h3>
                <p><?= $highlight->description() ?></p>
              </div>
            <?php endif ?>
          </a>
        <?php endforeach ?>
      </div>
    </div>
  </section>
<?php endif ?>