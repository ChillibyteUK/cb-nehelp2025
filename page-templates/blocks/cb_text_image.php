<?php

$order_left = (get_field('order') == 'text_left') ? 'order-1 order-lg-2' : 'order-1 order-lg-1';
$order_right = (get_field('order') == 'text_left') ? 'order-2 order-lg-1' : 'order-2 order-lg-2';
$h = get_field('heading_level');

$bg = get_field('background') ? get_field('background') : '';

$decs = (get_field('order') == 'text_left') ? 'decoration--right' : 'decoration--left';
$decoration = get_field('decoration');
if (!empty($decoration)) {
    if ($decoration['top_star']) {
        $decs .= ' top_star';
    }
    if ($decoration['top_star_behind']) {
        $decs .= ' top_star--behind';
    }
    if ($decoration['bottom_star'] != 'none') {
        $decs .= ' bottom_star';
        $decs .= $decoration['bottom_star_colour'] == 'gold' ? ' bottom_star--gold' : ' bottom_star--purple';
    }
    $circle = '';
    if ($decoration['circle_background']) {
        $colour = $decoration['circle_colour'];
        if (get_field('order') == 'text_left') {
            $circle = 'circle_bg--right--' . $colour;
        } else {
            $circle = 'circle_bg--left--' . $colour;
        }
    }
}


$aspect = get_field('image_aspect') == 'portrait' ? 'image--portrait' : 'image--landscape';
$padding = get_field('image_aspect') == 'portrait' ? 'padding--portrait' : 'padding--landscape';

?>
<!-- text_image -->
<section class="text_image <?= $circle ?> <?= $bg ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text_image__content <?= $order_right ?> py-5 d-flex align-items-center">
                <div class="container wow animated fadeIn max-ch py-5">
                    <?php
                    if (get_field('pre_title')) {
                        echo '<div class="pre_title">' . get_field('pre_title') . '</div>';
                    }
                    if (get_field('title')) {
                        echo '<' . $h . ' class="' . $h . '">' . get_field('title') . '</' . $h . '>';
                    }
                    ?>
                    <div class="content"><?= get_field('content') ?></div>
                    <?php
                    echo '<div class="animated fadeIn delay-3">';
                    if (get_field('cta')) {
                        $cta = get_field('cta');
                        echo '<div class="cta--arrow"><a href="' . $cta['url'] . '" target="' . $cta['target'] . '">' . $cta['title'] . '</a></div>';
                    }
                    echo '</div>';
                    ?>
                </div>
            </div>
            <div class="col-lg-6 text_image__image d-flex align-items-center justify-content-center <?= $order_left ?> <?= $padding ?>">
                <div style="background-image:url(<?= wp_get_attachment_image_url(get_field('image'), 'large') ?>)" class="image_container <?= $decs ?> <?= $aspect ?>">
                </div>
            </div>
        </div>
</section>