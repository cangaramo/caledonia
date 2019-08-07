<?php     
    $case_studies = get_posts(array(
        'post_type'   => 'case_studies',
        'posts_per_page' => 5
        )
    );
?>
<div class="container mb-5">

    <?php foreach ($case_studies as $case_study): 
        $id = $case_study->ID;
        $title = get_the_title($id); 
        $values = get_fields($id);
        $description = $values['description'];
        $thumbnail_image = $values['thumbnail_image'];
        $permalink = get_the_permalink($id);
        ?>

        <div class="case-study-item my-1">
            <div class="row m-0">
                <div class="col-lg-6 order-2 order-lg-1 px-4 py-5 p-lg-5">
                    <a href="<?php echo $permalink ?>"><h4><?php echo $title ?></h4></a>
                    <p><?php echo $description ?></p>
                    <div class="mt-4 pt-2">
                        <a class="link" href="<?php echo $permalink ?>" target="_blank">Read more</a>
                    </div>
                </div>

                <div class="col-lg-6 order-1 order-lg-2 px-0 linked-box" data-link="<?php echo $permalink ?>">
                    <div class="w-100 h-100 overflow-hidden">
                        <div class="w-100 h-100 bg-image zoom" style="background-image:url('<?php echo $thumbnail_image ?>');"> </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    <?php endforeach ?> 

</div>