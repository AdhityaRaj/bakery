<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bake -a- Holic</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Caveat|Pacifico&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="app.css">
    </head>

<body onload="formFill()">
  <?php
    if($_POST){
      $ncake=$_POST['variety'];
      $cake=$_POST['cname'];
      $cost=$_POST['cost'];
      if($ncake=="1"){
        $var = $_POST['var'];
        $weight = $_POST['weight'];
      }
      else{
        $var = $_POST['flavours'];
        $weight = 1;
      }
      $dm=$_POST['dm'];
      $note = $_POST['note'];
    }
   ?>
  <nav class="navbar navbar-default navbar-fixed-top" id="nav">
      <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <p id="brand" class="navbar-brand">
              Bake-a-Holic
            </p>
          </div>
          <div class="collapse navbar-collapse" id="bs-nav-demo">
            <ul class="nav navbar-nav">
              <li><a href="index.html"><span class="glyphicon glyphicon-home"></span> Home</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
              <li><a href="menu.html"><span class="glyphicon glyphicon-cutlery"></span> Menu</a></li>
              <li><a href="gallery.html"><span class="glyphicon glyphicon-picture"></span> Gallery</a></li>
              <li><a href="Ourbranches.html"><span class="glyphicon glyphicon-globe"></span> Outlets</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-phone-alt"></span> Contact Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
      </div>
  </nav>
  <div class="container content-body text-center">
    <h1>Order Details</h1>
  <form name="myCart" id="form" action="orderplaced.php" method="post">
      <h3>Cake Information</h3>
      <table class="form-table">
        <tr>
          <td>Cake Ordered:</td>
          <td><input class="cart" type="text" name="cakeName" value="" readonly></td>
        </tr>
        <tr>
          <td>Varient:</td>
          <td><input class="cart" type="text" name="varient" value="" readonly></td>
        </tr>
        <tr id="ifWeight">
          <td>Weight:</td>
          <td><input class="cart" type="text" name="weight" value="" readonly></td>
        </tr>
        <tr>
          <td>Delivery Mode:</td>
          <td><input class="cart" type="text" name="dm" value="" readonly></td>
        </tr>
        <tr>
          <td>Note to Chef:</td>
          <td> <textarea class="cart" rows="1" name="note" value="" readonly></textarea> </td>
        </tr>
        <tr>
          <td>Total Cost:</td>
          <td><input class="cart" type="text" name="totCost" value="" readonly></td>
        </tr>
      </table>
      <h3>Customer Details</h3>
      <table class="form-table">
        <tr>
          <td>Customer Name:</td>
          <td><input class="cart" type="text" name="custName" placeholder="Your Name" required></td>
        </tr>
        <tr>
          <td>Phone Number:</td>
          <td><input class="cart" type="text" name="phoneNo" placeholder="9876543210" required></td>
        </tr>
        <tr>
          <td>Customer Address:</td>
          <td><textarea class="cart" name="addr" placeholder="Full address" required></textarea></td>
        </tr>
      </table>
      <button class="btn btn-primary btn-lg" id="submit">Place Order</button>
    </form>
  </div>

  <script type="text/javascript">
    // var sub = document.getElementById('form');
    // sub.onsubmit = submit;
    // function submit(){
    // window.alert("Order Placed Successfully");
    // window.location.replace("./index.html");
    // return false;
    // }

    function formFill(){
      var cakeName = "<?php echo $cake; ?>";
      var type ="<?php echo $ncake; ?>";
      var cost = "<?php echo $cost; ?>";
      var variety = "<?php echo $var; ?>";
      var weight = "<?php echo $weight; ?>";
      var dm = "<?php echo $dm; ?>";
      var note = `<?php echo $note; ?>`;
      var totCost = (type)? weight*cost:cost;
      document.forms["myCart"]["cakeName"].value = cakeName;
      document.forms["myCart"]["varient"].value = variety;
      if (type === 0){
        document.querySelector("#ifWeight").style.display = "none";
      }
      else{
        document.forms["myCart"]["weight"].value = weight.toString();
      }
      document.forms["myCart"]["dm"].value = dm;
      document.forms["myCart"]["note"].value = note;
      document.forms["myCart"]["totCost"].value = totCost.toString();
    }
  </script>

  <script src="app.js" charset="utf-8"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
