<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
</head>
<body>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order = $_POST['order'];
    $quantity = $_POST['quantity'];
    $cash = $_POST['cash'];


    $prices = [
        'Burger' => 50,
        'Fries' => 75,
        'Steak' => 150
    ];


    $totalCost = $prices[$order] * $quantity;


    if ($cash >= $totalCost) {
        $change = $cash - $totalCost;
        echo "<h1>Receipt</h1>";
        echo "<p>Order: $order</p>";
        echo "<p>Quantity: $quantity</p>";
        echo "<p>Total Price: $totalCost</p>";
        echo "<p>You Paid: $cash</p>";
        echo "<p>Your Change: $change</p>";
        echo "<p>Date of Order: " . date("Y-m-d H:i:s") . "</p>";
        echo "<a href=''>Go Back to Menu</a>";
    } else {
        echo "<h1>Sorry, balance not enough.</h1>";
       
    }
} else {
    ?>
    <h1>Menu</h1>
    <table style="width: 15%;" border="2">
        <thead>
            <tr>
                <th>Order</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Burger</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Fries</td>
                <td>75</td>
            </tr>
            <tr>
                <td>Steak</td>
                <td>150</td>
            </tr>
        </tbody>
    </table>


    <form method="POST" action="">
        <label for="order">Select an order:</label>
        <select name="order" id="order">
            <option value="Burger">Burger - 50</option>
            <option value="Fries">Fries - 75</option>
            <option value="Steak">Steak - 150</option>
        </select>


        <p>Quantity:</p>
        <input type="number" name="quantity" min="1" required>


        <p>Cash:</p>
        <input type="number" name="cash" required>


        <br><br>
        <input type="submit" value="Submit">
    </form>
<?php
}
?>


</body>
</html>
