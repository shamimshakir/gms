<?php

session_start();

require "vendor/autoload.php";

use App\Controllers\GameController;
use App\Controllers\StudentController;
use App\Controllers\BookingController;

define("BASEPATH", __DIR__);

$path = $_SERVER['PATH_INFO'] ?? null; 

$method = $_SERVER['REQUEST_METHOD'];

ini_set('display_errors', 1);

$path = $_SERVER['PATH_INFO'] ?? null;

$method = $_SERVER['REQUEST_METHOD'];

// Route for games
if($path == '/games/create') {
    (new GameController())->create();
    return;
}

if($path == '/games/edit') {
    (new GameController())->edit($_GET['id'] ?? null);
    return;
}
if($path == '/games/update' && $method == 'POST') {
    (new GameController())->update($_REQUEST);
    return;
}

if($path == '/games/delete') {
    (new GameController())->destroy($_REQUEST['id'] ?? 0);
    return;
}

if(empty($path) || $path == '/games') {
    $controller = new GameController();
    if($method == 'GET') {
        $controller->index();
        return;
    }
    if($method == 'POST') {
        $controller->store();
        return;
    }
}

// Routes for students
if($path == '/students/create') {
    (new StudentController())->create();
    return;
}

if($path == '/students/edit') {
    (new StudentController())->edit($_GET['id'] ?? null);
    return;
}
if($path == '/students/update' && $method == 'POST') {
    (new StudentController())->update($_REQUEST);
    return;
}

if($path == '/students/delete') {
    (new StudentController())->destroy($_REQUEST['id'] ?? 0);
    return;
}

if(empty($path) || $path == '/students') {
    $controller = new StudentController();
    if($method == 'GET') {
        $controller->index();
        return;
    }
    if($method == 'POST') {
        $controller->store();
        return;
    }
}


// Routes for Booking

if(empty($path) || $path == '/bookings') {
    $controller = new BookingController();
    if($method == 'GET') {
        $controller->index();
        return;
    }
    if($method == 'POST') {
        $controller->store();
        return;
    }
}