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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cinzel+Decorative">
    <style><?php
        loadCSS(PUBLIC_DIR . '/css/demo.css');
    ?></style>
</head>
<body>
    <main>
        <div class="main-message"><?php echo $mainMessage; ?></div>
        <div class="sub-message"><?php

if (isset($maintainer))
{
    $mailto = sprintf('<a href="mailto:%1$s<%2$s>">Contact to the Maintainer</a>', $maintainer['name'], $maintainer['address']);
    echo $mailto;
}

        ?></div>
    </main>
    <script src="<?php echo AssetCachebuster('/js/demo.js', CachebusterLength); ?>"></script>
</body>
</html>