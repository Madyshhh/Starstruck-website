<?php

include 'header.php';
include 'functions.php';

// checks if user is logged in, if not, then takes user to the index page
if (!isset($_SESSION["username"])) {
    header("location: index.php");
    
}

// import stylesheet for particular page
echo '<link rel="stylesheet" href="css/basket.css">';
?> 

</head>

<body>
    <!-- Navigation -->
        <ul class="nav-list">
            <li class="menu-button"><a href="search.php">Search</a></li>
        </ul>

    </nav>

    <!-- Basket contents -->
    <p class="main-heading">Shopping basket</p>

    <div class="basket-container">
        <div class="product">
            <p class="product-heading">Product</p>
            <p class="description-heading">Description</p>
            <p class="price-heading">Price</p>

            <img src="images/person.jpg" alt="Image of the product" class="product-image">

            <p class="description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius fugit excepturi fuga
                repellat, expedita eveniet unde quasi, at voluptatum atque corporis cupiditate dicta quae nam sint,
                architecto dolore quisquam quaerat.</p>

            <p class="product-price">£25.00</p>

            <div class="add-or-remove-buttons">
                <p>Quantity: </p>
                <button class="button">-</button>
                <p>1</p><button class="button">+</button>
            </div>
        </div>

        <!-- Line inbetween basket contents -->
        <p class="line-between"></p>

        <div class="product">
            <p class="product-heading">Product</p>
            <p class="description-heading">Description</p>
            <p class="price-heading">Price</p>

            <img src="images/person.jpg" alt="Image of the product" class="product-image">

            <p class="description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime quis recusandae
                porro. Nulla quam vitae earum aspernatur fugiat quas incidunt consectetur quaerat. Enim, est recusandae
                eos iure nihil a facere?</p>

            <p class="product-price">£25.00</p>

            <div class="add-or-remove-buttons">
                <p>Quantity: </p>
                <button class="button">-</button>
                <p>1</p><button class="button">+</button>
            </div>
        </div>

        <p class="line-between"></p>
    </div>

    <!-- Total price and proceed button -->
    <div class="show-total-checkout">
        <div class="price">
        <p id="show-total">Total price:</p><p id="total-price">£25.00</p>
        </div>

        <button type="submit" class="proceed-checkout">Proceed to checkout</button>
    </div>
</body>

</html>