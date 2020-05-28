<?php include($_SERVER['DOCUMENT_ROOT'] . "/oreo/oreo-test/oreo-php/initialize.php");
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


// Every oreo trigger begins with a player object which must be defined before the trigger. Player objects can hold any number of players.
//Example of creating new Player object (we're naming ours $Players):
$Players = new Player("Player 1");

		// So an interesting thing in Oreo is that it appears IndexedUnits are made and ABLE to store an index,
		// however, they do not appear to have any way tom GET the index. I should write a function for acquiring unit index given a location/unit combination - 
		// this would be extremely useful later.
		$unitID = new Deathcounter();
		$spawnArea = new Location("main"); // I'm assuming we have to create these in SCMDraft first, and this "links" them. Will test.
		$spawnArea2 = new Location("other");

		$indexedunit = new IndexedUnit(0); // This really is just storing the ID, and allowing manipulations to that ID. It doesn't retrieve it.
		$unit = new UnitGroup("Terran Marine", P1, $spawnArea); // create a unit at SpawnArea and we'll see if we can get its ID.
		$otherUnits = new UnitGroup("Zerg Hydralisk", P2, $spawnArea2); // We'll create other units to test out the unit ID process.

		// Let's try to get a unit ID, and see if we can generalize it enough to incorporate into Oreo for later.
		$Players->justonce( 
			$unit->create(1),
			Comment("Test"), // This will still generate an empty comment after (not sure if that's too great), but this will just take priority. Might fix that later - extremely minor optimization.
			''
		);

// We will be utilizing this method by Azrael: http://www.staredit.net/topic/14230/#12
// in order to find the unit ID of any arbitrary unit.
// Outlined are 3 methods. We will be utilizing method A.

// THE PLAN: We will be using a physical location on the map, and check all unit ID's 0-1699 to see if they are at that location.
// The result will be the correct unit ID.

$Players = new Player("Player 1");

?>