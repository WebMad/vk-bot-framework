<?php

return [
    'commands' => function () {
        return require APP_DIR . '/commands/commands.php';
    },
    'keyboards' => function () {
        return require APP_DIR . '/keyboards/keyboards.php';
    },
];