<?php //=======================================================================
// front-page.php
// 
// Called when the user visits the page assigned to "Home Page" in settings
//========================================================================*/ ?>
<?php get_header(); ?>

	<?php //=======================================================================
	// Header
	//========================================================================*/ ?>
	<header class="jumbotron masthead">
		<div class="overlay"></div>
		<div class="container">
			<?php echo get_option('homeJumboContent'); ?>
		</div>
	</header>


	<?php //=======================================================================
	// Social Bar
	//========================================================================*/ ?>
	<menu class="social-bar">
		<div class="container">
			<?php echo get_option('socialBarContent'); ?>
		</div>
	</menu>

<?php get_footer(); ?>