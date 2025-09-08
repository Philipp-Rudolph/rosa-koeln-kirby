<!-- Benachrichtigung anzeigen -->
<?php if (!empty($alert)): ?>
  <div class="alert alert-<?= $alert['type'] ?>">
    <?= $alert['message'] ?>
  </div>
<?php endif ?>

<!-- Kontakt Formular -->
<form action="" class="form-group container mt-2" method="post">
  <?php if ($contacts = $site->find('kontakt')): ?>
    <h2><?= $contacts->form_headline() ?></h2>
  <?php endif; ?>

  <label for="name">Name:</label>
  <input
    type="text"
    id="name"
    name="name"
    value="<?= esc(get('name') ?? '', 'attr') ?>"
    required>

  <label for="email">E-Mail:</label>
  <input
    type="email"
    id="email"
    name="email"
    value="<?= esc(get('email') ?? '', 'attr') ?>"
    required>

  <label for="message">Nachricht:</label>
  <textarea
    id="message"
    name="message"
    rows="4"
    required><?= esc(get('message') ?? '') ?></textarea>

  <button type="submit" class="form-button">Absenden</button>
</form>