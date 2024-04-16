<?php

include ('C:\xampp\htdocs\financial_analysis\config\db_connection.php');

class Result
{

    public $resultID;

    public $companyCode;

    public $quarter;

    public $financialYear;

    public $amountIn;

    public $currentRev;

    public $currentExpanse;

    public $currentPAT;

    public $currentTax;

    public $currentDA;

    public $qoqRev;

    public $qoqExpanse;

    public $qoqPAT;

    public $qoqTax;

    public $qoqDA;

    public $yoyRev;

    public $yoyExpanse;

    public $yoyPAT;

    public $yoyTax;

    public $yoyDA;

    // Constructor 
    public function __construct($resultID, $companyCode, $quarter, $financialYear, $amountIn, $currentRev, $currentExpanse, $currentPAT, $currentTax, $currentDA, $qoqRev, $qoqExpanse, $qoqPAT, $qoqTax, $qoqDA, $yoyRev, $yoyExpanse, $yoyPAT, $yoyTax, $yoyDA)
    {
        $this->resultID = $resultID;
        $this->companyCode = $companyCode;
        $this->quarter = $quarter;
        $this->financialYear = $financialYear;
        $this->amountIn = $amountIn;
        $this->currentRev = $currentRev;
        $this->currentExpanse = $currentExpanse;
        $this->currentPAT = $currentPAT;
        $this->currentTax = $currentTax;
        $this->currentDA = $currentDA;
        $this->qoqRev = $qoqRev;
        $this->qoqExpanse = $qoqExpanse;
        $this->qoqPAT = $qoqPAT;
        $this->qoqTax = $qoqTax;
        $this->qoqDA = $qoqDA;
        $this->yoyRev = $yoyRev;
        $this->yoyExpanse = $yoyExpanse;
        $this->yoyPAT = $yoyPAT;
        $this->yoyTax = $yoyTax;
        $this->yoyDA = $yoyDA;
    }

    public static function checkDataExists($companyCode, $quarter, $financialYear) {
        global $conn;
        $tableName = 'financial_results';

        // Select Query with Where clause
        $sql = "SELECT result_id FROM {$tableName} WHERE company_code = ? AND quarter = ? AND financial_year = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('isi', $companyCode, $quarter, $financialYear);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ( $result->num_rows == 0 ) {
            return 0;
        }
        else {
            $row = $result->fetch_assoc();
            return $row['result_id'];
        }
    }

    public static function getResult($resultID)
    {
        global $conn;
        $tableName = 'financial_results';

        // Select Query Using the Result ID
        $sql = "SELECT * FROM {$tableName} WHERE result_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $resultID);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // Create New Instance of the Result class with data from the Database

            $resultObj = new Result($resultID, $row['company_code'], $row['quarter'], $row['financial_year'], $row['amount_in'], $row['current_rev'], $row['current_expanse'], $row['current_pat'], $row['current_tax'], $row['current_da'], $row['qoq_rev'], $row['qoq_expanse'], $row['qoq_pat'], $row['qoq_tax'], $row['qoq_da'], $row['yoy_rev'], $row['yoy_expanse'], $row['yoy_pat'], $row['yoy_tax'], $row['yoy_da']);

            return $resultObj;
        }
    }

    public static function insertResult($companyCode, $quarter, $financialYear, $amountIn, $currentRev, $currentExpanse, $currentPAT, $currentTax, $currentDA, $qoqRev, $qoqExpanse, $qoqPAT, $qoqTax, $qoqDA, $yoyRev, $yoyExpanse, $yoyPAT, $yoyTax, $yoyDA)
    {
        global $conn;
        $tableName = 'financial_results';

        // Insert Query for the Result
        $sql = "INSERT INTO {$tableName} (company_code, quarter, financial_year, amount_in, current_rev, current_expanse, current_pat, current_tax, current_da, qoq_rev, qoq_expanse, qoq_pat, qoq_tax, qoq_da, yoy_rev, yoy_expanse, yoy_pat, yoy_tax, yoy_da) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('isisddddddddddddddd', $companyCode, $quarter, $financialYear, $amountIn, $currentRev, $currentExpanse, $currentPAT, $currentTax, $currentDA, $qoqRev, $qoqExpanse, $qoqPAT, $qoqTax, $qoqDA, $yoyRev, $yoyExpanse, $yoyPAT, $yoyTax, $yoyDA);
        $stmt->execute();
        $resultID = $stmt->insert_id;
        $stmt->close();

        return $resultID;
    }
}
?>