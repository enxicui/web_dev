<!DOCTYPE html>
<html>
    
<body>
    <head>
    <meta charset="UTF-8">
    <style>
        #topic{
            color:dimgrey;
            font-size: 30px;
            margin-bottom: 5%;

        }
        </style>
    </head>
        
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classicmodels";
$good = $_GET['officecode'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
try
{
$sql = "SELECT * FROM employees where officeCode =".$good;
$result = mysqli_query($conn, $sql);
}
catch(Exception $e) {
  echo "Error" .$e->errorMessage();
}
 try
{  
if (mysqli_num_rows($result)>0) {
    
$President=0;
$Sales_Manager=0;
$VP_Marketing=0;
$Sales_Rep=0;
$VP_Sales=0;

$President_tuple="<tr><th colspan='3' style='background-color:#cbced8'>President</th></tr>";
$VP_Sales_tuple="<tr><th colspan='3' style='background-color:#cbced8'>VP Sales</th></tr>";
$Sales_Manager_tuple="<tr><th colspan='3' style='background-color:#cbced8'>Sales Manager</th></tr>";
$Sales_Rep_tuple="<tr><th colspan='3' style='background-color:#cbced8'>Sales Rep</th></tr>";
$VP_Marketing_tuple="<tr><th colspan='3' style='background-color:#cbced8'>VP Marketing</th></tr>";
    
$content="<div><table style = 'margin:auto'><caption id='topic'><b>Employee Details</b></caption></div>";
//    https://stackoverflow.com/questions/699507/why-use-false-to-check-stripos-in-php/699520

     while ($row = mysqli_fetch_assoc($result)) {
                if ( stripos($row["jobTitle"],"President") !== false ) {
                    $President_tuple.= "<tr><td>".$row['employeeNumber']."</td><td>".$row['firstName']." ".$row['lastName']."</td><td>".$row['email']."</td></tr>";
                    $President+=1;
                }
                elseif ( stripos($row["jobTitle"],"Man") !== false) {
                    $Sales_Manager_tuple .= "<tr><td>".$row['employeeNumber']."</td><td>".$row['firstName']." ".$row['lastName']."</td><td>".$row['email']."</td></tr>";
                    $Sales_Manager+=1;
                }
                elseif ( stripos($row["jobTitle"],"Rep") !== false) {
                    $Sales_Rep_tuple .= "<tr><td>".$row['employeeNumber']."</td><td>".$row['firstName']." ".$row['lastName']."</td><td>".$row['email']."</td></tr>";
                    $Sales_Rep+=1;
                }
                elseif ( stripos($row["jobTitle"],"Marketing") !== false) {
                    $VP_Marketing_tuple .= "<tr><td>".$row['employeeNumber']."</td><td>".$row['firstName']." ".$row['lastName']."</td><td>".$row['email']."</td></tr>";
                    $VP_Marketing+=1;

                }
                elseif ( stripos($row["jobTitle"],"VP Sales") !== false) {
                    $VP_Sales_tuple .= "<tr><td>".$row['employeeNumber']."</td><td>".$row['firstName']." ".$row['lastName']."</td><td>".$row['email']."</td></tr>";
                    $VP_Sales+=1;
                }
        }
        $employee_num=array("$President_tuple"=>"$President","$Sales_Manager_tuple"=>"$Sales_Manager","$VP_Marketing_tuple"=>"$VP_Marketing","$VP_Sales_tuple"=>"$VP_Sales","$Sales_Rep_tuple"=>"$Sales_Rep");
//https://stackoverflow.com/questions/699507/why-use-false-to-check-stripos-in-php/699520
foreach ($employee_num as $x=>$value) {
            if ($value > 0) {
                $content.=$x;
            }
        }
        $content.="</table>";
        echo $content;
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
