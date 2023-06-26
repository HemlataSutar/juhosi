<!DOCTYPE html>
<html>
<head>
  <title>Customer Order Form</title>
  <style>
    .error {
      color: red;
    }
  </style>
</head>
<body>
  <h1>Customer Order Form</h1>
  <form id="orderForm" onsubmit="validateForm(event)">
    <label for="name">Name:</label>
    <input type="text" id="name" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" required>
    <br>
    <label for="product">Product:</label>
    <select id="product" required>
      <option value="">Select a product</option>
      <option value="Product A">Product A</option>
      <option value="Product B">Product B</option>
      <option value="Product C">Product C</option>
    </select>
    <br>
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" min="1" required>
    <br>
    <label for="date">Date:</label>
    <input type="date" id="date" required>
    <br>
    <label for="length">Length:</label>
    <input type="text" id="length" pattern="[0-9]+(\.[0-9]+)?" required>
    <br>
    <label for="breadth">Breadth:</label>
    <input type="text" id="breadth" pattern="[0-9]+(\.[0-9]+)?" required>
    <br>
    <label for="height">Height:</label>
    <input type="text" id="height" pattern="[0-9]+(\.[0-9]+)?" required>
    <br>
    <input type="submit" value="Submit">
  </form>

  <script>
    function validateForm(event) {
      event.preventDefault(); // Prevent form submission

      // Get form input values
      const nameInput = document.getElementById('name');
      const emailInput = document.getElementById('email');
      const productInput = document.getElementById('product');
      const quantityInput = document.getElementById('quantity');
      const dateInput = document.getElementById('date');
      const lengthInput = document.getElementById('length');
      const breadthInput = document.getElementById('breadth');
      const heightInput = document.getElementById('height');

      // Clear previous error messages
      const errorMessages = document.querySelectorAll('.error');
      errorMessages.forEach(errorMessage => errorMessage.remove());

      // Perform validation
      let isValid = true;

      if (nameInput.value.trim() === '') {
        displayError(nameInput, 'Please enter your name');
        isValid = false;
      }

      if (emailInput.value.trim() === '') {
        displayError(emailInput, 'Please enter your email');
        isValid = false;
      } else if (!isValidEmail(emailInput.value.trim())) {
        displayError(emailInput, 'Please enter a valid email address');
        isValid = false;
      }

      if (productInput.value === '') {
        displayError(productInput, 'Please select a product');
        isValid = false;
      }

      if (quantityInput.value.trim() === '' || quantityInput.value <= 0) {
        displayError(quantityInput, 'Please enter a valid quantity');
        isValid = false;
      }

      if (dateInput.value === '') {
        displayError(dateInput, 'Please enter a date');
        isValid = false;
      }

      if (lengthInput.value.trim() === '' || !isValidFloat(lengthInput.value.trim())) {
        displayError(lengthInput, 'Please enter a valid length');
        isValid = false;
      }

      if (breadthInput.value.trim() === '' || !isValidFloat(breadthInput.value.trim())) {
        displayError(breadthInput, 'Please enter a valid breadth');
        isValid = false;
      }

      if (heightInput.value.trim() === '' || !isValidFloat(heightInput.value.trim())) {
        displayError(heightInput, 'Please enter a valid height');
        isValid = false;
      }

      // If form is valid, submit the form
      if (isValid) {
        document.getElementById('orderForm').submit();
      }
    }

    function displayError(inputElement, errorMessage) {
      const errorElement = document.createElement('span');
      errorElement.classList.add('error');
      errorElement.textContent = errorMessage;
      inputElement.insertAdjacentElement('afterend', errorElement);
    }

    function isValidEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }

    function isValidFloat(value) {
      return /^\d+(\.\d+)?$/.test(value);
    }
  </script>
</body>
</html>
