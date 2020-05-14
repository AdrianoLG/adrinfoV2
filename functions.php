<?php
    function custom_jquery() {
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/assets/js/jquery.min.js', array(), null, true);
    }
    add_action('wp_enqueue_scripts', 'custom_jquery');
	// STYLES AND SCRIPTS
	function adrinfo_inserts() {
		// CSS
		wp_enqueue_style( 'adrinfo-main-style', get_stylesheet_directory_uri() . '/assets/css/styles.min.css' );
		// GOOGLE FONTS
		wp_enqueue_style( 'adrinfo-google-fonts', 'https://fonts.googleapis.com/css2?family=Engagement&display=swap', false );
		wp_enqueue_style( 'adrinfo-google-fonts2', 'https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap', false );
		// JS
		wp_register_script('boostrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js');
		wp_enqueue_script('boostrap', array( 'jquery' ), '1.0', true , true);
		wp_register_script('smooth-scroll', get_stylesheet_directory_uri() . '/assets/js/smooth-scroll.min.js');
		wp_enqueue_script('smooth-scroll', array( 'jquery' ), '1.0', true , true);
		wp_register_script('isotope-main-script', get_stylesheet_directory_uri() . '/assets/js/isotope.pkgd.min.js');
		wp_enqueue_script('isotope-main-script', array( 'jquery' ), '1.0', true , true);
		wp_register_script('adrinfo-main-script', get_stylesheet_directory_uri() . '/assets/js/main.min.js');
		// PATH AVAILABLE TO JS
		$translation_array = array(
			'templateUrl' => get_stylesheet_directory_uri(),
			'uploadsUrl' => wp_upload_dir()
		);
		wp_localize_script('adrinfo-main-script', 'directory_uri', $translation_array);

		wp_enqueue_script('adrinfo-main-script', array( 'jquery' ), '1.0', true, true );
	}
	add_action( 'wp_enqueue_scripts', 'adrinfo_inserts' );

	// ADD MENUS
	function register_adrinfo_menus() {
		register_nav_menus(
			array(
				'header-menu' => __( 'Header Menu' ),
			)
		);
	}
    add_action( 'init', 'register_adrinfo_menus' );
    
    // Clean custom menu
    function clean_custom_menus() {
        $menu_name = 'header-menu';
        if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
            $menu = wp_get_nav_menu_object($locations[$menu_name]);
            $menu_items = wp_get_nav_menu_items($menu->term_id);
            $menu_list = '<ul class="navigation-list">' ."\n";
            foreach ((array) $menu_items as $key => $menu_item) {
                $title = $menu_item->title;
                $url = $menu_item->url;
                $menu_list .= "\t\t\t\t". '<li class="nav-item"><a class="nav-link" href="'. $url .'">'. $title .'</a></li>' ."\n";
            }
            $menu_list .= "\t\t\t\t". '</ul>';
        }
        echo $menu_list;
	}