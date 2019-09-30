<?php 
    $items = $values['items'];
?>

<!-- Carousel -->
<div id="carouselBanner" class="carousel slide" data-ride="carousel" data-interval="10000">

    <!--- Indicators -->
    <ol class="carousel-indicators">

        <?php  if (sizeof($items) > 1): ?>

            <?php foreach ($items as $index=>$item): ?>

                <?php if ($index == 0): ?>
                <li data-target="#carouselBanner" data-slide-to="<?php echo $index ?>" class="active"></li>
                <?php else: ?>
                <li data-target="#carouselBanner" data-slide-to="<?php echo $index ?>"></li>
                <?php endif; ?>
                
            <?php endforeach ?>

        <?php endif; ?>

    </ol>

    <!-- Slides -->
    <div class="carousel-inner">

        <?php foreach ($items as $index=>$item): ?>

            <!-- First slide -->
            <?php if ($index == 0): ?>
                <div class="carousel-item active" >

            <?php else: ?>
                <div class="carousel-item" >
            <?php endif; ?>

                    <?php if ($item['image']): 
                        $video_type = $item['video_type'];
                        $image = $item['image'];
                        $vimeo_id = $item['vimeo_id'];
                        $file = get_bloginfo('template_directory') . '/' . $item['file'];
                        $video_title = $item['video_title'];
                    ?>

                        <div class="banner position-relative">

                            <div class="w-100 h-100 bg-image" style="background-image: url(<?php echo $item['image'] ?>)"></div>
                            

                            <?php if ($video_type != 'None'): ?>
                                <div class="w-100 h-100 layer">
                                    <div class="video">
                                        <div class="w-100 d-flex justify-content-center text-center">
                                            <div>
                                                <img class="my-3 play-film open-modal-video" data-vimeo="<?php echo $vimeo_id ?>" data-file="<?php echo $file ?>" src="<?php echo get_bloginfo('template_directory'); ?>/resources/play.svg">
                                                <h2 class="mb-3 pb-3 color-white"><?php echo $video_title ?></h2>
                                                <a class="link open-modal-video d-none d-lg-inline-block" data-vimeo="<?php echo $vimeo_id ?>" data-file="<?php echo $file ?>">Watch film</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>

                    <?php else: ?>

                        <div class="empty-banner"></div>

                    <?php endif; ?>

                </div>

        <?php endforeach ?>

    </div>


    <!-- Arrows -->
    <?php  if (sizeof($items) > 1): ?>
        <a class="carousel-control-prev" href="#carouselBanner" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#carouselBanner" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    <?php endif; ?>

</div>