<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Offices</title>
    <style>
        
 
.navigation
{
    list-style-type: none;
    list-style: none;
    margin: 0 auto;
    width: 100%;
    text-align: center;
    overflow: hidden;
    font-family:inherit;
    min-width: 1000px;
    position:relative;
    text-decoration: none;
    display: inline-block;
    text-align: center;
    margin-bottom: 3%;
}

        .navigation ul{
            display: inline-block;
            position: relative;
            list-style: none;
            list-style-type: none;
            text-align: center;
            position: relative;
        }        
        
        .navigation ul li a {
            display: block;
            position: relative;
        }
        
.navigation ul li{
     display: inline-block;
     text-align: center;
     font-size: 20px;
     list-style-type: none;
     list-style: none;
     text-decoration: none;
     position: relative;

    
}
 
 li a:hover:not(.active) {
        background-color:#baccb7;

}
        
.navigation a:link, .navigation a:visited
{
    display: block;
    text-align: center;
    color:azure;
    width: 300px;
    background-color:#e288aa;
    height:45px;
    text-decoration: none;
    padding-top: 10%;
    list-style-type: none;
   

}
    </style>
</head>

<body>
    <!--            https://www.w3schools.com/php/php_includes.asp-->
<?php
echo
'
<div class = "navigation">
<ul>
    <li><a href="./index.php"><b> Product Lines</b></a></li><li><a href="./offices.php"><b>Offices</b></a></li><li><a href="./payments.php"><b>Payments</b></a></li>
    </ul>
    </div>';
    
?>
    
    </body>
</html>
    