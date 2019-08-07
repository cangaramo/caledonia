<?php 
$title = get_the_title($id);
$values = get_fields($id);
$image = $values['image'];
$vimeo_id = $values['vimeo_id']; 
$file = get_bloginfo('template_directory') . '/' . $values['file'];
?>

<div class="col-md-4">

	<hr class="mt-4">

	<div class="item-media">

		<div class="position-relative linked-box" data-modal="true" style="height:180px">
			<div class="w-100 h-100 bg-image" style="background-image: url(<?php echo $image ?>);"></div>
				<div class="layer w-100 h-100">
					<div class="h-100 d-flex align-items-center justify-content-center">
						<img style="height:60px" class="my-3 play-film open-modal-video" data-vimeo="<?php echo $vimeo_id ?>" data-file="<?php echo $file ?>" src="<?php echo get_bloginfo('template_directory'); ?>/resources/play.svg">
					</div>
				</div> 
		</div>

	    <p class="title"><?php echo $title ?></p>
    </div>
</div>