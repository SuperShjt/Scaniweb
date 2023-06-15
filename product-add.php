<!DOCTYPE html>
<html>
<head>
  <title>Product Add</title>
   <link rel="stylesheet" href="Style/product_add_style.css" />
</head>
<body>
      <div class = "container">
          <h1>Product List</h1>

          
              <button id="submitButton" onclick="checkInputDataType()">Save</button>
              <button  onclick="location.href='Mainpage.php'">Cancel</button>
        </div><br><br>
      <div class = "container">
        <form id="product_form" action="Backend/SaveDB.php" method="post">
          <label> SKU  </label>
          <input
            type = "text"
            name = "SKU"
            placeholder="SKU ..."
          /><br><br>
          <label> Name  </label>
          <input
            type = "text"
            name = "Pname"
            placeholder="Product Name ..."
          /><br><br>
          <label> Price  </label>
          <input
            type = "number"
            name = "Pvalue"
            placeholder="price ..."
          /><br><br>
          <label>Type Switcher</label> 
          <select name="ProductType" id="ProductType" onchange="showHideFields()">
          <option value="">Select an option</option>
          <option value="option1">DVD</option>
          <option value="option2">Furniture</option>
          <option value="option3">Book</option>
          </select><br><br>

          <div id="DvD"  class="BlockShowing">
            <label> Size (MB) </label>
            <input
              type = "number"
              name = "size"
              placeholder = "Size"
               />
          </div>

          <div id="Furniture"  class="BlockShowing">
            <label> Height (CM) </label>
            <input
              type = "number"
              name = "Height"
              placeholder = "Height"
               /><br><br>
               <label> Width (CM) </label>
            <input
              type = "number"
              name = "Width"
              placeholder = "Width"
               /><br><br>
               <label> Lenght (CM) </label>
            <input
              type = "number"
              name = "Length"
              placeholder = "Length"
               /><br><br>
          </div>
          
          <div id="Book"  class="BlockShowing">
            <label> Weight (KG) </label>
            <input
              type = "number"
              name = "Weight"
              placeholder = "Weight"
               />
          </div>
        </form> 
      </div>

</body>
<script src="Js/script.js"></script>
</html>       