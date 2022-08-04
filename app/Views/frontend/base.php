<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Tivo is a HTML landing page template built with Bootstrap to help you crate engaging presentations for SaaS apps and convert visitors into users.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Tivo - SaaS App HTML Landing Page Template</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="<?=base_url('assets/css/bootstrap.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/fontawesome-all.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/swiper.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/magnific-popup.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/styles.css')?>" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"/>
	
	<!-- Favicon  -->
    <link rel="icon" href="<?=base_url('assets/')?>/images/favicon.png">

    <?=$this->renderSection('css')?>

</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

<?=$this->include('frontend/navbar')?>

<?=$this->renderSection('content')?>

    <!-- Scripts -->
    <script src="<?=base_url('assets/js/jquery.min.js')?>"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="<?=base_url('assets/js/popper.min.js')?>"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script> <!-- Bootstrap framework -->
    <script src="<?=base_url('assets')?>/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="<?=base_url('assets')?>/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="<?=base_url('assets')?>/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="<?=base_url('assets')?>/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="<?=base_url('assets')?>/js/scripts.js"></script> <!-- Custom scripts -->

    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>

    <?=$this->renderSection('js')?>
</body>
</html>