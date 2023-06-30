<!DOCTYPE html>
<html>
<head>
  <title>Product List</title>
  <link rel="stylesheet" href="Style/Mainpage.css" />
 
</head>
<body>
  <div>
    <h1>Product List</h1>
    <button onclick="location.href='product-add.php'">ADD</button>
    <button onclick="deleteSelectedProducts()">MASS DELETE</button>
  </div>
  <br><br>
  <div id="product-list">
    <!-- Products will be dynamically added here -->
  </div>
</body>
<script src="Js/MainPageScript.js"></script>
<script>
    window.addEventListener('load', fetchProductData());
  </script>
</html>
