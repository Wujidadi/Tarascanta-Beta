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
        <div id="main-message" class="main-message elvish" title="<?php echo $mainMessage; ?>"><?php echo $mainMessage; ?></div>
        <div id="sub-message" class="sub-message elvish" title="Contact to the Maintainer"><?php

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
            toggle   = document.querySelector('#toggle-font'),
            mainMsg  = document.querySelector('#main-message'),
            subMsg   = document.querySelector('#sub-message');

        toggle.addEventListener('click', toggleFont);

        function toggleFont()
        {
            switch (fontMode)
            {
                case 'Elvish':
                    mainMsg.classList.add('modern');
                    subMsg.classList.add('modern');
                    mainMsg.classList.remove('elvish');
                    subMsg.classList.remove('elvish');
                    toggle.innerHTML = 'Elvish';
                    fontMode = 'Modern';
                    break;

                case 'Modern':
                    mainMsg.classList.add('elvish');
                    subMsg.classList.add('elvish');
                    mainMsg.classList.remove('modern');
                    subMsg.classList.remove('modern');
                    toggle.innerHTML = 'Modern';
                    fontMode = 'Elvish';
                    break;
            }
        }
    </script>
</body>
</html>