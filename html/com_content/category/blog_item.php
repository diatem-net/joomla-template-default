<?php
defined('_JEXEC') or die;

$params = &$this->item->params;
$images = json_decode($this->item->images);
$canEdit	= $this->item->params->get('access-edit');
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.framework');


	if ($params->get('access-view')) :
		$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
	else :
		$menu = JFactory::getApplication()->getMenu();
		$active = $menu->getActive();
		$itemId = $active->id;
		$link1 = JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId);
		$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
		$link = new JURI($link1);
		$link->setVar('return', base64_encode(urlencode($returnURL)));
	endif;


echo $this->item->event->afterDisplayTitle; 
echo $this->item->event->beforeDisplayContent; ?>

    
<?php  if (isset($images->image_intro) and !empty($images->image_intro)) : ?>
	<?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
	<div class="colImg"><a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>"><img
	<?php if ($images->image_intro_caption):
			echo 'class="caption"'.' title="' .htmlspecialchars($images->image_intro_caption) .'"';
	endif; ?>
	src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"/></a></div>
<?php endif; ?>

<div class="colTxt">
 <div class="position">   
     
     
     
    <div class="published"><?php echo JText::sprintf(JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC4'))); ?></div> 
    <h2><a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>" title="<?php echo $this->escape($this->item->title); ?>" ><?php echo $this->escape($this->item->title); ?></a></h2>
   
    <?php echo $this->item->introtext; ?>
    
     <p class="readmore"><a class="savoirPlus" href="<?php echo $link; ?>"><?php echo JText::_('COM_CONTENT_READ_MORE');?></a></p>


</div>
</div>
<?php echo $this->item->event->afterDisplayContent; ?>
