<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/"><?php echo JFactory::getConfig()->get('sitename'); ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php foreach ($this->items[0] as $item) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $item->wb3_name; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($this->items[$item->wb3_id] as $subitem) { ?>
                            <?php unset($OnClick);
                            $OnClick = ($subitem->wb3_link) ? "onClick=loadUrl('" . $subitem->wb3_link . "','wb3_main',1);" : null; ?>
                            <a class="dropdown-item" href="javascript:void(0);" <?php echo $OnClick; ?>> <?php echo $subitem->wb3_name; ?></a>
                        <?php } ?>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>

    <div class="form-inline my-2 my-lg-0">
        <a class="btn btn-sm btn-secondary" href="index.php?option=com_users&task=user.logout&<?php echo JSession::getFormToken(); ?>=1"> <?php echo JText::_('COM_WEBBASE_BTN_EXIT'); ?> </a>
    </div>


</nav>