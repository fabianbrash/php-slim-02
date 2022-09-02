<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();


$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world from the Slim framework!!");
    return $response;
});


$app->get('/api/v1/users', function (Request $request, Response $response, $args) {
    
    $data = array('name' => 'John', 'age' => 42, 'job_title' => 'Java Developer');
    $payload = json_encode($data);

    $response->getBody()->write($payload);
    return $response
	    ->withHeader('Content-Type', 'application/json');
});

$app->run();
