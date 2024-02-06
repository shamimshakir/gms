<?php

namespace App\Models;
use PDO;

class Game extends BaseModel
{
    public function getAll(): array
    {
        $sql = "SELECT * FROM games";

        $smt = $this->getConn()->prepare($sql);
        $smt->execute();

        return $smt->fetchAll(PDO::FETCH_OBJ);
    }

    public function store(array $data, $id = null): string
    {
        $sql = "SELECT * FROM games
            WHERE `board_number` = ?
            AND `name` = ?";
        if ($id) {
            $sql .= " AND `id` != $id";
        }

        $smt = $this->getConn()->prepare($sql);
        $smt->execute([
            $data['board_number'],
            $data['name'],
        ]);

        if($smt->fetch(PDO::FETCH_ASSOC)) {
            throw new \Exception("Game already exists in this board no. {$data['board_number']}");
        }

        if ($id) {
            return $this->update($data, $id);
        }


        $sql = "INSERT INTO games(name,board_number,max_players)
            VALUES(?,?,?)";

        $smt = $this->getConn()->prepare($sql);
        $smt->execute([
            $data['name'],
            $data['board_number'],
            $data['max_players'],
        ]);

        return "Game Added Successfully";
    }

    public function update($data, $id): string
    {
        $sql = "UPDATE games
            SET name = ?,
                board_number= ?,
                max_players= ?
            WHERE
                id = ?";

        $smt = $this->getConn()->prepare($sql);
        $smt->execute([
            $data['name'],
            $data['board_number'],
            $data['max_players'],
            $data['id'],
        ]);

        return "Game Updated Successfully";
    }

    public function find($id)
    {
        $sql = "SELECT * FROM games
            WHERE `id` = ?";

        $smt = $this->getConn()->prepare($sql);
        $smt->execute([
            $id
        ]);

        if($item = $smt->fetch(PDO::FETCH_OBJ)) {
            return $item;
        }
        throw new \Exception("Game not found");
    }

    public function delete(int $id)
    {
        $this->find($id);
        $sql = "DELETE FROM games
            WHERE `id` = ?";

        $smt = $this->getConn()->prepare($sql);
        $smt->execute([
            $id
        ]);
        return "Game deleted successfully!";
    }
}