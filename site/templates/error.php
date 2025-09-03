<?php snippet('header') ?>

<div class="error-page">
  <div class="container">
    <div class="error-content">
      <h1><?= $page->headline() ?></h1>

      <div class="error-text">
        <?= $page->text()->kt() ?>
      </div>

      <div class="error-actions">
        <a href="<?= url() ?>" class="btn btn-primary">Zur Startseite</a>
        <a href="<?= url('menu') ?>" class="btn btn-secondary">Zur Speisekarte</a>
      </div>
    </div>
  </div>
</div>

<?php snippet('footer') ?>