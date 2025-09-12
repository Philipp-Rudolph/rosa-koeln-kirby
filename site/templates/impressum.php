<?php snippet('header') ?>

<!-- <?php snippet('hero', ['page' => $page]) ?> -->

<div class="impressum-content">
  <section class="impressum-section">
    <h1>Impressum</h1>
    <div class="impressum-info">
      <?= $page->impressum_text()->kt() ?>
    </div>
  </section>
</div>

<?php snippet('footer') ?>
