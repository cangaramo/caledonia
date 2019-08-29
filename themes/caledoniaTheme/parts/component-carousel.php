<?php
    $items = $values['items'];
?>
<!-- Carousel -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

    <!--- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleControls" data-slide-to="1"></li>
        <li data-target="#carouselExampleControls" data-slide-to="2"></li>
		<li data-target="#carouselExampleControls" data-slide-to="3"></li>
    </ol>
    
    <!-- Slides -->
    <div class="carousel-inner">

        <!-- First slide -->
        <div class="carousel-item active">
            <div class="d-block w-100 h-100" style="background-image:url('<?php echo $items[0]['image']?>'); background-position: center; background-size: cover"> </div>
            <div class="layer w-100 h-100">
                <div class="container h-100 d-flex align-items-center justify-content-center text-center">
                    <div class="caption">

                        <div class="d-flex flex-column">
                            <?php if ($items[0]['video_type'] != 'None'): ?>
                                <img class="mb-3 play-film open-modal-video" data-vimeo="<?php echo $items[0]['vimeo_id'] ?>" data-file="<?php echo (get_bloginfo('template_directory') . '/' . $items[0]['file'] ) ?>" src="<?php echo get_bloginfo('template_directory'); ?>/resources/play.svg">
                            <?php endif; ?>
                            <h2><?php echo $items[0]['text']?></h2>
                            <div class="mt-5"><a class="link" href="<?php echo $items[0]['link']?>"><?php echo $items[0]['link_label']?></a></div>
                        </div>
                                    
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Second slide -->
        <div class="carousel-item">
            <div class="d-block w-100 h-100" style="background-image:url('<?php echo $items[1]['image']?>'); background-position: center; background-size: cover"> </div>
            <div class="layer w-100 h-100">
                <div class="container h-100 d-flex align-items-center justify-content-center text-center">
                    <div class="caption">

                        <div class="d-flex flex-column">
                            <?php if ($items[1]['video_type'] != 'None'): ?>
                                <img class="mb-3 play-film open-modal-video" data-vimeo="<?php echo $items[1]['vimeo_id'] ?>" data-file="<?php echo (get_bloginfo('template_directory') . '/' . $items[1]['file'] ) ?>" src="<?php echo get_bloginfo('template_directory'); ?>/resources/play.svg">
                            <?php endif; ?>
                            <h2><?php echo $items[1]['text']?></h2>
                            <div class="mt-5"><a class="link" href="<?php echo $items[1]['link']?>"><?php echo $items[1]['link_label']?></a></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    
        <!-- Third slide -->
        <div class="carousel-item">
            <div class="d-block w-100 h-100" style="background-image:url('<?php echo $items[2]['image']?>'); background-position: center; background-size: cover"> </div>
            <div class="layer w-100 h-100">
                <div class="container h-100 d-flex align-items-center justify-content-center text-center">
                    <div class="caption">

                        <div class="d-flex flex-column">
                            <?php if ($items[2]['video_type'] != 'None'): ?>
                                <img class="mb-3 play-film open-modal-video" data-vimeo="<?php echo $items[2]['vimeo_id'] ?>" data-file="<?php echo (get_bloginfo('template_directory') . '/' . $items[2]['file'] ) ?>" src="<?php echo get_bloginfo('template_directory'); ?>/resources/play.svg">
                            <?php endif; ?>
                            <h2><?php echo $items[2]['text']?></h2>
                            <div class="mt-5"><a class="link" href="<?php echo $items[2]['link']?>"><?php echo $items[2]['link_label']?></a></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
		
		<!-- Fourth slide -->
        <div class="carousel-item">
            <div class="d-block w-100 h-100" style="background-image:url('<?php echo $items[3]['image']?>'); background-position: center; background-size: cover"> </div>
            <div class="layer w-100 h-100">
                <div class="container h-100 d-flex align-items-center justify-content-center text-center">
                    <div class="caption">

                        <div class="d-flex flex-column">
                            <?php if ($items[2]['video_type'] != 'None'): ?>
                                <img class="mb-3 play-film open-modal-video" data-vimeo="<?php echo $items[3]['vimeo_id'] ?>" data-file="<?php echo (get_bloginfo('template_directory') . '/' . $items[3]['file'] ) ?>" src="<?php echo get_bloginfo('template_directory'); ?>/resources/play.svg">
                            <?php endif; ?>
                            <h2><?php echo $items[3]['text']?></h2>
                            <div class="mt-5"><a class="link" href="<?php echo $items[3]['link']?>"><?php echo $items[3]['link_label']?></a></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <!-- Arrows -->
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
       
</div>