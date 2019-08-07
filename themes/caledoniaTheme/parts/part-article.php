<?php 
$title = get_the_title($id);
$values = get_fields($id);
$date = get_the_date('d F Y', $id);
$permalink =  get_the_permalink($id);
$thumbnail_image = $values['thumbnail_image'];
$description = $values['description'];
?>

<div class="article-item py-3">
	<hr class="green-bar">           
	    <div class="row py-4 py-lg-3">
			<div class="col-lg-3">
				<div class="bg-image linked-box" data-link="<?php echo $permalink ?>" style="background-image: url(<?php echo $thumbnail_image ?>)"></div>
			</div>
			<div class="col-lg-3">
				<p class="mt-3 mb-1 mt-lg-0"><?php echo $date ?></p>
				<a href="<?php echo $permalink ?>"><p class="title"><?php echo $title ?></p></a>
			</div>
			<div class="col-lg-6 position-relative">
				<p class="mt-3 mb-4"><?php echo $description ?></p>
				<a class="link" href="<?php echo $permalink ?>">Read more</a>
			</div>
		</div>
	<hr>
</div>
                
