@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Chance @stop
@section('char-meta')
	<?php 
		$charname = 'chance';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Chance Linus";
		$mcharFam = "Mother: Eva Linus";
		$mcharDiv = "Mystos";
		$mcharAff = "Dominion | Institute";
		
		$mcharAft = "Fire*";
		$mcharSty = "Armagi | Extenebri";
		$mcharWoc = "Landar Industries' ACMA Cuff Blasters";

		$charthemes = 'Dual Guns, Balance, No Second Chances, Being a Jerk to Everyone ';
		$cityname = 'Pride';

		$domdes = "
			|<|eva| 
				Everything about him is perfect! <3|>|
			|<|vines| 
				Perfect sociopath. Yes. I mean no. I mean... Nevermind, just don't go near him if you want to keep your santy intact.|>|
			|<|theodore| 
				If you have a habit of getting insulted every 3 minutes, why don't you crank that up to eleven and be insulted evey 30 seconds?|>|
			|<|vriskvin| 
				There's only one way to get around his attics every now and then; punch his face.|>|";

		$lum = 8;
		$lumPlus = 25;
		$lumTotal = $lum+$lumPlus;

		$aer = 7;
		$aerPlus = 20;
		$aerTotal = $aer+$aerPlus;

		$mys = 8;
		$mysPlus = 25;
		$mysTotal = $mys+$mysPlus;

		$gei = 7;
		$geiPlus = 20;
		$geiTotal = $gei+$geiPlus;

		$charability = array(
			array ('name'=>"Dual ACMA", 'sk'=>'pri',
				'des'=>"Using the ACMA Cuff Blasters he got from eons of pestering his mother to pestering Tauroscene, Chance can happily tot his way to victory with Sandra's pity."),

			array ('name'=>"Charged Shot", 'sk'=>'sec',
				'des'=>"Chance unloads the rounds off his Cuff Blasters into a single shot that deals massive amount of damage to the target. Hitting a friend, even if no one likes him as a friend, with Charged Shot will heal them instead."), 

			array ('name'=>"Grab Hold", 'sk'=>'sk1',
				'des'=>"Chance pulls a nerd and holds him tight in position inflicting |stun| and then |root| and |disarm| after. Chance is |disable|-d and |expose|-d for the whole duration or until the nerd escapes."), 

			array ('name'=>"Compound Flask", 'sk'=>'sk2',
				'des'=>"Despite being incredibly rich, Chance always get the rejects of things for his incredibly bad personality. Good thing is, he mixes all those up and throw them into the ground."),  

			array ('name'=>"Rollover", 'sk'=>'sk3',
				'des'=>"Chance rolls a short distance in any direction with a short |haste| boost after, giving him extreme maneuverability and a little bit tactical, which means attractive, to the psykeeper ladies."),

			array ('name'=>"Aim Bot", 'sk'=>'ult',
				'des'=>"Chance's chances of hitting things is ultimately low, good thing is, he can cheat the universe and cause his bullets to always hit the target, at the cost of taking extra damage."),

			array ('name'=>"Counter Strike", 'sk'=>'ext',
				'des'=>"A counter that stuns all enemies in front of Chance when triggered while also blocking a percentage of the direct damage countered. It is also a reference, if that's not obvious enough."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'45% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'Attack Rate', 'val'=>'185%', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'', 'ext'=>''),
			array ('name'=>'Travel Speed', 'val'=>'', 'ext'=>''),
			array ('name'=>'Distance', 'val'=>'', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'', 'ext'=>''),
			array ('name'=>'Rounds', 'val'=>'10', 'ext'=>''),
			array ('name'=>'Reload Time', 'val'=>'2s', 'ext'=>''),
			array ('name'=>'Charges', 'val'=>'', 'ext'=>''),
			);
		$charprimcdm = array (
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'30 /Round'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charpriaug = array (
			array ('name' => "Trigger Happy", 'ico' => "ra-crossed-pistols",
				'des'=>"Reduces reload time to 1 second while also passively increasing Chance's attack rate by 10%."),
			array ('name' => "Massive Package", 'ico' => "ra-eggplant",
				'des'=>"Increases the total amount of rounds per reload to 18."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Damage', 'val'=>'30 x 45% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'Heal', 'val'=>'80% of Supposed Damage', 'ext'=>'pur'),
			array ('name'=>'Cast Time', 'val'=>'80% of Attack Rate', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsecaug = array (
			array ('name' => "Three Stones With One Bird", 'ico' => "ra-lightning-trio",
				'des'=>"Allows Charged shot to bounce to 2 additional targets upon hitting its first target. Decreases damage and heal by 25% per bounce. Bounces off walls."),
			array ('name' => "Sleek Foot", 'ico' => "ra-boot-stomp",
				'des'=>"Makes Charged Shot freeform, allowing it to be cast while moving."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Damage', 'val'=>'', 'ext'=>''),
			array ('name'=>'Attack Rate', 'val'=>'', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'400', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'', 'ext'=>''),
			array ('name'=>'Travel Speed', 'val'=>'', 'ext'=>''),
			array ('name'=>'Distance', 'val'=>'', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'', 'ext'=>''),
			array ('name'=>'Charges', 'val'=>'', 'ext'=>''),

			array ('name'=>'stun Duration', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'root Duration', 'val'=>'2s', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Cooldown', 'val'=>'16s'),
			array ('name'=>'Myst Cost', 'val'=>'70'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "I Got a Stun Gun", 'ico' => "ra-energise",
				'des'=>"Removes the |root| effect and replaces it with another 1 second |stun|. Chance is now free after the first |stun|."),
			array ('name' => "Infinity Rope", 'ico' => "ra-grappling-hook",
				'des'=>"Increases range to 900 and Myst cost to 125."),
			array ('name' => "Priority Target", 'ico' => "ra-targeted",
				'des'=>"Inflicts a 15% |frangible| on the target for the whole duration."),
			array ('name' => "Iron Curtain",
				'des'=>"Removes the |expose| effect Grab Hold leaves on Chance while also leaving a 15% physical |fortify| on him for the duration."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Damage', 'val'=>'100% Mixed Damage', 'ext'=>'aer'),
			array ('name'=>'Attack Rate', 'val'=>'', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'700', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'200', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'', 'ext'=>''),
			array ('name'=>'Travel Speed', 'val'=>'', 'ext'=>''),
			array ('name'=>'Distance', 'val'=>'', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'', 'ext'=>''),
			array ('name'=>'Charges', 'val'=>'', 'ext'=>''),
			array ('name'=>'knockback', 'val'=>'200', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Cooldown', 'val'=>'25s'),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk2aug = array (
			array ('name' => "The Spicy One", 'ico' => "ra-fire-bomb",
				'des'=>"Increases damage by 15% while also causing it to inflict |burn| for 6 seconds."),
			array ('name' => "Kinda Icky", 'ico' => "ra-fizzing-flask",
				'des'=>"Causes Compound Flask to inflict |poison| that deals 90 damage over 5 seconds."),
			array ('name' => "Sweet and Savory", 'ico' => "ra-heart-bottle",
				'des'=>"Compound Flask now heals allies instead of damaging them."),
			array ('name' => "Feels Like Nothing At All", 'ico' => "ra-bottle-vapors",
				'des'=>"Allow Compound Flask to replenish a total of 250 Myst which is shared to all affected allied units."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Damage', 'val'=>'', 'ext'=>''),
			array ('name'=>'Attack Rate', 'val'=>'', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'', 'ext'=>''),
			array ('name'=>'Travel Speed', 'val'=>'', 'ext'=>''),
			array ('name'=>'Distance', 'val'=>'175', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'', 'ext'=>''),
			array ('name'=>'Charges', 'val'=>'2', 'ext'=>''),

			array ('name'=>'haste', 'val'=>'+20%', 'ext'=>''),
			array ('name'=>'haste Duration', 'val'=>'2s', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>'18s'),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk3aug = array (
			array ('name' => "Oops, Souvenir", 'ico' => "ra-broken-bottle",
				'des'=>"Leaves a Compound Flask on Chance's position before rolling which triggers after a 1 second delay. No effect when |disarm|-ed."),
			array ('name' => "Offensive Rolling", 'ico' => "ra-underhand",
				'des'=>"Adds a 20% mystical |amplify| buff in addition to the movement speed buff."),
			array ('name' => "Defensive Rolling", 'ico' => "ra-overhead",
				'des'=>"Adds a 10% physical |fortify| buff in addition to the movement speed buff."),
			array ('name' => "Emergency Exit", 'ico' => "ra-player-dodge",
				'des'=>"Gain a charge of Rollover every time Dual ACMA reloads."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Damage', 'val'=>'', 'ext'=>''),
			array ('name'=>'Attack Rate', 'val'=>'', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Travel Speed', 'val'=>'', 'ext'=>''),
			array ('name'=>'Distance', 'val'=>'', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'5s', 'ext'=>''),
			array ('name'=>'Charges', 'val'=>'', 'ext'=>''),

			array ('name'=>'frangible', 'val'=>'+30%', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Cooldown', 'val'=>'45s'),
			array ('name'=>'Myst Cost', 'val'=>'260'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charultaug = array (
			array ('name' => "Rush B", 'ico' => "ra-mp5",
				'des'=>"Passively increases Chance's critical multiplier by 1."),
			array ('name' => "The Turret", 'ico' => "ra-sattelite",
				'des'=>"Replaces |frangible| with |invulnerability| but shortens the duration to 4 seconds in which Chance is also forced to become stationary."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'Duration', 'val'=>'2s', 'ext'=>''),
			array ('name'=>'Damage Blocked', 'val'=>'70%', 'ext'=>''),
			array ('name'=>'stun Duration', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'stun Range', 'val'=>'150 radius cone', 'ext'=>''),
			);
		$charextmcdm = array (
			array ('name'=>'Cooldown', 'val'=>'15s'),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'CHANNELING'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charextaug = array (
			array ('name' => "Cheap Shot", 'ico' => "ra-ball",
				'des'=>"Reduces cooldown to 2 seconds if Counter Strike is not triggered."),
			array ('name' => "Es-ca-peh", 'ico' => "ra-footprint",
				'des'=>"Gain a charge of Rollover if Counter Strike is triggered."), 
			);
	?>
@stop 