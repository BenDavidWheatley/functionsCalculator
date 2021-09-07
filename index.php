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
    $operand = $_POST['operand'];
    $display = $_POST['displayTwo'];

    if(isset($_POST['clear'])){
      file_put_contents('calculation.json', $data);
      file_put_contents('history.json', $history);
    }
   ?>

  <body>
    <div id="mainContainer">
      <div id="infoContainer"> 
        <h2>Calculator</h2>
        <p> A basic function calculator using Javascript, PHP and JSON.
          Javascript has been used to concatenate and display all the numbers on the screen when the buttons are pushed.
          <br>
          PHP and JSON is used to calculate the sum and display the answer. An array is created within a JSON file, when the array length is equal to 3 then the number at the 0 index is calculated with the number at the 2 index using the operand of the 1st index.
          The sum is then saved to the 0 index position and remainder of the array is deleted.
        </p>
      </div>
      <div class="strip" id="stripOne"></div>
      <div class="strip" id="stripTwo"></div>
      <div class="strip" id="stripThree"></div>
      <div id='formContainer'> 
        <form method="post" class="calculatorContainer">
            <textarea id="displayTwo" name="displayTwo"><?php 

              if(isset($_POST['operand'])){
                $data = file_get_contents('calculation.json');
                $data = json_decode($data);       
                $data [] = $display; 
                $data [] = $operand;
                if (count($data) >= 3){             
                  if ($data[1] === "x") {
                      $data[0] = $data[0] * $data[2];                
                  }elseif ($data[1] === "+"){
                      $data[0] = $data[0] + $data[2];         
                  }elseif ($data[1] === "-"){
                      $data[0] = $data[0] - $data[2];          
                  }elseif ($data[1] === "/"){
                      $data[0] = $data[0] / $data[2];                   
                  }
                $data[1] = $data[3];
                echo $data[0];
                array_pop($data);
                array_pop($data);
              }
              $data = json_encode($data, JSON_PRETTY_PRINT);
              file_put_contents('calculation.json', $data);          
              } 
              // below is used to caculate percentages

              if(isset($_POST['percentage'])){
                $data = file_get_contents('calculation.json');
                $data = json_decode($data);       
                $data [] = $display; 
                $data [] = $operand;
                $calc = ($data[0] / 100) * $data[2];
                if (count($data) >= 3){             
                  if ($data[1] === "x") {
                      $data[0] = $data[0] * $calc;                
                  }elseif ($data[1] === "+"){
                      $data[0] = $data[0] + $calc;         
                  }elseif ($data[1] === "-"){
                      $data[0] = $data[0] - $calc;          
                  }elseif ($data[1] === "/"){
                      $data[0] = $data[0] / $calc;                   
                  }
                $data[1] = $data[3];
                echo $data[0];
                array_pop($data);
                array_pop($data);
              }
              $data = json_encode($data, JSON_PRETTY_PRINT);
              file_put_contents('calculation.json', $data);          
              }           
            ?> 
            </textarea>
            <input type="submit"  id="clear" name="clear" value="clear">
            <input type="button"  id="plusMinus" value="+-" onclick='switchPluMinus()'>
            <input type="submit"  id="percentage" name='percentage' value="%">
            <input type="submit" id="divide" name="operand" value="/" onclick="displayPastInput();">
        
            <input type="button" id="seven" name="seven" value="7" onclick="displayNum('7')">
            <input type="button"  id="eight" name="eight" value="8" onclick="displayNum('8')">
            <input type="button" id="nine" value="9" name="nine" onclick="displayNum('9')">

            <input type="submit" id="multiply" name="operand" value="x"  onclick="displayPastInput();">

            <input type="button" id="four" name="four" value="4" onclick="displayNum('4')">
            <input type="button" id="five" name="five" value="5" onclick="displayNum('5')">
            <input type="button" id="six" name="six" value="6" onclick="displayNum('6')">
            <input type="submit"  id="minus" name="operand" value="-" onclick="displayPastInput();">
        
            <input type="button" id="one" name="one" value="1" onclick="displayNum('1')">
            <input type="button"  id="two" name="two" value="2" onclick="displayNum('2')">
            <input type="button"  id="three" name="three" value="3" onclick="displayNum('3')">
            <input type="submit"  id="plus" name="operand" value="+" onclick="displayPastInput();">
            
            <input type="button" id="zero" name="zero" value="0" onclick="displayNum('0')">
            <input type="button"  id="decimal" name="dec" value="." onclick="displayNum('.')">

            <input type="submit"  id="equals" name="operand" value="=" onclick="displayPastInput()"> 
        </form>
      </div>
      <div class="strip" id="stripFour"></div>
      <div class="strip" id="stripFive"></div>
      <div class="strip" id="stripSix"></div>
      <div id='history'>
        <h2>History</h2>
        <p><?php

            if(isset($_POST['operand']) || (isset($_POST['percentage']))){
              $history = file_get_contents('history.json');
              $history = json_decode($history);       
              $history [] = $display; 
              $history [] = $operand;            
              $x = 0;
                while ($x < count($history)) {
                    echo $history[$x];
                    echo '<br>';
                    $x ++;
                }
              
            $history = json_encode($history, JSON_PRETTY_PRINT);
            file_put_contents('history.json', $history);          
            } 
        
        ?></p>

      </div>
    </div>
    <script rel="script" src="script.js" type="text/javascript"></script>
  </body>

</html>







