<?php
$h = get_field('heading_level');
$hc = get_field('heading_class');
$center = get_field('center_content') ? 'text-center' : '';
$bg = get_field('background_colour') ? get_field('background_colour') : '';
$constrain = get_field('constrain_width') ? 'max-ch--auto' : '';

$decs = 'decoration--right';
$decoration = get_field('decoration') ?? null;
if (!empty($decoration)) {
    if ($decoration['top_star']) {
        $decs .= ' top_star';
    }
    if ($decoration['bottom_star']) {
        $decs .= ' bottom_star';
        $decs .= $decoration['bottom_star_colour'] == 'gold' ? ' bottom_star--gold' : ' bottom_star--purple';
    }
}
?>
<!-- full_width -->
<section class="full_width">
    <div class="container-xl px-4 <?= $bg ?> <?= $center ?> <?= $decs ?>">
        <?php if (get_field('pre_title')) {
            echo '<div class="pre_title">' . get_field('pre_title') . '</div>';
        }

        if (get_field('title')) {
            echo '<' . $h . ' class="mb-4 ' . $hc . '">' . get_field('title') . '</' . $h . '>';
        }
        if ($center) {
            echo '<div class="' . $constrain . '">';
        }
        ?>
        <?= get_field('content') ?>
        <?php
        if ($center) {
            echo '</div>';
        }
        ?>
    </div>
</section>