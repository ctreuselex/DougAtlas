@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Riza @stop
@section('char-meta')
	<?php 
		$charname = 'riza';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Riza 'Eagle' Harmilton";
		$mcharFam = "<unknown>";
		$mcharDiv = "<unknown>";
		$mcharAff = "none";
		
		$mcharAft = "Mydow";
		$mcharSty = "None";
		$mcharWoc = "Custom Hawk Turret";

		$charthemes = 'Sentries, Nano-tech, Machines, Tech Fan Girl, I Believe I Can Fly';
		$cityname = 'Dirt';

		$lum = 9;
		$lumPlus = 26;
		$lumTotal = $lum+$lumPlus;

		$aer = 3;
		$aerPlus = 9;
		$aerTotal = $aer+$aerPlus;

		$mys = 4;
		$mysPlus = 35;
		$mysTotal = $mys+$mysPlus;

		$gei = 14;
		$geiPlus = 20;
		$geiTotal = $gei+$geiPlus;

		
		$charability = array(
			array ('name'=>"Gatling Fire", 'sk'=>'pri',
				'des'=>"Riza's own Hawk Turrent can fire at an even faster rate than any Landar Industries' ACMA guns."),

			array ('name'=>"Sentry Mode", 'sk'=>'sec',
				'des'=>"Hawk Turret can also be deployed on the ground and fire at the closest enemies or whoever Riza thinks should die first. While active, Riza cannot use her primary attack."), 

			array ('name'=>"Nano Smoke", 'sk'=>'sk1',
				'des'=>"Throws a bomb filled with smoke and tiny machines that |blind|-s enemies every 2 seconds. Enemies inside the smoke are highlighted for all friends to shoot at."), 

			array ('name'=>"Anti-Kinetic Field", 'sk'=>'sk2',
				'des'=>"Based on Psykeeper Vriskvin's time manipulation, Riza can also generate a field that |pause|-s everyone inside it for a short second."),  

			array ('name'=>"Utility Tower", 'sk'=>'sk3',
				'des'=>"Riza places a ulitity tower at her position that grants healing, along with other benefits for all surrounding allies."),

			array ('name'=>"Aero Dynamics", 'sk'=>'ult',
				'des'=>"Riza equips her jet pack that allows her to temporarilly fly over the city like a glorious fighter jet. While active, Nano Smoke's cooldown is reduced which allows for dropping bombs below."),

			array ('name'=>"Statis Trap", 'sk'=>'ext',
				'des'=>"Running and hiding allowed Riza to stay away from all the other nonsense around Mirrorplane, what allowed her to do this for all time now is, well. trapping everyone who tried to follow her into dark alleways."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'45% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'Attack Rate', 'val'=>'200%', 'ext'=>''),
			array ('name'=>'Rounds', 'val'=>'30', 'ext'=>''),
			array ('name'=>'Reload Time', 'val'=>'2s', 'ext'=>''),
			);
		$charprimcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'20 /Round'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charpriaug = array (
			array ('name' => "This Shit Can Heal?", 'ico' => "ra-level-four-advanced",
				'des'=>"Firing rounds of Gatling Fire to allies will heal them for it's supposed damage."),
			array ('name' => "Oh, I have a Wrench", 'ico' => "ra-wrench",
				'des'=>"Allows Riza to attack with her wrench for 100% physical damage at 100% attack rate, whenever Hawk Turret is in Sentry Mode or she's |myst-lock|-ed or |disarm|-ed."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Range', 'val'=>'400', 'ext'=>''),

			array ('name'=>'Turret Range', 'val'=>'800', 'ext'=>''),
			array ('name'=>'Turret Reload', 'val'=>'Every 3s', 'ext'=>''),
			array ('name'=>'Turret Shield', 'val'=>'400', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'10s'),
			array ('name'=>'Myst Cost', 'val'=>'100'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsecaug = array (
			array ('name' => "Front Liner", 'ico' => "ra-heavy-shield",
				'des'=>"Grants Hawk Turret an additional 150 shield that blocks incoming damage from the front."),
			array ('name' => "Who's Your Guardian", 'ico' => "ra-knight-helmet",
				'des'=>"Allow Riza to attach Hawk Turret on allied units applying its |shield| to the target itself."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Range', 'val'=>'800', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'200', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'8s', 'ext'=>''),
			array ('name'=>'blind Duration', 'val'=>'1s', 'ext'=>''),

			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'18s'),
			array ('name'=>'Myst Cost', 'val'=>'90'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk1aug = array (
			array ('name' => "Corrupted Bots", 'ico' => "ra-robot-arm",
				'des'=>"Causes the smoke to deal 50% mystical damage to enemy units every second."),
			array ('name' => "Myst Eater", 'ico' => "ra-food-chain",
				'des'=>"|myst-lock|-s all enemy units inside the smoke for 1 second everytime they get |blind|-ed by the smoke."),
			array ('name' => "Nano Boost", 'ico' => "ra-crystals",
				'des'=>"Applies a 6% mystical |amplify| to allies inside the smoke."),
			array ('name' => "Ultra Microscopical", 'ico' => "ra-repair",
				'des'=>"Decreases Myst cost to 40 and cooldown to 12 seconds."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Area of Effect', 'val'=>'300', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'1s', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'21s'),
			array ('name'=>'Myst Cost', 'val'=>'120'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk2aug = array (
			array ('name' => "Semi Time Manipulator", 'ico' => "ra-clockwork",
				'des'=>"Units affected by Kinetic Field are now affected by a 30% |slow| for 3 seconds after the field disperses."),
			array ('name' => "Bots Stuck In Time", 'ico' => "ra-stopwatch",
				'des'=>"Placing Kinetic Field on top of Nano Smoke will cause the smoke to reset its duration."),
			array ('name' => "I Didn't Know It Can Do That", 'ico' => "ra-aura",
				'des'=>"Now causes allies to get maximum movement and attack speed in the field instead of getting paused."),
			array ('name' => "After Shock", 'ico' => "ra-groundbreaker",
				'des'=>"Hawk Turret's Sentry Mode's shield depleting and Utility Tower being destroyed now creates a Kinetic field in their place."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Damage', 'val'=>'', 'ext'=>''),
			array ('name'=>'Heal', 'val'=>'60% of Mystical Damage /s', 'ext'=>'mys'),
			array ('name'=>'Area of Effect', 'val'=>'500', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'10s', 'ext'=>''),

			array ('name'=>'Tower Health', 'val'=>'300', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'20s'),
			array ('name'=>'Myst Cost', 'val'=>'100'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk3aug = array (
			array ('name' => "Bio Distrupter", 'ico' => "ra-skull-trophy",
				'des'=>"Applies a 9% physical |weaken|, 6% physical |break|, and 60% |health-degen| to all enemy units in range."),
			array ('name' => "Reflective Shells", 'ico' => "ra-divert",
				'des'=>"Applies a 50% |reflect| to the utility tower."),
			array ('name' => "Hit Pulse", 'ico' => "ra-health",
				'des'=>"Causes the tower to heal all allied units in the area by 50% of its heal every time it's hit."),
			array ('name' => "Empower", 'ico' => "ra-all-for-one",
				'des'=>"Applies a 5% physical and mystical |amplify| to all allied units in range."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),

			array ('name'=>'Flight Height', 'val'=>'600', 'ext'=>''),
			array ('name'=>'Nano Smoke Cooldown', 'val'=>'-60%', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'50/s'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'TOGGLE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charultaug = array (
			array ('name' => "Night Witch", 'ico' => "ra-jetpack",
				'des'=>"While active, casting Nano Smoke allows it to deals an initial 150% mystical damage."),
			array ('name' => "Lower Ring Engineering", 'ico' => "ra-gear-heart",
				'des'=>"Lower Myst cost to 20 per second but increases cast time to 2 seconds."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'Damage', 'val'=>'60 + 120% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'Area of Effect', 'val'=>'175', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),	
			array ('name'=>'Duration', 'val'=>'20s', 'ext'=>''),
			array ('name'=>'root Duration', 'val'=>'2s', 'ext'=>''),

			);
		$charextmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'60s'),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charextaug = array (
			array ('name' => "Interconnected", 'ico' => "ra-nodular",
				'des'=>"Causes all Statis Traps to always trigger at the same time, increasing each damage by 20% but prevents their damage from stacking over each other."),
			array ('name' => "Field Awareness", 'ico' => "ra-uncertainty",
				'des'=>"Enemy units triggering Statis Traps now alerts Riza and her allies."), 
			);
	?>
@stop 