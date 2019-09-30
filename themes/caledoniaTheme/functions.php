<?php
/***********************************************************************************************/
/* Add Menus */
/***********************************************************************************************/
  add_theme_support( 'post-thumbnails' ); 
  
	register_nav_menus(
		array(
			'primary' => __('Primary Menu'),
			'footer' => __('Footer  Menu'),
		)
	);


function load_posts() {

		$keyword = $_POST['keyword'];

		/* General arguments */
		$args = array(
			'post_type'   => array('page', 'news', 'case_studies', 'projects', 'people'),
			'orderby' => 'relevance', 
			'order'	=> 'ASC',
			'posts_per_page' => 5,
			's' => $keyword
		);
	
		//Main query
		$query = new WP_Query( $args );
	
	
		// LOOP - show posts
		if( $query->have_posts() ) :
	
			while( $query->have_posts() ): $query->the_post();
				$mypost = $query->post;
				$id = get_the_ID();
				$link = get_the_permalink(); 
				$post_type = get_post_type($id);
				$title = get_the_title($id);
				
				switch ($post_type) {
					case 'case_studies':
						$post_type_name = ' - Case study';
					break;
					default:
						$post_type_name = '';
					break;
				}

				if ($post_type == "people"):
					$link = "/our-team/#" . $id;
				elseif ($post_type == "projects"):
					$link = "/portfolio/#" . $id;
				endif; ?>	

				<a class="result" data-link="<?php echo $link ?>" href="<?php echo $link ?>"> <?php echo $title ?> <span style="color:#ababab"><?php echo $post_type_name?></span></a>
			<?php
	
			endwhile;
	
				
			wp_reset_postdata();
		else :
				
			echo 'No posts found';
				
		endif;
	
	
		die();
}
		
add_action( 'wp_ajax_nopriv_load_posts', 'load_posts' );
add_action( 'wp_ajax_load_posts', 'load_posts' );


function load_modal(){

	$id = $_POST['id'];
	$post_type = get_post_type($id);

	if ($post_type == 'people' ) {
		$name = get_the_title($id);
		$role = get_field('role', $id);
		$bio = get_field('bio', $id);
		$image = get_field('image', $id);
		
		?>
	
		<div class="info-person-modal">
            <div class="content info-person content">

				<a class="close-person" data-dismiss="modal"><img src="<?php echo get_bloginfo('template_directory'); ?>/resources/close-green.svg">Close window</a>
				
				<div class="row mt-3 pt-2">
					<div class="col-md-6">
						<img class="image" src="<?php echo $image ?>" />
					</div>
					
					<div class="col-md-6">
						<hr class="mb-4">
						<h4 class="name"><?php echo $name ?></h4>
						<p class="role"><?php echo $role ?></p>
						<div class="bio"><?php echo $bio ?></div>
					</div>
				</div>

			</div>
        </div>

	<?php }

	else if ($post_type == 'projects') { 
		$logo = get_field('logo', $id);
	
        $investment = get_field('date_of_investment', $id);
        $status = get_field('realised_status', $id); 	
        $description = get_field('description', $id); 
        $equity = get_field('caledonia_equity', $id);
        $directors = get_field('board_directors', $id); 
        $type_of_investment = get_field('type_of_investment', $id); 
        $symbol = $equity['symbol'];
        $value = $equity['value'];
        $number = $equity['number']; 
		$case_study = get_field('case_study', $id)->ID;
		$case_study_link = get_the_permalink($case_study);
		
	?>
		<div class="info-project-modal">
            <div class="content info-project content">

				<a class="close-project" data-dismiss="modal"><img src="<?php echo get_bloginfo('template_directory'); ?>/resources/close-green.svg">Close window</a>
                
                <div class="row mt-3 pt-lg-2">
                    <div class="col-md-4">
                        <img class="image logo" src="<?php echo $logo ?>" />
                    </div>
                    <div class="col-md-4">
						<?php if ($investment) :?>
							<div class="investment-box">
								<hr>
								<p class="title">Date of investment</p>
								<p class="investment"><?php echo $investment ?></p>
								<br>
							</div>
						<?php endif; ?>
						<?php if ($status) :?>
							<div class="status-box">
								<hr>
								<p class="title">Realised status</p>
								<p class="status"><?php echo $status ?></p>
								<br>
							</div>
						<?php endif; ?>
						<?php if ($description) :?>
							<div class="description-box">
								<hr>
								<p class="title">Description</p>
								<p class="description"><?php echo $description ?></p>
								<br>
							</div>
						<?php endif; ?>
						<?php if ($case_study_link) :?>
							<div>
								<a class="view-cs case_study" href="<?php echo $case_study_link ?>">View case study</a>
							</div>
						<?php endif; ?>
                    </div>
                    <div class="col-md-4">
						<?php if ($number) :?>
							<div class="equity-box">
								<hr>
								<p class="title">Caledonia equity</p>
								<p class="equity">
								<span class="symbol"><?php echo $symbol?></span><span class="num"><?php echo $number ?></span><span class="value"><?php echo $value ?></span>
								</p>
								<br>
							</div>
						<?php endif; ?>
						<?php if ($type_of_investment) :?>
							<div class="type_of_investment-box">
								<hr>
								<p class="title">Type of investment</p>
								<p class="type_of_investment"><?php echo $type_of_investment ?></p>
								<br>
							</div>
						<?php endif; ?>
						<?php if ($directors) :?>
							<div class="directors-box">
								<hr>
								<p class="title">Board directors</p>
								<p class="directors"><?php echo $directors ?></p>
							</div>
						<?php endif; ?>
                    </div>

				</div> <!-- row -->
			</div>
		</div>
	<?php }

	die();
}

