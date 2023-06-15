<?php
include("DbConnection.php");

class Product
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insertProduct($SKU, $Pname, $Price)
    {
        $myquery = "INSERT INTO products (SKU, PName, Price) VALUES ('$SKU', '$Pname', '$Price')";
        mysqli_query($this->conn, $myquery);
    }
}

class DVD
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insertDVD($size, $PSku)
    {
        $myquery = "INSERT INTO dvds (Size, PSku) VALUES ('$size', '$PSku')";
        mysqli_query($this->conn, $myquery);
    }
}

class Furniture
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insertFurniture($length, $width, $height, $PSku)
    {
        $myquery = "INSERT INTO furniture (Length, Width, Height, PSku) VALUES ('$length', '$width', '$height', '$PSku')";
        mysqli_query($this->conn, $myquery);
    }
}

class Book
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insertBook($weight, $BSku)
    {
        $myquery = "INSERT INTO books (Weight, BSku) VALUES ('$weight', '$BSku')";
        mysqli_query($this->conn, $myquery);
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $SKU = $_POST['SKU'];
    $Pname = $_POST['Pname'];
    $Price = $_POST['Pvalue'];
    $PType = $_POST['ProductType'];

    $dbConnection = new DatabaseConnection("localhost","root","","scandiproduct"); 
    $dbConnection->connect();
    $conn = $dbConnection->getConnection();

    $product = new Product($conn);
    $product->insertProduct($SKU, $Pname, $Price);

    if ($PType == "option1") {
        $size = $_POST['size'];
        $dvd = new DVD($conn);
        $dvd->insertDVD($size, $SKU);
    } else if ($PType == "option2") {
        $height = $_POST['Height'];
        $width = $_POST['Width'];
        $length = $_POST['Length'];
        $furniture = new Furniture($conn);
        $furniture->insertFurniture($length, $width, $height, $SKU);
    } else if ($PType == "option3") {
        $weight = $_POST['Weight'];
        $book = new Book($conn);
        $book->insertBook($weight, $SKU);
    }
    
} else {
    echo "Failed to post Data!!";
}
echo "<script type='text/javascript'>
						
						location.href = '../Mainpage.php';
						</script>";
?>
