<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>payments</title>
    <style>
        body
        {
            background-color:#eeedf2;
        }
        #sele
        {
          
            margin-bottom: 20px;
        }
        #firstTable
        {
        
            margin-left: 50px;
            width: auto;
             
           
/*            background-color: darkgrey;*/
        }
                th, td {
            text-align:center;
            padding: 10px;
        }
        tr:nth-child(even){
        background-color:#cbced8;
        }
    
    </style>
</head>

<body>
     <?php include 'navigationbar.php';?>
<div id='sele' style="margin-left: 10%">
<label for='mySelect'><b>Select the amount of Payments</b></label>
        <select  id="mySelect" onchange="number()">
        <option value="20">20</option>
        <option value="40">40</option>
        <option value="60">60</option>
        </select>
    </div>
    
    <div><p id="demo"></p>
        <p id='myDemo'></p></div>
        

<!-- http://www.significanttechno.com/-->
    <?php
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
$sql = "SELECT * FROM payments order by paymentDate desc LIMIT 20 OFFSET 0";
$result = mysqli_query($conn, $sql);
}
catch(payments $e) {
  echo "Error" .$e->errorMessage();
}
    
try
{
    //     https://www.w3schools.com/php/func_mysqli_num_rows.asp
if (mysqli_num_rows($result) > 0){
    echo '<div>';
    
    $product_p = "<table id = 'firstTable'>";
    $product_p .= "<tr><th>Customer Number</th><th>Check Number</th><th>Payment Date</th><th>Amount</th></tr>";
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
    catch(payments $e) {
  echo "Error" .$e->errorMessage();
}


mysqli_close($conn);

?>
    <div style = "margin-top: 800px">
<footer style="bottom:0">
<?php include 'footer.php'; ?>
</footer>
    </div>
    


    <script type="text/javascript">
        function number(show) {
            document.getElementById("firstTable").style.display = "none";
            var show = document.getElementById("mySelect").value;
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("myDemo").innerHTML = this.responseText;
                }
            };

            xmlhttp.open("GET", "show.php?show=" + show, true);
            xmlhttp.send();

        }
        
         function customer(customerNumber) {

            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("demo").innerHTML = this.responseText;
                }
            };

            xmlhttp.open("GET", "customers.php?customerNumber=" + customerNumber, true);
                     xmlhttp.send();
         }

    
 

    </script>
</body>

