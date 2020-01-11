<!--//            http://www.significanttechno.com/-->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classicmodels";
$number = $_GET["show"];
$conn = mysqli_connect($servername, $username, $password, $dbname);
//            https://stackoverflow.com/questions/27345532/php-wont-connect-to-mysql
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//            https://www.w3schools.com/php/php_exception.asp
try
{
$sql = "SELECT * FROM payments order by payments.paymentDate desc LIMIT $number OFFSET 0";
$result = mysqli_query($conn, $sql);
}
catch(Exception $e) {
  echo "Error" .$e->errorMessage();
}
 try
{  
     //     https://www.w3schools.com/php/func_mysqli_num_rows.asp
if (mysqli_num_rows($result) > 0) {
    echo '<div style="width: 100%; text-align:center">';
    
    $product_p = "<table id = 'firstTable'>";
    $product_p .= "<tr><th>customerNumber</th><th>checkNumber</th><th>paymentDate</th><th>amount</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        $detail = '<button class="button" onclick="customer('.$row["customerNumber"].')">' . $row["customerNumber"]."</button>";
        $product_p .= "<tr><td>" . $detail . "</td><td>" . $row["checkNumber"] . "</td><td>" . $row["paymentDate"] . "</td><td>" . $row["amount"] . "</td></tr>";
    }
    $product_p .="</table>";
    echo $product_p;
     echo '</div>';
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

    