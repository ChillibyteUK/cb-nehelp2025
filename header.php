<?php

/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package cb-nehelp2025
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

session_start();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta
        charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, minimum-scale=1">
    <link rel="preload"
        href="<?= get_stylesheet_directory_uri() ?>/fonts/museo-sans-500.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?= get_stylesheet_directory_uri() ?>/fonts/museo-sans-700.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?= get_stylesheet_directory_uri() ?>/fonts/rockwell-700.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">

    <?php
    if (!is_user_logged_in()) {
        if (get_field('ga_property', 'options')) {
    ?>
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async
                src="https://www.googletagmanager.com/gtag/js?id=<?= get_field('ga_property', 'options') ?>">
            </script>
            <script>
                window.dataLayer = window.dataLayer || [];

                function gtag() {
                    dataLayer.push(arguments);
                }
                gtag('js', new Date());
                gtag('config',
                    '<?= get_field('ga_property', 'options') ?>'
                );
            </script>
        <?php
        }
        if (get_field('gtm_property', 'options')) {
        ?>
            <!-- Google Tag Manager -->
            <script>
                (function(w, d, s, l, i) {
                    w[l] = w[l] || [];
                    w[l].push({
                        'gtm.start': new Date().getTime(),
                        event: 'gtm.js'
                    });
                    var f = d.getElementsByTagName(s)[0],
                        j = d.createElement(s),
                        dl = l != 'dataLayer' ? '&l=' + l : '';
                    j.async = true;
                    j.src =
                        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                    f.parentNode.insertBefore(j, f);
                })(window, document, 'script', 'dataLayer',
                    '<?= get_field('gtm_property', 'options') ?>'
                );
            </script>
            <!-- End Google Tag Manager -->
    <?php
        }
    }
    if (get_field('google_site_verification', 'options')) {
        echo '<meta name="google-site-verification" content="' . get_field('google_site_verification', 'options') . '" />';
    }
    if (get_field('bing_site_verification', 'options')) {
        echo '<meta name="msvalidate.01" content="' . get_field('bing_site_verification', 'options') . '" />';
    }

    wp_head();
    ?>

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "NE Help",
            "url": "http://www.nehelp.co.uk",
            "logo": "---",
            "description": "---",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "---",
                "addressLocality": "---",
                "addressRegion": "---",
                "postalCode": "---",
                "addressCountry": "GB"
            },
            "telephone": "+44 (0) ---",
            "email": "---"
        }
    </script>

</head>

<body <?php body_class(); ?>
    <?php understrap_body_attributes(); ?>>
    <?php
    do_action('wp_body_open');
    if (!is_user_logged_in()) {
        if (get_field('gtm_property', 'options')) {
    ?>
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe
                    src="https://www.googletagmanager.com/ns.html?id=<?= get_field('gtm_property', 'options') ?>"
                    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
    <?php
        }
    }
    ?>
    <header id="wrapper-navbar" class="fixed-top">
        <nav id="main-nav" class="navbar navbar-expand-lg" aria-labelledby="main-nav-label">
            <div class="container-xl py-2">
                <div class="d-flex justify-content-between align-items-stretch h-100">
                    <!-- Logo -->
                    <a href="/" class="logo-container">
                        <img src="<?= get_stylesheet_directory_uri() ?>/img/nehelp-logo--wb.svg" alt="NE Help">
                    </a>

                    <!-- Mobile Menu Toggle -->
                    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>

                <!-- Navbar Content (Now inside the same container-xl) -->
                <div id="navbarContent" class="collapse navbar-collapse">
                    <div class="w-100 d-flex flex-column justify-content-lg-between align-items-lg-center">
                        <!-- Contact Details (Hidden on Mobile) -->
                        <div class="contact-info d-none d-lg-flex gap-3 w-100 justify-content-end">
                            <?= do_shortcode('[contact_phone]') ?>
                            <?= do_shortcode('[contact_email]') ?>
                        </div>

                        <!-- Navigation -->
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location'  => 'primary_nav',
                                'container'       => false,
                                'menu_class'      => 'navbar-nav w-100 justify-content-lg-end gap-3 align-items-lg-center',
                                'fallback_cb'     => '',
                                'depth'           => 3,
                                'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                            )
                        );
                        ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>