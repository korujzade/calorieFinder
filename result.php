<?php


	$food = $_POST['name'];
	ini_set("display_errors", 0);
	error_reporting(0);
	// new dom object
	$dom = new DOMDocument();

	//load the html
	$html = $dom->loadHTMLFile("http://calorielab.com/search/?search_input=" . $food);

	//discard white space 
	$dom->preserveWhiteSpace = false;

	$tables = $dom->getElementsByTagName('table');

	//the table by its tag name
	// if( $tables->length == 0 )
	// {
	// 	$result_json = json_encode(array(
	// 		'status' => 'error',
	// 		'message' => 'error'
	// 	));
	// 	print($result_json);
	// }
	// else
	// {
		//get all rows from the table
		$rows = $tables->item(0)->getElementsByTagName('tr'); 

		//get all columns from the table
		$cols = $rows->item(2)->getElementsByTagName('td');

		$calorie= $cols->item(6)->nodeValue;
		$quantity = $cols->item(1)->nodeValue;

		$result_json = json_encode(array(
		'status' => 'success',
		'message' => array(
				'calorie' => $calorie,
				'value' => $quantity
			)
		));
		print($result_json);			
	// }	
?>