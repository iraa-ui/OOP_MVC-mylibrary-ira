<?php

class LoanModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', '', 'mylibrary');
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function createLoan($book_name, $member_name, $borrow_date, $description, $quantity)
    {
        $borrow_date_obj = new DateTime($borrow_date);
        $borrow_date_obj->modify('+3 days');
        $return_date = $borrow_date_obj->format('Y-m-d');

        $sql = "INSERT INTO book_loans (book_name, member_name, borrow_date, return_date, description, quantity) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssi", $book_name, $member_name, $borrow_date, $return_date, $description, $quantity);

        if ($stmt->execute()) {
            return [
                'success' => true,
                'return_date' => $return_date
            ];
        } else {
            return [
                'success' => false,
                'error' => $stmt->error
            ];
        }
    }

    public function closeConnection()
    {
        $this->conn->close();
    }
}
