<?php snippet('header') ?>

<!-- Hero Section -->
<?php snippet('hero', ['page' => $page]) ?>

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
<?php snippet('cta') ?>

<!-- Gallery Section -->
<?php if ($page->gallery_images()->isNotEmpty()): ?>
  <?php snippet('gallery') ?>
<?php endif ?>


<?php snippet('footer') ?>