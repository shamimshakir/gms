<?php

namespace App\Models;

use PDO;

class Booking extends BaseModel
{
    public function getAll(): array
    {
        $sql = "SELECT 
                bookings.id,
                bookings.ended_at,
                games.name AS game_name, 
                students.name AS student_name 
            FROM bookings
            LEFT JOIN games ON games.id = bookings.game_id
            LEFT JOIN booking_students ON booking_students.booking_id = bookings.id
            LEFT JOIN students ON students.id = booking_students.student_id
            ";

        $smt = $this->getConn()->prepare($sql);
        $smt->execute();

        return $smt->fetchAll(PDO::FETCH_OBJ);
    }

}