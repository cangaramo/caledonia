<?php 
    /* General arguments */
	$args = array(
		'post_type'   => 'people',
        'posts_per_page' => -1,
        'orderby'        => 'rand'
    );
    $people = get_posts($args);
?>

<div class="container" id="team">

    <div class="position-relative my-5 pb-5 pb-lg-0">
        <div class="row m-0">

            <?php foreach ($people as $person): 
                $id = $person->ID;
                $title = get_the_title($id);
                $values = get_fields($id);
                $role = $values['role'];
                $bio = $values['bio'];
                $image = $values['image'];
                $index = $index + 1;
                $twitter = $values['twitter'];
                $linkedin = $values['linkedin'];
            ?>

                <div class="col-md-6 col-lg-4 px-1 my-1">
                    <div class="person" 
                        data-image="<?php echo $image ?>" 
                        data-bio="<?php echo $bio ?>" 
                        data-name="<?php echo $title ?>" 
                        data-role="<?php echo $role ?>"
                        data-twitter="<?php echo $twitter ?>"
                        data-linkedin="<?php echo $linkedin ?>"
                        >
                        <div class="w-100 h-100 bg-image" style="background-image: url(<?php echo $image ?>)"></div>
                        <div class="info">
                            <p><span><?php echo $title . ', '?></span><span class="role"><?php echo $role ?></span></p>
                        </div>
                    </div>
                </div>
                
            <?php endforeach ?>

        </div>

        
        <div class="info-person-container" style="">
           
            <div class="info-person content">
                
                <div class="d-flex flex-column">

                    <div class="text-right">
                        <a class="close-person">Close window<img src="<?php echo get_bloginfo('template_directory'); ?>/resources/close-green.svg"></a>
                    </div>

                    <div class="row mt-3 pt-2">
                        <div class="col-md-6">
                            <img class="image" src="" />
                        </div>
                        <div class="col-md-6">
                            <hr class="mb-4">
                            <h4 class="name"></h4>
                            <p class="role"></p>
                            <div class="bio"></div>
                            <div class="d-flex">
                                <div class="social mr-3 linkedin"><a href="" target="_blank"><i class="fab fa-linkedin-in"></i></a></div>
                                <div class="social twitter"><a href="" target="_blank"><i class="fab fa-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
            
    </div>


</div>


