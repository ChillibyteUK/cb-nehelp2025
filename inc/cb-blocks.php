<?php
function acf_blocks()
{
    if (function_exists('acf_register_block_type')) {

        acf_register_block_type(array(
            'name'                => 'cb_full_width', 
            'title'               => __('CB Full Width'), 
            'category'            => 'layout',
            'icon'                => 'cover-image', 
            'render_template'    => 'page-templates/blocks/cb_full_width.php', 
            'mode'                => 'edit',
            'supports'            => array('mode' => false),
        ));


        acf_register_block_type(array(
            'name'                => 'cb_form_block', 
            'title'               => __('CB Form Block'), 
            'category'            => 'layout',
            'icon'                => 'cover-image', 
            'render_template'    => 'page-templates/blocks/cb_form_block.php', 
            'mode'                => 'edit',
            'supports'            => array('mode' => false),
        ));


        acf_register_block_type(array(
            'name'                => 'cb_circle_image_text', 
            'title'               => __('CB Circle Image Text'), 
            'category'            => 'layout',
            'icon'                => 'cover-image', 
            'render_template'    => 'page-templates/blocks/cb_circle_image_text.php', 
            'mode'                => 'edit',
            'supports'            => array('mode' => false),
        ));


        acf_register_block_type(array(
            'name'                => 'cb_text_image', 
            'title'               => __('CB Text Image'), 
            'category'            => 'layout',
            'icon'                => 'cover-image', 
            'render_template'    => 'page-templates/blocks/cb_text_image.php', 
            'mode'                => 'edit',
            'supports'            => array('mode' => false),
        ));


        acf_register_block_type(array(
            'name'                => 'cb_hero', 
            'title'               => __('CB Hero'), 
            'category'            => 'layout',
            'icon'                => 'cover-image', 
            'render_template'    => 'page-templates/blocks/cb_hero.php', 
            'mode'                => 'edit',
            'supports'            => array('mode' => false),
        ));

    }
}
add_action('acf/init', 'acf_blocks');


// Gutenburg core modifications
add_filter('register_block_type_args', 'core_image_block_type_args', 10, 3);
function core_image_block_type_args($args, $name)
{

    if ($name == 'core/paragraph') {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ($name == 'core/heading') {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ($name == 'core/list') {
        $args['render_callback'] = 'modify_core_add_container';
    }

    return $args;
}

// Helper function to detect if footer.php is being rendered
function is_footer_rendering()
{
    $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
    foreach ($backtrace as $trace) {
        if (isset($trace['file']) && basename($trace['file']) === 'footer.php') {
            return true;
        }
    }
    return false;
}

function modify_core_add_container($attributes, $content)
{
    if (is_footer_rendering()) {
        return $content;
    }

    ob_start();
    // $class = $block['className'];
?>
    <div class="container-xl">
        <?= $content ?>
    </div>
<?php
    $content = ob_get_clean();
    return $content;
}
