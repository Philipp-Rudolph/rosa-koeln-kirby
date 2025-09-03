<?php snippet('header') ?>

<div class="page-header">
  <h1><?= $page->headline() ?></h1>
  <?php if ($page->intro()->isNotEmpty()): ?>
    <p class="page-intro"><?= $page->intro() ?></p>
  <?php endif ?>
</div>

<div class="menu-navigation">
  <nav class="menu-navigation__nav">
    <?php foreach ($page->children()->listed() as $category): ?>
      <a href="<?= $page->url() ?>?category=<?= $category->slug() ?>#<?= $category->slug() ?>" 
        class="menu-navigation__item" 
        data-category="<?= $category->slug() ?>">
          <?= $category->title() ?>
      </a>
    <?php endforeach ?>
  </nav>
</div>

<?php snippet('kategorie') ?>

<!-- Allergen Information -->
<section class="allergen-info">
  <details>
    <summary>Allergen-Informationen</summary>
    <div class="allergen-content">
      <p>
        <strong>Allergene:</strong><br>
        1 = Glutenhaltiges Getreide, 2 = Krebstiere, 3 = Eier, 4 = Fisch, 5 = Erdnüsse,
        6 = Soja, 7 = Milch/Milcherzeugnisse, 8 = Schalenfrüchte, 9 = Sellerie,
        10 = Senf, 11 = Sesam, 12 = Schwefeldioxid und Sulfite, 13 = Lupinen, 14 = Weichtiere
      </p>
      <p>
        Bitte informieren Sie uns über Allergien oder Unverträglichkeiten.
        Unsere Mitarbeiter beraten Sie gerne.
      </p>
    </div>
  </details>
</section>

<?php snippet('footer') ?>