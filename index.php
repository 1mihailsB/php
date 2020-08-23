<?php 
declare(strict_types = 1);
//include_once 'config/autoload.php';
include_once 'config.php';

// for includes/autoloading
define('ROOT', __DIR__ . D_S);
define('APP', ROOT . 'app' . D_S);
define('VIEW', APP . 'view' . D_S);
define('ENTITY', APP . 'entity' . D_S);
define('CORE', APP . 'core' . D_S);
define('REPOSITORY', APP . 'repository' . D_S);
define('CONTROLLER',  APP . 'controller' . D_S);


// for use in html href/src to load js/css
define('FRONTEND', $config['base_url'] . D_S . 'app' . D_S . 'view' . D_S . 'resources');

// to use for http request url
define('BASE_URL', $config['base_url'] . D_S);

$modules = [ROOT, APP, VIEW, ENTITY, CORE, REPOSITORY, CONTROLLER];



set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $modules));
spl_autoload_register('spl_autoload');

new Application();

