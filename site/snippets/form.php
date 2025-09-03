<!-- Kontakt Formular -->

<form action="submit" class="form-group container mt-2" method="post">
  <?php if($contacts = $site->find('kontakt')): ?>

    <h2><?php echo $contacts->form_headline() ?></h2>
    
  <?php endif; ?>
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" required>

  <label for="email">E-Mail:</label>
  <input type="email" id="email" name="email" required>

  <label for="message">Nachricht:</label>
  <textarea id="message" name="message" rows="4" required></textarea>

  <button type="submit" class="form-button">Absenden</button>

</form>