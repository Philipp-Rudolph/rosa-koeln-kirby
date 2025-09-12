<section class="hero" style="background-image: url('<?= $page->hero_image()->isNotEmpty() ? $page->hero_image()->toFile()->url() : '' ?>')">
  <div class="hero__overlay">
    <div class="hero__content">
      <h1 class="hero__headline"><?= $page->headline() ?></h1>
      <?php if ($page->intro()->isNotEmpty()): ?>
        <p class="hero__intro"><?= $page->intro() ?></p>
      <?php endif ?>
    </div>
  </div>
</section>