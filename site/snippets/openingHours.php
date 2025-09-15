<?php if ($site->opening_hours()->isNotEmpty()): ?>
  <div class="opening-hours-table">
    <?php foreach ($site->opening_hours()->toStructure() as $hours): ?>
      <?php
      $dayNames = [
        'monday' => 'Montag',
        'tuesday' => 'Dienstag',
        'wednesday' => 'Mittwoch',
        'thursday' => 'Donnerstag',
        'friday' => 'Freitag',
        'saturday' => 'Samstag',
        'sunday' => 'Sonntag'
      ];
      ?>
      <div class="opening-hours-row">
        <span class="day"><?= $dayNames[$hours->day()->value()] ?></span>
        <span class="hours">
          <?php if ($hours->closed()->toBool()): ?>
            <span class="closed">Geschlossen</span>
          <?php else: ?>
            <?= $hours->hours() ?>
          <?php endif ?>
        </span>
      </div>
    <?php endforeach ?>
  </div>
<?php endif ?>