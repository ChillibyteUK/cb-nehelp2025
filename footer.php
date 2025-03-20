<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<div id="footer-top"></div>
<footer class="footer pt-5 py-4">
    <div class="container-xl">
        <div class="row g-5 pb-5">
            <div class="col-md-3 text-center text-md-start">
                <img src="<?= get_stylesheet_directory_uri() ?>/img/nehelp-logo--wb.svg" alt="NE Help" class="w-75">
            </div>
            <div class="col-md-3">
                <?= wp_nav_menu(array('theme_location' => 'footer_menu1', 'container_class' => 'footer__menu')) ?>
            </div>
            <div class="col-md-3">
                <?= wp_nav_menu(array('theme_location' => 'footer_menu2', 'container_class' => 'footer__menu')) ?>
            </div>
            <div class="col-md-3">
                <div class="mb-1"><?= do_shortcode('[contact_phone]') ?></div>
                <div class="mb-1"><?= do_shortcode('[contact_email]') ?></div>

                <?php
                if (!empty(get_field('social', 'options'))) {
                    echo '<div class="footer__title mt-4">Follow Us</div>';
                    echo do_shortcode('[social_icons class="d-flex justify-content-start gap-4"]');
                }
                ?>
            </div>

        </div>

        <div class="colophon d-flex justify-content-between align-items-center flex-wrap">
            <div>
                &copy; <?= date('Y') ?> NE Help
            </div>
            <div>
                <a href="https://www.chillibyte.co.uk/" rel="nofollow noopener" target="_blank" class="cb" title="Digital Marketing by Chillibyte"></a>
            </div>
        </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>