<?php get_header(); ?>

<?php 
    $values = get_fields();
    $title = get_the_title();
    $id = get_the_ID();
    $date = get_the_date('d F Y');
    $banner_image = $values['banner_image'];
    $copy = $values['copy'];
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
                    <p><?php echo $date ?></p>
                </div>
                <div class="col-lg-8">

                    <!-- Copy -->
                    <hr>
                    <p><?php echo $copy ?></p>
                    <br>
                
                </div>
            </div>
        </div>

	</main> <!-- end #content -->

<?php get_footer(); ?>
