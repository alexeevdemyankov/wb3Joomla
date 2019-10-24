<script>
    jQuery('#wb3_plugin_success').click(function () {

        <?php
        $sucBtnArray = $this->sysVars;
        $sucBtnArray['format'] = 'raw';
        $sucBtnArray['view'] = 'wb3_dataplugin';
        $sucBtnArray['action'] = 'exec';
        ?>
        PostData('<?php echo SysHelper::arrayToUrl('index.php', $sucBtnArray); ?>', 'wb3_plugin_exec', 'wb3_plugin_form', 1);
    });





</script>
