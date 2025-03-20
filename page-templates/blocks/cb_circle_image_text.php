<section class="alternating_circle_image_text py-5">
    <div class="container position-relative">
        <?php
        if (get_field('title')) {
        ?>
            <h2 class="text-center mb-3 wow animated fadeIn"><?= get_field('title') ?></h2>
        <?php
        }
        if (get_field('intro')) {
        ?>
            <div class="text-center mb-3 max-ch wow animated fadeIn"><?= get_field('intro') ?></div>
        <?php
        }

        $order_left = 'order-1 order-lg-1';
        $order_right = 'order-2 order-lg-2';

        $overlay = array(
            'aqua',
            'gold',
            'purple',
            'aqua-2',
        );
        $overlay_offset = 0;
        while (have_rows('rows')) {
            the_row();
        ?>
            <div class="row py-2 justify-content-center wow animated fadeIn">
                <div class="col-md-5 <?= $order_left ?>">
                    <div class="mx-auto image-wrapper image-wrapper__overlay--<?= $overlay[$overlay_offset] ?>">
                        <img src="<?= wp_get_attachment_image_url(get_sub_field('image'), 'full') ?>" alt="" class="image-wrapper__image">
                    </div>
                </div>
                <div class="col-md-7 col-lg-6 col-xl-5 d-flex flex-column justify-content-center <?= $order_right ?>">
                    <?php if (get_sub_field('pre_title')) {
                        echo '<div class="pre_title">' . get_sub_field('pre_title') . '</div>';
                    }
                    if (get_sub_field('title')) {
                        echo '<h3 class="h3">' . get_sub_field('title') . '</h3>';
                    }
                    ?>
                    <div class="content">
                        <?= get_sub_field('content') ?>
                    </div>
                    <?php
                    if (get_sub_field('cta')) {
                        $cta = get_sub_field('cta');
                        echo '<div class="cta--arrow"><a href="' . $cta['url'] . '" target="' . $cta['target'] . '">' . $cta['title'] . '</a></div>';
                    }
                    ?>
                </div>
            </div>
        <?php
            $order_left = $order_left == 'order-1 order-lg-1' ? 'order-1 order-lg-2' : 'order-1 order-lg-1';
            $order_right = $order_right == 'order-2 order-lg-1' ? 'order-2 order-lg-2' : 'order-2 order-lg-1';
            $overlay_offset++;
            $overlay_offset = $overlay_offset > 3 ? 0 : $overlay_offset;
        }

        ?>
    </div>
</section>