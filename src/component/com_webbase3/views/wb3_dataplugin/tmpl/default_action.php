<?php if ($this->success == 1) { ?>
    <p class="alert-success alert"><?php echo JText::_('COM_WEBBASE_WAIT'); ?></p>
    <script>
        modalHide();
        var currentUrl = jQuery('#currentUrl').val();
        loadUrl(currentUrl, 'wb3_main');
    </script>
<?php } ?>

<?php if ($this->success == 2) { ?>
    <p class="alert-success alert"><?php echo JText::_('COM_WEBBASE_WAIT'); ?></p>
    <script>
        var currentUrl = jQuery('#currentUrl').val();
        loadUrl(currentUrl, 'wb3_main');
    </script>
<?php } ?>