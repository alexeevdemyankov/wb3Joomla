<div id="wb3_form_exec"></div>
<form id="wb3_modal_form" class="wb3_modal_form">
    <div class="row">
        <?php foreach ($this->currentScheme->schemeFields as $field) { ?>
            <?php if ($field->wb3_key == 1): continue;endif; ?>
            <?php if ($this->sysVars['wb3_field'] && $this->sysVars['wb3_field'] <> $field->wb3_id): continue;endif; ?>
            <div class="col-12"> <?php echo InputHelper::makeInput($field, $this->currentScheme->schemeData, 'edit'); ?></div>
        <?php } ?>
    </div>
    <div class="row">
        <div class="col-12">
            <span class="btn btn-sm btn-success wb3_modalbtn" id="wb3_save_exec_btn"><?php echo JText::_('COM_WEBBASE_BTN_EDIT'); ?></span>
            <span class="btn btn-sm btn-warning wb3_modalbtn" id="wb3_cancel_btn" data-dismiss="modal"><?php echo JText::_('COM_WEBBASE_BTN_CANCEL'); ?></span>
        </div>
    </div>
</form>

<script>
    <?php
    $sucBtnArray = $this->sysVars;
    $sucBtnArray['format'] = 'raw';
    $sucBtnArray['view'] = 'wb3_exec';
    $sucBtnArray['action'] = 'edit';
    ?>
    jQuery('#wb3_save_exec_btn').click(function () {
        PostData('<?php echo SysHelper::arrayToUrl('index.php', $sucBtnArray); ?>', 'wb3_form_exec', 'wb3_modal_form', 1);
    });
</script>
