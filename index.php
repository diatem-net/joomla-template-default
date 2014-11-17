<?php
defined('_JEXEC') or die;
$index = false;

$lang = JFactory::getLanguage();
$app = JFactory::getApplication();
$menu = $app->getMenu();

if ($menu->getActive() != '' && $menu->getActive() == $menu->getDefault($lang->getTag())) {
    $index = true;
}

?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction ?>">
    <head>
        <meta charset="utf-8" />
        <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery/jquery-1.10.2.min.js"></script>
        <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery/jquery-ui.min.js"></script>
        
        <jdoc:include type="head" />

        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/style.css" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" />


        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery/jquery-ui.min.css"  />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/dStyle_v1.css" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/global.css" />        
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/responsive.css" />

        <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/cookiesplease.min.js"></script>
        
        <link rel="shortcut icon" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/favicon.ico">

        <meta name="viewport" content="width=device-width,initial-scale=0.7" />	
</head>
<body class="<?php echo $this->language; ?>">
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    
    
    <div id="logo" ><a href="/"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/LOGO" border="0" /></a></div>    
    
    
    <jdoc:include type="modules" name="header" />
    <jdoc:include type="modules" name="nav" />        
    <jdoc:include type="modules" name="beforeComponent" />       
    <jdoc:include type="message" />        
    <jdoc:include type="component" /> 	
    <jdoc:include type="modules" name="inComponent" /> 
    <jdoc:include type="modules" name="afterComponent" />
    <jdoc:include type="modules" name="footer" />   
    
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/global.js"></script>
</body>
</html>