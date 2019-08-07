<?php
    $items = $values['items'];
?>
<div class="container grid my-4 my-lg-5">

    <div class="row">

        <?php foreach ($items as $item): 

            $layout = $item['acf_fc_layout'];

            /* Film */
            if ($layout == "film"): ?>

                <div class="col-lg-8 px-lg-1 my-1 overflow-hidden">

                    <div class="box w-100 bigger linked-box position-relative" style="overflow:hidden" data-video="<?php echo $item['video_id'] ?>">

                        <!-- Video -->
                        <div class="video">
                            <div class='embed-container'>
                                <iframe src='https://player.vimeo.com/video/<?php echo $item['video_id'] ?>?title=0&byline=0&portrait=0' allow="autoplay" frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                            </div>
                        </div>

                        <!-- Thumbnail -->
                        <div class="video-thumbnail w-100 h-100">

                            <div class="w-100 h-100 overflow-hidden">
                                <div class="w-100 h-100 bg-image zoom" style="background-image: url(<?php echo $item['background_image'] ?>)"></div>
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
            <?php elseif ($layout == "quote"): ?>

                <div class="col-lg-4 px-lg-1 px-md-2 my-1">
                    <div class="box quote-box p-4 bigger">
                        <p class="quote"><?php echo $item['quote'] ?></p>
                        <p class="author"><?php echo $item['author'] ?></p>
                    </div>
                </div>

            <!-- Number -->
            <?php elseif ($layout == "number"): ?>

                <div class="col-lg-4 px-lg-1 my-1">
                    <div class="box w-100 number px-5 py-4">
                        <span><?php echo $item['symbol'] ?></span><span class="counter"><?php echo $item['number'] ?></span><span><?php echo $item['value'] ?></span>
                        <p class="description"><?php echo $item['description'] ?></p>
                    </div>
                </div>

            <!-- Page -->
            <?php elseif ($layout == "page"): ?>

                <div class="col-lg-8 px-lg-1 my-1">
                    <div class="box position-relative linked-box" data-link="<?php echo $item['link'] ?>">

                        <!-- Image -->
                        <div class="w-100 h-100 overflow-hidden">
                            <div class="w-100 h-100 bg-image zoom" style="background-image: url(<?php echo $item['image'] ?>)"></div>
                        </div>

                        <!-- Layer -->
                        <div class="light-layer w-100 h-100">
                            <div class="h-100 d-flex align-items-center justify-content-center text-center">
                                <div>
                                    <h2 class="mb-2 color-white"><?php echo $item['title'] ?></h2>
                                    <p class="introduction mb-5"><?php echo $item['introduction'] ?></p>
                                    <a class="link" href="<?php echo $item['link'] ?>"><?php echo $item['button_label'] ?></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            <!-- Image -->
            <?php elseif ($layout == "image"): ?>

                <div class="col-lg-4 px-lg-1 my-1">
                    <div class="box">
                        <div class="w-100 h-100 bg-image" style="background-image: url(<?php echo $item['image'] ?>)">
                    </div>
                </div>

            <?php endif; ?>

        <?php endforeach ?>


    </div>
</div>