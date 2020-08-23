<?php

define('D_S', DIRECTORY_SEPARATOR);


// in $folders array put all the folders in path from (excluding) root directory to the project folder
// for example, on windows OS, where root folder is C:\Users\CurrentUser and full path to the project is
// C:\Users\CurrentUser\Desktop\scandi\php, add all folders after the "CurrentUser' like I do on line 13
// with this setup, in browser I use the url http://localhost:8080/Desktop/scandi/php/
$folders = array('Desktop', 'scandi', 'php');
$config['base_url'] = D_S . implode(D_S, $folders);

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '12357');
define('DB_NAME', 'scandi');