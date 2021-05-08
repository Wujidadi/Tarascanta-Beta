<?php require_once inject('Demo.Maintainer'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cinzel Decorative">
    <style><?php
        loadCSS(PUBLIC_DIR . '/css/demo.css');
    ?></style>
</head>
<body>
    <main>
        <div id="toggle-font" class="toggle">Modern</div>

        <div id="main-message-elvish" class="main-message elvish" title="<?php echo $mainMessage; ?>"><?php echo $mainMessage; ?></div>
        <div id="sub-message-elvish" class="sub-message elvish" title="Contact to the Maintainer"><?php

if (isset($maintainer))
{
    $mailto = sprintf('<a href="mailto:%1$s<%2$s>">Contact to the Maintainer</a>', $maintainer['name'], $maintainer['address']);
    echo $mailto;
}

        ?></div>

        <div id="main-message-modern" class="main-message modern hidden" title="<?php echo $mainMessage; ?>"><?php echo $mainMessage; ?></div>
        <div id="sub-message-modern" class="sub-message modern hidden" title="Contact to the Maintainer"><?php

if (isset($maintainer))
{
    $mailto = sprintf('<a href="mailto:%1$s<%2$s>">Contact to the Maintainer</a>', $maintainer['name'], $maintainer['address']);
    echo $mailto;
}

        ?></div>
    </main>
    <script src="<?php echo AssetCachebuster('/js/demo.js', CachebusterLength); ?>"></script>
    <script>
        let fontMode = 'Elvish',
            opFontMode = {
                'Elvish': 'Modern',
                'Modern': 'Elvish'
            },
            toggle = document.querySelector('#toggle-font'),
            mainMsgElvish = document.querySelector('#main-message-elvish'),
            subMsgElvish = document.querySelector('#sub-message-elvish'),
            mainMsgModern = document.querySelector('#main-message-modern'),
            subMsgModern = document.querySelector('#sub-message-modern');

        toggle.addEventListener('click', toggleFont);

        function toggleFont()
        {
            mainMsgElvish.classList.toggle('hidden');
            subMsgElvish.classList.toggle('hidden');
            mainMsgModern.classList.toggle('hidden');
            subMsgModern.classList.toggle('hidden');
            toggle.innerHTML = fontMode;
            fontMode = opFontMode[fontMode];
        }
    </script>
</body>
</html>