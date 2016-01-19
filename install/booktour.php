<?php 
return [
    'module'    => [
        'class' => 'application.modules.booktour.BooktourModule',
    ],
    'import'    => [
    	'application.modules.booktour.models.*'
    ],
    'component' => [
    ],
    'rules'     => [
        '/booktour/<action:\w+>' => 'booktour/booktour/<action>',
    ],
];
 ?>