<?php     
    $selected_projects = get_posts(array(
        'post_type'   => 'projects',
        'posts_per_page' => -1,
        'meta_key'=> 'profile',
        'meta_value' => 'selected'
        )
    );
?>

<div class="container my-5">

    <div class="d-flex justify-content-center">
        <button class="view-historical">See selected historical investments</button>
    </div>

    <!-- **  HISTORICAL PROJECTS **  -->
    <div class="position-relative mt-4" id="historical-projects">
        <!-- Grid -->
        <div>
            <div class="row m-0">
                <?php foreach ($selected_projects as $project): 
                    $id = $project->ID;
                    $parent = 'historical-projects';
                    require('part-project.php');
                endforeach ?>
            </div>
        </div>
    </div>

</div>