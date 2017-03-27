<?php
session_start();

define('ROOT', dirname(__dir__).'/' );
define('APP', ROOT.'app/');

//-----------------------------
// Configure Error Reporting
//-----------------------------

error_reporting(E_ALL);

//-----------------------------

include APP.'config.php';

require ROOT.'vendor/autoload.php';

//-----------------------------
// Klein Router and Template system
//-----------------------------

$klein = new \Klein\Klein();

// Set default layout file:
$klein->service()->layout( APP.'layouts/default.php' );

// Set a service variable to hold all Template specific variables.
// The default values will be used for any that are not specified by a view.
$klein->service()->Template = new Klein\DataCollection\DataCollection(
	[
		'pageTitle'      => '<!-- @@ Template pageTitle not set. @@ -->',
		'styles'         => '<!-- @@ Template styles not set. @@ -->',
		'scripts'        => '<!-- @@ Template scripts not set. @@ -->',
		'bodyClass'      => '<!-- @@ Template bodyClass not set. @@ -->',
		'beforeMain'     => '<!-- @@ Template beforeMain not set. @@ -->',
		'subnavItems'    => '<!-- @@ Template subnavItems not set. @@ -->',
		'sidebarContent' => '<!-- @@ Template sidebarContent not set. @@ -->',
	]
);

//-----------------------------
//    ROUTE DEFINITIONS
//-----------------------------

$klein->respond('/', function() use ($klein) {
	
	$klein->service()->render( APP.'views/home.php', [] );
	
});

$klein->respond('/about', function() use ($klein) {
	
	$klein->service()->render( APP.'views/about.php', [] );
	
});

$klein->respond('/skills', function() use ($klein) {
	
	$klein->service()->render( APP.'views/skills.php', [] );
	
});

$klein->respond('/team', function() use ($klein) {
	
	$klein->service()->render( APP.'views/team.php', [] );
	
});

$klein->respond('/showcase', function() use ($klein) {
	
	$klein->service()->render( APP.'views/showcase.php', [] );
	
});

$klein->respond('/contact/?', function() use ($klein) {
	
	$klein->service()->render( APP.'views/contact.php' );

});

$klein->respond('/blog', function() use ($klein) {
	
	$klein->service()->render( APP.'views/blog/index.php', [] );
	
});

$klein->respond('/login', function() use ($klein) {

	// Use the layout without header and footer
	$klein->service()->layout( APP.'layouts/empty.php' );
	
	$klein->service()->render( APP.'views/login.php', [] );
	
});

$klein->respond('/register', function() use ($klein) {

	// Use the layout without header and footer
	$klein->service()->layout( APP.'layouts/empty.php' );
	
	$klein->service()->render( APP.'views/login.php', [] );
	
});


//-----------------------------
// 404 not found handling
//-----------------------------
// Using exact code behaviors via switch/case
$klein->onHttpError(function ($code, $router) {
    switch ($code) {
        case 404:
        		$router->response()->sendHeaders( true, true);
        		$router->service()->render( APP.'views/404.php');
        		//$router->response()->body('404 Not Found');
            break;
        case 405:
            $router->response()->body(
                'You can\'t do that!'
            );
            break;
        default:
            $router->response()->body(
                'Oh no, a bad error happened that caused a '. $code
            );
    }
});
//-----------------------------

$klein->dispatch();

//var_dump($klein->routes());

?>


