<?php
/**
 * The theme header
 * 
 * @package bootstrap-basic
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>     <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>     <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width">

		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<!--wordpress head-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<!--[if lt IE 8]>
			<p class="ancient-browser-alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a>.</p>
		<![endif]-->
		
		
    <!-- Navbar: Updated 2017-08-29 -->
    <nav class="navbar navbar-default" id="lmc-banner">

      <div class="container-fluid">
        <div class="row" style="margin-top: 1em; margin-bottom: 0.5em">
          <div class="col-sm-4">
            <a href="http://resources.library.lemoyne.edu/library"><img src="http://lemoynelibrary.org/bootstrap/lemoyne/assets/images/banner/falcone-logo.svg" alt="Noreen Reale Falcone Library"></a>
          </div>
          <div class="col-sm-3 col-sm-offset-5 hidden-xs">
            <a href="http://lemoyne.edu"><img src="http://lemoynelibrary.org/bootstrap/lemoyne/assets/images/banner/lemoyne-logo.svg" alt="Le Moyne College"></a>
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://resources.library.lemoyne.edu/library"><i class="fa fa-home" aria-hidden="true"></i></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="dropdown"> 
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Find Books <b class="caret"></b></a> 
              <ul class="dropdown-menu"> 
                <li><a href="http://library.lemoyne.edu/search">Catalog</a></li>
                <li><a href="http://resources.library.lemoyne.edu/library-services/circulation-policies">Circulation Policies</a></li>
                <li><a href="http://resources.library.lemoyne.edu/library-services/interlibrary-loan/connect-ny">Connect NY</a></li>
                <li><a href="http://resources.library.lemoyne.edu/e-books">Find E-books</a></li>
                <li><a href="http://resources.library.lemoyne.edu/library-services/interlibrary-loan">Interlibrary Loan</a></li>
                <li><a href="http://library.lemoyne.edu/screens/newbooks.html">New Acquisitions</a></li>
                <li><a href="http://goo.gl/forms/ZT9xXRaS9X" target="_blank">Suggest a Purchase</a></li>
                <li class="divider"></li> 
                <li><a href="http://resources.library.lemoyne.edu/find-books">More...</a></li> 
              </ul> 
            </li> 
            <li class="dropdown"> 
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Find Articles <b class="caret"></b></a> 
              <ul class="dropdown-menu"> 
                <li><a href="http://resources.library.lemoyne.edu/databases">A-Z Databases</a></li> 
                <li><a href="http://resources.library.lemoyne.edu/library-services/interlibrary-loan">Interlibrary Loan</a></li>
                <li><a href="http://wp8kk7mz7x.search.serialssolutions.com/">Journal Finder</a></li>
                <li class="divider"></li> 
                <li><a href="http://resources.library.lemoyne.edu/find-articles">More...</a></li> 
              </ul> 
            </li> 
            <li class="dropdown"> 
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Research Guides <b class="caret"></b></a> 
              <ul class="dropdown-menu"> 
                <li><a href="http://resources.library.lemoyne.edu/guides/subjects">Subject Guides</a></li>
                <li><a href="http://resources.library.lemoyne.edu/courses">Course Guides</a></li>
                <li><a href="http://resources.library.lemoyne.edu/faculty-support">Faculty Support</a></li>
                <li><a href="http://resources.library.lemoyne.edu/faculty-support/copyright">Copyright Essentials</a></li>
                <li><a href="http://resources.library.lemoyne.edu/citing-sources">Citing Sources</a></li>
                <li><a href="http://resources.library.lemoyne.edu/mendeley">Mendeley</a></li>
                <li><a href="http://resources.library.lemoyne.edu/refworks">RefWorks</a></li>
                <li><a href="http://resources.library.lemoyne.edu/instruction">Library Instruction</a></li>
                <li class="divider"></li> 
                <li><a href="http://resources.library.lemoyne.edu/guides">More...</a></li> 
              </ul> 
            </li> 
            <li class="dropdown"> 
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Course Reserves <b class="caret"></b></a> 
              <ul class="dropdown-menu"> 
                <li><a href="http://resources.library.lemoyne.edu/library-services/course-reserves/">Overview</a></li>
                <li><a href="http://resources.library.lemoyne.edu/library-services/course-reserves/student">Students</a></li>
                <li><a href="http://resources.library.lemoyne.edu/library-services/course-reserves/faculty">Faculty</a></li>
                <li><a href="http://resources.library.lemoyne.edu/library-services/anatomy-models">Anatomy Models</a></li>
              </ul> 
            </li> 
            <li class="dropdown"> 
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us <b class="caret"></b></a> 
              <ul class="dropdown-menu"> 
                <li><a href="http://resources.library.lemoyne.edu/contact">Contact Us</a></li>
                <li><a href="http://resources.library.lemoyne.edu/library/floor-plans">Floor Plans</a></li>
                <li><a href="http://resources.library.lemoyne.edu/library/hours">Hours of Service</a></li>
                <li><a href="http://resources.library.lemoyne.edu/library-services">Library Services</a></li>
                <li><a href="http://lemoynelibrary.org/news/">News and Announcements</a></li>
                <li><a href="http://resources.library.lemoyne.edu/library-services/room-reservation">Reserve a Room</a></li>
                <li><a href="http://resources.library.lemoyne.edu/library/visit">Visit the Library</a></li>
                <li><a href="http://resources.library.lemoyne.edu/wilson-gallery">Wilson Gallery</a></li>
                <li><a href="http://resources.library.lemoyne.edu/arts/de-ropp-polish-art-collection">de Ropp Polish Art Collection</a></li>
                <li class="divider"></li> 
                <li><a href="http://resources.library.lemoyne.edu/library/about">More...</a></li> 
              </ul> 
            </li> 
            <li class="dropdown"> 
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ask Us <b class="caret"></b></a> 
              <ul class="dropdown-menu"> 
                <li><a href="http://resources.library.lemoyne.edu/askus/by-chat">Ask Us by Chat</a>
                <li><a href="http://resources.library.lemoyne.edu/askus/by-email">Ask Us by Email</a>
                <li><a href="http://resources.library.lemoyne.edu/askus/by-text">Ask Us by Text</a>
                <li><a href="http://resources.library.lemoyne.edu/askus/by-phone">Ask Us by Phone</a>
                <li><a href="http://resources.library.lemoyne.edu/askus/in-person">Ask Us in Person</a>
                <li><a href="http://ask.library.lemoyne.edu/">Ask Us FAQ</a>
              </ul> 
            </li> 
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->

    </nav>

    <ol id="s-lib-bc-list" class="breadcrumb">
      <li id="s-lib-bc-customer">
        <a title="Noreen Reale Falcone Library" href="http://resources.library.lemoyne.edu/library">Noreen Reale Falcone Library</a>
      </li>
      <li id="s-lib-bc-group">
        <a title="About the Library" href="http://resources.library.lemoyne.edu/library/about">About the Library</a>
      </li>
      <li id="s-lib-bc-page" class="active">
        <a title="Journal Finder" href="<?php echo esc_url(home_url('/')); ?>">News &amp; Announcements</a>
      </li>
    </ol>
		
		
		
		<div class="container page-container">
			<?php do_action('before'); ?> 
			<header role="banner">
				<div class="row row-with-vspace site-branding">

					<div class="col-md-12 page-header-top-right">
						<div class="sr-only">
							<a href="#content" title="<?php esc_attr_e('Skip to content', 'bootstrap-basic'); ?>"><?php _e('Skip to content', 'bootstrap-basic'); ?></a>
						</div>
						<?php if (is_active_sidebar('header-right')) { ?> 
						<div class="pull-right">
							<?php dynamic_sidebar('header-right'); ?> 
						</div>
						<div class="clearfix"></div>
						<?php } // endif; ?> 
					</div>
				</div><!--.site-branding-->
				
			</header>
			
			
			<div id="content" class="row row-with-vspace site-content">
