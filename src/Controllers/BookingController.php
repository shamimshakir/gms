<?php

namespace App\Controllers;

use App\Models\Booking;

class BookingController
{
    private $model;
    public function __construct()
    {
        $this->model = new Booking();
    }
    public function index(): void
    {
        $bookings = $this->model->getAll();

        include BASEPATH . "/views/booking-list.php";
        session_unset();
    }
}