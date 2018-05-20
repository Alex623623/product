<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classicmodels";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $conn->prepare("SELECT productName, productLine, productScale, productVendor FROM products"); 
    $query->execute();

    // set the resulting array to associative
    
    $result =$query->fetchAll();
    $body = '';
    echo "<table style='border: solid 1px black;'>";
    echo "<tr><th>Product</th><th>Line</th><th>Scale</th><th>Vendor</th></tr>";
    foreach($result as $r) { 
        $body .= "<tr><td style='width:250px;border:1px dashed blue;'>" .  $r['productName'] . '</td>' ;
        $body .= "<td style='width:250px;border:1px dashed blue;'>" . $r['productLine'] . '</td>';
        $body .= "<td style='width:250px;border:1px dashed blue;'>" . $r['productScale'] . '</td>';
        $body .= "<td style='width:250px;border:1px dashed blue;'>" . $r['productVendor'] . '</td>';
        $body .= '</tr>';
        
    };
    echo $body . '</table>';

$conn = null;

?>