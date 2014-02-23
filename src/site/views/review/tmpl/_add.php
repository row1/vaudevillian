<div id="vv-review-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="vv-new-review-modal" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><?php echo JText::_('COM_VAUDEVILLIAN_ADD_REVIEW'); ?></h3>
  </div>
  <div class="modal-body">
	<div class="row-fluid">
		<form id="vv-review-form">
			<input class="span8" type="text" name="title" placeholder="<?php echo JText::_('COM_VAUDEVILLIAN_TITLE'); ?>" />
			<input class="span4" type="text" name="alias" placeholder="<?php echo JText::_('COM_VAUDEVILLIAN_ALIAS'); ?>" />
	      	<textarea class="span12" placeholder="<?php echo JText::_('COM_VAUDEVILLIAN_SUMMARY'); ?>" name="fulltext" rows="10"></textarea>
		    <input type="hidden" name="user_id" value="<?php echo $this->user->id; ?>" />
		    <input type="hidden" name="view" value="review" />
		    <input type="hidden" name="model" value="review" />
		    <input type="hidden" name="item" value="review" />
		    <input type="hidden" name="table" value="review" />
		</form>
	</div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo JText::_('COM_VAUDEVILLIAN_CLOSE'); ?></button>
    <button class="btn btn-primary" onclick="addReview()"><?php echo JText::_('COM_VAUDEVILLIAN_ADD'); ?></button>
  </div>
</div>