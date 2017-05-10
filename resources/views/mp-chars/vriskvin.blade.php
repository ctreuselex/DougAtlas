@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Vriskvin @stop
@section('char-meta')
	<?php 
		$charname = 'vriskvin';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Vriskvin Dirk";
		$mcharFam = "Father: Thomas Dirk";
		$mcharDiv = "Mystos";
		$mcharAff = "Dominion | Institute";
		
		$mcharAft = "Time";
		$mcharSty = "Exnihille | Cirkunesi";
		$mcharWoc = "Myst-based Sledge Hammers & Psyblades";

		$charthemes = 'Physics, Hammers, Saws, Eyepatches, Do Not Provoke, Total Hipster';
		$cityname = 'Pawns';

		$lum = 11;
		$lumPlus = 16;
		$lumTotal = $lum+$lumPlus;

		$aer = 3;
		$aerPlus = 12;
		$aerTotal = $aer+$aerPlus;

		$mys = 7;
		$mysPlus = 39;
		$mysTotal = $mys+$mysPlus;

		$gei = 9;
		$geiPlus = 23;
		$geiTotal = $gei+$geiPlus;

		$charability = array(
			array ('name'=>"Myst Hammer", 'sk'=>'pri',
				'des'=>"Vriskvin creates a hammer out of Myst to slam anyone who disagrees in the face with."),

			array ('name'=>"Psyblade", 'sk'=>'sec',
				'des'=>"Creates a spinning Psyblade at the target area which regularly slices nearby foes. Can be used for other purposes. Slicing pizza for example."), 

			array ('name'=>"Blade Rush", 'sk'=>'sk1',
				'des'=>"Just spinning is not enough. Vriskvin turns all nearby Psyblades into death wheels and rolls them to the target area, physically and mentally slicing up unfortunate people who get in their paths."), 

			array ('name'=>"Psychic Burst", 'sk'=>'sk2',
				'des'=>"Using the reserved Myst on every nearby spinning Psyblades that's not slicing people yet, Vriskin excites the potential energy within each causing them to explode after a short delay."),  

			array ('name'=>"Psychic Rift", 'sk'=>'sk3',
				'des'=>"Distorts space placement, causing all nearby Psyblades to get suck into the center of the rift whilst making a slower, less lethal, but still lethal version of Blade Rush."),

			array ('name'=>"Time Tap", 'sk'=>'ult',
				'des'=>"Vriskvin taps into his unique time affiliation and |pause|-s everything, living or non-living, ally or foe, inside the target area."),

			array ('name'=>"Mind's Eye", 'sk'=>'ext',
				'des'=>"Allows Vriskvin to counter the next incoming direct damage completely blocking its damage and effects while also |pause|-ing its source."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'100% Mixed Damage', 'ext'=>'aer'),
			array ('name'=>'Attack Rate', 'val'=>'100%', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'120 radius cone', 'ext'=>''),

			array ('name'=>'Hammer Hit Points', 'val'=>'300', 'ext'=>''),
			array ('name'=>'Hammer Duration', 'val'=>'10s', 'ext'=>''),
			);
		$charprimcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'5 /Hammer'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charpriaug = array (
			array ('name' => "Psychic Frenzy",
				'des'=>"For every third swing, Myst Hammer deals additional 125% mixed damage and reduces 20 seconds off Psyblade's recharge time."),
			array ('name' => "Resistance Is Futile",
				'des'=>"Myst Hammer inflicts 2% |frangible| per hit. Stacks 5 times and lasts for 5 seconds."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Range', 'val'=>'600', 'ext'=>''),
			array ('name'=>'Charges', 'val'=>'6', 'ext'=>''),

			array ('name'=>'Psyblade Damage', 'val'=>'15% of Myst /s', 'ext'=>'aer'),
			array ('name'=>'Psyblade Damage AoE', 'val'=>'125', 'ext'=>''),
			array ('name'=>'Psyblade Myst Pool', 'val'=>'200', 'ext'=>''),
			array ('name'=>'Psyblade Myst Regen', 'val'=>'20% of Max Myst /s', 'ext'=>''),
			array ('name'=>'Psyblade Duration', 'val'=>'80s', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>'45s'),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'10'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsecaug = array (
			array ('name' => "Denser Pools",
				'des'=>"Increases each Psyblade's Myst Pool by 100% of Vriskvin's mixed damage."),
			array ('name' => "Concentrated Blades",
				'des'=>"Vriskvin instantly gives 100 Myst to Psyblades upon creation. Increases Myst Cost to 100."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Damage', 'val'=>'10 + 35% of Psyblade Myst', 'ext'=>'aer'),

			array ('name'=>'Psyblade Acquire Range', 'val'=>'250', 'ext'=>''),
			array ('name'=>'Psyblade Damage AoE', 'val'=>'80', 'ext'=>''),
			array ('name'=>'Psyblade Travel Speed', 'val'=>'1400', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'4s'),
			array ('name'=>'Myst Cost', 'val'=>'100'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "Kinetic Energy",
				'des'=>"Prevents Psyblades from losing Myst by being used by Blade Rush."),
			array ('name' => "Sharp Conversion",
				'des'=>"Increases Psyblade's Damage to 50% of Psyblade's Myst."),
			array ('name' => "In Clock's Hand",
				'des'=>"Enemy units hit by Blade Rush will be |pause|-d for 1 second."),
			array ('name' => "Soul Penetration",
				'des'=>"Enemy units hit by Blade Rush will be inflicted by 10% |frangible| for 3 seconds,"), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Damage', 'val'=>'40 + 100% of Psyblade Myst', 'ext'=>'aer'),
			array ('name'=>'Area of Effect', 'val'=>'300', 'ext'=>''),

			array ('name'=>'Trigger Delay', 'val'=>'2s', 'ext'=>''),
			array ('name'=>'Trigger AoE', 'val'=>'400', 'ext'=>''),

			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'4s'),
			array ('name'=>'Myst Cost', 'val'=>'60'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk2aug = array (
			array ('name' => "Defying Conservation of Energy",
				'des'=>"Psychic Burst explosions or implosions now deal 30% more damage."),
			array ('name' => "Chain Reaction",
				'des'=>"Psyblades caught within the explosion or implosion of another Psyblade will also explode or implode after a 0.50 second delay."),
			array ('name' => "Myst Savings",
				'des'=>"Psyblades' explosions or implosions will replenish Vriskvin and nearby allied units' Myst by 15% of the Psyblades' Myst"),
			array ('name' => "Implosions Are Cooler",
				'des'=>"Psychic Burst now causes Psyblades to implode after a 2 seconds delay dealing half the normal damage but |pause|-ing enemy units for 1.50 seconds"), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Area of Effect', 'val'=>'450', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'1s', 'ext'=>''),

			array ('name'=>'Psyblade Travel Speed', 'val'=>'400', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'65s'),
			array ('name'=>'Myst Cost', 'val'=>'330'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'CHANNELING'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk3aug = array (
			array ('name' => "Efficiency",
				'des'=>"Reduces Myst Cost to 250 and Cooldown to 50 seconds."),
			array ('name' => "Safe Distance",
				'des'=>"Allows Psychic Rift to be cast from afar with a range of 650."),
			array ('name' => "Point Of Singularity",
				'des'=>"Psychic Rift now also sucks enemy units and inflicts 80% |slow| for 2 seconds after the rift. Reduces area of esffect to 300."),
			array ('name' => "Assiduity",
				'des'=>"Psyblades affected by Psychic Rift will instantly have their Myst Pool at maximum. Increases duration to 2 seconds."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Range', 'val'=>'800', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'400', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'4s', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'65s'),
			array ('name'=>'Myst Cost', 'val'=>'250'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'CHANNELING'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charultaug = array (
			array ('name' => "Friendly Tap",
				'des'=>"Prevents Time Tap from affecting allied units."),
			array ('name' => "Speed Of Light",
				'des'=>"Allows Vriskvin to move freely after casting Time Tap without the need to channel it. Decreases duration to 3 seconds"), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'Counter Duration', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Damage Blocked', 'val'=>'100%', 'ext'=>''),

			array ('name'=>'pause Duration', 'val'=>'1s', 'ext'=>''),
			);
		$charextmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'18s'),
			array ('name'=>'Myst Cost', 'val'=>'25'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'CHANNELING'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charextaug = array (
			array ('name' => "Proximity Warning",
				'des'=>"Causes all nearby enemy units within 200 radius of Vriskvin and the source to be |pause|-ed when triggered."),
			array ('name' => "Anti Myst Manipulation Law",
				'des'=>"Inflicts a 40% mystical |weaken| for 3 seconds upon triggering."), 
			);
	?>
@stop