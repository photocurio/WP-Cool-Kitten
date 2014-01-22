<!DOCTYPE HTML>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="stylesheet" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="menu">
		<div class="container clearfix">

			<div id="logo" class="grid_3">
				<h1 id="site-title">
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?>
				</a></h1>
			</div>
			<?php
			
			//global $query_string;
			//$nav_query = new WP_Query( $query_string );
			
			if ( have_posts() ) {
			        echo '<div id="nav" class="grid_9 omega"> <ul class="navigation">';
				while ( have_posts() ) {
					the_post();
					echo '<li data-slide="'.get_the_ID().'">'.get_the_title().'</li>';
				}
			        echo '</ul></div>';
			} else { ?>
				<P>Can't find anything</p>
			<?php } wp_reset_postdata(); ?>
			
		</div>
	</div>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="slide" id="slide<?php echo get_the_ID(); ?>" data-slide="<?php echo get_the_ID(); ?>" data-stellar-background-ratio="0.5">
		<div class="container clearfix">

			<div id="content" class="grid_7">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); 
					edit_post_link();
				?>
				
			</div>
			<div id="decorative" class="grid_5 omega">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/decorative.png">
			</div>

		</div>
	</div>

	<?php endwhile; else: ?>
		<p>Sorry, we couldn't find any posts.</p>
	<?php endif; ?>

	<?php wp_footer(); ?>
</body>
</html>
