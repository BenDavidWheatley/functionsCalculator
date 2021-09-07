<?php
function calculate () {
    if(isset($_POST['operand'])){
            $data = file_get_contents('calculation.json');
            $data = json_decode($data);     
            $input = $display;
            $data [] = $input; 
            $data [] = $operand;
            if (count($data) >= 3){
              $numOne = $data[0];
              $numTwo = $data[2];
              $operandOne = $data[1];
              $operandTwo = $data[3];
                if ($data[1] === "x") {
                    $data[0] = $numOne * $numTwo;                
                }elseif ($data[1] === "+"){
                    $data[0] = $numOne + $numTwo;         
                }elseif ($data[1] === "-"){
                    $data[0] = $numOne - $numTwo;          
                }elseif ($data[1] === "/"){
                    $data[0] = $numOne / $numTwo;                   
              } 
              $data[1] = $operandTwo;
              echo $data[0];
              array_pop($data);
              array_pop($data);
            }
            $data = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents('calculation.json', $data);          
          } 
}

?>