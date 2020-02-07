<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

if (false && (ENVIRONMENT === 'development' || ENVIRONMENT === 'testing'))
{
    $hook['display_override'][] = [
        'class'  	=> 'Develbar',
        'function' 	=> 'debug',
        'filename' 	=> 'Develbar.php',
        'filepath' 	=> 'third_party/Mty95/DevelBar',
    ];
}

\NewFramework\Registry::hooks($hook);
