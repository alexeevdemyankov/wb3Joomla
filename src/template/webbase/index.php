<?php defined('_JEXEC') or die; ?>
    <html>
    <head>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <?php echo implode(' ', JFactory::getDbo()->setQuery("select wb3_patch from wb3_libs where wb3_active=1")->loadColumn()); ?>
            <script src="/templates/webbase/js/loader.js"></script>
            <script src="/templates/webbase/js/loader_helper.js"></script>
            <script src="/templates/webbase/js/enter_click.js"></script>
        </head>
    </head>
    <body>
    <div class="wb_exec alert alert-warning" id="wb_exec" style="display: none;">wb_exec</div>
    <div class="container-fluid">
        <?php if (JFactory::getUser()->id) { ?>
            <div class="row">
                <div class="col-12">
                    <jdoc:include type="component"/>
                </div>
            </div>
        <?php } else { ?>
            <div class="row">
                <div class="col-md-12 col-centered">
                    <jdoc:include type="modules" name="position-7"/>
                </div>
            </div>
        <?php } ?>
    </div>
    </body>
    </html>
<?php
if (JFactory::getUser()->id && !$_GET) {
    $app = JFactory::getApplication();
    $app->redirect(JRoute::_(JURI::root() . 'index.php?option=com_webbase3'));
}
?>

<?php include "wb_modal.php"; ?>