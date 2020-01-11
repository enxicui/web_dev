<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Offices</title>
    <style>
        body
        {
            background-color:#eeedf2;
        }
        #table1{
            border-collapse: collapse;
            padding-top: 10%;
        }
        th, td {
            text-align:center;
            padding: 5px;
        }
/*
        td:nth-child(even){
        background-color:#cbced8;
        }
         th:nth-child(even){
        background-color:#cbced8;
        }
*/
/*        https://www.w3schools.com/css/tryit.asp?filename=trycss_buttons_animate2*/
        #more_info{
            position: relative;
    background-color: #9fa4b5;
    border: none;
    font-size: 13px;
    color: #FFFFFF;
    padding: 8px;
    width: 50px;
    text-align: center;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
        }
        #more_info:after {
    content: "";
    background: #f1f1f1;
    display: block;
    position: absolute;
    padding-top: 300%;
    padding-left: 350%;
    margin-left: -20px !important;
    margin-top: -10%;
    opacity: 0;
    transition: all 0.8s
}

        #more_info:active:after {
    padding: 0;
    margin: 0;
    opacity: 1;
    transition: 0s
}

    </style>
</head>

<body>
     <?php include 'navigationbar.php';?>
    
    
<!--   //            http://www.significanttechno.com/ -->
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
$sql = "SELECT * FROM offices";
$result = mysqli_query($conn, $sql);
}
catch(Exception $e) {
  echo "Error" .$e->errorMessage();
}
 try
{  
     //     https://www.w3schools.com/php/func_mysqli_num_rows.asp
if (mysqli_num_rows($result) > 0) {
   
    echo '<div style="width: 100%">';
    $product_t = "<table id = 'table1' border = '1' style = 'margin:auto'>";
    $product_t .= "<tr><th>City</th><th>Phone</th><th>Address Line1</th><th>Address Line2</th><th>More Information</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        $button = '<button onclick="more_info('.$row["officeCode"].')" id="more_info">click</button>';
        $product_t .= "<tr><td>" . $row["city"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["addressLine1"] . "</td><td>" . $row["addressLine2"] . "</td><td>" . $button . "</td></tr>";
    }

    $product_t .="</table>";
    echo $product_t;
    echo '</div>';
    echo '<div style="min-height:50px"></div>';
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

    <div style="width: 100%; align-text: center; margin:50 auto;">
    <p id="demo"></p>
</div>
    
    
<div style = "margin-top: 800px">
<footer style="bottom:0">
<?php include 'footer.php'; ?>
</footer>
    </div>


</body>

<!--https://www.w3schools.com/js/js_functions.asp-->

    <script type="text/javascript">
        function more_info(officecode) {

            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("demo").innerHTML = this.responseText;
                }
            };

            xmlhttp.open("GET", "employees.php?officecode=" + officecode, true);
            xmlhttp.send();
            //     document.getElementById("demo").innerHTML = officecode;
        }

    </script>


</html>
