<?php 
    $image = $values['video_image'];
    $vimeo_id = $values['vimeo_id'];
    $text = $values['text'];
    $file = get_bloginfo('template_directory') . '/' . $values['file'];
?>

<div class="position-relative my-2" style="height:550px">

    <!-- Thumbnail -->
    <div class="container-video w-100 h-100 linked-box" data-modal=true>

        <div class="w-100 h-100 overflow-hidden">
            <div class="w-100 h-100 bg-image zoom" style="background-image: url(<?php echo $image ?>)"></div>
        </div>

        <div class="layer w-100 h-100">
            <div class="h-100 d-flex align-items-center justify-content-center text-center">
                <div>
                    <img class="my-3 play-film open-modal-video" data-vimeo="<?php echo $vimeo_id ?>" data-file="<?php echo $file ?>" src="<?php echo get_bloginfo('template_directory'); ?>/resources/play.svg">
                    <h2 class="mb-4 pb-3 color-white"><?php echo $text ?></h2>
                    <a class="link open-modal-video" data-vimeo="<?php echo $vimeo_id ?>" data-file="<?php echo $file ?>">Watch film</a>
                </div>
             </div>
        </div> 
    </div>

</div>

