<div class="menu-content">
  <?php foreach ($page->children()->listed() as $category): ?>
    <section class="menu-category" id="<?= $category->slug() ?>">
      <!-- <div class="category-header" <?php if ($category->category_image()->isNotEmpty()): ?> style="background-image: url('<?= $category->category_image()->toFile()->url() ?>')" <?php endif; ?>>
        <h2><?= $category->headline() ?></h2>
        <?php if ($category->description()->isNotEmpty()): ?>
          <p class="category-description"><?= $category->description() ?></p>
        <?php endif ?>
      </div> -->

      <?php if ($category->dishes()->isNotEmpty()): ?>
        <div class="dishes-grid container">
          <?php foreach ($category->dishes()->toStructure() as $dish): ?>
            <div class="dish-item<?php if ($image = $dish->image()->toFile()): ?> has-background-image<?php endif ?>" id="dish-<?= $dish->name()->slug() ?>" <?php if ($image = $dish->image()->toFile()): ?> style="background-image: url('<?= $image->url() ?>')" <?php endif ?>>
              <div class="dish-content">
                <div class="dish-header">
                  <h3 class="dish-name">
                    <?= $dish->name() ?>
                    <span class="dish-size"><?= $dish->size() ?></span>
                  </h3>
                  <div class="dish-dots"></div>
                  <span class="dish-price"><?= $dish->price() ?></span>
                </div>

                <?php if ($dish->description()->isNotEmpty()): ?>
                  <p class="dish-description"><?= $dish->description() ?></p>
                <?php endif ?>

                <?php if ($dish->allergens()->isNotEmpty()): ?>
                  <p class="dish-allergens">
                    <small>Allergene: <?= $dish->allergens() ?></small>
                  </p>
                <?php endif ?>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      <?php endif ?>
    </section>
  <?php endforeach ?>
</div>