<!-- <?php
// Generate CSS custom properties from site settings
$primaryColor = $site->primary_color()->or('#d4a574');
$secondaryColor = $site->secondary_color()->or('#3d4142');
$accentColor = $site->accent_color()->or('#8b4a42');
$bgWarm = $site->bg_warm()->or('#f7f3f0');

// Calculate derived colors
function hexToRgb($hex) {
    $hex = ltrim($hex, '#');
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex, 0, 1), 2) . str_repeat(substr($hex, 1, 1), 2) . str_repeat(substr($hex, 2, 1), 2);
    }
    return sscanf($hex, "%02x%02x%02x");
}

function adjustBrightness($hex, $percent) {
    list($r, $g, $b) = hexToRgb($hex);
    
    $r = max(0, min(255, $r + ($r * $percent / 100)));
    $g = max(0, min(255, $g + ($g * $percent / 100)));
    $b = max(0, min(255, $b + ($b * $percent / 100)));
    
    return sprintf("#%02x%02x%02x", $r, $g, $b);
}

$primaryDark = adjustBrightness($primaryColor, -15);
$primaryLight = adjustBrightness($primaryColor, 15);
?>
<style>
:root {
  /* Main colors from panel */
  --primary-color: <?= $primaryColor ?>;
  --primary-dark: <?= $primaryDark ?>;
  --primary-light: <?= $primaryLight ?>;
  --secondary-color: <?= $secondaryColor ?>;
  --accent-color: <?= $accentColor ?>;
  --bg-warm: <?= $bgWarm ?>;
  --white: #ffffff;
  --black: #000000;
  
  /* Override SCSS variables with CSS custom properties */
  --text-dark: var(--secondary-color);
  --shadow-color: <?= 'rgba(' . implode(',', hexToRgb($secondaryColor)) . ', 0.08)' ?>;
  --overlay-color: <?= 'rgba(' . implode(',', hexToRgb($secondaryColor)) . ', 0.4)' ?>;
}

/* Override key elements with custom properties */
.header {
  background-color: rgba(255, 255, 255, 0.95);
}

.nav__toggle span {
  background-color: var(--secondary-color);
}

.nav__list a:hover,
.nav__list a[aria-current="page"] {
  background: <?= 'rgba(' . implode(',', hexToRgb($primaryColor)) . ', 0.2)' ?>;
  color: var(--primary-light);
  border-left: 3px solid var(--primary-color);
}

.logo a {
  color: var(--secondary-color);
}

.logo__tagline {
  color: var(--primary-color);
}

.btn--primary {
  background-color: var(--primary-color);
}

.btn--primary:hover {
  background-color: var(--primary-dark);
}

h1, h2, h3, h4, h5, h6 {
  color: var(--secondary-color);
}

a {
  color: var(--white);
}

a:hover {
  color: var(--primary-dark);
}

.section__title::after {
  background-color: var(--primary-color);
}
</style> -->