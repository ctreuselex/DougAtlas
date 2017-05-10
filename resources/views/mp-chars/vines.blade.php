@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Vines @stop
@section('char-meta')
	<?php 
		$charname = 'vines';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Vines Roderick";
		$mcharFam = "<unknown>";
		$mcharDiv = "Geios";
		$mcharAff = "Dominion | Institute";
		
		$mcharAft = "Raw Myst | Color";
		$mcharSty = "Armagus";
		$mcharWoc = "Tauroscene's Sherwillon";

		$charthemes = 'Paintings, Murals, Color Me Surprised, Countering, Parrying';
		$cityname = 'Colors';

		$lum = 14;
		$lumPlus = 29;
		$lumTotal = $lum+$lumPlus;

		$aer = 6;
		$aerPlus = 9;
		$aerTotal = $aer+$aerPlus;

		$mys = 7;
		$mysPlus = 38;
		$mysTotal = $mys+$mysPlus;

		$gei = 3;
		$geiPlus = 14;
		$geiTotal = $gei+$geiPlus;

		$charability = array(
			array ('name'=>"Freestroke", 'sk'=>'pri',
				'des'=>"Vines whips away with Sherwillon which causes different status effects for every stroke."),

			array ('name'=>"Grand Line", 'sk'=>'sec',
				'des'=>"Vines draws a massive stroke of color and whips it down to the ground, dealing damage and causing the status effects to every foes based on the last color of Freestroke."), 

			array ('name'=>"Kaleidoscope", 'sk'=>'sk1',
				'des'=>"Allows Vines to parry the next incoming direct damage and counter with a spinning Freestroke strike around her."), 

			array ('name'=>"Splash Response", 'sk'=>'sk2',
				'des'=>"Blocks the next incoming direct damage and sends out different random Freestrokes strikes at the offender."),

			array ('name'=>"Uniform", 'sk'=>'sk3',
				'des'=>"Buffs all nearby friends which allows their attacks to inflict the effects of the last color of Freestroke to any douche they decided to put down for several seconds."),  

			array ('name'=>"Aurora Cannon", 'sk'=>'ult',
				'des'=>"Creates a floating blob of color based on Freestroke's last color which can be hit and conjure projectiles that home on whoever hard critiques Vines' artistic expressions."),

			array ('name'=>"White Space", 'sk'=>'ext',
				'des'=>"Colors the ground in empty white, giving all friendlies an |immunity| for its duration."),
			);


		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'60% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'Attack Rate', 'val'=>'100%', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'180 radius cone', 'ext'=>''),
			array ('name'=>'burn Duration', 'val'=>'3s', 'ext'=>''),
			array ('name'=>'poison Damage', 'val'=>'50% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'poison Duration', 'val'=>'5s', 'ext'=>''),
			array ('name'=>'freeze Inflict Chance', 'val'=>'30%', 'ext'=>''),
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
			array ('name' => "Double Coating",
				'des'=>"Increases damage dealt by the stroke by 40% if the unit is covered in that color's related status effect."),
			array ('name' => "Girl With The Purple Hair",
				'des'=>"Adds a purple stroke, which has a 20% chance to |thundershock|."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Range', 'val'=>'800', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'250', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'60% of Attack Rate', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'3s'),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsecaug = array (
			array ('name' => "Heavy Impact",
				'des'=>"Doubles the damage dealt by Grand Line."),
			array ('name' => "Lasting Impact",
				'des'=>"Causes Grand Line to leave a trail of color on the ground which lasts of 3 seconds and inflicts it's respective status effect on enemies that stand on it."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Counter Duration', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Damage Blocked', 'val'=>'90%', 'ext'=>''),
			array ('name'=>'Freestroke Spin AoE', 'val'=>'200', 'ext'=>''),
			array ('name'=>'Freestroke Spin Duration', 'val'=>'3s', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'15s'),
			array ('name'=>'Myst Cost', 'val'=>'95'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'CHANNELING'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk1aug = array (
			array ('name' => "Around The World",
				'des'=>"Increases Freestroke Spin area of effect to 350."),
			array ('name' => "Rainbow Of Doom",
				'des'=>"Freestroke Spin now uses all colors of strokes instead of using the last color of Freestroke. Decreases Spin duration to 2 seconds."),
			array ('name' => "Open For Business",
				'des'=>"Enemies hit by the Freestroke Spin will also be |expose|-ed."),
			array ('name' => "Refund Dialog",
				'des'=>"Vines gets back the Myst she used if the counter is not triggered."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Counter Duration', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Damage Blocked', 'val'=>'60%', 'ext'=>''),
			array ('name'=>'Freestroke Strikes', 'val'=>'3', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'20s'),
			array ('name'=>'Myst Cost', 'val'=>'95'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'CHANNELING'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk2aug = array (
			array ('name' => "Paint Phalanx",
				'des'=>"Leaves a block of paint after a successful counter which prevents incoming projectiles for 3 seconds."),
			array ('name' => "My Favorite Color",
				'des'=>"All three counter strikes now uses the same color from the last color of Freestroke."), 
			array ('name' => "Two More For Thanks",
				'des'=>"Adds two more strikes to the counter."),
			array ('name' => "The Excitement",
				'des'=>"Gives Vines a 20% |haste| for 3 seconds when she succesfully counters with Splash Response."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Area of Effect', 'val'=>'500', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'2s', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'10s', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'22s'),
			array ('name'=>'Myst Cost', 'val'=>'130'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk3aug = array (
			array ('name' => "Burn It Down",
				'des'=>"Increases inflicted |burn| duration to 5s."),
			array ('name' => "Familiar Taste Of Poison",
				'des'=>"Increases damage by |poison| to 70% of Mystical Damage"),
			array ('name' => "Fortress Of Solitude",
				'des'=>"Increases chance of inflicting |freeze| to 50%."),
			array ('name' => "Ride The Lightning",
				'des'=>"Increases chance of inflicting |thundershock| to 30%."), 
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Damage', 'val'=>'50% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'8s', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'25s'),
			array ('name'=>'Myst Cost', 'val'=>'160'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charultaug = array (
			array ('name' => "Multi-Color",
				'des'=>"Allows the cannon to randomly shoots all kinds of different colored strokes on every hit instead of just one. Increases cast time to 2 seconds."),
			array ('name' => "Concentration",
				'des'=>"The cannon now releases three Freestroke strikes for every hit instead of two."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'Area of Effect', 'val'=>'300', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'2s', 'ext'=>''),
			);
		$charextmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'10s'),
			array ('name'=>'Myst Cost', 'val'=>'200'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charextaug = array (
			array ('name' => "Voidspell",
				'des'=>"White Space now also applies a 3 second |immunity| after it disperses or whenever a unit leaves its area."),
			array ('name' => "Voidstroke",
				'des'=>"Creates a white stroke for Freestroke which then |purge|-s enemy units it hits. Can be applied to Vine's other abilities, it is however, ignored, unless White Space is active."), 
			);
	?>
@stop