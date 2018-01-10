<!DOCTYPE html>
<html lang="en">



<?php

//========================================
// Class item = represents a product that is a item
class item {
	var $name;
	var $cType;
	var $cNum;
	var $eMon;
	var $eYear;
	var $cSNum;


	function item( $name, $cType, $cNum, $eMon, $eYear, $cSNum ) {
		$this->name = $name;
		$this->cType = $cType;
		$this->cNum = $cNum;
		$this->eMon = $eMon;
		$this->eYear = $eYear;
		$this->cSNum = $cSNum;
	}
}

session_start();


// When Adding is called start this function
if ( $_POST[ 'Desired_Action' ] == "Adding" ) //add and update case
{

	//read in form data
	$name = $_POST[ 'name' ];
	$cType = $_POST[ 'cType' ];
	$cNum = $_POST[ 'cNum' ];
	$eMon = $_POST[ 'eMon' ];
	$eYear = $_POST[ 'eYear' ];
	$cSNum = $_POST[ 'cSNum' ];

	//add it to the basket
	$item = new item( $name, $cType, $cNum, $eMon, $eYear, $cSNum );
	$_SESSION[ 'payInfo' ] = $item;
}

	//All The Session Variables To Use
	$payItem = $_SESSION[ 'payInfo' ];
	$perItem = $_SESSION[ 'perInfo' ];
	$session_basket = $_SESSION[ 'session_basket' ];
	$fTotal = $_SESSION[ "total" ];

	// String variable which will be added onto
	$stringData = "";

	reset( $session_basket );
	$i = 0;
	$total = 0;
	$itemN = 0;
	while ( list( $k, $v ) = each( $session_basket ) ) {
		$i++;
		$item = $session_basket[ $k ];
		$image = "images/product" . $item->code . ".jpg";
		?>
	<?php
	$total += $item->price * $item->quantity;
	$itemN += $item->quantity;

//Make string for product vector

$stringData = $stringData . ( string )$item->code . ' ' . ( string )$item->quantity . ' ' . ( string )$item->price . ' ';


} //end of loop	
$_SESSION[ "total" ] = $total + ( ( ( $itemN * 2 ) + $total ) * 0.08 ) + $itemN * 2;
// Getting ready to send to middleware
require_once 'HTTP/Request2.php';
$request = new HTTP_Request2( 'https://databaseproject2.herokuapp.com/storeData' );
$request->setMethod( HTTP_Request2::METHOD_POST )
	->addPostParameter( 'FIRSTNAME', $perItem->fName )
	->addPostParameter( 'LASTNAME', $perItem->lName )
	->addPostParameter( 'BILLING_STREET1', $perItem->address3 )
	->addPostParameter( 'BILLING_STREET2', $perItem->address4 )
	->addPostParameter( 'CITY', $perItem->city2 )
	->addPostParameter( 'STATE', $perItem->state2 )
	->addPostParameter( 'ZIP', $perItem->zip2 )
	->addPostParameter( 'EMAIL', $perItem->email )
	->addPostParameter( 'PHONE', $perItem->phone )
	->addPostParameter( 'CREDITCARDTYPE', $payItem->cType )
	->addPostParameter( 'CREDITCARDNUM', $payItem->cNum )
	->addPostParameter( 'CREDITCARDEXPM', $payItem->eMon )
	->addPostParameter( 'CREDITCARDEXPY', $payItem->eYear )
	->addPostParameter( 'CREDITCARDSECURITYNUM', $payItem->cSNum )
	->addPostParameter( 'SHIPPING_STREET1', $perItem->address1 )
	->addPostParameter( 'SHIPPING_STREET2', $perItem->address2 )
	->addPostParameter( 'SHIPPING_CITY', $perItem->city )
	->addPostParameter( 'SHIPPING_STATE', $perItem->state )
	->addPostParameter( 'SHIPPING_ZIP', $perItem->zip )
	->addPostParameter( 'DATE', date( "Y/m/d" ) )
	->addPostParameter( 'ORDER_TOTAL', $fTotal )
	->addPostParameter( 'STRINGDATA', $stringData );
?>

<?php
$request->setConfig( array(
	'ssl_verify_peer' => FALSE,
	'ssl_verify_host' => FALSE
) );
	// Sends to middleware project /getData
try {
	$response = $request->send();
	if ( 200 == $response->getStatus() ) {
		echo $response->getBody();
	} else {
		echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
		$response->getReasonPhrase();
	}
} catch ( HTTP_Request2_Exception $e ) {
	echo 'Error: ' . $e->getMessage();
}
// remove all session variables
session_unset();

// destroy the session 
session_destroy();
?>