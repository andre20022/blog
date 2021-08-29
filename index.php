<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;
//use Slim\Routing\RouteContext;
use Slim\Factory\AppFactory;
use creative\Article;
use creative\Page;

require_once 'vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, array $args) {

    $page = new Page();
    $page->setPage("home"); 

    return $response;
});
$app->get('/language/{art}', function (Request $request, Response $response, array $args) {
    
   /// article da linguagem escolhida no home
   $article = new Article();

   $page = new Page();
   $page->setPage("list_article");

    return $response;
});

$app->group('/backoffice', function (RouteCollectorProxy $group) {
    
    $group->get('/', function ($request, $response, array $args) {
        
        $response->getBody()->write("Hello raiz backoffice!");
        return $response;
    });

    $group->get('/teste', function ($request, $response, array $args) {
        
        $response->getBody()->write("Hello teste backoffice!");
        return $response;
    })->setName('teste');
});

$app->run();



?>