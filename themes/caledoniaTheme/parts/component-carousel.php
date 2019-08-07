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
    </ol>
    
    <!-- Slides -->
    <div class="carousel-inner">

        <!-- First slide -->
        <div class="carousel-item active">
            <div class="d-block w-100 h-100" style="background-image:url('<?php echo $items[0]['image']?>'); background-position: center; background-size: cover"> </div>
            <div class="layer w-100 h-100">
                <div class="container h-100 d-flex align-items-center justify-content-center text-center">
                    <div class="caption">
                        <h2 class="mb-4 pb-3"><?php echo $items[0]['text']?></h2>
                        <a class="link" href="<?php echo $items[0]['link']?>">Find out more</a>
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
                        <h2 class="mb-4 pb-3"><?php echo $items[1]['text']?></h2>
                        <a class="link" href="<?php echo $items[1]['link']?>">Find out more</a>
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
                        <h2 class="mb-4 pb-3"><?php echo $items[2]['text']?></h2>
                        <a class="link" href="<?php echo $items[2]['link']?>">Find out more</a>
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