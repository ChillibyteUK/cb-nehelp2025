<?php
$formID = get_field('form_id');
?>
<section class="form_block py-5">
    <div class="container-xl position-relative wow animated fadeIn mb-5">
        <h2><?= get_field('title') ?></h2>
        <?= do_shortcode('[contact-form-7 id="' . $formID . '"]') ?>
    </div>
</section>