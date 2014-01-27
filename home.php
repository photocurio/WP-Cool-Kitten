<?php get_header(); ?>

	<div class="kitty-menu clearfix">
		<div class="container clearfix relative logo-header">
			<div id="logo" class="grid_12">
				<h1 id="site-title" class="grid_3"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
			global $query_string;
			$nav_query = new WP_Query( 'cat=2&meta_key=sequence&orderby=meta_value_num&order=asc' );
			if ( $nav_query->have_posts() ) {
				echo '<div id="nav" class="grid_9 omega relative clearfix"><ul class="navigation">';
				  while ( $nav_query->have_posts() ) {
					   $nav_query->the_post();
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
		<?php $slide_query = new WP_Query( 'cat=2&meta_key=sequence&orderby=meta_value_num&order=asc' );
			if ( $slide_query->have_posts() ) : 
			while ( $slide_query->have_posts() ) : 
			$slide_query->the_post(); ?>
		
		<div class="slide" 
		id="slide<?php echo get_the_ID(); ?>" 
		data-slide="<?php echo get_the_ID(); ?>" 
		data-stellar-background-ratio="0.5" >
		<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'original' ); ?>
		<div class="background-div" style="<?php if ( get_post_meta( get_the_ID(), 'background-color', true ) ) : ?> background-color:<?php echo get_post_meta( get_the_ID(), 'background-color', true ) ?>;<?php endif; ?>"><img src="<?php echo $src[0]; ?>"></div>
						
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

		<?php endwhile; else: ?>
			<p>Sorry, we couldn't find any posts.</p>
		<?php endif; ?>
		
	</div><!-- PAGE -->
	
<?php get_footer(); ?>