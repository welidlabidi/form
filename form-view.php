<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Order food & drinks</title>
</head>
<body>
<div class="container">
    <h1>Order food in restaurant "the Personal Ham Processors"</h1>
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" method="get" href="?food=0">Order food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  method="get" href="?food=1">Order drinks</a>
            </li>
        </ul>
    </nav>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" value=
                              "<?php if (isset($_SESSION["email"])){
                                  echo $_SESSION["email"];
                              }   else{
                                  echo "";
                              }
                              ?>" class="form-control">
                <span class ="error"> <?php echo $emailerr;?></span>
            </div>
            <div></div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" value=
                              "<?php if (isset($_SESSION["street"])){
                                  echo $_SESSION["street"];
                              }   else{
                                  echo "";
                              }
                              ?>" class="form-control">
                    <span class ="error"> <?php echo $streeterr;?></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label>
                    <input type="text" id="streetnumber" name="streetnumber" value=
                              "<?php if (isset($_SESSION["streetnumber"])){
                                  echo $_SESSION["streetnumber"];
                              }   else{
                                  echo "";
                              }
                              ?>"class="form-control">
                    <span class ="error"> <?php echo $streetnumbererr;?></span> 
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city"value=
                              "<?php if (isset($_SESSION["city"])){
                                  echo $_SESSION["city"];
                              }   else{
                                  echo "";
                              }
                              ?>" class="form-control">
                    <span class ="error"> <?php echo $cityerr;?></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label>
                    <input type="text" id="zipcode" name="zipcode"value=
                              "<?php if (isset($_SESSION["zipcode"])){
                                  echo $_SESSION["zipcode"];
                              }   else{
                                  echo "";
                              }
                              ?>" class="form-control">
                    <span class ="error"> <?php echo $zipcodeerr;?></span>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
            <?php foreach ($products AS $i => $product): ?>
                <label>
                    <input type="checkbox" value= $i name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                    &euro; <?php echo number_format($product['price'], 2) ?></label><br />
            <?php endforeach; ?>
        </fieldset>

        <button type="submit" id="submit" name="submit" class="btn btn-primary">Order!</button>
    </form>

    <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in food and drinks.</footer>
</div>

<style>
    footer {
        text-align: center;
    }
</style>
</body>
</html>