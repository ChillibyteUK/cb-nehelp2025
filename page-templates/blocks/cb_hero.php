<section class="hero">
    <?= wp_get_attachment_image(get_field('image'), 'full', false, ['class' => 'hero__background']) ?>
    <div class="overlay--grad"></div>
    <div class="container-xl h-100 d-flex flex-column justify-content-center">
        <?php
        if (is_front_page()) {
        ?>
            <div class="hero__logo
            <?= get_field('logo_position') ?>">
                <img src="<?= get_stylesheet_directory_uri() ?>/img/nehelp-logo--wb.svg" alt="NE Help">
            </div>
        <?php
        }
        ?>
        <div class="hero__content">
            <h1><?= get_field('title') ?></h1>
        </div>
    </div>
</section>