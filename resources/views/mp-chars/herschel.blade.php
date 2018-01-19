@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Herschel @stop
@section('char-meta')
	<?php 
		$charname = 'herschel';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Herschel";
		$mcharFam = "Mentor: Lemaitre";
		$mcharDiv = "";
		$mcharAff = "Order of the Void";
		
		$mcharAft = "Unknown*";
		$mcharSty = "Extenebri";
		$mcharWoc = "Tauroscene's Starshooter";

		$charthemes = 'Longshots, Blindshots, Ghosts, Stars, Aiming Perfectionist, Super Tall';
		$cityname = 'Lies';

		$lum = 5;
		$lumPlus = 20;
		$lumTotal = $lum+$lumPlus;

		$aer = 11;
		$aerPlus = 35;
		$aerTotal = $aer+$aerPlus;

		$mys = 13;
		$mysPlus = 28;
		$mysTotal = $mys+$mysPlus;

		$gei = 1;
		$geiPlus = 7;
		$geiTotal = $gei+$geiPlus;

		$charability = array(
			array ('name'=>"Sweep", 'sk'=>'pri',
				'des'=>"There are times when close-combat is necessary, so it just happens that Herschel can transform Starshooter into a myst blade and slash her foes with it."),

			array ('name'=>"Starshooter", 'sk'=>'sec',
				'des'=>"Herschel draws a metal arrow and aims for the heart, head, or finger nails of her enemies. The longer the aim the faster it travels, the harder it hits."), 

			array ('name'=>"Comet Storm", 'sk'=>'sk1',
				'des'=>"Herschel shoots for the sky and lets the arrows rain down upon the enemies within the target area. Drains arrow charges depending on the number of units in the target area."), 

			array ('name'=>"Uncloud", 'sk'=>'sk2',
				'des'=>"With her mastery of raw Myst, Herschel can |myst-lock| all enemies in the target area for a few seconds while also |reveal|-ing them naked, a significant boost to the morale of her allies."),  

			array ('name'=>"Myst Propulsion", 'sk'=>'sk3',
				'des'=>"Causes Skyshooter to release massive amount of Myst that |knockback|-s Herschel back along with people in front of her."),

			array ('name'=>"Ethereal Shot", 'sk'=>'ult',
				'des'=>"Coming from the way of the void. Herschel shoots an ethereal arrow from a distance dealing damage and knockbacks all enemies it passes through."),

			array ('name'=>"Phase", 'sk'=>'ext',
				'des'=>"Allow Herschel to pass through units and walls while also preventing her from being affected by physical damage. Instead, amplifies mystical damage she is taking. Also gives increased jump height and a glowy transparent effect which makes her look like ghost."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'75% Mixed Damage', 'ext'=>'aer'),
			array ('name'=>'Attack Rate', 'val'=>'100%', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'120 radius cone', 'ext'=>''),
			);
		$charprimcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charpriaug = array (
			array ('name' => "Partially Phased", "ico" => "ra-zebra-shield",
				'des'=>" Using Sweep buffs Herschel with a 15% |partial-immunity| for 1 second."),
			array ('name' => "Out of Thin Air", "ico" => "ra-incense",
				'des'=>"Every third swing with Sweep generates 1 myst arrow charge for Starshooter which deals additional 60% mystical damage"), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Damage', 'val'=>'60% ~ 160% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Attack Rate', 'val'=>'50%', 'ext'=>''),
			array ('name'=>'Charges', 'val'=>'12', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>'25s'),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsecaug = array (
			array ('name' => "Masksmanship",
				'des'=>"Increases Starshooter's critical multiplier by 1."),
			array ('name' => "Incapacitator", "ico" => "ra-dripping-blade",
				'des'=>"Starshooter's arrows causes a 20% |slow| for 2 seconds whenever she lands a critical hit. Reduces Starshooter's recharge rate by 10."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Damage', 'val'=>'35 + 110% Mixed Damage', 'ext'=>'aer'),
			array ('name'=>'Area of Effect', 'val'=>'400', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),

			array ('name'=>'Arrow Delay', 'val'=>'0.5s', 'ext'=>''),
			array ('name'=>'Arrow AoE', 'val'=>'80', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'18s'),
			array ('name'=>'Myst Cost', 'val'=>'180'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk1aug = array (
			array ('name' => "Flash Quick",  "ico" => "ra-broadhead-arrow",
				'des'=>"Removes the delay it takes for the arrows to hit the targets' position."),
			array ('name' => "Helm Piercing",  "ico" => "ra-cracked-helm",
				'des'=>"Causes Arrow Storm to inflict |expose| on units hit for 3 seconds."),
			array ('name' => "Shooting Entertainment",  "ico" => "ra-player-shot",
				'des'=>"Landing a critical hit with Starshooter decreases Arrow Storm's cooldown by 2 seconds."),
			array ('name' => "Second Round",  "ico" => "ra-arrow-flights",
				'des'=>"Casting Arrow Storm is now followed by another wave after a 1 second delay. Second Round does not drain any arrow charges."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Area of Effect', 'val'=>'300', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'3s', 'ext'=>''),

			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'21s'),
			array ('name'=>'Myst Cost', 'val'=>'60'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk2aug = array (
			array ('name' => "Putrefaction", "ico" => "ra-circular-saw",
				'des'=>"Causes Uncloud to damage enemy units equal to 15% of their remaining Myst. Deals indirect mystical damage."),
			array ('name' => "Unarmored", "ico" => "ra-broken-shield",
				'des'=>"Inflicts a mystical |break| which reduces the affected units' myst resistance to 0%."),
			array ('name' => "Panorama", "ico" => "ra-explosion",
				'des'=>"Increases Uncloud's Area of Effect to 600."),
			array ('name' => "Initiation", "ico" => "ra-arrow-cluster",
				'des'=>"Increases the next attack by Sweep or Starshooter by 5% per units hit by Uncloud. Lasts for 4 seconds if not used."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Range', 'val'=>'250', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'300', 'ext'=>''),

			array ('name'=>'knockback', 'val'=>'300', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'12s'),
			array ('name'=>'Myst Cost', 'val'=>'100'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk3aug = array (
			array ('name' => "Quick Return", "ico" => "ra-chemical-arrow",
				'des'=>"Casting Myst Propulsion generates a myst arrow charge for Starshooter which deals additional 60% myst damage."),
			array ('name' => "Stupefy", "ico" => "ra-decapitation",
				'des'=>"Enemy units hit by Myst Propulsion will be |stun|-ned for 2 seconds."),
			array ('name' => "Elusive", "ico" => "ra-player-dodge",
				'des'=>"Applies a 40% |haste| for 2 seconds after landing."),
			array ('name' => "Spinnerette", "ico" => "ra-regeneration",
				'des'=>"Herschel swings her blade which damages all enemy units around her during her jump for 100% of Sweep's damage."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Damage', 'val'=>'(5% ~ 30% of distance) + 100% Mixed Damage', 'ext'=>'aer'),
			array ('name'=>'100% Damage AoE', 'val'=>'80', 'ext'=>''),
			array ('name'=>'60% Damage AoE', 'val'=>'130', 'ext'=>''),
			array ('name'=>'30% Damage AoE', 'val'=>'280', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'2500', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'30% of Attack Rate', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'18s'),
			array ('name'=>'Myst Cost', 'val'=>'180'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charultaug = array (
			array ('name' => "Devoid", "ico" => "ra-death-skull",
				'des'=>"Ethereal Shot now casts Uncloud along its path. Increases its Myst cost to 230."),
			array ('name' => "Penetrating Arrow", "ico" => "ra-thorn-arrow",
				'des'=>"Allow Ethereal Shot to pass through walls while also increasing it's damage by 15%. Increases its Myst cost to 230."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'Duration', 'val'=>'8s', 'ext'=>''),

			array ('name'=>'Physical Defense', 'val'=>'100%', 'ext'=>''),
			array ('name'=>'Myst Resistance', 'val'=>'-60%', 'ext'=>''),
			array ('name'=>'Jump Height', 'val'=>'+250', 'ext'=>''),
			);
		$charextmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'22s'),
			array ('name'=>'Myst Cost', 'val'=>'75'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'TOGGLE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charextaug = array (
			array ('name' => "Fast Transition", "ico" => "ra-spawn-node",
				'des'=>"Removes Phase's cooldown and Myst cost."),
			array ('name' => "Myst Amplification", "ico" => "ra-targeted",
				'des'=>"Increases Herschel's Mystical damage by 40% and reduces Myst resistance further more by 20% whenever she is on Phase."), 
			);
	?>
@stop 