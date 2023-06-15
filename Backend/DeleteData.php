<?php

include("DbConnection.php");

$dbConnection = new DatabaseConnection("localhost", "root", "", "scandiproduct");
$dbConnection->connect();
$conn = $dbConnection->getConnection();

// Step 1: Select the value from the specific table
$specificTable = "products";
if (isset($_GET['sku'])) {
    $sku = $_GET['sku'];

    // Prepare and execute the select query
    $stmt = $conn->prepare("SELECT SKU FROM $specificTable WHERE SKU = ?");
    $stmt->bind_param("s", $sku);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Step 2: Use the selected value to search across all tables in the database
        while ($row = $result->fetch_assoc()) {
            $columnName = $row["SKU"];

            // Prepare and execute the dynamic delete queries
            $tableQuery = $conn->prepare("SELECT TABLE_NAME, COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME <> ?");
            $tableQuery->bind_param("s", $specificTable);
            $tableQuery->execute();
            $tableResult = $tableQuery->get_result();

            while ($tableRow = $tableResult->fetch_assoc()) {
                $tableName = $tableRow["TABLE_NAME"];
                $columnToDelete = $tableRow["COLUMN_NAME"];

                // Prepare and execute the delete query for each table
                $deleteQuery = $conn->prepare("DELETE FROM $tableName WHERE $columnToDelete = ?");
                $deleteQuery->bind_param("s", $sku);
                $deleteQuery->execute();

                if ($deleteQuery->affected_rows > 0) {
                    // Deletion successful
                    // ...
                } else {
                    // Failed to delete
                    // ...
                }

                // Close the delete statement
                $deleteQuery->close();
            }

            // Close the table query statement
            $tableQuery->close();
        }
    } else {
        // SKU not found in the specific table
        http_response_code(404); // Set response status to 404 (Not Found)
        echo "Product with SKU $sku not found.";
    }

    // Close the select statement
    $stmt->close();
} else {
    // SKU parameter is not provided
    http_response_code(400); // Set response status to 400 (Bad Request)
    echo "SKU parameter is missing.";
}

// Close the database connection
$dbConnection->close();
?>

