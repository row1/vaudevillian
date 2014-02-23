<?php defined( '_JEXEC' ) or die( 'Restricted access' );?>
<div class="row">
	<div class="span12">
	      <?php if(1 == 1 ): ?>
	        <a href="#vv-review-modal" role="button" data-toggle="modal" class="btn pull-right"><i class="icon icon-star"></i> <?php echo JText::_('COM_VAUDEVILLIAN_ADD_REVIEW'); ?></a>
	        <?php echo $this->_addReviewView->render(); ?>
	      <?php endif; ?>
	</div>
</div>
<div class="row">
	<div class="span12">
	      <h2><?php echo JText::_('COM_VAUDEVILLIAN_REVIEWS'); ?></h2>
	      LIST TEMPLATE		
	</div>
</div>		
