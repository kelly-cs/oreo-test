<?php include($_SERVER['DOCUMENT_ROOT'] . "/oreo/oreo-php/initialize.php");
// https://stackoverflow.com/questions/39302659/going-one-level-up-using-in-php-not-working
$P1 = new Player("Player 1");
	$spawntimer = new Deathcounter();

	$P1->_if( $spawntimer->exactly(0) )->then(
		Display('Spawn timer set to 10 seconds'),
		$spawntimer->setTo(120),
	'');

	$P1->always(
		$spawntimer->subtract(1),
	'');
 ?>