<?php     
    $media = get_posts(array(
            'post_type'   => 'media',
            'posts_per_page' => -1
        )
    );
    $ajaxurl = home_url() . '/wp-admin/admin-ajax.php'; 
?>

<div class="container content my-5">
    <h1>Media</h1>

    <div class="response-media" data-url="<?php echo $ajaxurl?>">
    </div>

</div>