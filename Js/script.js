
    function showHideFields() {
      var selectBox = document.getElementById('ProductType');
      var selectedOption = selectBox.options[selectBox.selectedIndex].value;
      var Dvd = document.getElementById('DvD');
      var Furniture = document.getElementById('Furniture');
      var Book = document.getElementById('Book');

      if (selectedOption === 'option1') {
        Dvd.style.display = 'block';
        Furniture.style.display = 'none';
        Book.style.display= 'none';
      } else if (selectedOption === 'option2') {
        Dvd.style.display = 'none';
        Furniture.style.display = 'block';
        Book.style.display= 'none';
      } else if (selectedOption === 'option3') {
        Dvd.display = 'none';
        Furniture.style.display = 'none';
        Book.style.display= 'block';
      }
      else {
        Dvd.style.display = 'none';
        Furniture.style.display = 'none';
        Book.style.display= 'None';

 
      }
    }
    function Submitme() {
      var SKU = document.getElementsByName("SKU")[0].value;
      var Pname = document.getElementsByName("Pname")[0].value;
      var Price = document.getElementsByName("Pvalue")[0].value;
      var ProductType = document.getElementById("ProductType").value;
    
      if (SKU === "" || Pname === "" || Price === "" || ProductType === "") {
        alert("Please fill in all fields");
        return;
      }
    
      if (ProductType === "option1") {
        var size = document.getElementsByName("size")[0].value;
        if (size === "") {
          alert("Please enter the DVD size");
          return;
        }
      }
    
      if (ProductType === "option2") {
        var height = document.getElementsByName("Height")[0].value;
        var width = document.getElementsByName("Width")[0].value;
        var length = document.getElementsByName("Length")[0].value;
        if (height === "" || width === "" || length === "") {
          alert("Please enter the furniture dimensions");
          return;
        }
      }
    
      if (ProductType === "option3") {
        var weight = document.getElementsByName("Weight")[0].value;
        if (weight === "") {
          alert("Please enter the book weight");
          return;
        }
      }
     document.getElementById('product_form').submit();
    }
    function checkInputDataType () {
      var skuInput = document.getElementsByName('SKU')[0];
      var PnameIput = document.getElementsByName("Pname")[0];
      var priceInput = document.getElementsByName('Pvalue')[0];
      var sizeInput = document.getElementsByName('size')[0];
      var heightInput = document.getElementsByName('Height')[0];
      var widthInput = document.getElementsByName('Width')[0];
      var lengthInput = document.getElementsByName('Length')[0];
      var weightInput = document.getElementsByName('Weight')[0];
      var Ptype =  document.getElementById('ProductType');
    
      var sku = skuInput.value.trim();
      var Pname = PnameIput.value.trim();
      var price = priceInput.value.trim();
      var size = sizeInput.value.trim();
      var height = heightInput.value.trim();
      var width = widthInput.value.trim();
      var length = lengthInput.value.trim();
      var weight = weightInput.value.trim();
    
      var isValid = true;
    
      // Check SKU input data type (alphanumeric)
      if (!/^[a-zA-Z0-9]+$/.test(sku)) {
        isValid = false;
        alert('SKU wrong or missing.');
        skuInput.classList.add('error');
      } else {
        skuInput.classList.remove('error');
      }

      //Check if Name input
      if(Pname === ""){
        isValid = false;
        alert('Name is missing,');
        PnameIput.classList.add('error');
      }else{
        PnameIput.classList.remove('error');
      }


      // Check price input data type (numeric)
      if (isNaN(price) || price === '') {
        isValid = false;
        alert('price wrong or missing.');
        priceInput.classList.add('error');
      } else {
        priceInput.classList.remove('error');
      }

      //Dvd
    if(Ptype === 'option1')
    {
        // Check size input data type (numeric)
        if (isNaN(size) || size === '') {
          isValid = false;
          alert('size wrong.');
          sizeInput.classList.add('error');
        } else {
          sizeInput.classList.remove('error');
        }

    }
    

      //furniture
      if(Ptype === 'option2')
      {
            // Check height input data type (numeric)
       if (isNaN(height) || height === '') {
        isValid = false;
        alert('height wrong.');
        heightInput.classList.add('error');
       } else {
        heightInput.classList.remove('error');
       }
    
      // Check width input data type (numeric)
        if (isNaN(width) || width === '') {
        isValid = false;
        alert('width wrong.');
        widthInput.classList.add('error');
       } else {
        widthInput.classList.remove('error');
        }
    
      // Check length input data type (numeric)
       if (isNaN(length) || length === '') {
        isValid = false;
        alert('length wrong.');
        lengthInput.classList.add('error');
       } else {
        lengthInput.classList.remove('error');
        }
     }

     //Book
      if(Ptype === 'option3'){

          // Check weight input data type (numeric)
      if (isNaN(weight) || weight === '') {
        isValid = false;
        alert('weight wrong.');
        weightInput.classList.add('error');
      } else {
        weightInput.classList.remove('error');
      }
    



      }
    
      if (isValid) {
        // Submit the form or perform any other actions
        Submitme();
      } else {
        // Show an error message or handle the invalid input accordingly
        alert('Please enter valid input for all fields.');
      }
    }
    
