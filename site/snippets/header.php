<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page->title() ?> | <?= $site->title() ?></title>
  <meta name="description" content="<?= $page->metaDescription()->or($site->description()) ?>">

  <?= css('assets/css/style.css') ?>

  <!-- Dynamic CSS from Panel Settings -->
  <?= snippet('dynamic-css') ?>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="/favicon.ico">
  <!-- Favicon Safari -->
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
  <!-- <link rel="manifest" href="/site.webmanifest"> -->

  <!-- Open Graph -->
  <meta property="og:title" content="<?= $page->title() ?> | <?= $site->title() ?>">
  <meta property="og:description" content="<?= $page->metaDescription()->or($site->description()) ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?= $page->url() ?>">

  <!-- Structured Data -->
  <?php if ($page->isHomePage()): ?>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "Cocktailbar",
        "name": "<?= $site->title() ?>",
        "description": "<?= $site->description() ?>",
        "telephone": "<?= $page->phone() ?>",
        "email": "<?= $page->email() ?>",
        "url": "<?= $site->url() ?>",
        "address": {
          "@type": "PostalAddress",
          "addressLocality": "Musterstadt",
          "addressCountry": "DE"
        },
        "openingHours": [
          "Mo-Do 11:30-14:30,17:30-23:00",
          "Fr-Sa 11:30-14:30,17:30-24:00",
          "Su 12:00-22:00"
        ],
        "servesCuisine": "Italian",
        "priceRange": "$$"
      }
    </script>
  <?php endif ?>
</head>

<body class="<?= $page->template() ?>-page">

  <!-- Header -->
  <header class="header">
    <div class="header__content">
      <div class="logo">
        <a href="<?= $site->url() ?>">
          <h1><?= $site->title() ?></h1>
          <?php if ($site->tagline()->isNotEmpty()): ?>
            <span class="logo__tagline"><?= $site->tagline() ?></span>
          <?php endif ?>
        </a>
      </div>

      <nav class="mobile-nav">
        <button class="hamburger-btn" aria-label="Navigation öffnen" aria-expanded="false" data-nav-toggle>
          <span class="hamburger-btn__line"></span>
          <span class="hamburger-btn__line"></span>
          <span class="hamburger-btn__line"></span>
        </button>

        <div class="mobile-nav__backdrop" data-nav-backdrop></div>

        <div class="mobile-nav__drawer" data-nav-drawer>
          <div class="mobile-nav__header"></div>

          <ul class="mobile-nav__menu">
            <?php foreach ($site->children()->listed() as $item): ?>
              <li class="mobile-nav__item">
                <a href="<?= $item->url() ?>" class="mobile-nav__link" <?php e($item->isOpen(), 'aria-current="page"') ?>>
                  <?= $item->title() ?>
                </a>
              </li>
            <?php endforeach ?>
          </ul>
        </div>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="main">