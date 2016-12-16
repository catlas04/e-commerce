<?php

// This file is the final page in the checkout process.
// This script is begun in Chapter 10.

// Require the configuration before any PHP code:
require ('./includes/config.inc.php');
include ('./includes/checkout_header.html');
// Require the database connection:
require (MYSQL);

// Clear out the shopping cart:
$oid = $_GET["id"];
$r = mysqli_query($dbc, "CALL get_order_contents($oid)");

//From includes/email_receipt.php

echo '<table border="0" cellspacing="8" cellpadding="6">';

echo "<tr><th>Category</th><th>Quantity</th><th>Price Per</th><th>Subtotal</th></tr>";

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

	echo '<tr><td>' . $row['category'] . '::' . $row['name'] . '</td>
		<td align="center">' . $row['quantity'] . '</td>
		<td align="right">$' . $row['price_per'] . '</td>
		<td align="right">$' . $row['subtotal'] . '</td>
	</tr>
	';

	$shipping = $row["shipping"];
	$total = $row["total"];
}

echo '<tr>
	<td colspan="2"> </td><th align="right">Shipping &amp; Handling</th>
	<td align="right">$' . $shipping . '</td>
</tr>
';

echo '<tr>
	<td colspan="2"> </td><th align="right">Total</th>
	<td align="right">$' . $total . '</td>
</tr>
';

echo "</table>";

include ('./includes/footer.html');
?>
