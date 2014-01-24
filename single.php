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
		<div class="container clearfix relative">

			<div id="logo" class="grid_3">
				<h1 id="site-title">
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?>
				</a></h1>
			</div>
			<div id="nav" class="grid_9 omega relative">
				<ul class="navigation">
					<li><a href="/">Home</a></li>
					<li><a href="/about-larry/">About Larry</a></li>
					<li><a href="/category/books/">Larry's Books</a></li>
				</ul>
			</div>
		</div>
	</div>
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'original' ); ?>

	<div class="slide" id="slide<?php echo get_the_ID(); ?>" data-slide="<?php echo get_the_ID(); ?>" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo $src[0]; ?>)" >
		<div class="container clearfix">
			<div id="decorative" class="grid_6 ">
				
			</div>
			<div class="grid_6 omega content" 
				<?php if ( get_post_meta( get_the_ID(), 'float', true ) ) : ?> style="float:<?php echo get_post_meta( get_the_ID(), 'float', true ) ?>" <?php endif; ?>>
				<h1><?php the_title(); ?></h1>
				<?php the_content(); 
				edit_post_link();
				?>
			</div>
			

		</div>
	</div>

	<?php endwhile; else: ?>
		<p>Sorry, we couldn't find any posts.</p>
	<?php endif; ?>

	<?php wp_footer(); ?>
</body>
</html>
