<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <style>
    body
        {
            background-color:#eeedf2;
        }

    #trr
        {
            font-size: 20px;
        }
    th, td {
            text-align:center;
            padding: 20px;
        }
    #table_index
        {
            border-collapse: collapse;
            width: 100%;
            font-family:serif;
            overflow-x: auto;
        }
        
    #tablediv{
            margin-left: 13%;
            margin-right: 10%;
        
        
        }
    tr:nth-child(even){
        background-color:#cbced8;
        }
    </style>
</head>
    <body>
        <?php include 'navigationbar.php';?>
        <div id = "tablediv">
<?php
//            http://www.significanttechno.com/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classicmodels";
$conn = mysqli_connect($servername, $username, $password, $dbname);

//            https://stackoverflow.com/questions/27345532/php-wont-connect-to-mysql
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//            https://www.w3schools.com/php/php_exception.asp
try
{
$sql = "SELECT * FROM productlines";
$result = mysqli_query($conn, $sql);
}
catch(Exception $e) {
  echo "Error" .$e->errorMessage();
}
 try
{ 
//     https://www.w3schools.com/php/func_mysqli_num_rows.asp
if (mysqli_num_rows($result) > 0) {
    $product = "<table id='table_index'>";
    $product .= "<tr id='trr'><th style='width:17%'; id='productline_t'>Product Lines</th><th id='description_t'>Description</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        $product .= "<tr><td>" . $row["productLine"] . "</td><td>" . $row["textDescription"] . "</td></tr>"; 
//        echo "productLine: " . $row["productLine"]. " - textDescription: " . $row["textDescription"]. "<br>";
    }
    $product .="</table>";
    echo $product;
} else {
    echo "0 results";
}
 }
//   https://www.w3schools.com/php/php_exception.asp    
            catch(index1 $e) {
  echo "Error" .$e->errorMessage();
}
mysqli_close($conn);
 include 'footer.php';
?>
        </div>
    </body>
</html>