add_action( 'wp_ajax_nopriv_load_modal', 'load_modal' );
add_action( 'wp_ajax_load_modal', 'load_modal' );

function load_projects() {

	$status = $_POST['status'];

	/* General arguments */
	$args = array(
		'post_type'   => 'projects',
		'posts_per_page' => -1
	);

	/* Status */
	if ($status != "all") {

		$args['meta_query'] = array(
			'relation'		=> 'AND',
			array(
				'key'	 	=> 'realised_status',
				'value'	  	=> $status,
				'compare' 	=> '='
			),
			array(
				'key'	  	=> 'profile',
				'value'	  	=> 'featured',
				'compare' 	=> '='
			)
		);
	}

	else {
		$args['meta_key'] = 'profile';
		$args['meta_value'] = 'featured';
	}

	//Main query
	$query = new WP_Query( $args ); 

	// LOOP - show posts
	if( $query->have_posts() ) : ?>
	
		<div class="row m-0"> 

			<?php while( $query->have_posts() ): $query->the_post();

				$mypost = $query->post;
				$id = get_the_ID();
				$parent = 'current-projects';
				require('parts/part-project.php'); 

			endwhile;
			wp_reset_postdata(); ?>
		</div> 

	<?php else :
		echo 'No posts found';
	endif;

	die();
}
	
add_action('wp_ajax_nopriv_load_projects', 'load_projects');
add_action('wp_ajax_load_projects', 'load_projects');


function load_news() {

	$current_page = $_POST['current_page'];

	/* General arguments */
	$args = array(
		'post_type'   => 'news',
		'posts_per_page' => 3,
		'paged' => $current_page,
		'orderby' => 'date', 
		'order'	=> 'DESC'
	);

	//Main query
	$query = new WP_Query( $args ); 
	$max = $query->max_num_pages;

	// Show posts
	if( $query->have_posts() ) : 
	
		//POSTS
		while( $query->have_posts() ): $query->the_post();

			$mypost = $query->post;
			$id = get_the_ID();
			require('parts/part-article.php'); 

		endwhile;
		wp_reset_postdata(); 

		//PAGINATION
		if($max > 1):

			if ($current_page == $max):
				$next_disabled = true;
			elseif ($current_page == 1):
				$prev_disabled = true;
			endif; ?>

			<div class="d-flex justify-content-center my-5">

				<!-- Prev -->
				<?php if ($prev_disabled) :?>
					<button class="prev-article" disabled></button>
				<?php else :?>
					<button class="prev-article"></button>
				<?php endif; ?>

				<!-- Indicators -->
				<p><span class="current"><?php echo $current_page ?></span><span class="mx-1">/</span><span><?php echo $max ?></span></p>

				<!-- Next -->
				<?php if ($next_disabled) :?>
					<button class="next-article" disabled></button>
				<?php else :?>
					<button class="next-article"></button>
				<?php endif; ?>

			</div> 
						
		<?php endif;?>
		

	<?php else :
		echo 'No posts found';
	endif;

	die();
}
	
add_action('wp_ajax_nopriv_load_news', 'load_news');
add_action('wp_ajax_load_news', 'load_news');



function load_media() {

	$current_page = $_POST['current_page'];

	/* General arguments */
	$args = array(
		'post_type'   => 'media',
		'posts_per_page' => 3,
		'paged' => $current_page
	);

	//Main query
	$query = new WP_Query( $args ); 
	$max = $query->max_num_pages;

	// Show posts
	if( $query->have_posts() ) :  ?>

		<div class="row">
		
			<!-- POSTS -->
			<?php while( $query->have_posts() ): $query->the_post();

				$mypost = $query->post;
				$id = get_the_ID();
				require('parts/part-media.php'); 

			endwhile;
			wp_reset_postdata(); ?>

		</div>

		<!-- PAGINATION -->
		<?php if($max > 1):

			if ($current_page == $max):
				$next_disabled = true;
			elseif ($current_page == 1):
				$prev_disabled = true;
			endif; ?>

			<div class="d-flex justify-content-center my-5">

				<!-- Prev -->
				<?php if ($prev_disabled) :?>
					<button class="prev-media" disabled></button>
				<?php else :?>
					<button class="prev-media"></button>
				<?php endif; ?>

				<!-- Indicators -->
				<p><span class="current"><?php echo $current_page ?></span><span class="mx-1">/</span><span><?php echo $max ?></span></p>

				<!-- Next -->
				<?php if ($next_disabled) :?>
					<button class="next-media" disabled></button>
				<?php else :?>
					<button class="next-media"></button>
				<?php endif; ?>

			</div> 
						
		<?php endif;?>
		

	<?php else :
		echo 'No posts found';
	endif;

	die();
}
	
add_action('wp_ajax_nopriv_load_media', 'load_media');
add_action('wp_ajax_load_media', 'load_media');	