<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
$announcement = get_field('announcement_text');
?>

<?php if($announcement): ?>
<div class="announcement-bar">
    <?php echo esc_html($announcement); ?>
</div>
<?php endif; ?>

<header class="header">
  <div class="header-left">☰</div>

  <div class="logo">STREET<span>.FIT</span></div>

  <div class="header-right">

    <!-- SEARCH -->
    <svg class="icon" viewBox="0 0 24 24" fill="none">
      <circle cx="11" cy="11" r="8"></circle>
      <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
    </svg>

    <!-- CART (FIXED) -->
    <svg class="icon" viewBox="0 0 24 24" fill="none">
      <circle cx="9" cy="21" r="1"></circle>
      <circle cx="20" cy="21" r="1"></circle>
      <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
    </svg>

    <!-- PROFILE -->
    <svg class="icon" viewBox="0 0 24 24" fill="none">
      <circle cx="12" cy="7" r="4"></circle>
      <path d="M5.5 21a7.5 7.5 0 0 1 13 0"></path>
    </svg>

  </div>
</header>