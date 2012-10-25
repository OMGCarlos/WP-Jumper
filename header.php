<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>

        <meta name="description" content="<?php bloginfo('description'); ?>">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
        <link rel="shortcut icon" href="<?php bloginfo('template_url');?>/favicon.ico" type="image/x-icon">

        <!--[if lt IE 9]>
            <script src="javascript/modernizr-2.6.2.min.js"></script>
        <![endif]-->
        <script src="//code.jquery.com/jquery-latest.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.8.2.min.js"><\/script>')</script>

        <?php wp_head(); ?>
    </head>

    <body data-spy="scroll" data-target=".spied-sidebar" data<?php body_class('spy-on'); ?>>
        <?php //=======================================================================
        // Main Menu
        //========================================================================*/ ?>
        <nav class="header-nav navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <?php //=======================================================================
                    // Sets up our menu icon on smaller displays
                    //========================================================================*/ ?>
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <?php //=======================================================================
                        // Brand Button
                        //========================================================================*/ 
                        $brandLabel = get_option('brandLabel');
                        if($brandLabel){
                            $brandURL = get_option('brandURL');
                            $newLabel = strip_tags(stripslashes($brandLabel), '<img>');
                            $brandText = get_option('brandIsImage') ? '<img src="' . $brandLabel . '">' : $brandLabel;
                            echo '<a class="brand" href="'. ( $brandURL === '' ? '#' : $brandURL ) .'">'. $brandText .'</a>';
                        }
                    ?>


                    <?php //=======================================================================
                        // Actual Menu
                        //========================================================================*/
                        wp_nav_menu(array(
                            'theme_location'    => 'main',
                            'container_class'   => 'menu-header nav-collapse collapse',
                            'menu_class'        => 'nav'
                        )); 
                    ?>
                </div>   
            </div>
        </nav>