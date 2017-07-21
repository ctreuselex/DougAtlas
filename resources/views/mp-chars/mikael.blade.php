@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Mikael @stop
@section('char-meta')
	<?php 
		$charname = 'mikael';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Mikael Clayford";
		$mcharFam = "<unknown>";
		$mcharDiv = "Aeros";
		$mcharAff = "Institute";
		$mcharPos = "Head of Aeros";
		
		$mcharAft = "Raw Myst";
		$mcharSty = "Exnihille";
		$mcharWoc = "None";

		$charthemes = 'Keyboard Warrior, Gang Signs, Total Boss, Cyclops, Probably a Cyborg';
		$cityname = 'Technology';

		$lum = 4;
		$lumPlus = 12;
		$lumTotal = $lum+$lumPlus;

		$aer = 8;
		$aerPlus = 26;
		$aerTotal = $aer+$aerPlus;

		$mys = 12;
		$mysPlus = 34;
		$mysTotal = $mys+$mysPlus;

		$gei = 6;
		$geiPlus = 18;
		$geiTotal = $gei+$geiPlus;

		$charability = array(
			array ('name'=>"Holoblade", 'sk'=>'pri',
				'des'=>"Mikael is used to swinging an oversized greatsword made of Myst that he casually beheads people just for standing behind him while playing against those pesky teenagers in CTs Virtual League."),

			array ('name'=>"Optic Blast", 'sk'=>'sec',
				'des'=>"Using his Myst visor he proudly created himself, Mikael releases a huge amount of fiery Myst that melts through the thickest of armors. Can also be used to overload Myst weapons. Can't be used while |blind|-ed."), 

			array ('name'=>"Holocage", 'sk'=>'sk1',
				'des'=>"Throws all units in the area with dormat Myst underground and quickly crystalizes it sending all units trapped within into a |pause|-d state but with total |invulnerability|. Basically what happens when he gets ganked in early game."), 

			array ('name'=>"Holostrike", 'sk'=>'sk2',
				'des'=>"Summons several Myst blades which gets blasted into a direction, sticking on and damaging all enemy units and objects they pass through. Enemy units may get a bit irritated when a giant sword is sticking out of their back. "),  

			array ('name'=>"Holostorm", 'sk'=>'sk3',
				'des'=>"Rains down crystal Myst blades which damages and inflicts |myst-leak| on enemy units they hit in the head. Weapons will remain on the ground for few seconds."),

			array ('name'=>"Cybernova", 'sk'=>'ult',
				'des'=>"Connects Mikael's CyberTech suit with all overloaded Myst blades and cage nearby and causes an explosion, dealing pure devastating damage to enemy units and restoring Myst to everyone depending on how much load is acquired from the Myst weapons."),

			array ('name'=>"Clayford's CyberTech", 'sk'=>'ext',
				'des'=>"Mikael's armor, which he collaborated with Maximus to make with, prevents him from being affected by certain status effects such as; |myst-leak|, |myst-degen|, and |myst-lock|, to which Maximus agreed is his dream armor but ignores it for the fact that he made it with someone else. Gets disabled a few seconds whenever Mikael is hit with a critical hit."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'100% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'Attack Rate', 'val'=>'80%', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'120 radius cone', 'ext'=>''),

			array ('name'=>'Greatsword Hit Points', 'val'=>'500', 'ext'=>''),
			array ('name'=>'Greatsword Duration', 'val'=>'8s', 'ext'=>''),
			);
		$charprimcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'5 /Greatsword'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charpriaug = array (
			array ('name' => "Freehand", 'ico' => "ra-hand",
				'des'=>"Buffs Mikael with 150% |myst-regen| whenever he doesn't have his Holoblade in his hands."),
			array ('name' => "Overloaded", 'ico' => "ra-energise",
				'des'=>"Allows CyberTech to also connect to his Holoblade adding it's load to Cybernova."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Damage', 'val'=>'120% Mystical Damage /s', 'ext'=>'mys'),
			array ('name'=>'Range', 'val'=>'900', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'15 /s'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsecaug = array (
			array ('name' => "Even With My Eyes Closed", 'ico' => "ra-burning-eye",
				'des'=>"Allows use even while |blind|-ed."),
			array ('name' => "Eyes Wide Open", 'ico' => "ra-bleeding-eye",
				'des'=>"Increases Optic Blast's damage by 7% for every second he is holding the beam."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Area of Effect', 'val'=>'250', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Throw Duration', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Cage Duration', 'val'=>'3s', 'ext'=>''),
			array ('name'=>'Max Load', 'val'=>'400', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'22s'),
			array ('name'=>'Myst Cost', 'val'=>'180'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "Player Disconnected", 'ico' => "ra-metal-gate",
				'des'=>"Increases cage's duration to 5 seconds."),
			array ('name' => "No Juggling", 'ico' => "ra-reverse",
				'des'=>"Cage will instantly form and removes the throw effect."),
			array ('name' => "Dioptic Manifold", 'ico' => "ra-hive-emblem",
				'des'=>"Allows Optic Blast to damage all units inside the cage while also intesifying the cage's loading and damage dealt by 15%."),
			array ('name' => "Optic Fibers", 'ico' => "ra-nodular",
				'des'=>"Increases the cage's max load to 950. Have the cage start at 300 load upon its inception."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Damage', 'val'=>'150% Mystical Damage /blade', 'ext'=>'mys'),
			array ('name'=>'Area of Effect', 'val'=>'200', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Blade Duration', 'val'=>'8s', 'ext'=>''),
			array ('name'=>'Blade Count', 'val'=>'5', 'ext'=>''),
			array ('name'=>'Max Load', 'val'=>'190 /blade', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'14s'),
			array ('name'=>'Myst Cost', 'val'=>'195'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk2aug = array (
			array ('name' => "Full Dex Swordsman", 'ico' => "ra-relic-blade",
				'des'=>"Adds 20% of remaining Myst to the damage of each Myst blade thrown with Holostrike."),
			array ('name' => "I Call Mid", 'ico' => "ra-beam-wake",
				'des'=>"Lowers the area of effect of Holostrike to 125 for more accurate striking."),
			array ('name' => "Particle Beam Cannon", 'ico' => "ra-laser-blast",
				'des'=>"First cast of Optic Blast within the 2 seconds after casting Holostrike will deal 100% more damage and will instantly overload all Myst blade in the vicinity."),
			array ('name' => "Accelerator Beam", 'ico' => "ra-dragon-breath",
				'des'=>"Using Optic Blast on a unit with a Myst blade sticking out of them will cause |burn|-ing to the target and all enemy units within the 200 radius for 3 seconds."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Damage', 'val'=>'90% Mystical Damage /blade', 'ext'=>'mys'),
			array ('name'=>'Area of Effect', 'val'=>'700', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Blade AoE', 'val'=>'150', 'ext'=>''),
			array ('name'=>'Blade Duration', 'val'=>'8s', 'ext'=>''),
			array ('name'=>'Blade Count', 'val'=>'14', 'ext'=>''),
			array ('name'=>'Max Load', 'val'=>'90 /blade', 'ext'=>''),
			array ('name'=>'myst-leak Duration', 'val'=>'3s', 'ext'=>''),

			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'25s'),
			array ('name'=>'Myst Cost', 'val'=>'160'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk3aug = array (
			array ('name' => "Carpet Bombing",
				'des'=>"Increases Myst blade count to 22."),
			array ('name' => "Insta-Cast", 'ico' => "ra-focused-lightning",
				'des'=>"Removes cast time and lowers cooldown to 20 seconds."),
			array ('name' => "Prism Blades", 'ico' => "ra-divert",
				'des'=>"Optic Blast will now bounce to 4 more Myst blades or cage, same rules as a normal Optic Blast will apply to the reflected beams."),
			array ('name' => "There Is No Spoon", 'ico' => "ra-knife-fork",
				'des'=>"Increases Myst blades by Holostorm's max load to 125."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Damage', 'val'=>'100% Acquired Load', 'ext'=>'pur'),
			array ('name'=>'Mikael AoE', 'val'=>'450', 'ext'=>''),
			array ('name'=>'Blade AoE', 'val'=>'150', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'2s', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'15s'),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charultaug = array (
			array ('name' => "Late Game Carry", 'ico' => "ra-skull-trophy",
				'des'=>"Increases damage to 140% but also increases casting time by 1 second."),
			array ('name' => "Source Code", 'ico' => "ra-overmind",
				'des'=>"For allies, if the damage is more than their missing Myst, the remaining damage will heal them instead."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			);
		$charextmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'8s'),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			// array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'PASSIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charextaug = array (
			array ('name' => "Got You On My Sights", 'ico' => "ra-surveillance-camera",
				'des'=>"|reveal|-s all enemy units around Mikael while CyberTech is not on cooldown."),
			array ('name' => "Null Talisman", 'ico' => "ra-gem-pendant",
				'des'=>"Passively increases Mikael's Myst resistance by 25%."), 
			);
	?>
@stop