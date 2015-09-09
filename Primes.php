<?php
/** 
 * @author Caleb Oki, caleboki@gmail.com, www.caleboki.com
 *
 *
 */ 
require_once 'Table.php'; //Class for generating table

// Read the input
fwrite(STDOUT, "Please enter an integer number "); 

$n = fgets(STDIN);

if (!filter_var($n, FILTER_VALIDATE_INT) === false) {
	
$data = array();
$multiple = array();

function prime($n){

  for($i=1;$i<=$n;$i++)
  	{  //numbers to be checked as prime

        $counter = 0; 
          
        for($j=1;$j<=$i;$j++)
          	
          	{ //all divisible factors

				if($i % $j==0){ 

                 $counter++;
                
                }
          	}

        //Checking for divisiblity by 1 and divisible by itself)
        if($counter==2){

          $data[] = $i;
               
        }

    }
    
    return $data;

} 

$datax = array(prime($n)); //Generating the top row primes

array_unshift($datax[0], ''); //This is done to accomodate the top down primes generated in the next line

$datay = array(prime($n)); //Generating the top down primes

//Instantiating Table class
$table = new Console_Table();

$table->setHeaders(($datax[0])); //takes array

foreach ($datay[0] as $value) {

  foreach ($datay[0] as $value2) {

     $multiple[] = $value*$value2; //Multiplication between the top-up primes and top down primes
  }
  
}

$n_multiple = count($datax[0]) - 1; //Count number of primes minus 1

$multiple = array_chunk($multiple, $n_multiple); //Splits the multiplicated primes into multi-dimensional arrays

for ($j = 0; $j < count($datay[0]); ++$j) {

    array_unshift($multiple[$j], ''); //Prepends an empty value to the $multiple variable 
                                      //  to be accomodated in the generated table 

    $table->addRow($multiple[$j]); //Add rows of the multiplicated data
        
    } 

$table->addCol($datay[0]); //Generating the top-bottom primes

echo $table->getTable();

}

else {

		print "Run the program again and Enter an Integer number \n";

}

exit(0);

?>
