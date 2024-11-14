<?php

require_once "Database.php";  // Include the database class

class crud
{
    private $db;

    // Constructor to initialize the database connection
    public function __construct()
    {
        $this->db = new Database();
    }

    // Create - Insert data into the "jabatan" table
    public function create($jabatan, $keterangan)
    {
        $query = "INSERT INTO jabatan (jabatan, keterangan) VALUES ('$jabatan', '$keterangan')";
        $result = $this->db->conn->query($query);

        return $result;
    }

    // Read - Fetch all data from the "jabatan" table
    public function read()
    {
        $query = "SELECT * FROM jabatan";
        $result = $this->db->conn->query($query);

        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    // Read by ID - Fetch a single row by its ID from the "jabatan" table
    public function readById($id)
    {
        $query = "SELECT * FROM jabatan WHERE id = $id";
        $result = $this->db->conn->query($query);

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Update - Update data in the "jabatan" table by ID
    public function update($id, $jabatan, $keterangan)
    {
        $query = "UPDATE jabatan SET jabatan = '$jabatan', keterangan = '$keterangan' WHERE id = $id";
        $result = $this->db->conn->query($query);

        return $result;
    }

    // Delete - Delete data from the "jabatan" table by ID
    public function delete($id)
    {
        $query = "DELETE FROM jabatan WHERE id = $id";
        $result = $this->db->conn->query($query);

        return $result;
    }
}
?>
