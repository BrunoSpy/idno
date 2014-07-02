<div class="row">
    <div class="span6 offset3 well text-center">

        <h3 class="text-center">
            Sign in
        </h3>

        <form action="<?= \Idno\Core\site()->config()->url ?>session/login" method="post">
            <div class="control-group">
                <div class="controls">
                    <input type="text" id="inputEmail" name="email" placeholder="Your username or email address"
                           class="span4">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="password" id="inputPassword" name="password" placeholder="Password" class="span4">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <a href="<?=\Idno\Core\site()->config()->getURL()?>account/password">Forgotten your password?</a>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-signin">Sign in</button>
                    <input type="hidden" name="fwd" value="<?php
                        if (!empty($vars['fwd'])) {
                            echo htmlspecialchars($vars['fwd']);
                        } else if (!empty($_SERVER['HTTP_REFERER'])) {
                            echo htmlspecialchars($_SERVER['HTTP_REFERER']);
                        } else {
                            echo \Idno\Core\site()->config()->url;
                        }?>" />
                </div>
            </div>
            <?= \Idno\Core\site()->actions()->signForm('/session/login') ?>
        </form>

    </div>
</div>