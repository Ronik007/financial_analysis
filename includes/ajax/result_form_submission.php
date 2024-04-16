<?php
// Include Database Connection File
include ('C:\xampp\htdocs\financial_analysis\config\db_connection.php');
include ('C:\xampp\htdocs\financial_analysis\classes\result.php');

// Get the Post Data
if ($_POST) {
    $response = array(); // Initialize response array
    $companyName = $_POST['company_name']; // Use camelCase for variable names
    $sql = "SELECT Code FROM company WHERE Name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $companyName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // CheckDataExistence
        $existID = Result::checkDataExists( $row['Code'], $_POST['quarter'], (int)$_POST['financial_year'] );
        if ( $existID == 0 ) {
            
            // Insert the Result Data and Get the Result
            $resultID = Result::insertResult($row['Code'], $_POST['quarter'], (int)$_POST['financial_year'], $_POST['amount_in'], (float)$_POST['current_rev'], (float)$_POST['current_expanse'], (float)$_POST['current_pat'], (float)$_POST['current_tax'], (float)$_POST['current_da'], (float)$_POST['prev_qoq_rev'], (float)$_POST['prev_qoq_expanse'], (float)$_POST['prev_qoq_pat'], (float)$_POST['prev_qoq_tax'], (float)$_POST['prev_qoq_da'], (float)$_POST['prev_yoy_rev'], (float)$_POST['prev_yoy_expanse'], (float)$_POST['prev_yoy_pat'], (float)$_POST['prev_yoy_tax'], (float)$_POST['prev_yoy_da']);
    
            $response['success'] = true;
            $response['msg'] = "Result Data has been succesfully added. ResultID is {$resultID}.";
        }

        else {
            $response['success'] = false;
            $response['msg'] = "Result already Added. ResultID is {$existID}.";
        }

    } else {
        $response['success'] = false;
        $response['msg'] = 'Company not found.';
    }

    // Close prepared statement
    $stmt->close();
} else {
    $response['success'] = false;
    $response['msg'] = 'No data received.';
}

// Return the $response
echo json_encode($response);
?>