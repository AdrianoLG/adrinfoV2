<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title>Adriano LG</title>
    <meta keywords="Adriano Lorenzo González, desarrollador web, web developer, A Coruña, Madrid">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body data-spy="scroll" data-target="#navigation-bar" data-offset="60">
    <header>
        <nav id="navigation-bar" class="navigation-bar">
            <div class="container">
                <a class="navbar-brand" href="#">Adriano LG</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navigation-content" id="navbarSupportedContent">
                    <?php clean_custom_menus(); ?>
                </div>
            </div>
          </nav>
    </header>