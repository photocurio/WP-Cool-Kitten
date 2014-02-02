<!DOCTYPE HTML>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
	<title><?php bloginfo( 'name' ); ?></title>
	<link rel="stylesheet" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="kitty-menu clearfix">
		<div class="container clearfix relative logo-header">
			<div id="logo" class="grid_12">
				<h1 id="site-title" class="grid_3"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php if ( have_posts() ) {
				echo '<div id="nav" class="grid_9 omega relative clearfix"><ul class="navigation">';
				  while ( have_posts() ) {
					   the_post();
					   echo '<li data-slide="'.get_the_ID().'">'.get_the_title().'</li>';
					   } echo '</ul></div>';
				} else { ?>
				<P>Can't find anything</p>
			<?php } wp_reset_postdata(); ?>
			</div><!-- LOGO -->
			
		</div><!-- logo-header -->
		
	</div><!-- kitty-menu -->
	<div id="page" class="clearfix">
		<div class="secondary-menu-slide">
			<!--div class="container relative" id="secondary-menu"><?php //dynamic_sidebar('secondary'); ?></div-->
		</div>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<div class="slide" 
		id="slide<?php echo get_the_ID(); ?>" 
		data-slide="<?php echo get_the_ID(); ?>" 
		data-stellar-background-ratio="0.5" 
		style="<?php if ( get_post_meta( get_the_ID(), 'background-color', true ) ) : ?> background-color:<?php echo get_post_meta( get_the_ID(), 'background-color', true ) ?>;<?php endif; ?>" >
		<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slide-image' ); ?>
		<div class="background-div"><img src="<?php echo $src[0]; ?>"></div>
						
			<div class="container clearfix">
				<div class="grid_6 omega content" 
					<?php if ( get_post_meta( get_the_ID(), 'float', true ) ) : ?> 
						style="float:<?php echo get_post_meta( get_the_ID(), 'float', true ) ?>;"<?php endif; ?> >
					<h1><?php the_title(); ?></h1>
					<?php the_content(); 
					edit_post_link(); ?>
				</div><!-- CONTENT -->
			</div><!-- CONTAINER -->
		</div><!-- SLIDE -->

		<?php endwhile; ?><!-- END OF THE LOOP -->
		<!-- PAGINATION FUNCTIONS -->
			<div class="container">
				<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
				<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
			</div>
		<?php else: ?>
			<p>Sorry, we couldn't find any posts.</p>
		<?php endif; ?>
		
	</div><!-- PAGE -->
	
	<?php wp_footer(); ?>
</body>
</html>