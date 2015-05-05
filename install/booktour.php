<?php 
return [
    'module'    => [
        'class' => 'application.modules.booktour.BooktourModule',
    ],
    'import'    => [],
    'component' => [
    ],
    'rules'     => [
        '/booktour/<action:\w+>' => 'booktour/booktour/<action>',
    ],
];
 ?>