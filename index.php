<?php

use App\Router;
use App\BinaKodu;

session_start();

$path = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

spl_autoload_register(function ($className) {
    $prefix = 'App\\';
    $base_dir = __DIR__.'/';
    // For Server $base_dir = './';
    $length = strlen($prefix);
    if (strncmp($prefix,$className,$length) !== 0) {
        return;
    }
    // $className = strtolower($className);
    $relativeClass = substr($className,$length);
    $path = $base_dir . str_replace('\\','/',$relativeClass) . '.php';
    
    if (file_exists($path)) {
        require_once $path;
    }
});

function render($file, $params = []) {
    $binaKodu = new BinaKodu();

    include "pages/$file.php";
}

$router = new Router($path, $method);

const BASE_URL = 'https://127.0.0.1:446/';

$router->get('/', function(){

  render('home',['name' => 'Metin']);
});

$router->get('/buildings', function(){

  $binaKodu = new BinaKodu();
  $buildings = $binaKodu->buildings();

  render('buildings',['buildings' => $buildings]);
});

$router->get('/building/([\s\S]+)', function($id){
    //echo "building ID'si: {$id}";

    $binaKodu = new BinaKodu();
    $building = $binaKodu->print($id);

    render('print',['building' => $building]);
});

$router->get('/print/([\d]+)', function($id){

  $binaKodu = new BinaKodu();
  $building = $binaKodu->print($id);

  render('print',['building' => $building]);
});

$router->get('/new', function (){

    render('new');
});


$router->post('/new', function ($params){

    $binaKodu = new BinaKodu();
    $building = $binaKodu->save($params);

    render('new', ['building' => $building]);
});

$router->get('/edit/([\d]+)', function($id){

    $binaKodu = new BinaKodu();
    $building = $binaKodu->db->findById('buildings',$id);

    render('edit', ['building' => $building]);
});

$router->post('/update', function ($params){

    $binaKodu = new BinaKodu();
    $building = $binaKodu->update($params);

    $binaKodu->redirect('/print/'. $building['id']);
});

$router->get('/logout', function (){
    ob_start();
    session_destroy();

    $binaKodu = new BinaKodu();
    $binaKodu->redirect('/');
});

$router->get('/login', function (){

    render('login');
});

$router->post('/login', function ($params){

    $binaKodu = new BinaKodu();
    $building = $binaKodu->login($params);

    render('login', ['building' => $building]);
});

$router->post('/foo', function(){
  echo 'Diğer işlemler';
});

$router->run();

