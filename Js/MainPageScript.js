 // Function to fetch product data from the database
 async function fetchProductData() {
  try {
    const response = await fetch('http://localhost/codes/Scaniweb/Backend/GetData.php'); // Replace with your server endpoint URL
    const products = await response.json();
    products.forEach(function(product) {
      addProduct(product);
    });
  } catch (error) {
    console.error(error);
  }
}

function addProduct(product) {
  const productList = document.getElementById("product-list");
  const productDiv = document.createElement("div");
  productDiv.classList.add("product-item");
  productDiv.dataset.sku = product.SKU;
 

  const deleteCheckbox = document.createElement("input");
  deleteCheckbox.type = "checkbox";
  deleteCheckbox.dataset.productId = product.SKU;
  deleteCheckbox.classList.add("delete-checkbox");

  const skuSpan = document.createElement("span");
  skuSpan.textContent = "SKU: " + product.SKU;

  const nameSpan = document.createElement("span");
  nameSpan.textContent = "Name: " + product.PName;

  const priceSpan = document.createElement("span");
  priceSpan.textContent = "Price: $" + product.Price;

  let attributeSpan;
  if (product.Weight) {
    attributeSpan = document.createElement("span");
    attributeSpan.textContent = "Weight: " + product.Weight + " Kg";
  } else if (product.Size) {
    attributeSpan = document.createElement("span");
    attributeSpan.textContent = "Size: " + product.Size + " MB";
  } else if (product.Length && product.Width && product.Height) {
    attributeSpan = document.createElement("span");
    attributeSpan.textContent = "Dimensions: " + product.Length + "x" + product.Width + "x" + product.Height;
  }

  productDiv.appendChild(deleteCheckbox);
  productDiv.appendChild(skuSpan);
  productDiv.appendChild(document.createElement("br"));
  productDiv.appendChild(nameSpan);
  productDiv.appendChild(document.createElement("br"));
  productDiv.appendChild(priceSpan);
  productDiv.appendChild(document.createElement("br"));
  productDiv.appendChild(attributeSpan);
  productDiv.appendChild(document.createElement("br"));

  productList.appendChild(productDiv);
}



async function deleteSelectedProducts() {
  const checkboxes = document.querySelectorAll('.delete-checkbox');
  const selectedProducts = [];

  checkboxes.forEach(function(checkbox) {
    if (checkbox.checked) {
      const productId = checkbox.dataset.productId;
      const productDiv = checkbox.parentNode;
      const sku = productDiv.dataset.sku;
 

      selectedProducts.push({
        
        sku: sku, 
      });

      productDiv.remove();
    }
  });

  try {
    const response = await fetch('Backend/DeleteData.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(selectedProducts)
      
    });
   
    // Handle the response from the PHP file if needed
  } catch (error) {
    console.error(error);
  }
}