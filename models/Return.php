<?php
class PengembalianModel
{
   
    private $pdo;

    public function __construct()
    {
       
        $this->pdo = new mysqli('localhost', 'root', '', 'mylibrary'); // Ganti dengan PDO jika perlu
    }

    
    public function prosesPengembalian($loan_id, $return_date)
    {
       
        $sql = "SELECT return_date FROM book_loans WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bind_param("i", $loan_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $loan = $result->fetch_assoc();
            $expected_return_date = new DateTime($loan['return_date']);
            $actual_return_date = new DateTime($return_date);

         
            $late_days = max(0, $expected_return_date->diff($actual_return_date)->days);
            $fine = $late_days * 5000; 

           
            $update_sql = "UPDATE book_loans SET actual_return_date = ?, fine = ? WHERE id = ?";
            $update_stmt = $this->pdo->prepare($update_sql);
            $update_stmt->bind_param("sii", $return_date, $fine, $loan_id);

            if ($update_stmt->execute()) {
                return [
                    'success' => true,
                    'message' => "Pengembalian berhasil diproses!" . ($fine > 0 ? " Anda terlambat $late_days hari. Denda: Rp $fine" : " Tidak ada denda.")
                ];
            } else {
                return ['success' => false, 'message' => "Terjadi kesalahan: " . $update_stmt->error];
            }
        } else {
            return ['success' => false, 'message' => "ID Pinjaman tidak ditemukan."];
        }
    }

  
    public function closeConnection()
    {
        $this->pdo->close();
    }
}
?>
