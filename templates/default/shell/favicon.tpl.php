<?php

    $user_avatar_favicons = \Idno\Core\site()->config('user_avatar_favicons');
    if (($user = \Idno\Core\site()->currentPage()->getOwner()) && ($user_avatar_favicons)) {
        if ($user instanceof \Idno\Entities\User) {
            $icon = $user->getIcon();
            if (strpos($icon, 'thumb.jpg') !== false) {
                $icon_mime = 'image/jpg';
            } else {
                $icon_mime = 'image/png';
            }
        }

?>
        <link rel="shortcut icon" type="<?=$icon_mime?>" href="<?=$icon?>">

        <!-- Make this an "app" when saved to an ios device's home screen -->
        <link rel="apple-touch-icon-precomposed" href="<?=$icon?>">
<?php
    } else {
?>
        <link rel="icon" type="image/png" href="<?=\Idno\Core\site()->config()->url?>gfx/template/idnoicon.png">
        <!-- Make this an "app" when saved to an ios device's home screen -->
        <link rel="apple-touch-icon" href="<?=\Idno\Core\site()->config()->url?>gfx/template/idnoappleicon.png">
<?php
    }

?>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">