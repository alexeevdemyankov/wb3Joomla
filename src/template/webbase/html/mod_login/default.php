<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.beez3
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
?>

<style>
    .card {
        padding: 20px;
        margin-top: 20px;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<div class="container text-center">
    <div class="card card-container">
        <p id="profile-name" class="profile-name-card">Вход в систему <b><?php echo JFactory::getConfig()->get('sitename'); ?></b></p>
        <form method="post" id="login-form">
            <span id="reauth-email" class="reauth-email"></span>
            <input id="modlgn-username" type="text" name="username" class="form-control" placeholder="Email address"
                   required autofocus/>
            <br>
            <input id="modlgn-passwd" type="password" name="password" class="form-control" placeholder="Password"
                   required>
            <div id="remember" class="checkbox">
                <label>
                    <input id="modlgn-remember" type="checkbox" name="remember" class="inputbox" value="yes"/> Запомнить
                </label>
            </div>
            <input type="submit" name="Submit" class="btn btn-lg btn-primary btn-block btn-signin"
                   value="<?php echo JText::_('JLOGIN') ?>"/>
            <input type="hidden" name="option" value="com_users"/>
            <input type="hidden" name="task" value="user.login"/>
            <input type="hidden" name="return" value="<?php echo $return; ?>"/>
            <?php echo JHtml::_('form.token'); ?>
        </form>


    </div>
</div>