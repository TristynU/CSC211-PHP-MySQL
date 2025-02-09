<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Product Cost Calculator</title>
</head>
<body>
<?php

$price = $_POST['price'];
$quantity = $_POST['quantity'];
$discount = $_POST['discount'];
$tax = $_POST['tax'];
$shipping = $_POST['shipping'];
$payments = $_POST['payments'];

$total = (($price * $quantity) + $shipping) - $discount;

$taxrate = ($tax / 100) + 1;

$total = $total + $taxrate;

$monthly = $total / $payments;

$total = round($total, 2);
$monthly = round($monthly, 2);

$total = number_format($total, 2);
$monthly = number_format($monthly, 2);

print "<p>You have selected to purchase:<br>
<span class=\"number\">$quantity</span> widget(s) at <br>
$<span class=\"number\">$price</span>
price each plus a <br>
$<span class=\"number\">$shipping</span> shipping cost and a <br>
<span class=\"number\">$tax</span>
percent tax rate.<br>
After your $<span class=\"number\">$discount</span>
discount, the total cost is
$<span class=\"number\">$total</span>.<br>
Divided over <span class=\"number\">$payments</span>
monthly payments, that would be
$<span class=\"number\">$monthly</span> each.</p>";

?>
</body>
</html>