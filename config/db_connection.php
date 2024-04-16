<?php
    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'financial_analysis';

    global $conn;
    $conn = new mysqli($db_host,$db_username,$db_password,$db_name);

    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    // Create the Tables if not exist

    $tableName = 'financial_results';
    $sql = "CREATE TABLE IF NOT EXISTS $tableName (
        result_id INT AUTO_INCREMENT PRIMARY KEY,
        company_code INT(6),
        quarter VARCHAR(2),
        financial_year INT(2),
        amount_in VARCHAR(2),
        current_rev DECIMAL(10, 2),
        current_expanse DECIMAL(10, 2),
        current_pat DECIMAL(10, 2),
        current_tax DECIMAL(10, 2),
        current_da DECIMAL(10, 2),
        qoq_rev DECIMAL(10, 2),
        qoq_expanse DECIMAL(10, 2),
        qoq_pat DECIMAL(10, 2),
        qoq_tax DECIMAL(10, 2),
        qoq_da DECIMAL(10, 2),
        yoy_rev DECIMAL(10, 2),
        yoy_expanse DECIMAL(10, 2),
        yoy_pat DECIMAL(10, 2),
        yoy_tax DECIMAL(10, 2),
        yoy_da DECIMAL(10, 2)
    )";

    if ($conn->query($sql) !== TRUE) {
        echo "Error creating table: " . $conn->error;
    }
?>  