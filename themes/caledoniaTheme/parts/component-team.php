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
            ?>

                <div class="col-md-6 col-lg-4 px-1 my-1">
                    <div class="person" data-image="<?php echo $image ?>" data-bio="<?php echo $bio ?>" data-name="<?php echo $title ?>" data-role="<?php echo $role ?>">
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

                <a class="close-person"><img src="<?php echo get_bloginfo('template_directory'); ?>/resources/close-green.svg">Close window</a>
                
                <div class="row mt-3 pt-2">
                    <div class="col-md-6">
                        <img class="image" src="" />
                    </div>
                    <div class="col-md-6">
                        <hr class="mb-4">
                        <h4 class="name"></h4>
                        <p class="role"></p>
                        <div class="bio"></div>
                    </div>
                </div>
            </div>
        </div>
            
    </div>


</div>


