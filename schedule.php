<?php
/* $item_list -> array of values to iterate throught */
$item_list = array("");


$minimum_items_per_page = 30;

$page_list = paginate_items($item_list, $minimum_items_per_page);

print_r($page_list);

//------------------------------------------------------------

function paginate_items($item_list, $minimum_items_per_page){
	
 /* $countingItems = count($item_list);*/
		$countingItems = 1334;
/*	echo $countingItems; 226 */

  $numOfPages = $countingItems / $minimum_items_per_page;
  	
  $moduloOf  = $countingItems % $minimum_items_per_page;

	/*echo $moduloOf; 16*/




	for ($x = 1; $x <= $numOfPages; $x++) {
		$listOfPages[]=$x;	
	} 
	
	for ($x = 0; $x <= $numOfPages; $x++) {
		$listOfPages[$x]=array("offset" => 0, "limit" => 30);	
	} 


	if($moduloOf < $numOfPages *3) {
		$numtoAssign =$moduloOf / 3;	
		$numRemain = $moduloOf % 3;
		
		for($x = 0; $x <= $numtoAssign; $x++){
			$listOfPages[$x]["limit"] +=3;
		}
		$listOfPages[$numtoAssign+1]["limit"] +=$numRemain;

	} else {
		/*$listOfPages[$numOfPages]*/
	}

	
	for ($x = 1; $x <= $numOfPages; $x++) {
		$xr = $x-1;
		$listOfPages[$x]["offset"] =$listOfPages[$xr]["limit"] + $listOfPages[$xr]["offset"];	
	} 
	
	
	

	echo "<pre>";
	var_dump($listOfPages);
	echo "</pre>";
}
?>
