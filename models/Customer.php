<?php


class Customer
{
    private $db;

    public function __construct()
    {
        $this->db = new Database(); // Ensure Database class is instantiated properly
    }

    public function addCustomer($data)
    {
        // Prepare query
        $this->db->query('INSERT INTO customers (id, first_name, last_name, email) VALUES (:id, :first_name, :last_name, :email)');

        // Bind parameters
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);

        // Execute the query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getCustomers()
    {
        $this->db->query('SELECT * FROM customers ORDER BY created_at DESC');

        $results = $this->db->resultset();

        return $results;
    }
}
