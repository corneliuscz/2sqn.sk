<!DOCTYPE html>
<!--[if IE 8]> <html class="no-js lt-ie9" lang="sk"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="sk"> <!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo $app->config('server_url'); ?>assets/css/normalize.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="<?php echo $app->config('server_url'); ?>assets/css/app.css" rel="stylesheet" type="text/css" media="all">

    <script>window.grunticon=function(e){if(e&&3===e.length){var t=window,n=!!t.document.createElementNS&&!!t.document.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect&&!!document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image","1.1"),A=function(A){var o=t.document.createElement("link"),r=t.document.getElementsByTagName("script")[0];o.rel="stylesheet",o.href=e[A&&n?0:A?1:2],r.parentNode.insertBefore(o,r)},o=new t.Image;o.onerror=function(){A(!1)},o.onload=function(){A(1===o.width&&1===o.height)},o.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="}};
        grunticon( [ "<?php echo $app->config('server_url'); ?>assets/css/icons.data.svg.css", "<?php echo $app->config('server_url'); ?>assets/css/icons.data.png.css", "<?php echo $app->config('server_url'); ?>assets/css/icons.fallback.css" ] );</script>
    <noscript><link href="<?php echo $app->config('server_url'); ?>assets/css/icons.fallback.css" rel="stylesheet"></noscript>

    <meta name="keywords" content="lietadlá, letectvo, L-39, albatros, 2.letka, 2nd squadron, výcviková letka, training squadron, slovak air force, aircraft, airplanes, aviation">
    <meta name="description" lang="sk" content="Stránka pre priaznivcov vojenského letectva a 2. letky Sliač">
    <meta name="description" lang="en" content="Webpage for fans of 2nd Squadron of TFW Sliač and military aviation">
    <meta name="author" content="2nd Squadron Sliač">
    <meta name="copyright" content="2nd Squadron Sliač">
    <meta name="category" content="aviation"/>
    <meta name="robots" content="index, follow">

    <meta property="og:url" content="http://www.2sqn.sk">
    <meta property="og:title" content="2nd SQN TFW Sliač">
    <meta property="og:site_name" content="2nd SQN TFW Sliač">
    <meta property="og:description" content="Stránka pre priaznivcov vojenského letectva a 2. letky Sliač">
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo $app->config('server_url'); ?>assets/img/favicons/facebook-300x300.png">

    <title>2nd SQN Sliač</title>

    <!-- favicons -->
    <link rel="shortcut icon" href="<?php echo $app->config('server_url'); ?>assets/img/favicons/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $app->config('server_url'); ?>assets/img/favicons/apple-touch-icon.png">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo $app->config('server_url'); ?>assets/img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php echo $app->config('server_url'); ?>assets/img/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $app->config('server_url'); ?>assets/img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?php echo $app->config('server_url'); ?>assets/img/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $app->config('server_url'); ?>assets/img/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo $app->config('server_url'); ?>assets/img/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $app->config('server_url'); ?>assets/img/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo $app->config('server_url'); ?>assets/img/favicons/apple-touch-icon-152x152.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="<?php echo $app->config('server_url'); ?>assets/img/favicons/apple-touch-icon-144x144.png">

    <!-- custom scripts -->
    <script src="<?php echo $app->config('server_url'); ?>assets/js/vendor/custom.modernizr.min.js"></script>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/sk_SK/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- IE Fix for HTML5 Tags -->
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="<?php echo $app->config('server_url'); ?>assets/js/respond.min.js"></script>
    <![endif]-->

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-43580467-1', '2sqn.sk');
        ga('send', 'pageview');
    </script>

</head>
<body>
