


<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>PHP calculator</title>

  </head>
  <?php 
    require ('function.php'); 
    $numOne = $_POST['displayOne'];
    $numTwo = $_POST['displayTwo']; 
    
    $display = $_POST['displayOne']; //string
    $operand = '';

    $test = array ('');
    
    if ($_POST['multiply']) {
      $operand = $_POST['multiply'];

      $test[1] = $operand;
      $test[0] = $numTwo;
    
     /* $test[2] = $numTwo;
      $test[0] = $numOne; */

      print_r($test);
    } elseif ($_POST['plus']) {
      $operand = $_POST['plus'];
      array_push($test, $operand);
      print_r($test);

    } elseif ($_POST['divide']){
      $operand = $_POST['divide'];
      array_push($test, $operand);
      print_r($test);
    } elseif ($_POST['minus']){
      $operand = $_POST['minus'];
      array_push($test, $operand);
      print_r($test);
    } else {
      $operand = '';
    }

    echo $operand;
/*
    $sumTwo = $numOne; 
    $sum =''; 
 //array 
    if (isset($_POST['multiply'])) {
    $sum = explode(' ', $sumTwo); 
    $sumTwo = array();
    
    array_shift ($sum);
    print_r ($sumTwo);
    }*/
    
   /* array_push($sumTwo, $numOne); */
/*
    echo $sumTwo[0];
    echo $sumTwo[1]; */

    if (count($sum) === 4) {
   
      $sumTwo[0] = $sum[0] * $sum[2];
      echo $sumTwo[0];
    }

   ?>

  <body>
    <form action="index.php" method="post" class="calculatorContainer">
        <textarea id="displayTwo" name="displayTwo"><?php echo $test[0] ?></textarea> 
        <textarea id="displayOne" name="displayOne"><?php   
  ?>
</textarea>
    
        <a href="index.php"><input type="button" id="clear" value="clear" onclick="displayClear('')"></a>
        <input type="button"  id="plusMinus" value="+-">
        <input type="button"  id="percentage" value="%">
        <input type="submit" id="divide" name="divide" value="/" onclick="displayPastInput(); displayClear('/')">
    
        <input type="button" id="seven" name="seven" value="7" onclick="displayNum('7')">
        <input type="button"  id="eight" name="eight" value="8" onclick="displayNum('8')">
        <input type="button" id="nine" value="9" name="nine" onclick="displayNum('9')">
        <input type="submit" id="multiply" name="multiply" value="x"  onmousedown="displayPastInput(); //displayClear('x')">

        <input type="button" id="four" name="four" value="4" onclick="displayNum('4')">
        <input type="button" id="five" name="five" value="5" onclick="displayNum('5')">
        <input type="button" id="six" name="six" value="6" onclick="displayNum('6')">
        <input type="submit"  id="minus" name="minus" value="-" onclick="displayPastInput(); displayClear('-')">
    
        <input type="button" id="one" name="one" value="1" onclick="displayNum('1'), doSomething()">
        <input type="button"  id="two" name="two" value="2" onclick="displayNum('2')">
        <input type="button"  id="three" name="three" value="3" onclick="displayNum('3')">
        <input type="submit"  id="plus" name="plus" value="+" onclick="displayPastInput(); displayClear('+')">
        
        <input type="button" id="zero" name="zero" value="0" onclick="displayNum('0')">
        <input type="button"  id="decimal" name="dec" value="." onclick="displayNum('.')">

        <input type="submit"  id="equals" name="equals" value="=" onclick="displayPastInput()">
    

      <p>make array, split array, push and display  </p>
    </form>
    <br><br><br><br><br><br><br><br><br>

   <?php

 
  ?>

<script rel="script" src="script.js" type="text/javascript"></script>
  </body>

</html>

