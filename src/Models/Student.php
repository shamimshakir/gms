<?php

namespace App\Models;

use PDO;

class Student extends BaseModel
{
    public function getAll(): array
    {
        $sql = "SELECT * FROM students";

        $smt = $this->getConn()->prepare($sql);
        $smt->execute();

        return $smt->fetchAll(PDO::FETCH_OBJ);
    }

    public function store(array $data, $id = null): string
    {
        $sql = "SELECT * FROM students
            WHERE `id_no` = ?
            AND `name` = ?";
        if ($id) {
            $sql .= " AND `id` != $id";
        }

        $smt = $this->getConn()->prepare($sql);
        $smt->execute([
            $data['id_no'],
            $data['name'],
        ]);

        if($smt->fetch(PDO::FETCH_ASSOC)) {
            throw new \Exception("Student already exists in this id no. {$data['id_no']}");
        }

        if ($id) {
            return $this->update($data, $id);
        }


        $sql = "INSERT INTO students(name,id_no,email,phone,date_of_birth,blood_group,address)
            VALUES(?,?,?,?,?,?,?)";

        $smt = $this->getConn()->prepare($sql);
        $smt->execute([
            $data['name'],
            $data['id_no'],
            $data['email'],
            $data['phone'],
            $data['date_of_birth'],
            $data['blood_group'],
            $data['address'],
        ]);

        return "Student Added Successfully";
    }

    public function update($data, $id): string
    {
        $sql = "UPDATE students
            SET name = ?,
                id_no= ?,
                email= ?,
                phone= ?,
                date_of_birth= ?,
                blood_group= ?,
                address= ?
            WHERE
                id = ?";

        $smt = $this->getConn()->prepare($sql);
        $smt->execute([
            $data['name'],
            $data['id_no'],
            $data['email'],
            $data['phone'],
            $data['date_of_birth'],
            $data['blood_group'],
            $data['address'],
            $data['id'],
        ]);

        return "Student Updated Successfully";
    }

    public function find($id)
    {
        $sql = "SELECT * FROM students
            WHERE `id` = ?";

        $smt = $this->getConn()->prepare($sql);
        $smt->execute([
            $id
        ]);

        if($item = $smt->fetch(PDO::FETCH_OBJ)) {
            return $item;
        }
        throw new \Exception("Student not found");
    }

    public function delete(int $id)
    {
        $this->find($id);
        $sql = "DELETE FROM students
            WHERE `id` = ?";

        $smt = $this->getConn()->prepare($sql);
        $smt->execute([
            $id
        ]);
        return "Student deleted successfully!";
    }
}