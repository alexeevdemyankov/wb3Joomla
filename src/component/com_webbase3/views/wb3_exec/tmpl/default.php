<p class="alert-success alert"><?php echo JText::_('COM_WEBBASE_WAIT'); ?></p>
<script>
    modalHide();
    var currentUrl = jQuery('#currentUrl').val();
    loadUrl(currentUrl, 'wb3_main');
</script>
