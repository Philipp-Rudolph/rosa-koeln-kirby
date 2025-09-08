<?php snippet('header') ?>

<!-- Hero Section -->
<section class="hero" style="background-image: url('<?= $page->hero_image()->toFile()->thumb()->url() ?>')">
  <div class="hero__overlay">
    <div class="hero__content">
      <h1 class="hero__headline"><?= $page->headline() ?></h1>
      <?php if ($page->subheadline()->isNotEmpty()): ?>
        <h2 class="hero__subheadline"><?= $page->subheadline() ?></h2>
      <?php endif ?>
      <div class="hero__buttons">
        <a href="<?= url('menu') ?>" class="btn btn--primary">Getränkekarte ansehen</a>
        <a href="<?= url('kontakt') ?>" class="btn btn--secondary">Reservierung</a>
      </div>
    </div>
  </div>
</section>

<!-- Intro Section -->
<?php if ($page->intro()->isNotEmpty()): ?>
  <section class="intro">
    <div class="intro__content">
      <?= $page->intro()->kt() ?>
    </div>
  </section>
<?php endif ?>

<!-- Welcome Section -->
<?php if ($page->welcome_title()->isNotEmpty() || $page->welcome_text()->isNotEmpty()): ?>
  <section class="welcome">
    <div class="welcome__content">
      <?php if ($page->welcome_title()->isNotEmpty()): ?>
        <h3><?= $page->welcome_title() ?></h3>
      <?php endif ?>

      <?php if ($page->welcome_text()->isNotEmpty()): ?>
        <div class="welcome__text">
          <?= $page->welcome_text()->kt() ?>
        </div>
      <?php endif ?>
    </div>
  </section>
<?php endif ?>

<!-- Highlights Section -->
<?php snippet('highlights') ?>

<!-- Contact Info Section -->
<!-- <section class="contact-info">
  <div class="contact-info__grid">
    <div class="contact-info__item">
      <h3>Reservierung</h3>
      <p>Telefon: <?= $page->phone() ?></p>
      <p>E-Mail: <a href="mailto:<?= $page->email() ?>"><?= $page->email() ?></a></p>
    </div>

    <div class="contact-info__item">
      <h3>Öffnungszeiten</h3>
      <?php snippet('openingHours'); ?>
    </div>
  </div>
</section> -->

<?php snippet('cta') ?>

<!-- Gallery Section -->
<?php if ($page->gallery_images()->isNotEmpty()): ?>
  <?php snippet('gallery') ?>
<?php endif ?>


<?php snippet('footer') ?>