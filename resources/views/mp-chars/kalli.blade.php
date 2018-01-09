@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Kalli @stop
@section('char-meta')
	<?php 
		$charname = 'kalli';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Kalli";
		$mcharFam = "<unknown>";
		$mcharDiv = "";
		$mcharAff = "Order of the Void | The Ark";
		
		$mcharAft = "Sand";
		$mcharSty = "Rudimenti | Cirkunesi";
		$mcharWoc = "Custom Antares";

		$charthemes = 'Fate, Constellations, Umbrellas, Sand, Scorpions, Spooky Scary Scorpions';
		$cityname = 'Prophesies';

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
			array ('name'=>"Scorpion Tail", 'sk'=>'pri',
				'des'=>"Kalli sequencially shoots with Anteres as two crossbows while in ranged mode. in melee mode, Kalli slices people like a true katana wielder."),

			array ('name'=>"Destiny Shift", 'sk'=>'sec',
				'des'=>"Tags a target allowing Kalli's to manipulate their desnity, causing her abilities to do more effects."), 

			array ('name'=>"Quicksand", 'sk'=>'sk1',
				'des'=>"Turns the ground into quicksand which slowly pulls all units to its center. Anyone who somehow managed to escape the pit will be slowed for a few seconds. Units under Destiny Shift will have any mobility skills disabled."), 

			array ('name'=>"Reflecting Shell", 'sk'=>'sk2',
				'des'=>"Kalli opens up her umbrella for as long as she can hold which |reflect|-s all damage and projectiles back. If a unit under Destiny Shift is nearby, all projectiles will be reflected to it."),  

			array ('name'=>"Maddening Strike", 'sk'=>'sk3',
				'des'=>"After a short charge up, Kalli strikes forward with melee Antares that causes all enemy units hit to attack anyone randomly for a few seconds. Hitting a unit under Destiny Shift will be affected with |sleep|-iness after the initial effect wears off."),

			array ('name'=>"God's Play", 'sk'=>'ult',
				'des'=>"Grants Kalli full control over the unit affected by Destiny Shift for a few seconds. Kalli's body will remain channeling the ability and is vulnerable during the effect."),

			array ('name'=>"Antares", 'sk'=>'ext',
				'des'=>"Kalli is proud of a lot of things about herself, but one of the best things she's ever done that not only she is proud of is the way that her custom made weapon can transform into two different forms. Suck that Helios!"),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Ranged Damage', 'val'=>'80% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Ranged Attack Rate', 'val'=>'150%', 'ext'=>''),
			array ('name'=>'Melee Damage', 'val'=>'100% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Melee Attack Rate', 'val'=>'100%', 'ext'=>''),
			array ('name'=>'Melee Range', 'val'=>'120 radius cone', 'ext'=>''),
			);
		$charprimcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charpriaug = array (
			array ('name' => "Dimensional Cut", 'ico' => "ra-doubled",
				'des'=>"When using melee Antares, hitting a unit under Destiny Shift will create a |clone| of the target which will attack its original."),
			array ('name' => "Myst Magic", 'ico' => "ra-player-shot",
				'des'=>"Adds 30% of Kalli's Mystical damage to ranged Antares whenever she hits a unit under Destiny Shift."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Range', 'val'=>'600', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'8s', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'10s'),
			array ('name'=>'Myst Cost', 'val'=>'50'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsecaug = array (
			array ('name' => "Prophecy Calls", 'ico' => "ra-ball",
				'des'=>"Allows Destiny Shift to jump to another enemy unit if the target has not been affected by any of Kalli's abilities for 3 seconds."),
			array ('name' => "Bad Luck", 'ico' => "ra-crown-of-thorns",
				'des'=>"Causes 10% of damage dealt to the target to be dealt to nearby enemy units as well."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Area of Effect', 'val'=>'350', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'0.5s', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'5s', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'17s'),
			array ('name'=>'Myst Cost', 'val'=>'90'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk1aug = array (
			array ('name' => "Sand Torrent", 'ico' => "ra-bleeding-eye",
				'des'=>"Causes an initial sand explosion that |blind|-s units within the area for 2 seconds."),
			array ('name' => "Solidify", 'ico' => "ra-broken-skull",
				'des'=>"Units that stayed within the quicksand for its full duration will be |petrify|-ied."),
			array ('name' => "All of Egypt", 'ico' => "ra-pyramids",
				'des'=>"Allows the quicksand to gain more ground by expanding by 75 every second."),
			array ('name' => "Oasis", 'ico' => "ra-droplet-splash",
				'des'=>"Allied units caught in the quicksand will get a 60% |health-regen| for 8 seconds."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'reflect', 'val'=>'100%', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'120 radius cone', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'35 /s'),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'CHANNELING'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk2aug = array (
			array ('name' => "Moving Shell", 'ico' => "ra-footprint",
				'des'=>"Allow Kalli to move while Reflective Shell is active but gives her a 60% |slow| during it."),
			array ('name' => "Not Now Rain", 'ico' => "ra-lightning-storm",
				'des'=>"Casts Reflective Shell when channeling God's Play. This version of Reflective will protective Kalli in all angles but will cost 200% more Myst every second."),
			array ('name' => "Karma's a Female Dog", 'ico' => "ra-wolf-head",
				'des'=>"Causes |reflect|-ed damage and projectiles to inflict a 30% |slow| for 3 seconds."),
			array ('name' => "Death Wish", 'ico' => "ra-raven",
				'des'=>"Enemy units behind Kalli while Reflective Shell is active receives a 30% |frangible|-ility."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Damage', 'val'=>'100% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Area of Effect', 'val'=>'150 radius cone', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1.5s', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'5s', 'ext'=>''),
			array ('name'=>'sleep Duration', 'val'=>'3s', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'30s'),
			array ('name'=>'Myst Cost', 'val'=>'140'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk3aug = array (
			array ('name' => "Pre-rendered", 'ico' => "ra-cog",
				'des'=>"Removes the cast time but at the cost of permanently decreasing Kalli's movement speed by 10%."),
			array ('name' => "Burn Out", 'ico' => "ra-flame-symbol",
				'des'=>"Cause Maddening Strike to always end with |sleep| even without Destiny Shift."),
			array ('name' => "Multi Tasking", 'ico' => "ra-spear-head",
				'des'=>"If Kalli have Reflective Shell active for as long as Maddening Strike's cast time, Maddening Strike will be cast instantly."),
			array ('name' => "Scorpion Sting",
				'des'=>"With ranged Antares, Maddening Strike will become a shot that affects all units in the 200 radius of the target area."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Range', 'val'=>'600', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'3s', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'5s', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'120s'),
			array ('name'=>'Myst Cost', 'val'=>'225'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'CHANNELING'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charultaug = array (
			array ('name' => "Hard Sand", 'ico' => "ra-player-teleport ",
				'des'=>"Grants Kalli 100% |fortify| which slowly decreases to 0% over the course of the ability."),
			array ('name' => "Star Field", 'ico' => "ra-kaleidoscope ",
				'des'=>"Creates a constellation of stars which |stun|-s units for 1 second everything they try to attack Kalli while channeling God's Play."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'Delay', 'val'=>'1s', 'ext'=>''),
			);
		$charextmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'TOGGLE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charextaug = array (
			array ('name' => "Focus Blade", 'ico' => "ra-relic-blade",
				'des'=>"Causes the first hit with melee Antares to inflict |burn| for 5 seconds."),
			array ('name' => "Rapid Fire", 'ico' => "ra-arrow-cluster",
				'des'=>"Gives a 100% |frenzy| for ranged Antares which decreases by 10% every shot."), 
			);
	?>
@stop