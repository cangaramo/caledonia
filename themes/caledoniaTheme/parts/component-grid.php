<?php
    $film = $values['film'];
    $quote = $values['quote'];
    $number = $values['number'];
    $page = $values['page'];
    $page2 = $values['page_2'];
    $image = $values['image'];
?>
<div class="container grid my-4 my-lg-5">

    <div class="row">

        <div class="col-lg-8 px-lg-1 my-1 overflow-hidden">

            <div class="box w-100 bigger linked-box position-relative" style="overflow:hidden" data-video="87110435">

                <!-- Video -->
                <div class="video">
                    <div class='embed-container'>
                        <iframe src='https://player.vimeo.com/video/87110435?title=0&byline=0&portrait=0' allow="autoplay" frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                    </div>
                </div>

                <!-- Thumbnail -->
                <div class="video-thumbnail w-100 h-100">

                    <div class="w-100 h-100 overflow-hidden">
                        <div class="w-100 h-100 bg-image zoom" style="background-image: url(<?php echo $film['background_image'] ?>)"></div>
                    </div>

                    <div class="light-layer w-100 h-100">
                        <div class="h-100 d-flex align-items-center justify-content-center text-center">
                            <div>
                                <img class="my-3 play-film open-video" src="<?php echo get_bloginfo('template_directory'); ?>/resources/play.svg">
                                <h2 class="mb-4 pb-md-3 color-white overview">Overview film</h2>
                                <a class="link open-video">Watch film</a>
                            </div>
                        </div>
                    </div> 
                </div>

            </div>

        </div>
                            
        <!-- Quote -->
        <div class="col-lg-4 px-lg-1 px-md-2 my-1">
            <div class="box quote-box p-4 bigger">
                <p class="quote"><?php echo $quote['quote'] ?></p>
                <p class="author"><?php echo $quote['author'] ?></p>
            </div>
        </div>
        
        <!-- Number -->
        <div class="col-lg-4 px-lg-1 my-1">
            <div class="box w-100 number px-5 py-4">
                <span><?php echo $number['symbol'] ?></span><span class="counter"><?php echo $number['number'] ?></span><span><?php echo $number['value'] ?></span>
                <p class="description"><?php echo $number['description'] ?></p>
            </div>
        </div>

        <!-- Page -->
        <div class="col-lg-8 px-lg-1 my-1">
            <div class="box position-relative linked-box" data-link="<?php echo $page['link'] ?>">

                <!-- Image -->
                <div class="w-100 h-100 overflow-hidden">
                    <div class="w-100 h-100 bg-image zoom" style="background-image: url(<?php echo $page['image'] ?>)"></div>
                </div>

                <!-- Layer -->
                <div class="light-layer w-100 h-100">
                    <div class="h-100 d-flex align-items-center justify-content-center text-center">
                        <div>
                            <h2 class="mb-2 color-white"><?php echo $page['title'] ?></h2>
                            <p class="introduction mb-5"><?php echo $page['introduction'] ?></p>
                            <a class="link" href="<?php echo $page['link'] ?>"><?php echo $page['button_label'] ?></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Page -->
        <div class="col-lg-8 px-lg-1 my-1">
            <div class="box position-relative linked-box" data-link="<?php echo $page2['link'] ?>">

                <!-- Image -->
                <div class="w-100 h-100 overflow-hidden">
                    <div class="w-100 h-100 bg-image zoom" style="background-image: url(<?php echo $page2['image'] ?>)"></div>
                </div>

                <!-- Layer -->
                <div class="light-layer w-100 h-100">
                    <div class="h-100 d-flex align-items-center justify-content-center text-center">
                        <div>
                            <h2 class="mb-2 color-white"><?php echo $page2['title'] ?></h2>
                            <p class="introduction mb-5"><?php echo $page2['introduction'] ?></p>
                            <a class="link" href="<?php echo $page2['link'] ?>"><?php echo $page2['button_label'] ?></a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <!-- Image -->
        <div class="col-lg-4 px-lg-1 my-1">
            <div class="box">
                <div class="w-100 h-100 bg-image" style="background-image: url(<?php echo $image ?>)">
            </div>
        </div>

    </div>
</div>