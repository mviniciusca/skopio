<?php

namespace Src\Models;

use App\Database\Database;
use PDO;

class Model extends Database
{
    /**
     * Constructor
     * Retrieve the database connection
     *
     */
    public function __construct()
    {
        return $this->db = $this->dbConnect();
    }

    protected $id;
    protected $table;
    protected $limit = 100;
    protected $column = 'id';
    protected $order = 'ASC';

    /**
     * Create a new record from the database
     * @return array
     */
    public function create($data)
    {
        $columns = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$values})";
        $stmt = $this->db->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":{$key}", $value);
        }
        return $stmt->execute();
    }

     /**
     * Get All - Method
     * Get all the data from database table, return an array with default order "ASC" and no limit
     * "SELECT * FROM table"
     * @return array
     */
    public function getAll()
    {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Get by ID
     */

    public function getById($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Get By Order - Method
     * Get data from database and order by column, order and limit
     * "SELECT * FROM table ORDER BY column ORDER (order) LIMIT (limit)"
     *
     * @return array
     */
    public function getByOrder()
    {
        $query = "SELECT * FROM {$this->table} ORDER BY {$this->column} {$this->order} LIMIT {$this->limit}";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Delete - Method
     * Delete a row from database
     * "DELETE FROM table WHERE id = (id)"
     */
    public function delete($id)
    {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }

    /**
     * Update - Method
     * Update a row from database
     * "UPDATE table SET column = (value) WHERE id = (id)"
     */
    public function update($id, $data)
    {
        $sql = "UPDATE {$this->table} SET ";
        $i = 1;
        foreach ($data as $key => $value) {
            $sql .= "{$key} = :{$key}";
            if ($i < count($data)) {
                $sql .= ", ";
            }
            $i++;
        }
        $sql .= " WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":{$key}", $value);
        }
        return $stmt->execute();
    }
}
