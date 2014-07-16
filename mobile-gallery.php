<?php global $post; ?>
<div>
    hello world
    <?php
    $postContent = $post->post_content;
    $beforeColon = substr($postContent, 0, strpos($postContent,'[gallery'));
    echo $beforeColon;
    ?>
</div>