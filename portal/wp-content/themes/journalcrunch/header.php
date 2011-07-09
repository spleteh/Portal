<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="keywords" content="<?php echo get_option('journal_keywords'); ?>" />
<meta name="description" content="<?php echo get_option('journal_description'); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/nivo-slider.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/prettyPhoto.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/style.css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php if(get_option('journal_cufon')!="no"):?>
<script type="text/javascript">
			Cufon.replace('h1',{hover:true,textShadow: '#fff 1px 1px'})('h2:not(.footerTitle,.boxFooter .twitter)',{hover:true,textShadow: '#fff 1px 1px'})('h3',{textShadow: '#fff 1px 1px'})('.reply',{hover:true});
	</script>
<?php endif ?>
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	 wp_enqueue_script("jquery"); 
	wp_head();
?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.form.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/twittercb.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/custom.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/Vegur_400-Vegur_700.font.js"></script>
	<!-- Sliding effect -->
	<script src="<?php bloginfo('template_url'); ?>/js/slide.js" type="text/javascript"></script>
	
</head>
<body>
<!-- Panel -->
<div id="toppanel"> 
<?php 
	global $user_identity, $user_ID;	
	// If user is logged in or registered, show dashboard links in panel
	if (is_user_logged_in()) { 
?>
	<div id="panel">
		<div class="content clearfix">
			<div class="left border">
				<h1>Welcome back <?php echo $user_identity ?></h1>
				<h2>Headline</h2>				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<h2>Dashboard</h2>
				<ul>					
					<li><a href="<?php bloginfo('url') ?>/wp-admin/index.php">Go to Dashboard</a></li>
				</ul>
			</div>
			<div class="left narrow">			
				<h2>My Account</h2>				
				<ul>					
					<li><a href="<?php bloginfo('url') ?>/wp-admin/index.php">Global Dashboard</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/profile.php">Edit My Profile</a></li>
					<?php if ( current_user_can('level_1') ) : ?>
						<li><a href="<?php bloginfo('url') ?>/wp-admin/edit-comments.php">Comments</a></li>
					<?php endif ?>
	        		<li><a href="<?php echo wp_logout_url(get_permalink()); ?>" rel="nofollow" title="<?php _e('Log out'); ?>"><?php _e('Log out'); ?></a></li>
				</ul>	
				<?php if ( current_user_can('level_10') ) : ?>		
				<h2>Appearance</h2>				
				<ul>						
					<li><a href="<?php bloginfo('url') ?>/wp-admin/themes.php">Themes</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/widgets.php">Widgets</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/theme-editor.php">Theme Editor</a></li>
				</ul>
				<?php endif ?>
			</div>
			<?php if ( current_user_can('level_2') ) : ?>
			<div class="left narrow">			
				<h2>Posts</h2>				
				<ul>					
					<li><a href="<?php bloginfo('url') ?>/wp-admin/post-new.php">New Post</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/edit.php">Edit Posts</a></li>
				<?php if ( current_user_can('level_3') ) : ?>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/edit-tags.php">Tags</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/categories.php">Categories</a></li>
				<?php endif ?>
				</ul>
				<?php if ( current_user_can('level_10') ) : ?>		
				<h2>Plugins</h2>				
				<ul>						
					<li><a href="<?php bloginfo('url') ?>/wp-admin/plugins.php">Plugins</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/plugin-install.php">Install a Plugin</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/plugin-editor.php">Plugin Editor</a></li>
				</ul>
				<?php endif ?>
			</div>
			<?php endif ?>
			<?php if ( current_user_can('level_2') ) : ?>
			<div class="left narrow">
				<?php if ( current_user_can('level_3') ) : ?>	
				<h2>Pages</h2>				
				<ul>		
					<li><a href="<?php bloginfo('url') ?>/wp-admin/post-new.php">New Page</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/edit-pages.php">Edit Pages</a></li>
				</ul>
				<?php endif ?>			
				<h2>Library</h2>				
				<ul>					
					<li><a href="<?php bloginfo('url') ?>/wp-admin/upload.php">Library</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/media-new.php">Add New</a></li>
				</ul>
				<?php if ( current_user_can('level_3') ) : ?>		
				<h2>Users</h2>				
				<ul>						
					<li><a href="<?php bloginfo('url') ?>/wp-admin/users.php">Author &amp; Users</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/user-new.php">Add New</a></li>
				</ul>
				<?php endif ?>
			</div>
			<?php endif ?>
			<?php if ( current_user_can('level_10') ) : ?>
			<div class="left narrow">			
				<h2>Settings</h2>				
				<ul>						
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-general.php">General</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-writing.php">Writing</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-reading.php">Reading</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-discussion.php">Discussion</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-media.php">Media</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-privacy.php">Privacy</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-permalink.php">Permalinks</a></li>
					<li><a href="<?php bloginfo('url') ?>/wp-admin/options-misc.php">Miscellaneous</a></li>
				</ul>
			</div>
			<?php endif ?>
		</div>
	</div> <!-- /login -->	

    <!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	    	<!-- Logout -->
	        <li><a href="<?php echo wp_logout_url(get_permalink()); ?>" rel="nofollow" title="<?php _e('Log out'); ?>"><?php _e('Log out'); ?></a></li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#">Show Dashboard</a>
				<a id="close" style="display: none;" class="close" href="#">Close Panel</a>	
			</li>
	    	<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
<?php 
	// Else if user is not logged in, show login and register forms
	} else {	
?>
	<div id="panel">
		<div class="content clearfix">
			<div class="left border">
				<h1>Welcome to Web-Kreation</h1>
				<h2>Sliding login panel Demo with jQuery</h2>		
				<p class="grey">You can put anything you want in this sliding panel: videos, audio, images, forms... The only limit is your imagination!</p>
				<h2>Download</h2>
				<p class="grey">To download this script go back to <a href="http://web-kreation.com/index.php/articles/implement-a-nice-clean-jquery-sliding-panel-in-wordpress-27" title="Download">article &raquo;</a></p>
			</div>
			<div class="left">
				<!-- Login Form -->
				<form class="clearfix" action="<?php bloginfo('url') ?>/wp-login.php" method="post">
					<h1>Member Login</h1>
					<label class="grey" for="log">Username:</label>
					<input class="field" type="text" name="log" id="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="23" />
					<label class="grey" for="pwd">Password:</label>
					<input class="field" type="password" name="pwd" id="pwd" size="23" />
	            	<label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> Remember me</label>
        			<div class="clear"></div>
					<input type="submit" name="submit" value="Login" class="bt_login" />
					<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
					<a class="lost-pwd" href="<?php bloginfo('url') ?>/wp-login.php?action=lostpassword">Lost your password?</a>
				</form>
			</div>
			<div class="left right">
			<?php if (get_option('users_can_register')) : ?>	
				<!-- Register Form -->
				<form name="registerform" id="registerform" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
					<h1>Not a member yet? Sign Up!</h1>	
					<label class="grey" for="user_login"><?php _e('Username') ?></label>
					<input class="field" type="text" name="user_login" id="user_login" class="input" value="<?php echo attribute_escape(stripslashes($user_login)); ?>" size="20" tabindex="10" />
					<label class="grey" for="user_email"><?php _e('E-mail') ?></label>
					<input class="field" type="text" name="user_email" id="user_email" class="input" value="<?php echo attribute_escape(stripslashes($user_email)); ?>" size="25" tabindex="20" />
					<?php do_action('register_form'); ?>
					<label id="reg_passmail"><?php _e('A password will be e-mailed to you.') ?></label>
					<input type="submit" name="wp-submit" id="wp-submit" value="<?php _e('Register'); ?>" class="bt_register" />
				</form>
			<?php else : ?>
				<h1>Registration is closed</h1>
				<p>Sorry, you are not allowed to register by yourself on this site!</p>
				<p>You must either be invited by one of our team member or request an invitation by email at <b>info {at} yoursite {dot} com</b>.</p>
				
				<!-- Admin, delete text below later when you are done with configuring this panel -->
				<p style="border-top:1px solid #333;border-bottom:1px solid #333;padding:10px 0;margin-top:10px;color:white"><em>Note: If you are the admin and want to display the register form here, log in to your dashboard, and go to <b>Settings</b> > <b>General</b> and click "Anyone can register".</em></p>
			<?php endif ?>			
			</div>
		</div>
	</div> <!-- /login -->	

    <!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	    	<!-- Login / Register -->
			<li id="toggle">
				<a id="open" class="open" href="#">Log In | Register</a>
				<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
			</li>
	    	<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->			
<?php } ?>	
</div> <!--END panel -->	
<!-- Begin #mainWrapper -->
<div id="mainWrapper">
	<!-- Begin #menu -->
	<div id="menu-top"></div>
	<!-- Begin #wrapper -->
	<div id="wrapper">
		<!-- Begin #header -->
		<div id="header">
			<!-- Begin #logo -->
			
			<div id="logo-txt"><a href="<?php bloginfo('url'); ?>/"><p>Druzabne igre </p></a></div>
			<!-- End #logo -->
			<!-- Begin #topMenu -->
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_id' => 'topMenu', 'container_class' => 'ddsmoothmenu', 'fallback_cb'=>'primarymenu') );?>
			<!-- End #topMenu -->
			<!-- Begin #topSearch -->
			<div id="topSearch">
				<form id="searchform" action="" method="get">
					<input type="text" id="s" name="s" value="" />
				</form>
			</div>
			<!-- End #topSearch -->
			<!-- BEGIN TOP SOCIAL LINKS -->
			<div id="topSocial">
				<ul>
					<?php if(get_option('journal_twitter_user')!=""){ ?>
					<li><a href="http://www.twitter.com/<?php echo get_option('journal_twitter_user'); ?>" class="twitter <?php if(get_option('journal_latest_tweet')!="no"):?>tip<?php endif?>" title="Follow Us on Twitter!"><img src="<?php bloginfo('template_directory'); ?>/images/ico_twitter.png" alt="Follow Us on Twitter!" /></a></li>
					<?php }?>
					<?php if(get_option('journal_facebook_link')!=""){ ?>
					<li><a href="<?php echo get_option('journal_facebook_link'); ?>" class="facebook" title="Join Us on Facebook!"><img src="<?php bloginfo('template_directory'); ?>/images/ico_facebook.png" alt="Join Us on Facebook!" /></a></li>
					<?php }?>
					<li><a href="<?php bloginfo('rss2_url'); ?>" title="RSS" class="rss"><img src="<?php bloginfo('template_directory'); ?>/images/ico_rss.png" alt="Subcribe to Our RSS Feed" /></a></li>
				</ul>
			</div>	
			
			<!-- END TOP SOCIAL LINKS -->
			
		</div>
		<!-- End #header -->
		<!-- Begin #content -->
		<div id="content">
