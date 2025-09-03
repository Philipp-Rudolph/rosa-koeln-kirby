<?php snippet('header') ?>

<div class="page-header">
  <h1><?= $page->headline() ?></h1>
  <?php if ($page->intro()->isNotEmpty()): ?>
    <p class="page-intro"><?= $page->intro() ?></p>
  <?php endif ?>
</div>

<div class="contact-content">
  <div class="contact-sections">

    <!-- Contact Information -->
    <section class="contact-section">
      <div class="contact-info">
        <h2>Kontaktinformationen</h2>
        <?php if ($page->address()->isNotEmpty()): ?>
          <div class="contact-item">
            <h3>Adresse</h3>
            <address>
              <?= $page->address()->kt() ?>
            </address>
          </div>
        <?php endif ?>

        <?php if ($page->phone()->isNotEmpty()): ?>
          <div class="contact-item">
            <h3>Telefon</h3>
            <p><a href="tel:<?= str_replace([' ', '(', ')', '-'], '', $page->phone()) ?>"><?= $page->phone() ?></a></p>
          </div>
        <?php endif ?>

        <?php if ($page->email()->isNotEmpty()): ?>
          <div class="contact-item">
            <h3>E-Mail</h3>
            <p><a href="mailto:<?= $page->email() ?>"><?= $page->email() ?></a></p>
          </div>
        <?php endif ?>

        <?php if ($page->website()->isNotEmpty()): ?>
          <div class="contact-item">
            <h3>Website</h3>
            <p><a href="<?= $page->website() ?>" target="_blank"><?= $page->website() ?></a></p>
          </div>
        <?php endif ?>
      </div>
    </section>

    <!-- Opening Hours -->
    <?php if ($page->opening_hours()->isNotEmpty()): ?>
      <section class="contact-section">
        <div class="contact-info">
          <h2>Öffnungszeiten</h2>
          <?php snippet('openingHours') ?>
        </div>
      </section>
    <?php endif ?>

  </div>

  <!-- Map -->
  <?php if ($page->google_maps_embed()->isNotEmpty()): ?>
    <section class="map-section">
      <h2>So finden Sie uns</h2>
      <div class="map-container">
        <?= $page->google_maps_embed() ?>
      </div>
    </section>
  <?php endif ?>
</div>

<!-- Reservation CTA -->
<section class="reservation-cta">
  <div class="cta-content container">
    <h2>Tisch reservieren</h2>
    <p>Möchten Sie einen Tisch reservieren? Rufen Sie uns an oder schreiben Sie uns eine E-Mail.</p>
    <div class="cta-buttons">
      <?php if ($page->phone()->isNotEmpty()): ?>
        <a href="tel:<?= str_replace([' ', '(', ')', '-'], '', $page->phone()) ?>" class="btn btn--primary">
          Anrufen: <?= $page->phone() ?>
        </a>
      <?php endif ?>

      <?php if ($page->email()->isNotEmpty()): ?>
        <a href="mailto:<?= $page->email() ?>?subject=Tischreservierung" class="btn btn--secondary">
          E-Mail senden
        </a>
      <?php endif ?>
    </div>
  </div>
</section>

<?php snippet('form') ?>

<?php snippet('footer') ?>