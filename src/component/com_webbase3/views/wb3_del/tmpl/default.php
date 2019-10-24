<div id="wb3_form_exec"></div>
<form id="wb3_modal_form" class="wb3_modal_form">
    <div class="row">
        <div class="col-12">
            <p class="alert alert-danger"><?php echo JText::_('COM_WEBBASE_TEXT_DEL') . ' ' . $this->sysVars['wb3_checked']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <span class="btn btn-sm btn-danger wb3_modalbtn" id="wb3_del_exec_btn"><?php echo JText::_('COM_WEBBASE_BTN_DEL'); ?></span>
            <span class="btn btn-sm btn-warning wb3_modalbtn" id="wb3_cancel_btn" data-dismiss="modal"><?php echo JText::_('COM_WEBBASE_BTN_CANCEL'); ?></span>
        </div>
    </div>
</form>


<script>
    <?php
    $delBtnArray = $this->sysVars;
    $delBtnArray['format'] = 'raw';
    $delBtnArray['view'] = 'wb3_exec';
    $delBtnArray['action'] = 'delete';
    ?>
    jQuery('#wb3_del_exec_btn').click(function () {
        PostData('<?php echo SysHelper::arrayToUrl('index.php', $delBtnArray); ?>', 'wb3_form_exec', 'wb3_modal_form', 1);
    });
</script>
