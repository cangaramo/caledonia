<?php
    $items = $values['items'];
?>
<!-- Carousel -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="10000">

    <!--- Indicators -->
    <ol class="carousel-indicators">

        <?php foreach ($items as $index=>$item): ?>

            <?php if ($index == 0): ?>
            <li data-target="#carouselExampleControls" data-slide-to="<?php echo $index ?>" class="active"></li>
            <?php else: ?>
            <li data-target="#carouselExampleControls" data-slide-to="<?php echo $index ?>"></li>
            <?php endif; ?>
            
        <?php endforeach ?>
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

                <div class="d-block w-100 h-100" style="background-image:url('<?php echo $item['image']?>'); background-position: center; background-size: cover"> </div>
                <div class="layer w-100 h-100">
                    <div class="container h-100 d-flex align-items-center justify-content-center text-center">
                        <div class="caption">

                            <div class="d-flex flex-column">
                                <?php if ($item['video_type'] != 'None'): ?>
                                    <img class="mb-3 play-film open-modal-video" data-vimeo="<?php echo $item['vimeo_id'] ?>" data-file="<?php echo (get_bloginfo('template_directory') . '/' . $item['file'] ) ?>" src="<?php echo get_bloginfo('template_directory'); ?>/resources/play.svg">
                                <?php endif; ?>
                                <h2><?php echo $item['text']?></h2>

                                <?php if ($item['link']): ?>
                                    <div class="mt-5"><a class="link" href="<?php echo $item['link']?>"><?php echo $item['link_label']?></a></div>
                                <?php endif ?>
                                
                            </div>
                                        
                        </div>
                    </div>
                </div>
            </div>
        
        <?php endforeach ?>

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