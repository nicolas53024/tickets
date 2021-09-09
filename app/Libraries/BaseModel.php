<?php

namespace App\Libraries;

use stdClass;

class BaseModel extends DBConnection
{

    public function __construct()
    {
        $this->pdo = parent::connect();
    }

    public function select(array $columns = null, array $clausules = null)
    {
        $values = [];
        $columns = $columns ? implode(',', $columns) : '*';
        $sql = "SELECT $columns FROM $this->table_name";

        if ($clausules) {
            $sql .= ' WHERE ';
            if (!is_array($clausules[0])) {
                $clausules = [$clausules];
            }

            foreach ($clausules as $key => $clausule) {
                if (count($clausule) > 2) {
                    $sql .= "$clausule[0] $clausule[1] ?";
                    array_push($values, $clausule[2]);
                } else {
                    $sql .= "$clausule[0] = ?";
                    array_push($values, $clausule[1]);
                }
                if (($key + 1) < count($clausules)) {
                    $sql .= ' AND ';
                }

            }
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($values);
        return $stmt->fetchAll();
    }

}
