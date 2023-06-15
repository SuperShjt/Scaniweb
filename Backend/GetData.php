<?php

include("DbConnection.php");


$dbConnection = new DatabaseConnection("localhost","root","","scandiproduct"); 
$dbConnection->connect();
$conn = $dbConnection->getConnection();
$queryDvd = "SELECT products.SKU,products.PName,products.Price,dvds.Size FROM products JOIN dvds ON products.SKU=dvds.PSku";
$queryBook = "SELECT products.SKU,products.PName,products.Price,books.Weight FROM products JOIN books ON products.SKU = books.BSku";
$queryFurniture = "SELECT products.SKU,products.PName,products.Price,furniture.Length,furniture.Width,furniture.Height FROM products JOIN furniture ON products.SKU=furniture.Psku";

$RDvds=mysqli_query($conn,$queryDvd);
$RBooks=mysqli_query($conn,$queryBook);
$Rfurniture=mysqli_query($conn,$queryFurniture);

$data = array(); // Create an empty array to hold the fetched data

while ($row = $RDvds->fetch_assoc()) {
    $data[] = $row; // Add each row to the data array
}
while ($row = $RBooks->fetch_assoc()) {
    $data[] = $row;
}
while ($row = $Rfurniture->fetch_assoc()) {
    $data[] = $row;
}
// Encode the data array as JSON and output it
$json = json_encode($data);
echo $json;
?>


