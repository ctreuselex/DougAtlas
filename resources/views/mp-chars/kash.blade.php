@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Kash @stop
@section('char-meta')
	<?php 
		$charname = 'kash';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Kash Lorielle";
		$mcharFam = "<unknown>";
		$mcharDiv = "Luminos";
		$mcharAff = "Howler | Institute";
		
		$mcharAft = "Water";
		$mcharSty = "Armagus";
		$mcharWoc = "Tauroscene's Tiderunner";

		$charthemes = 'Marine, Nautilidae, Crustaceans, Aerial Shrimp, Twin Blade Bandit';
		$cityname = 'Games';

		$lum = 10;
		$lumPlus = 30;
		$lumTotal = $lum+$lumPlus;

		$aer = 11;
		$aerPlus = 30;
		$aerTotal = $aer+$aerPlus;

		$mys = 5;
		$mysPlus = 25;
		$mysTotal = $mys+$mysPlus;

		$gei = 4;
		$geiPlus = 5;
		$geiTotal = $gei+$geiPlus;

		$charability = array(
			array ('name'=>"Flurry / Vapor Blade", 'sk'=>'pri',
				'des'=>"Releases a flurry of strikes which goes faster the longer Kash his blender transformation. If Kash is currently in the air, he will slam himself to the ground with Tiderunner and deal incredible damage to all enemy units nearby."),

			array ('name'=>"Tide Rush / Rain Slam", 'sk'=>'sec',
				'des'=>"Slides on the ground and high kicks the poor fellow into the air. If Kash is currently in the air, dashes through the air and slams the targeted ground instead. Deals more damage while |drench|-ed."), 

			array ('name'=>"Hydrobomb", 'sk'=>'sk1',
				'des'=>"Throws a bomb which explodes, dealing damage and |drench|-ing nearby enemy units on contact. Kash, jumping on top of one will cause it to explode and throw him into the air."), 

			array ('name'=>"Stepping Stone", 'sk'=>'sk2',
				'des'=>"Uses an ally, enemy, or object to throw Kash into the air increasing the damage of his next attack."),  

			array ('name'=>"Counter Whip", 'sk'=>'sk3',
				'des'=>"Parries the next incoming direct melee damage and |stun|-s the attacker for a few seconds before |knockback|-ing him away with a water whip. Whip causes damage and |drench| but will not proct while |myst-lock|-ed."),

			array ('name'=>"Razor Water", 'sk'=>'ult',
				'des'=>"Kash throws Tiderunner dealing massive damage to the first enemy it comes in contact with, but will leave Kash |disarm|-ed until Tiderunner propels back to him leaving the target |drench|-ed and |bleed|-ing if not yet dead."),

			array ('name'=>"Camouflage", 'sk'=>'ext',
				'des'=>"Triggers Kash's camouflaging skin which causes him to remain |invisible| as long as he is near an ally or an object."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Flurry Damage', 'val'=>'80% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Flurry Attack Rate', 'val'=>'120%', 'ext'=>''),
			array ('name'=>'Flurry Attack Rate /s', 'val'=>'+10%', 'ext'=>''),
			array ('name'=>'Flurry Range', 'val'=>'90 radius cone', 'ext'=>''),
			array ('name'=>'Vapor Blade Damage', 'val'=>'150% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Vapor Blade AoE', 'val'=>'150', 'ext'=>''),
			);
		$charprimcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charpriaug = array (
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Damage', 'val'=>'130% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'drench Damage', 'val'=>'+20%', 'ext'=>''),
			array ('name'=>'Distance', 'val'=>'600', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'200', 'ext'=>''),
			array ('name'=>'Travel Speed', 'val'=>'500', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsecaug = array (
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Damage', 'val'=>'100% Mixed Damage', 'ext'=>'aer'),
			array ('name'=>'Range', 'val'=>'500', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'200', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'15s', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'15s'),
			array ('name'=>'Myst Cost', 'val'=>'90'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Damage', 'val'=>'+80%', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'6s'),
			array ('name'=>'Myst Cost', 'val'=>'25'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk2aug = array (
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Counter Duration', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Damage Blocked', 'val'=>'60%', 'ext'=>''),
			array ('name'=>'Whip Damage', 'val'=>'90% Mixed Damage', 'ext'=>'aer'),
			array ('name'=>'knockback', 'val'=>'400', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'20s'),
			array ('name'=>'Myst Cost', 'val'=>'120'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk3aug = array (
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Damage', 'val'=>'250% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'3s', 'ext'=>''),
			array ('name'=>'bleed Duration', 'val'=>'5s', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'18s'),
			array ('name'=>'Myst Cost', 'val'=>'80'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charultaug = array (
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'Delay', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'8s', 'ext'=>''),
			);
		$charextmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'25s'),
			array ('name'=>'Myst Cost', 'val'=>'30'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charextaug = array (
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""), 
			);
	?>
@stop