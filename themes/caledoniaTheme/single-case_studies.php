<?php get_header(); ?>

<?php 
    $values = get_fields();
    $title = get_the_title();
    $id = get_the_ID();
    $banner_image = $values['banner_image'];
    $description = $values['description'];
    $investment_thesis = $values['investment_thesis'];
    $type_investment = $values['type_of_investment'];
    $initial_equity = $values['initial_equity'];
    $copy_image = $values['copy_image'];
    $case_studies = $values['related_case_studies'];
?>
			
	<main>

        <!-- Banner -->
        <?php if ($banner_image): ?>
            <div class="banner-big">
                <div class="w-100 h-100 bg-image" style="background-image: url(<?php echo $banner_image ?>)"></div>
            </div>
        <?php else: ?>
            <div style="height: 200px"></div>
        <?php endif; ?>

        <!-- Copy -->
        <div class="container my-5">
            <div class="row px-lg-5 content-article">  
                <div class="col-lg-4">
                    <h1 class="mb-4"><?php echo $title ?></h1>
                </div>
                <div class="col-lg-8">

                    <!-- Description -->
                    <hr>
                    <p><?php echo $description ?></p>
                    <br>

                    <!-- Investment thesis -->
                    <hr>
                    <p class="title">Investment thesis</p>
                    <p><?php echo $investment_thesis ?></p>
                    <br>

                    <!-- Type of investment and equity investment -->
                    <div class="row">
                        <div class="col-lg-6">
                            <hr>
                            <p class="title">Type of investment</p>
                            <p><?php echo $type_investment ?></p>
                        </div>
                        <div class="col-lg-6 equity">
                            <hr>
                            <p class="title">Initial equity investment</p>
                            <span class="symbol"><?php echo $initial_equity['symbol']?></span><span class="counter num"><?php echo $initial_equity['number']?></span><span class="value"><?php echo $initial_equity['value']?></span>
                        </div>
                    </div>

                    <!-- Image -->
                    <img class="w-100 copy-image" src="<?php echo $copy_image?>" />
                
                </div>
            </div>
        </div>


        <div class="more-case-studies py-5 mb-5">
            <div class="container">
                <h2>Case studies </h2>
                <div class="row">
                    <?php foreach ($case_studies as $case_study): 
                        $id = $case_study->ID;
                        $title = get_the_title($id); 
                        $values = get_fields($id);
                        $description = $values['description'];
                        $thumbnail_image = $values['thumbnail_image'];
                        $permalink = get_the_permalink($id);
                        ?>
                        <div class="col-lg-4 my-3 my-lg-0">
                            <div class="box p-4">
                                <div class="thumbnail-image" style="background-image: url(<?php echo $thumbnail_image ?>)"></div>
                                <h4><?php echo $title ?></h4>
                                <p><?php echo $description ?></p>
                                <a class="link" href="<?php echo $permalink ?>">Read more</a>
                            </div>
                        </div>
                    <?php endforeach ?> 
                </div>
            </div>
        </div>


	</main> <!-- end #content -->

<?php get_footer(); ?>
