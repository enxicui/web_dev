<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>payments</title>
    <style>
        .secondtable
        {
            float:right;
            margin-right: 100px;
            margin-top: 100px;
            width: auto;
            border-collapse: collapse;
        
        }
        
        th, td {
            text-align:center;
            padding: 10px;
        }
        
    
    </style>
    </head>
<body>
<!--    //            http://www.significanttechno.com/-->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classicmodels";
$cusnm = $_GET['customerNumber'];
$conn = mysqli_connect($servername, $username, $password, $dbname);
//            https://stackoverflow.com/questions/27345532/php-wont-connect-to-mysql
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
try
{
$sql = "SELECT customers.salesRepEmployeeNumber, customers.creditLimit, customers.phone, payments.amount FROM payments, customers where customers.customerNumber = '$cusnm' AND payments.customerNumber = '$cusnm'";
}
catch(Exception $e) {
  echo "Error" .$e->errorMessage();
}
    //            https://www.w3schools.com/php/php_exception.asp
 try
{  
     //     https://www.w3schools.com/php/func_mysqli_num_rows.asp
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    
   $product_p = "<table class='secondtable' border = '1'>";
        $product_p .= "<tr><th>Phone Number </th><th>Sales Rep </th><th>Credit Limit</th><th>Payment</th></tr>";

     $sum = 0;
     
     while($row = mysqli_fetch_assoc($result)) {
        $sum += $row["amount"];
        $product_p .= "<tr><td>" . $row["phone"] . "</td><td>" . $row["salesRepEmployeeNumber"] . "</td><td>" . $row["creditLimit"] . "</td><td>" . $row["amount"] .  "</td></tr>";
    };
    $product_p .="<tr>" . "<td><b>Total Payment</b></td>" . "<td>" . $sum . "</td></tr>";
    $product_p .="</table>";
    echo $product_p;
}
    
else {
    echo "0 results";
}
 }
    //   https://www.w3schools.com/php/php_exception.asp   
    catch(index1 $e) {
  echo "Error" .$e->errorMessage();
}  

mysqli_close($conn);

?>
    </body>
</html>