<?php
defined('_JEXEC') or die;

$index = false;
$search = false;

$lang = JFactory::getLanguage();
$app = JFactory::getApplication();
$menu = $app->getMenu();

if ($menu->getActive() != '' && $menu->getActive() == $menu->getDefault($lang->getTag())) {
    $index = true;
}

if (isset($_GET['view']) && $_GET['view'] == 'search') {
    $search = TRUE;
}

$config = JFactory::getConfig();
$doc = JFactory::getDocument();

$keywords = $doc->getMetaData("keywords");
$description = $doc->getMetaData("description");
$title = $config->getValue('config.sitename');
$urlSite = $doc->base;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction ?>">
    <head>
        <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery/jquery-ui.min.js"></script>
        
        <jdoc:include type="head" />

        <meta property="og:url" content="<?php echo $urlSite; ?>" />
        <meta property="og:site_name" content="<?php echo $title; ?>" />
        <meta property="og:image" content="<?php echo $urlSite ?>templates/<?php echo $this->template ?>/images/logo_200x200_facebook.jpg" />
        <meta property="og:title" content="<?php echo $title; ?>" />

        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/style.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />


        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/dStyle_v1.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/global.css" type="text/css" />
        <?php if ($index) { echo '<link rel="stylesheet" href="'.$this->baseurl.'/templates/'.$this->template.'/css/home.css" type="text/css" />'; }
        else{ echo '<link rel="stylesheet" href="'.$this->baseurl.'/templates/'.$this->template.'/css/page.css" type="text/css" />'; } ?>
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/responsive.css" type="text/css" />
        

        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery/jquery-ui.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/font-awesome.min.css">

        <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/cookiesplease.min.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/favicon.ico">

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
    <jdoc:include type="modules" name="menu" />        
    <jdoc:include type="modules" name="beforeComponent" />                    
    <jdoc:include type="message" />        
    <jdoc:include type="component" /> 	
    <jdoc:include type="modules" name="afterComponent" />
    <jdoc:include type="modules" name="footer" />   
    
    <h1>test</h1>
    
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/global.js"></script>
</body>
</html>