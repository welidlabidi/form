<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}


$email = $street = $streetnumber = $city = $zipcode = "";
$emailerr = $streeterr = $streetnumbererr = $cityerr = $zipcodeerr = "";
$food = 1;


//your products with their price.



//function that checks everything.
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST["email"])){
        $emailerr = '<div class="alert alert-danger" role="alert">Email is required</div>';
    } else{
        $_SESSION["email"] = test_input($_POST["email"]);
    }


    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
         $emailerr = '<div class="alert alert-danger" role="alert">Email is required</div>';
     }

    
    if(empty($_POST["street"])){
     $streeterr = '<div class="alert alert-danger" role="alert">Street is required</div>';
    } else {
        $_SESSION["street"] = test_input($_POST["street"]);
    }


     if(empty($_POST["city"])){
        $cityerr = '<div class="alert alert-danger" role="alert">city is required</div>';
       } else {
           $_SESSION["city"] = test_input($_POST["city"]);
       }


    if(!is_numeric($_POST["streetnumber"])){
        $streetnumbererr = '<div class="alert alert-danger" role="alert">Streetnumber is required</div>';
    } else {
       $_SESSION["streetnumber"] = test_input($_POST["streetnumber"]);
    }
   
   
    if(!is_numeric($_POST["zipcode"])){
        $zipcodeerr = '<div class="alert alert-danger" role="alert">zipcode is required</div>';
    } else {
      $_SESSION["zipcode"] = test_input($_POST["zipcode"]);
    }
    
}


function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
   
    return $data;
}
//

//function $_GET food because food is life
if(isset($_GET["food"])) {
    $food = $_GET["food"];
}



if ($food == "0"){
    $products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
   ];
}else {
    $products = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
   
   ]; 
}

//
//delivery time
if (isset($_COOKIE["totalvalue"])){
    $totalValue = $_COOKIE["price"];
}else{
    $totalValue = 0;
};






require 'form-view.php';