<!doctype html>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Google Tag Manager Head -->
  <?php
    include get_template_directory() . '/inc/tag_manager.php';
  ?>
<!-- Structured Data -->
  <?php
    include get_template_directory() . '/inc/structured_data.php';
  ?>
<?php wp_head(); ?>
</head>

<body>
<!-- Google Tag Manager Body-->
  <?php
    include get_template_directory() . '/inc/tag_manager_body.php'; 
  ?>
	<header id="masthead">

    <div class="mobile-masthead desktop_hide">
      <div class="mobile-masthead__nav-icon" id="openMobileNav">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
      </div> 

      <div class="mobile-masthead__logo">
        <a href="<?php echo get_option('home'); ?>">
          <?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );   
            if ( has_custom_logo() ) {
                    echo '<img src="'. esc_url( $logo[0] ) .'">';
            } else {
                    echo '<div>'. get_bloginfo( 'name' ) .'</div>';
            }
          ?>
        </a>
      </div>
    </div>

    <div class="desktop-masthead">
      <div class="masthead__logo mob_hide">
        <a href="<?php echo get_option('home'); ?>">
          <?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );   
            if ( has_custom_logo() ) {
                    echo '<img src="'. esc_url( $logo[0] ) .'">';
            } else {
                    echo '<div>'. get_bloginfo( 'name' ) .'</div>';
            }
          ?>
        </a>
      </div>

      <div class="masthead__nav">
        <?php wp_nav_menu( array(
            'theme_location' => 'primary-menu',
            'container' => 'nav',
            'menu_class' => 'nav'
             ) 
            ); 
        ?> 
      </div>
    </div>
	</header>

  <div class="site-content-contain">
    <div id="content" <?php if (!is_front_page()&&!is_page_template('template-landing-page.php')) {
      echo 'class="site-content"';
      }?>>