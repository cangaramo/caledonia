<?php     
    $featured_projects = get_posts(array(
            'post_type'   => 'projects',
            'posts_per_page' => -1,
            'meta_key'=> 'profile',
            'meta_value' => 'featured',
            'orderby' => 'menu_order',
            'order'  => 'ASC'
        )
    );
    $ajaxurl = home_url() . '/wp-admin/admin-ajax.php'; 
?>
<div class="container">
    
    <!-- Filters -->
    <div class="d-flex justify-content-center">
        <select class="dropdown-status">
            <option value="all">All</option>
            <option value="current">Current</option>
            <option value="realised">Realised</option>
        </select>
        <a class="view-cs" href="/case-studies">View case studies</a>
    </div>

    <!-- CURRENT PROJECTS -->
    <div class="position-relative mt-4 mb-5 pb-5" id="current-projects">

        <!-- Grid -->
        <div class="response-projects" data-url="<?php echo $ajaxurl?>">
            <div class="row m-0">
                <?php foreach ($featured_projects as $project): 
                    $id = $project->ID;
                    $parent = 'current-projects';
                    require('part-project.php');
                endforeach ?>
            </div>
        </div>

        <!-- Info project -->
        <div class="info-project-container" style="">
           
            <div class="info-project content">


                <div class="d-flex flex-column">
                    
                    <div class="text-right">
                        <a class="close-project">Close window<img src="<?php echo get_bloginfo('template_directory'); ?>/resources/close-green.svg"></a>
                    </div>
                
                    <div class="row mt-3 pt-lg-2">
                        <div class="col-md-4">
                            <img class="image logo" src="" />
                        </div>
                        <div class="col-md-4">
                            <div class="investment-box">
                                <hr>
                                <p class="title">Date of investment</p>
                                <p class="investment"></p>
                                <br>
                            </div>
                            <div class="status-box">
                                <hr>
                                <p class="title">Realised status</p>
                                <p class="status"></p>
                                <br>
                            </div>
                            <div class="description-box">
                                <hr>
                                <p class="title">Description</p>
                                <p class="description"></p>
                                <br>
                            </div>
                            <div class="mb-5 d-none d-lg-block">
                                <a class="view-cs case_study" href="">View case study</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="equity-box">
                                <hr>
                                <p class="title">Caledonia equity</p>
                                <p class="equity">
                                <span class="symbol"></span><span class="num"></span><span class="value"></span>
                                </p>
                                <br>
                            </div>
                            <div class="type_of_investment-box">
                                <hr>
                                <p class="title">Type of investment</p>
                                <p class="type_of_investment"></p>
                                <br>
                            </div>
                            <div class="directors-box">
                                <hr>
                                <p class="title">Board directors</p>
                                <p class="directors"></p>
                            </div>
                            <div class="mt-3 d-block d-lg-none">
                                <a class="view-cs case_study" href="">View case study</a>
                            </div>
                        </div>

                    </div> <!-- row -->

                </div>

            </div>
        </div> <!-- info project -->
            
    </div>

</div>