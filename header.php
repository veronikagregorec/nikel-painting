<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php bloginfo('template_directory'); ?>/logo/logoheader6.png" sizes="16x16">
    <?php wp_head(); ?>
</head>

<body>
<div id="preloader">
    <div id="status"></div>
</div>

<script>
    jQuery(window).on('load', function() {
    jQuery('#status').fadeOut(); 
    jQuery('#preloader').delay(300).fadeOut('slow'); 
});
</script>

    <nav class="nav">
        <div class="content">
        <a href="<?php echo site_url('/domov'); ?>">
                <img src="<?php bloginfo('template_directory'); ?>/logo/logoheader4.png" alt="logo" style="width: 200px; height: 55px" class="logo">
            </a>
			
			<i class="material-icons menu" onclick="menu()">menu</i>

            <div class="links">
            
                <?php wp_nav_menu( 
                array( 'theme_location' => 'new-menu', 
                        'menu_class' => 'mymenuclass'
                        )
                ); 
				?>

                    <i class="material-icons first2">search</i>
                    <?php get_search_form(); ?>

                    <script>
                        jQuery(document).ready(function () {
                            jQuery(".first2").click(function () {
                                jQuery(".search-box").slideToggle();
								});
                            });
                    </script>

            </div>
        </div>

        <div class="dropdown">

            <?php wp_nav_menu( 
                array( 'theme_location' => 'mobile-menu', 
                        'menu_class' => 'dropmenuclass'
                        )
                ); 
            ?>
        </div>
    </nav>