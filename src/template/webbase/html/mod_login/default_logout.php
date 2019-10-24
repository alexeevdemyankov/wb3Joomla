<?php
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
?>
<form method="post" class="login-menu">
            <input type="submit" name="Submit" class="btn btn-sm btn-info" value="<?php echo JText::_('JLOGOUT'); ?>"/>
            <input type="hidden" name="option" value="com_users"/>
            <input type="hidden" name="task" value="user.logout"/>
            <?php echo JHtml::_('form.token'); ?>

</form>
