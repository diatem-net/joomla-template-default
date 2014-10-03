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

// Create shortcuts to some parameters.
$params = $this->item->params;
$images = json_decode($this->item->images);
$urls = json_decode($this->item->urls);
$canEdit = $this->item->params->get('access-edit');
$user = JFactory::getUser();

function replaceText($string) {


    $string = str_replace(array("\r\n", "\n", "\r", "\t"), "", $string);

    $string = preg_replace('#\[ligne\].?\[image\](.*?)\[\/image\].?\[texte\](.*?)\[\/texte\].?\[\/ligne\]#is', '<div class="ligne"><div class="colImg">$1</div><div class="colTxt"><div class="position">$2</div></div><div class="clear"></div></div>', $string);
    $string = preg_replace('#\[ligne\].?\[texte\](.*?)\[\/texte\].?\[image\](.*?)\[\/image\].?\[\/ligne\]#is', '<div class="ligne left"><div class="colImg">$2</div><div class="colTxt"><div class="position">$1</div></div><div class="clear"></div></div>', $string);
   
    $string = preg_replace('#\[ligne\].?\[image\](.*?)\[\/image\].?\[texte bleu\](.*?)\[\/texte\].?\[\/ligne\]#is', '<div class="ligne"><div class="colImg">$1</div><div class="colTxt bleu"><div class="position">$2</div></div><div class="clear"></div></div>', $string);
    $string = preg_replace('#\[ligne\].?\[texte bleu\](.*?)\[\/texte\].?\[image\](.*?)\[\/image\].?\[\/ligne\]#is', '<div class="ligne left"><div class="colImg">$2</div><div class="colTxt bleu"><div class="position">$1</div></div><div class="clear"></div></div>', $string);
    
    $string = preg_replace('#\[ligne\].?\[image\](.*?)\[\/image\].?\[texte orange\](.*?)\[\/texte\].?\[\/ligne\]#is', '<div class="ligne"><div class="colImg">$1</div><div class="colTxt orange"><div class="position">$2</div></div><div class="clear"></div></div>', $string);
    $string = preg_replace('#\[ligne\].?\[texte orange\](.*?)\[\/texte\].?\[image\](.*?)\[\/image\].?\[\/ligne\]#is', '<div class="ligne left"><div class="colImg">$2</div><div class="colTxt orange"><div class="position">$1</div></div><div class="clear"></div></div>', $string);
    
    $string = preg_replace('#\[center\](.*?)\[\/center\]#is', '<div class="colCenter">$1</div>', $string);

    
    
    $string = preg_replace('#\[afficherSuite\]#is', '<button onclick="displayMore(this)" class="displayMoreClose"> '.JText::sprintf('COM_CONTENT_AFFICHER_SUITE').'</button>', $string);
    
    return $string;
}
?>
<div class="item-page<?php echo $this->pageclass_sfx ?>">


        <?php
        if( $this->item->category_alias == 'straslife'){
            echo '<a class="retour" href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)).'">< Retour</a>';}
        ?> 



<?php
if (!empty($this->item->pagination) AND $this->item->pagination && !$this->item->paginationposition && $this->item->paginationrelative) {
    echo $this->item->pagination;
}
?>

    <?php
    if ($this->item->category_alias == 'actualites') {
        echo '<a class="retour" href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)) . '">< Retour</a>';
    }
    ?>   

    <?php if ($params->get('show_title')) : ?>          
        <h1><?php echo $this->escape($this->item->title); ?></h1>
    <?php endif; ?>

    <?php if ($this->params->get('show_page_heading')) : ?>
        <h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
    <?php endif; ?>



    <?php
    if (!$params->get('show_intro')) :
        echo $this->item->event->afterDisplayTitle;
    endif;
    ?>

    <?php echo $this->item->event->beforeDisplayContent; ?>

    <?php if ($params->get('access-view')): ?>
        <?php if (isset($images->image_fulltext) and !empty($images->image_fulltext)) : ?>
            <?php $imgfloat = (empty($images->float_fulltext)) ? $params->get('float_fulltext') : $images->float_fulltext; ?>
            <div class="img-fulltext <?php echo htmlspecialchars($imgfloat); ?>">
                <div class="itemImg">
                    <img
            <?php
            if ($images->image_fulltext_caption):
                echo 'class="caption"' . ' title="' . htmlspecialchars($images->image_fulltext_caption) . '"';
            endif;
            ?>
                        src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>"/>
                </div>
            </div>    
                <?php endif; ?>




    <?php
    if (!empty($this->item->pagination) AND $this->item->pagination AND !$this->item->paginationposition AND !$this->item->paginationrelative):
        echo $this->item->pagination;
    endif;
    ?>

        <div class="itemText">
        <?php echo replaceText($this->item->text); ?>
        </div>


            <?php
            if (!empty($this->item->pagination) AND $this->item->pagination AND $this->item->paginationposition AND !$this->item->paginationrelative):
                echo $this->item->pagination;
                ?>
        <?php endif; ?>

        <?php if (isset($urls) AND ((!empty($urls->urls_position) AND ($urls->urls_position == '1')) OR ( $params->get('urls_position') == '1') )): ?>
            <?php echo $this->loadTemplate('links'); ?>
        <?php endif; ?>
        <?php //optional teaser intro text for guests ?>
    <?php elseif ($params->get('show_noauth') == true and $user->get('guest')) : ?>
        <?php echo $this->item->introtext; ?>
        <?php //Optional link to let them register to see the whole article. ?>
        <?php
        if ($params->get('show_readmore') && $this->item->fulltext != null) :
            $link1 = JRoute::_('index.php?option=com_users&view=login');
            $link = new JURI($link1);
            ?>
            <p class="readmore">
                <a href="<?php echo $link; ?>">
                    <?php $attribs = json_decode($this->item->attribs); ?>
                    <?php
                    if ($attribs->alternative_readmore == null) :
                        echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
                    elseif ($readmore = $this->item->alternative_readmore) :
                        echo $readmore;
                        if ($params->get('show_readmore_title', 0) != 0) :
                            echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
                        endif;
                    elseif ($params->get('show_readmore_title', 0) == 0) :
                        echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
                    else :
                        echo JText::_('COM_CONTENT_READ_MORE');
                        echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
                    endif;
                    ?></a>
            </p>
        <?php endif; ?>
    <?php endif; ?>
    <?php
    if (!empty($this->item->pagination) AND $this->item->pagination AND $this->item->paginationposition AND $this->item->paginationrelative):
        echo $this->item->pagination;
        ?>
    <?php endif; ?>

<?php echo $this->item->event->afterDisplayContent; ?>
</div>
