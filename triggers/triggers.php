<?php include($_SERVER['DOCUMENT_ROOT'] . "/oreo/oreo-test/oreo-php/initialize.php");
// https://stackoverflow.com/questions/39302659/going-one-level-up-using-in-php-not-working
$P1 = new Player("Player 1");
$P2 = new Player("Player 2");
	$spawntimer = new Deathcounter($P2, 120);

	$P1->_if( $spawntimer->exactly(0) )->then(
		Display('Spawn timer set to 10 seconds'),
		$spawntimer->setTo(120),
	'');

	$P1->always(
		//DisplayText("Timer: $spawntimer"),
		$spawntimer->subtract(1),
	'');


// Every oreo trigger begins with a player object which must be defined before the trigger. Player objects can hold any number of players.
//Example of creating new Player object (we're naming ours $Players):
$Players = new Player("Player 1");

		// So an interesting thing in Oreo is that it appears IndexedUnits are made and ABLE to store an index,
		// however, they do not appear to have any way tom GET the index. I should write a function for acquiring unit index given a location/unit combination - 
		// this would be extremely useful later.

		$spawnArea = new Location("main"); // I'm assuming we have to create these in SCMDraft first, and this "links" them. Will test.
		$spawnArea2 = new Location("other");

		$unit = new UnitGroup("Terran Marine", P1, $spawnArea); // create a unit at SpawnArea and we'll see if we can get its ID.
		$otherUnits = new UnitGroup("Zerg Hydralisk", P2, $spawnArea2); // We'll create other units to test out the unit ID process.

		$Players->justonce( 
			$unit->create(1), // create a Marine at $spawnArea (which is "main" in SCMDraft)
			Comment("Test"), // This will still generate an empty comment after (not sure if that's too great), but this will just take priority. Might fix that later - extremely minor optimization.
			''
		);

		$Players->_if( $spawntimer->exactly(1))->then(
			Display("Hydra spawned."),
			$otherUnits->create(1),
			Comment("Spawn Hydras"),
			''
		);

// We will be utilizing this method by Azrael: http://www.staredit.net/topic/14230/#12
// in order to find the unit ID of any arbitrary unit.
// Outlined are 3 methods. We will be utilizing method A.

// THE PLAN: We will be using a physical location on the map, and check all unit ID's 0-1699 to see if they are at that location.
// The result will be the correct unit ID.
// We could utilize the existing IndexedUnit functionality in Oreo to work this out, as the function for current IndexedUnit location is already implemented.
// This means that we will have to initially create all 1700 IndexedUnits (or update the same one 1700 times).
// - I went ahead and just added a set function for IndexedUnit so I don't have to make 1700 objects for this.
// To start, I am confirming that existing functionality works for IndexedUnits. Namely, getting their location.

$Players = new Player("Player 1");
$P2 = new Player("Player 2");

		$scanUID = new Deathcounter($P2);
		$unitID = new Deathcounter($P2); // we will store the unit ID here. Thanks Oreo!
		$x = new Deathcounter($P2, 500);
		$y = new Deathcounter($P2, 500);
		$indexedUnit = new IndexedUnit(0);
		$searchLocation = new Location("main"); // this is the location we will be scanning for our unit ID in.

		$Players->always(
			// THIS TOOK WAY TOO LONG TO FIGURE OUT.
			// getcurrentXCoordinate takes 2 args, a DC to write to, and a "maxtile"
			// maxtile is pretty much how many tiles, from the origin, that the function will function in.
			// Setting this to 256x256 just caused this entire trigger to not work
			// Setting it too small didn't seem to work at first until i realized that every tile consists of 32x32 of these units
			// -- a small area!
			// While moving a unit within the X range, and within the Y range, we will get new changes to the value. Otherwise it will remain capped.
			// Go ahead and give the attached demo map a shot.
			$indexedUnit->getcurrentXCoordinate($x,15),
			$indexedUnit->getcurrentYCoordinate($y,15),
			//$x->setTo(intval($x/256)),
			//$y->setTo(intval($y/256)),
			Display("X: $x"),
			Display("Y: $y"),
			''
		);

?>