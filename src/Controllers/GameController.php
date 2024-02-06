<?php

namespace App\Controllers;
use App\Models\Game;

class GameController {
    private $model;
    public function __construct()
    {
        $this->model = new Game();
    }
    public function index(): void
    {
        $games = $this->model->getAll();

        include BASEPATH . "/views/game-list.php";
        session_unset();
    }

    public function create(): void
    {
        include BASEPATH . "/views/game-create.php";
        session_unset();
    }

    public function store(): true
    {
        try {
            $message = $this->model->store($_REQUEST);
            $_SESSION['message'] = $message;
            header("Location: /games");
            return true;
        } catch (\Exception $exception) {
            $_SESSION['message'] = $exception->getMessage();
            header("Location: /games/register");
            return true;
        }
    }

    public function edit($id)
    {
        if (!($id > 0)) {
            $_SESSION['message'] = "Invalid game id";
            header("Location: /games");
            return true;
        }
        try {
            $game = $this->model->find($id);
            include BASEPATH . "/views/game-edit.php";

        } catch (\Exception $exception) {
            $_SESSION['message'] = $exception->getMessage();
            header("Location: /games");
            return true;
        }
    }

    public function update($attributes): true
    {
        if (!($attributes['id'] > 0)) {
            $_SESSION['message'] = "Invalid game id";
            header("Location: /games");
            return true;
        }
        try {

            $message = $this->model->store($attributes, $attributes['id']);
            $_SESSION['message'] = $message;
            header("Location: /games");
            return true;
        } catch (\Exception $exception) {
            $_SESSION['message'] = $exception->getMessage();
            header("Location: /games");
            return true;
        }
    }

    public function destroy($id): true
    {
        if (!($id > 0)) {
            $_SESSION['message'] = "Invalid game id";
            header("Location: /games");
            return true;
        }
        try {

            $message = $this->model->delete($id);
            $_SESSION['message'] = $message;
            header("Location: /games");
            return true;
        } catch (\Exception $exception) {
            $_SESSION['message'] = $exception->getMessage();
            header("Location: /games");
            return true;
        }
    }
}