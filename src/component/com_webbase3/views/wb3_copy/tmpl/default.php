<div id="wb3_form_exec"></div>
<form id="wb3_modal_form" class="wb3_modal_form">
    <div class="row">
        <div class="col-12">
            <p class="alert alert-warning"><?php echo JText::_('COM_WEBBASE_TEXT_COPY') . ' ' . $this->sysVars['wb3_checked']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <span class="btn btn-sm btn-success wb3_modalbtn" id="wb3_copy_exec_btn"><?php echo JText::_('COM_WEBBASE_BTN_COPY'); ?></span>
            <span class="btn btn-sm btn-warning wb3_modalbtn" id="wb3_cancel_btn" data-dismiss="modal"><?php echo JText::_('COM_WEBBASE_BTN_CANCEL'); ?></span>
        </div>
    </div>
</form>


<script>
    <?php
    $cpBtnArray = $this->sysVars;
    $cpBtnArray['format'] = 'raw';
    $cpBtnArray['view'] = 'wb3_exec';
    $cpBtnArray['action'] = 'copy';
    ?>
    jQuery('#wb3_copy_exec_btn').click(function () {
        PostData('<?php echo SysHelper::arrayToUrl('index.php', $cpBtnArray); ?>', 'wb3_form_exec', 'wb3_modal_form', 1);
    });
</script>

