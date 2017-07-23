@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Valkyr @stop
@section('char-meta')
	<?php 
		$charname = 'valkyr';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Valkyr Soltaire";
		$mcharFam = "Adoptive Parents: Gene Salatiel & Mig Salatiel";
		$mcharDiv = "Aeros";
		$mcharAff = "None";
		
		$mcharAft = "Fire";
		$mcharSty = "Maximo | Exnihille";
		$mcharWoc = "None";

		$charthemes = 'Firebirds, Ultimate Powah, Chains and Blades, Immortality, Dad Puns, I Like Boats';
		$cityname = 'Walls';

		$lum = 7;
		$lumPlus = 35;
		$lumTotal = $lum+$lumPlus;

		$aer = 9;
		$aerPlus = 11;
		$aerTotal = $aer+$aerPlus;

		$mys = 3;
		$mysPlus = 19;
		$mysTotal = $mys+$mysPlus;

		$gei = 11;
		$geiPlus = 25;
		$geiTotal = $gei+$geiPlus;

		$charability = array(
			array ('name'=>"Cinder Blasts", 'sk'=>'pri',
				'des'=>"Excessive use of puns comes with relentless firing of fireballs which leave trails of flaming Myst for Valkyr to utilize for his use of Chain Blades."),

			array ('name'=>"Chain Blades", 'sk'=>'sec',
				'des'=>"Valkyr creates chains and blades out of Cinder Blasts' trails and smashes his foes with it. It's damage increases every time he swings, and resets when he stops swingin'."), 

			array ('name'=>"Phoenix Dive", 'sk'=>'sk1',
				'des'=>"Conjures a large bird of flames which Valkyr rides to battle, damaging and burning enemies he passes through."), 

			array ('name'=>"Fiery Bind", 'sk'=>'sk2',
				'des'=>"Throws a fiery chain which binds the first enemy it comes in contact with inflicting |root| and |burn|."),  

			array ('name'=>"Flame Bolt", 'sk'=>'sk3',
				'des'=>"Fire exploding balls of fire which explodes after a short delay upon coming in contact with its target or the ground."),

			array ('name'=>"Dual Ignition", 'sk'=>'ult',
				'des'=>"Valkyr concentrates on the power of rock and roll, and dad humor, to inflict twice the effect and damage of his attacks in the next few seconds."),

			array ('name'=>"From The Ashes", 'sk'=>'ext',
				'des'=>"Causes Valkyr to gain rapid health regeneration for every portion of health he loses, in turn, he loses myst regeneration."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'70% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'Attack Rate', 'val'=>'150%', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'800', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'', 'ext'=>''),
			array ('name'=>'Travel Speed', 'val'=>'', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'', 'ext'=>''),

			array ('name'=>'Trail Duration', 'val'=>'3s', 'ext'=>''),
			);
		$charprimcdm = array (
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'3'),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charpriaug = array (
			array ('name' => "Heat Mark", 'ico' => "ra-fire-symbol",
				'des'=>"Tags a unit hit by Cinder Blast that last for 5 seconds. Allows Valkyr to use Chain Blades as long as the tagged unit is within his range."),
			array ('name' => "Salt the Burn", 'ico' => "ra-burning-eye",
				'des'=>"Valkyr |leech|-es 30% of Cinder Blasts' damage every time it hits an enemy unit."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Damage', 'val'=>'140% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Damage /swing', 'val'=>'+15%', 'ext'=>''),
			array ('name'=>'100% Damage AoE', 'val'=>'70', 'ext'=>''),
			array ('name'=>'50% Damage AoE', 'val'=>'150', 'ext'=>''),
			array ('name'=>'Attack Rate', 'val'=>'100%', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'800', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsecaug = array (
			array ('name' => "Double Wammie", 'ico' => "ra-two-dragons",
				'des'=>"Turns every third attack of Chain Blade's combo into a double chain blade attack that deals additional 130% damage."),
			array ('name' => "Death Eater", 'ico' => "ra-insect-jaws",
				'des'=>"Adds 2% of Valkyr's remaining health as additional damage to Chain Blades, while also allowing it to |leech| 25% of it's damage."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Damage', 'val'=>'110 + 8% of Remaining Heath', 'ext'=>'aer'),
			array ('name'=>'Cast Time', 'val'=>'1.5s', 'ext'=>''),
			array ('name'=>'Travel Speed', 'val'=>'450', 'ext'=>''),
			array ('name'=>'Distance', 'val'=>'900', 'ext'=>''),

			array ('name'=>'burn Duration', 'val'=>'3s', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Cooldown', 'val'=>'18s'),
			array ('name'=>'Myst Cost', 'val'=>'125'),
			array ('name'=>'Health Cost', 'val'=>'8% Remaining Health'),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "Heat Up", 'ico' => "ra-flame-symbol",
				'des'=>"Increases Phoenix Dive's damage by 15% and distance to 1200."),
			array ('name' => "Hotfoot", 'ico' => "ra-footprint",
				'des'=>"Phoenix Dive gives Valkyr a 80% |health-regen| and a 10% |haste| which lasts for 6 seconds."),
			array ('name' => "Sick Landing", 'ico' => "ra-bird-claw",
				'des'=>"Phoenix Dive allows Valkyr to use Chain Blades for 8 seconds after landing while also granting him additional 30% |frenzy| for 5 seconds."),
			array ('name' => "Fire Wall", 'ico' => "ra-burning-embers",
				'des'=>"Phoenix Dive leaves a scorched area through its path that lasts for 6 seconds, inflicts |burn| on enemy units standing on it."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Range', 'val'=>'800', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'4s', 'ext'=>''),

			array ('name'=>'burn Duration', 'val'=>'6s', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Cooldown', 'val'=>'16s'),
			array ('name'=>'Myst Cost', 'val'=>'90'),
			array ('name'=>'Health Cost', 'val'=>'5% of Remaining Health'),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk2aug = array (
			array ('name' => "Myst on Fire", 'ico' => "ra-frostfire",
				'des'=>"Affected unit will be |myst-lock|-ed for the duration of Fiery Bind."),
			array ('name' => "Take Out", 'ico' => "ra-meat-hook",
				'des'=>"Causes Fiery Bind to now pull the binded unit towards Valkyr."),
			array ('name' => "Chaining Chains", 'ico' => "ra-chain",
				'des'=>"Fiery Bind allows Valkyr to use Chain Blades for 5 seconds after casting while also granting him additional 20% |amplify| for 3 seconds."),
			array ('name' => "Life Leech", 'ico' => "ra-gear-heart",
				'des'=>"Fiery Bind now |leech|-es 1.50% of the affected unit's maximum health per second and gives it to Valkyr."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Damage', 'val'=>'65 + 3% of Remaining Heath', 'ext'=>'aer'),
			array ('name'=>'Range', 'val'=>'900', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'300', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'1s', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Cooldown', 'val'=>'7s'),
			array ('name'=>'Myst Cost', 'val'=>'60'),
			array ('name'=>'Health Cost', 'val'=>'3% of Remaining Health'),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk3aug = array (
			array ('name' => "Triple Volley", 'ico' => "ra-hydra",
				'des'=>"Causes Flame Bolt to conjure 2 additional bolts but lessens the damage of each bolt by 20%."),
			array ('name' => "Quick Jabs", 'ico' => "ra-blaster",
				'des'=>"Decreases Flame Bolt's delay to 0.25 and cooldown to 3 while increasing its Myst cost to 80 and health cost to 5% of remaining health."),
			array ('name' => "Right to Bear Firearms", 'ico' => "ra-musket",
				'des'=>"Casting Flame Bolt leaves a 20% |frenzy| buff which lasts for 5 seconds."),
			array ('name' => "The Offering", 'ico' => "ra-explosion",
				'des'=>"Allow Flame Bolt to |leech| 5% of enemies' remaining health and gives it to Valkyr on impact before exploding."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Cast Time', 'val'=>'2s', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'7s', 'ext'=>''),

			array ('name'=>'Cinder Blast Damage', 'val'=>'+100%', 'ext'=>''),
			array ('name'=>'Chain Blades Damage', 'val'=>'30%', 'ext'=>''),
			array ('name'=>'Phoenix Dive Damage', 'val'=>'100%', 'ext'=>''),
			array ('name'=>'Phoenix Dive Distance', 'val'=>'1600', 'ext'=>''),
			array ('name'=>'Fiery Bind Duration', 'val'=>'8s', 'ext'=>''),
			array ('name'=>'Flame Bolt Damage', 'val'=>'100%', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Cooldown', 'val'=>'45s'),
			array ('name'=>'Myst Cost', 'val'=>'150'),
			array ('name'=>'Health Cost', 'val'=>'20% of Remaining Health'),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charultaug = array (
			array ('name' => "Rock and Rollin'", 'ico' => "ra-burning-meteor",
				'des'=>"Removes Dual Ignition's Myst cost but increases Health cost to 25% of remaining Health."),
			array ('name' => "Four Horned Handsome Devil", 'ico' => "ra-flaming-claw",
				'des'=>"With Dual Ignition active, Valkyr attacks with Cinder Blast and Chain Blade at the same time. Increases Dual Ignition's duration to 12 seconds."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (

			array ('name'=>'Health Regeneration', 'val'=>'+2', 'ext'=>''),
			array ('name'=>'Myst Regeneration', 'val'=>'-1', 'ext'=>''),
			array ('name'=>'Threshold', 'val'=>'80 Heath Lost', 'ext'=>''),
			);
		$charextmcdm = array (
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>''), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'PASSIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charextaug = array (
			array ('name' => "Like a Phoenix",
				'des'=>"Increases health regeneration to +4 and myst regeneration to -2 every threshold."),
			array ('name' => "Fair Trade", 'ico' => "ra-lit-candelabra",
				'des'=>"Passively decreases the Myst cost of all of Valkyr's abilities by 30% and causes them to cost 5% more health based on their normal health cost."), 
			);
	?>
@stop