<style>
    .wb3_viewport_header {
        display: table-cell;
        height: 52px;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 5px;
        padding-right: 5px;
        vertical-align: middle;
    }

    .wb3_ordering {
        cursor: pointer;
    }

    .wb3_ordering i {
        width: 12px;
    }

    .wb3_ordering:hover {
        text-decoration: underline;
    }

    #wb3_search_line, #wb3_search_field {
        float: left;
        margin-right: 5px;
    }

    .table-hover tbody tr:hover td {
        background: #CCCCFF;
    }

</style>


<div class="row">
    <!---Scheme title--->
    <div class="col-3">
        <p class="wb3_viewport_header">
            <span class="btn btn-warning btn-sm" id="wb3_back"><i class="far fa-caret-square-left"></i> <?php echo JText::_('COM_WEBBASE_BTN_BACK') ?></span>
            <span class="btn">
               <i class=" fa-lg <?php echo $this->currentScheme->schemeInfo->wb3_faico; ?>"></i> <?php echo $this->currentScheme->schemeInfo->wb3_name; ?>
                <span class="badge badge-secondary"><?php echo $this->currentScheme->schemeData['count']; ?></span>
           </span>
        </p>
    </div>
    <!---Scheme title--->
    <!---Scheme direction--->
    <div class="col-3">
        <?php if ($this->schemeRights['wb3_w'] == 1) { ?>
            <p class="wb3_viewport_header">
                <span class="btn btn-success btn-sm" id="wb3_add"><i class="far fa-file"></i> <?php echo JText::_('COM_WEBBASE_BTN_ADD') ?></span>
                <span class="btn btn-info btn-sm" id="wb3_edit"><i class="fas fa-edit"></i> <?php echo JText::_('COM_WEBBASE_BTN_EDIT') ?></span>
                <span class="btn btn-warning btn-sm" id="wb3_copy"><i class="far fa-copy"></i> <?php echo JText::_('COM_WEBBASE_BTN_COPY') ?></span>
                <span class="btn btn-danger btn-sm" id="wb3_del"><i class="far fa-trash-alt"></i> <?php echo JText::_('COM_WEBBASE_BTN_DEL') ?></span>
            </p>
        <?php } ?>
    </div>
    <!---Scheme direction--->

    <!---Scheme plugins--->
    <div class="col-1">
        <div class="wb3_viewport_header">
            <?php if ($this->currentScheme->schemePlugins) { ?>
                <div class="dropdown">
                    <button class="btn btn-warning btn-sm dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                        <i class="fas fa-puzzle-piece"></i> <?php echo JText::_('COM_WEBBASE_BTN_PLUGIN') ?>
                    </button>
                    <div class="dropdown-menu">
                        <?php echo InputHelper::makeSchemePlugins($this->currentScheme->schemePlugins, $this->sysVars); ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!---Scheme search--->
    <div class="col-3">
        <div class="wb3_viewport_header">
            <?php if ($this->currentScheme->schemeSearchFields) { ?>
                <select class="form-control-sm" id="wb3_search_field">
                    <?php foreach ($this->currentScheme->schemeSearchFields as $schemeSearchFields) { ?>
                        <option value="<?php echo $schemeSearchFields->wb3_field; ?>" <?php echo ($this->wb3SearchField == $schemeSearchFields->wb3_field) ? 'selected' : null; ?>>
                            <?php echo $schemeSearchFields->wb3_title; ?>
                        </option>
                    <?php } ?>
                </select>
                <input type="text" class="form-control-sm" id="wb3_search_line" value="<?php echo $this->wb3Search; ?>">
                <span class="btn btn-secondary btn-sm" id="wb3_search"><i class="fas fa-search"></i> <?php echo JText::_('COM_WEBBASE_BTN_SEARCH') ?></span>
                <span class="btn btn-secondary btn-sm" id="wb3_search_clear"><i class="fas fa-times"></i> <?php echo JText::_('COM_WEBBASE_BTN_CLEAR') ?></span>
            <?php } ?>
        </div>
    </div>
    <!---Scheme search--->

    <!---Scheme onpage--->
    <div class="col-2">
        <div class="wb3_viewport_header">
            <select class="form-control-sm" name="wb3_on_page" id="wb3_on_page">
                <option value="20" <?php echo (PageHelper::onPage() == 20) ? 'selected' : null; ?> >20 <?php echo JText::_('COM_WEBBASE_ONPAGE') ?></option>
                <option value="50" <?php echo (PageHelper::onPage() == 50) ? 'selected' : null; ?> >50 <?php echo JText::_('COM_WEBBASE_ONPAGE') ?></option>
                <option value="100" <?php echo (PageHelper::onPage() == 100) ? 'selected' : null; ?> >100 <?php echo JText::_('COM_WEBBASE_ONPAGE') ?></option>
            </select>
        </div>
    </div>
    <!---Scheme onpage--->
</div>

<?php if ($this->pagination->pages) { ?>
    <div class="row">
        <div class="col-12">
            <?php echo $this->pagination->pages; ?>
        </div>
    </div>
<?php } ?>

<table class="table table-sm table-hover table-striped">
    <tr>
        <th width="20px" id="wb3_checkall">
            <input type="checkbox" id="select-all">
        </th>
        <?php if ($this->currentScheme->schemeLinks) { ?>
            <th width="80px"><?php echo JText::_('COM_WEBBASE_LINKS_LABEL') ?></th>
        <?php } ?>
        <?php foreach ($this->currentScheme->schemeFields as $schemeField) { ?>
            <th>
                <span class="wb3_ordering" data-field="<?php echo $schemeField->wb3_field; ?>">
                    <?php echo $schemeField->wb3_title; ?>
                    <?php if ($this->wb3Order == $schemeField->wb3_field) { ?>
                        <i class="fas fa-<?php echo ($this->wb3Direction == 'DESC') ? 'sort-down' : 'sort-up'; ?>"></i>
                    <?php } ?>
                </span>
            </th>
        <?php } ?>
    </tr>
    <?php foreach ($this->currentScheme->schemeData['data'] as $schemeData) { ?>
        <tr>
            <td><input type="checkbox" class="wb3_viewport_checkbox" value="<?php echo $schemeData[$this->currentScheme->schemeKey->wb3_field]; ?>"></td>
            <?php if ($this->currentScheme->schemeLinks) { ?>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="dropdown-menu">
                            <?php echo InputHelper::makeSchemeLink($this->currentScheme->schemeLinks, $schemeData); ?>
                        </div>
                    </div>
                </td>
            <?php } ?>
            <?php foreach ($this->currentScheme->schemeFields as $schemeField) { ?>
                <td class="wb3_dbc_field" data-id="<?php echo $schemeData[$this->currentScheme->schemeKey->wb3_field]; ?>" data-field="<?php echo $schemeField->wb3_id; ?>">
                    <?php echo InputHelper::makeView($this->currentScheme->schemeKey, $schemeField, $schemeData); ?>
                </td>
            <?php } ?>
        </tr>
    <?php } ?>
</table>

<?php if ($this->pagination->pages) { ?>
    <div class="row">
        <div class="col-12">
            <?php echo $this->pagination->pages; ?>
        </div>
    </div>
<?php } ?>


<?php
$refreshVars = $this->sysVars;
unset($refreshVars['format']);
$refreshVars = SysHelper::arraySwitchVar($refreshVars, 'view', 'wb3_view');
?>
<input type="hidden" class="form-control" id="currentUrl" value="<?php echo SysHelper::arrayToUrl('index.php', $refreshVars); ?>">


<script>
    /*clear serach*/
    jQuery("#wb3_search_clear").click(function () {
        <?php
        $searchClearArray = $this->sysVars;
        $searchClearArray = SysHelper::arraySwitchVar($searchClearArray, 'view', 'wb3_view');
        unset($searchClearArray['wb3_page']);
        unset($searchClearArray['format']);
        ?>
        loadRaw('<?php echo SysHelper::arrayToUrl('index.php', $searchClearArray); ?>&wb3_search_clear=1', 'wb3_main', 0);
    });

    /*set serach*/
    jQuery("#wb3_search").click(function () {
        var searchField = jQuery("#wb3_search_field").val();
        var searchLine = jQuery("#wb3_search_line").val();
        <?php
        $searchArray = $this->sysVars;
        $searchArray = SysHelper::arraySwitchVar($searchArray, 'view', 'wb3_view');
        unset($searchArray['wb3_page']);
        unset($searchArray['format']);
        ?>
        loadRaw('<?php echo SysHelper::arrayToUrl('index.php', $searchArray); ?>&wb3_search_field=' + searchField + '&wb3_search=' + searchLine, 'wb3_main', 0);
    });


    /*select all*/
    jQuery("#select-all").on("click", function () {
        var all = jQuery(this);
        jQuery('input:checkbox').each(function () {
            jQuery(this).prop("checked", all.prop("checked"));
        });
    });

    /*set onOrdering*/
    jQuery(".wb3_ordering").click(function () {
        var fieldName = jQuery(this).data('field');
        <?php
        $orderArray = $this->sysVars;
        $orderArray = SysHelper::arraySwitchVar($orderArray, 'view', 'wb3_view');
        unset($orderArray['format']);
        if (!$this->wb3Direction || $this->wb3Direction == 'ASC'):$orderArray['wb3_direction'] = 'DESC';endif;
        if ($this->wb3Direction == 'DESC'):$orderArray['wb3_direction'] = 'ASC';endif;
        ?>
        loadRaw('<?php echo SysHelper::arrayToUrl('index.php', $orderArray); ?>&wb3_order=' + fieldName, 'wb3_main', 0);
    });


    /*set onPage*/
    jQuery('#wb3_on_page').on('change', function (e) {
        var onPage = jQuery("#wb3_on_page").val();
        <?php
        $onPageArray = $this->sysVars;
        $onPageArray = SysHelper::arraySwitchVar($onPageArray, 'view', 'wb3_view');
        unset($onPageArray['wb3_page']);
        unset($onPageArray['format']);
        ?>
        loadRaw('<?php echo SysHelper::arrayToUrl('index.php', $onPageArray); ?>&wb3_onpage=' + onPage, 'wb3_main', 0);
    });

    /*back*/
    jQuery("#wb3_back").click(function () {
        history.back();
    });

    /*edit field*/
    jQuery(".wb3_dbc_field").dblclick(function () {
        jQuery('#wb_modal_content').html('');
        jQuery('#wb_modal').modal();
        var rowId = jQuery(this).data('id');
        var fieldId = jQuery(this).data('field');
        var checkedVals = jQuery('.wb3_viewport_checkbox:checkbox:checked').map(function () {
            return this.value;
        }).get();
        if (checkedVals.length > 0) {
            checkedVals = checkedVals + ',' + rowId;
        } else {
            checkedVals = rowId;
        }
        <?php
        $editFieldArray = $this->sysVars;
        unset($editFieldArray['wb3_view']);
        $editFieldArray['format'] = 'raw';
        $editFieldArray['view'] = 'wb3_edit';
        ?>
        loadRaw('<?php echo SysHelper::arrayToUrl('index.php', $editFieldArray); ?>&wb3_checked=' + checkedVals + '&wb3_field=' + fieldId, 'wb_modal_content');
    });

    /*edit row*/
    jQuery("#wb3_edit").click(function () {
        jQuery('#wb_modal_content').html('');
        jQuery('#wb_modal').modal();
        var checkedVals = jQuery('.wb3_viewport_checkbox:checkbox:checked').map(function () {
            return this.value;
        }).get();
        <?php
        $editRowArray = $this->sysVars;
        unset($editRowArray['wb3_view']);
        $editRowArray['format'] = 'raw';
        $editRowArray['view'] = 'wb3_edit';
        ?>
        loadRaw('<?php echo SysHelper::arrayToUrl('index.php', $editRowArray); ?>&wb3_checked=' + checkedVals, 'wb_modal_content');
    });

    /*add row*/
    jQuery("#wb3_add").click(function () {
        jQuery('#wb_modal_content').html('');
        jQuery('#wb_modal').modal();
        <?php
        $addRowArray = $this->sysVars;
        unset($addRowArray['wb3_view']);
        $addRowArray['format'] = 'raw';
        $addRowArray['view'] = 'wb3_add';
        ?>
        loadRaw('<?php echo SysHelper::arrayToUrl('index.php', $addRowArray); ?>', 'wb_modal_content');
    });

    /*del row*/
    jQuery("#wb3_del").click(function () {
        jQuery('#wb_modal_content').html('');
        jQuery('#wb_modal').modal();
        var checkedVals = jQuery('.wb3_viewport_checkbox:checkbox:checked').map(function () {
            return this.value;
        }).get();
        <?php
        $delRowArray = $this->sysVars;
        unset($delRowArray['wb3_view']);
        $delRowArray['format'] = 'raw';
        $delRowArray['view'] = 'wb3_del';
        ?>
        loadRaw('<?php echo SysHelper::arrayToUrl('index.php', $delRowArray); ?>&wb3_checked=' + checkedVals, 'wb_modal_content');
    });

    /*copy row*/
    jQuery("#wb3_copy").click(function () {
        jQuery('#wb_modal_content').html('');
        jQuery('#wb_modal').modal();
        var checkedVals = jQuery('.wb3_viewport_checkbox:checkbox:checked').map(function () {
            return this.value;
        }).get();

        <?php
        $copyRowArray = $this->sysVars;
        unset($copyRowArray['wb3_view']);
        $copyRowArray['format'] = 'raw';
        $copyRowArray['view'] = 'wb3_copy';
        ?>
        loadRaw('<?php echo SysHelper::arrayToUrl('index.php', $copyRowArray); ?>&wb3_checked=' + checkedVals, 'wb_modal_content');
    });

</script>
