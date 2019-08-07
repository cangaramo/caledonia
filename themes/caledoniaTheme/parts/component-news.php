<?php     
    $news = get_posts(array(
            'post_type'   => 'news',
            'posts_per_page' => -1
        )
    );
    $ajaxurl = home_url() . '/wp-admin/admin-ajax.php'; 
?>

<div class="container my-5 news">

    <h1>News</h1>

    <div class="response-news pt-4" data-url="<?php echo $ajaxurl?>"></div>

</div>