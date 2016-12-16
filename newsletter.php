<?php

// This file allows the administrator to view every order.
// This script is created in Chapter 11.

// Require the configuration before any PHP code as configuration controls error reporting.
require ('../includes/config.inc.php');

// Set the page title and include the header:
$page_title = 'View All Orders';
include ('./includes/header.html');
// The header file begins the session.

// Require the database connection:
require(MYSQL);

echo '<h3>View Newsletter Signups</h3><table border="0" width="100%" cellspacing="4" cellpadding="4">
<thead>
	<tr>
    <th align="center">ID</th>
    <th align="center">First Name</th>
    <th align="right">Last Name</th>
    <th align="right">Email</th>
  </tr></thead>
<tbody>';

// Make the query:
$q = "SELECT * FROM newsletter";

$r = mysqli_query ($dbc, $q);
while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {
	echo '<tr>
    <td align="center">' . $row['id'] . '</td>
    <td align="center">' . $row['firstname'] .'</td>
    <td align="right">' . $row['lastname'] .'</td>
    <td align="right">' . $row['email'] . '</td>
  </tr>';
}

echo '</tbody></table>';

// Include the footer file to complete the template.
include ('./includes/footer.html');
?>