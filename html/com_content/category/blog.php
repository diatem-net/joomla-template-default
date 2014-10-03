<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
?>




<div class="blog<?php echo $this->pageclass_sfx; ?>">


 
        <div class="categoryDesc"> 
            <h1><?php echo $this->category->title;?></h1>
		<?php if ($this->category->description) : ?>          
                <?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
		<?php endif; ?>
        </div>     
    
    


 <?php if (($this->params->def('show_pagination', 1) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
        <div class="pagination">
            <?php echo $this->pagination->getPagesLinks(); ?>
            <div class="clear"></div>
        </div>
<?php endif; ?>   
    
    
    
    <?php
        $leadingcount = 0;
        $introcount = (count($this->intro_items));
        $counter = 0;
    ?>
    <?php if (!empty($this->intro_items)) : ?>

        <?php foreach ($this->intro_items as $key => &$item) : ?>
            <?php
            $key = ($key - $leadingcount) + 1;
            $rowcount = ( ((int) $key - 1) % (int) $this->columns) + 1;
            $row = $counter / $this->columns;

            ?>
            
    <div class="items-row <?php echo 'row-' . $row;
            if ($counter % 2) {
                echo ' impaire';
            } ?>">
                  
                
                <?php
                $this->item = &$item;
                echo $this->loadTemplate('item');
                ?>
        <div class="clearSize"></div>
               </div>
            <?php $counter++; ?>
          
               
        <?php endforeach; ?>


    <?php endif; ?>

    
<?php if (($this->params->def('show_pagination', 1) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
        <div class="pagination">
        <?php echo $this->pagination->getPagesLinks(); ?>
        <div class="clear"></div>
        </div>
<?php endif; ?>

</div>
