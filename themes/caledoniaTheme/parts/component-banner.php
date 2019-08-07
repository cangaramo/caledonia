<?php 
    $video_type = $values['video_type'];
    $image = $values['image'];
    $vimeo_id = $values['vimeo_id'];
    $file = get_bloginfo('template_directory') . '/' . $values['file'];
?>

<?php if ($image): ?>

    <div class="banner position-relative">

        <div class="w-100 h-100 bg-image" style="background-image: url(<?php echo $image ?>)"></div>
        

        <?php if ($video_type != 'None'): ?>
            <div class="w-100 h-100 layer">
                <div style="margin-top:170px">
                    <div class="w-100 d-flex justify-content-center text-center">
                        <div>
                            <img class="my-3 play-film open-modal-video" data-vimeo="<?php echo $vimeo_id ?>" data-file="<?php echo $file ?>" src="<?php echo get_bloginfo('template_directory'); ?>/resources/play.svg">
                            <h2 class="mb-4 pb-3 color-white">Overview film</h2>
                            <a class="link open-modal-video" data-vimeo="<?php echo $vimeo_id ?>" data-file="<?php echo $file ?>">Watch film</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>

<?php else: ?>

    <div class="empty-banner"></div>

<?php endif; ?>