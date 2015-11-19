<?php
defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

$doc->setGenerator('');


// Getting params from template
$params = $app->getTemplate(true)->params;
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
    <head>
        <meta charset="utf-8" />                    
		<meta name="viewport" content="width=device-width" />
		
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" />       
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" />              
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/app.css" />        
       
		<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery/jquery-1.10.2.min.js"></script>  
        <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/cookiesplease.min.js"></script>
        		
        <link rel="shortcut icon" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/favicon.ico">
		
		<jdoc:include type="head" />
        	
</head>
<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
	echo ($this->direction == 'rtl' ? ' rtl' : '');
?>">
    
    
    
    <jdoc:include type="modules" name="header" style="none" />
    <jdoc:include type="modules" name="nav" style="none" />        
    <jdoc:include type="modules" name="beforeComponent" style="none" />       
    <jdoc:include type="message" />        
    <jdoc:include type="component" /> 	
    <jdoc:include type="modules" name="inComponent" style="none" /> 
    <jdoc:include type="modules" name="afterComponent" style="none" />
    <jdoc:include type="modules" name="footer" style="none" />   
    
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/global.js"></script>
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>