<?php
// [shortcodes]
function bartag_func($atts) {
    extract(shortcode_atts(array(
        'foo' => 'no foo',
        'baz' => 'default baz',
    ), $atts));

    return "foo = {$foo}";
}
add_shortcode('bartag', 'bartag_func');