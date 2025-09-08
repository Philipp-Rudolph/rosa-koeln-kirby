<?php snippet('header') ?>

<?php snippet('hero', ['page' => $page]) ?>

<div class="contact-content">
  <div class="contact-sections">

    <!-- Contact Information -->
    <section class="contact-section">
      <div class="contact-info">
        <h2>Kontaktinformationen</h2>
        <?php if ($site->address()->isNotEmpty()): ?>
          <div class="contact-item">
            <h3>Adresse</h3>
            <address>
              <?= $site->address()->kt() ?>
            </address>
          </div>
        <?php endif ?>

        <?php if ($site->phone()->isNotEmpty()): ?>
          <div class="contact-item">
            <h3>Telefon</h3>
            <p><a href="tel:<?= str_replace([' ', '(', ')', '-'], '', $site->phone()) ?>"><?= $site->phone() ?></a></p>
          </div>
        <?php endif ?>

        <?php if ($site->email()->isNotEmpty()): ?>
          <div class="contact-item">
            <h3>E-Mail</h3>
            <p><a href="mailto:<?= $site->email() ?>"><?= $site->email() ?></a></p>
          </div>
        <?php endif ?>

        <?php if ($site->website()->isNotEmpty()): ?>
          <div class="contact-item">
            <h3>Website</h3>
            <p><a href="<?= $site->website() ?>" target="_blank"><?= $site->website() ?></a></p>
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
<?php snippet('cta') ?>

<?php snippet('form') ?>

<?php snippet('footer') ?>