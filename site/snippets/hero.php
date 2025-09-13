<section class="hero" style="background-image: url('<?= $page->hero_image()->isNotEmpty() ? $page->hero_image()->toFile()->crop(1600, 900)->url() : '' ?>')">
  <div class="hero__overlay">
    <div class="hero__content">
      <h1 class="hero__headline"><?= $page->headline() ?></h1>
      <?php if ($page->subheadline()->isNotEmpty()): ?>
        <h2 class="hero__subheadline"><?= $page->subheadline() ?></h2>
      <?php endif ?>
      <?php if ($page->intro()->isNotEmpty() && !$page->isHomePage()): ?>
        <p class="hero__intro"><?= $page->intro() ?></p>
      <?php endif ?>
      <?php if ($page->isHomePage()): ?>
        <div class="hero__buttons">
          <a href="<?= url('menu') ?>" class="btn btn--primary">Getränkekarte ansehen</a>
          <a href="<?= url('kontakt') ?>" class="btn btn--secondary">Reservierung</a>
        </div>
      <?php endif ?>
    </div>
  </div>
</section>