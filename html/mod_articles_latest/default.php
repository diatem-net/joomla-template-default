<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_articles_latest
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
// no direct access
defined('_JEXEC') or die;
$document = JFactory::getDocument();
$document->addScript('' . $document->baseurl . '/templates/' . $document->template . '/js/jcarousel.js');
?>



    <?php
    foreach ($list as $item) :
    $images = json_decode($item->images);	
    ?>

    <div class="latestnews<?php echo $moduleclass_sfx; ?>" style="background:url(<?php echo $images->image_intro; ?>); background-repeat: no-repeat; background-size:cover;">
        <div class="block" >  
            <div class="contenuNews">
                <h2>Dernière actualité <?php echo $moduleclass_sfx; ?></h2>





                <h3><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></h3>
                <a href="<?php echo $item->link; ?>"><?php echo $item->introtext; ?></a>
                <a class="savoirPlus" title="<?php echo JText::_('COM_CONTENT_READ_MORE'); ?>" href="<?php echo $item->link; ?>"><?php echo JText::_('COM_CONTENT_READ_MORE'); ?></a> 

                <a class="aCat" title="Voir toutes les actualités" href="">Voir toutes les actualités</a>


            </div>
        </div>
    </div>
    <?php
endforeach;
?> 