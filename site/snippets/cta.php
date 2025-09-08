<section class="reservation-cta">
  <div class="cta-content container">
    <h2>Tisch reservieren</h2>
    <p>Möchten Sie einen Tisch reservieren? Rufen Sie uns an oder schreiben Sie uns eine E-Mail.</p>
    <div class="cta-buttons">
      <?php if ($site->phone()->isNotEmpty()): ?>
        <a href="/kontakt" class="btn btn--primary">
          Zur Kontaktseite
        </a>
      <?php endif ?>

      <!-- <a href="/kontakt" class="btn btn--primary">Kontaktieren Sie uns</a> -->

      <?php if ($site->email()->isNotEmpty()): ?>
        <a href="mailto:<?= $site->email() ?>?subject=Tischreservierung" class="btn btn--secondary">
          E-Mail senden
        </a>
      <?php endif ?>
    </div>
  </div>
</section>