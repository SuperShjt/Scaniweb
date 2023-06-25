<?php

include("DbConnection.php");

$dbConnection = new DatabaseConnection("localhost", "root", "", "scandiproduct");
$dbConnection->connect();
$conn = $dbConnection->getConnection();

$data = json_decode(file_get_contents('php://input'), true);

// Access the received data
foreach ($data as $product) {
  $sku = $product['sku'];
  $getdetele = "DELETE FROM products WHERE products.SKU = '$sku'";
  mysqli_query($conn,$getdetele);
  

}

