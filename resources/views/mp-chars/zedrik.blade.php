@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Zedrik @stop
@section('char-meta')
	<?php 
		$charname = 'zedrik';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Zedrik 'Rune Beast' Azazel";
		$mcharFam = "<unknown>";
		$mcharDiv = "Luminos";
		$mcharAff = "The Ark";
		
		$mcharAft = "Fire";
		$mcharSty = "Rudimenti";
		$mcharWoc = "Corporal Works' Rune Blade";

		$charthemes = 'Berserker, Demon, Beast, Much Swag, Boom, Masochism, Boom!';
		$cityname = 'Ruins';

		$lum = 11;
		$lumPlus = 36;
		$lumTotal = $lum+$lumPlus;

		$aer = 7;
		$aerPlus = 25;
		$aerTotal = $aer+$aerPlus;

		$mys = 6;
		$mysPlus = 14;
		$mysTotal = $mys+$mysPlus;

		$gei = 6;
		$geiPlus = 17;
		$geiTotal = $gei+$geiPlus;
		
		$charability = array(
			array ('name'=>"Rune Blade / Runic Blast", 'sk'=>'pri',
				'des'=>"Blades are used for slicing and dicing, which is why, Zed uses his for slicing and dicing. Runic Blast, fires bolts of fire at the distance."),

			array ('name'=>"Unbind", 'sk'=>'sec',
				'des'=>"Zed does not like being affected by anything, like emotions and stuff like that, so he pulls them out of his system and throws it as a projectile. Acts as a |purge|, therefore limited to it as well."), 

			array ('name'=>"Igni's Curse", 'sk'=>'sk1',
				'des'=>"Curses the target with harsh words which drains their Myst until they use their Myst which in turn |myst-lock|-s them for a short period."), 

			array ('name'=>"Breath of Fire", 'sk'=>'sk2',
				'des'=>"Causes the surrounding Myst to burst into flames causing massive damage in front of Zed. Damage diminishes the farther the fire travels. Causes |burn| for 2 seconds."),  

			array ('name'=>"Igni's Ground", 'sk'=>'sk3',
				'des'=>"Curses the ground with unpleasant bitterness causing it be void of Myst, inflicting |myst-leak| to everyone standing on it. Because of pain, the ground causes Zed to lose a percentage of health while he's on it."),

			array ('name'=>"Azure Fire Assault", 'sk'=>'ult',
				'des'=>"Drains all Myst in the surrounding area to centralize in the target area, then causing it to combust into a glorious explosion."),

			array ('name'=>"Runic Transfiguration", 'sk'=>'ext',
				'des'=>"Zed continuously combusts nearby Myst around him causing him to become the legendary 'Rune Beast'. At this state, Rune Blade becomes Runic Blast, he will not be able to regenerate Myst, and he will be |slow|-ed. Zed can transform back at will or if his remaining Myst is 0."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'100% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Attack Rate', 'val'=>'100%', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'120 radius come', 'ext'=>''),
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
			array ('name' => "Blade Assimilation", 'ico' => "ra-lightning-sword",
				'des'=>"Causes Rune Blade to deal more damage equal to 15% of Zedrik's lost Health."),
			array ('name' => "Demonic Vantage", 'ico' => "ra-desert-skull",
				'des'=>"Runic Blasts now deals additional damage equivalent to 3% of the target's lost Myst as well as burning their Myst by 30% of Runic Blasts' damage."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Range', 'val'=>'900', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'9s'),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsecaug = array (
			array ('name' => "Aversion", 'ico' => "ra-reverse",
				'des'=>"Causes the projectile thrown to explode and deal 50% of Zedrik's Mystical damage in a 200 radius AoE as well as applying all the status effects to all units affected."),
			array ('name' => "Conversion", 'ico' => "ra-cycle",
				'des'=>"Turns the debuffs into 50 Myst per status effect removed instead of throwing it as a projectile. With Aversion, the explosion will occur on Zed's position."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Myst Drained', 'val'=>'1.50% of Maximum Myst /s', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'900', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'5s', 'ext'=>''),
			array ('name'=>'myst-lock Duration', 'val'=>'2s', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'18s'),
			array ('name'=>'Myst Cost', 'val'=>'60'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "Daredevil", 'ico' => "ra-nuclear",
				'des'=>"Causes the cursed target and Zedrik himself with 25% |frangible|-ility."),
			array ('name' => "Predator Rush", 'ico' => "ra-shark",
				'des'=>"Whenever an enemy unit is cursed, Zed gains a 15% |frenzy|."),
			array ('name' => "Burn Out", 'ico' => "ra-fire",
				'des'=>"Increases Myst drained per second to 5% while decreasing duration to 2."),
			array ('name' => "Blood Sacrifice", 'ico' => "ra-cut-palm",
				'des'=>"Removes Igni's Curse's Myst cost and causes it to deal 60 pure damage to the target."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Damage', 'val'=>'125 + 100% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Range', 'val'=>'400', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'25s'),
			array ('name'=>'Myst Cost', 'val'=>'225'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk2aug = array (
			array ('name' => "Life Break", 'ico' => "ra-dripping-knife",
				'des'=>"Increases Breath of Fire's damage by 25% and replaces its cost to 10% of maximum health instead of 225 Myst."),
			array ('name' => "Fire Spin", 'ico' => "ra-spinning-sword",
				'des'=>"Zedrik replaces Breath of Fire with a 250 radius AoE sword spin explosion with 20% more damage. Reverts back to Breath of Fire if Runic Transfiguration is active."),
			array ('name' => "Burning Magic", 'ico' => "ra-frostfire",
				'des'=>"Breath of Fire now burns affected units' Myst by 100% of its damage."),
			array ('name' => "No Ashes", 'ico' => "ra-kaleidoscope",
				'des'=>"Breath of Fire now also |purge|-s most status effects off affected units."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Area of Effect', 'val'=>'200', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'5s', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'22s'),
			array ('name'=>'Myst Cost', 'val'=>'75'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk3aug = array (
			array ('name' => "The Berserker", 'ico' => "ra-all-for-one",
				'des'=>"Standing on Igni's Ground grants Zed a 20% |frenzy|."),
			array ('name' => "Hyperbolic", 'ico' => "ra-arson",
				'des'=>"Igni's Ground inflicts a 8% |break| to all enemy units standing on it."),
			array ('name' => "Passed Curse", 'ico' => "ra-bone-bite",
				'des'=>"Causes all enemy units on Igni's Ground to get Igni's Curse whenever a cursed enemy unit is on Igni's Ground."),
			array ('name' => "Blue Fire", 'ico' => "ra-fire-symbol",
				'des'=>"Decreases Azure Fire Assault's delay to 1 second when cast inside Igni's Ground."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Base Damage', 'val'=>'275', 'ext'=>'pur'),
			array ('name'=>'Additional Damage', 'val'=>'65% of collective Myst Lost', 'ext'=>'pur'),
			array ('name'=>'Area of Effect', 'val'=>'175', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'3s', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'150s'),
			array ('name'=>'Myst Cost', 'val'=>'400'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charultaug = array (
			array ('name' => "Retribution", 'ico' => "ra-fire-breath",
				'des'=>"Causes Rune Blade and Runic Blasts to deal pure damage for 3 seconds if Azure Fire Assault successfully hit an enemy."),
			array ('name' => "Hellfire", 'ico' => "ra-burning-embers",
				'des'=>"Increases Azure Fire Assault's base damage to 450."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'Delay', 'val'=>'1s', 'ext'=>''),

			array ('name'=>'Runic Blasts Damage', 'val'=>'125%', 'ext'=>'mys'),
			array ('name'=>'Runic Blasts Attack Rate', 'val'=>'120%', 'ext'=>''),
			array ('name'=>'Runic Blasts Myst Cost', 'val'=>'30/ bolt', 'ext'=>''),
			array ('name'=>'slow', 'val'=>'30%', 'ext'=>''),

			);
		$charextmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'5/s'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'TOGGLE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charextaug = array (
			array ('name' => "Radiant Accession", 'ico' => "ra-sunbeams",
				'des'=>"Causes Zedrik to deal 22 pure damage to enemy units within 400 radius of himself every second. Adds 12 Myst Cost per second while active."),
			array ('name' => "Lucifer's Child",
				'des'=>"Increases Runic Blasts' damage to 160% of Mystical damage."), 
			);
	?>
@stop 