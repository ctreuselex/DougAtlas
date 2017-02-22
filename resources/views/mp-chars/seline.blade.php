@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Seline @stop
@section('char-meta')
	<?php 
		$charname = 'seline';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Seline Nieve Cirrus Loquintez";
		$mcharFam = "Mother: Sylvia Loquintez, Half-Sibling: Llaxine Loquintez";
		$mcharDiv = "Mystos";
		$mcharAff = "Dominion | Institute";
		
		$mcharAft = "Weather";
		$mcharSty = "Armagus";
		$mcharWoc = "Tauroscene's Titan & Myst-based Mini-Glaives";

		$charthemes = 'Storms, Mists, Elite, Purging, Genocide, Anything Sexy';

		$lum = 4;
		$lumPlus = 10;
		$lumTotal = $lum+$lumPlus;

		$aer = 16;
		$aerPlus = 15;
		$aerTotal = $aer+$aerPlus;

		$mys = 4;
		$mysPlus = 40;
		$mysTotal = $mys+$mysPlus;

		$gei = 6;
		$geiPlus = 25;
		$geiTotal = $gei+$geiPlus;

		$charability = array(
			array ('name'=>"Glaive Throw", 'sk'=>'pri',
				'des'=>"Turns out that buying all those unique-flake-collection from that shady Aeros dude can be incredibly helpful with being thrown and chasing hobos until they melt."),

			array ('name'=>"Combat Heels", 'sk'=>'sec',
				'des'=>"A woman should always be able to protect herself, or should always be the one people protect other people for."), 

			array ('name'=>"Lightning Vortex", 'sk'=>'sk1',
				'des'=>"Titan can be thrown into position and channel the power of the storms, damaging every enemies too foolish to stand on a spinning giant blade."), 

			array ('name'=>"Static Discharge", 'sk'=>'sk2',
				'des'=>"Distrups an area with an electric shock, |purge|-ing everyone in it, as well as damaging them. After the shock however, affected units will be able to recover the damage if not damaged by another source."),  

			array ('name'=>"Spark", 'sk'=>'sk3',
				'des'=>"Seline creates a connection between her and her target which then allows both of them to be transported into the area between them, damaging the target and enemies in the landing area."),

			array ('name'=>"Lightning Storm", 'sk'=>'ult',
				'des'=>"Calls upon the power of the storm to continiously distrup the area around Seline. If Titan is not in use, Titan will chase around enemy units during the duration of the storm."),

			array ('name'=>"Mist Cloud", 'sk'=>'ext',
				'des'=>"Surrounds herself with mist, causing her and her friends - with benefits - to become |invisible| while they remain inside the mist. The mist itself, will remain visible."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'80% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Attack Rate', 'val'=>'100%', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'150', 'ext'=>''),
			array ('name'=>'Travel Speed', 'val'=>'350', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'3s', 'ext'=>''),
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
			array ('name' => "Bouncy Blade",
				'des'=>"Glaives now bounces trice to the closest enemy upon hitting its first target. Resets duration and decreases damage by 15% per bounce."),
			array ('name' => "Twin Blades",
				'des'=>"Seline now throws two glaives per throw. Decreases damage by 20% per glaive."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ----------------------------------------------------------- //
		$charsecstats = array (
			array ('name'=>'Damage', 'val'=>'60% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Attack Rate', 'val'=>'150%', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'90 radius cone', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsecaug = array (
			array ('name' => "Femme Fatale",
				'des'=>"Increases Combat Heel's critical multiplier by 1 and inflicts |expose| for 2 seconds for every 3 consecutive hits."),
			array ('name' => "Heel Blades",
				'des'=>"Increases Combat Heel's damage by 25% and range to 120 radius cone."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Damage', 'val'=>'20 + 50% Mystical Damage /s', 'ext'=>'mys'),
			array ('name'=>'Area of Effect', 'val'=>'200', 'ext'=>''),
			array ('name'=>'Travel Speed', 'val'=>'300', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'5s', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'15s'),
			array ('name'=>'Myst Cost', 'val'=>'100'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk1aug = array (
			array ('name' => "Twist It",
				'des'=>"Increases Lightning Vortex's damage by 40% and Myst cost to 140."),
			array ('name' => "Hurricane",
				'des'=>"Adds 3 seconds to Lightning Vortex's duration and 75 to area of effect."),
			array ('name' => "Leg Split",
				'des'=>"Units affected by Lightning Vortex will be affected by a 45% |slow|."),
			array ('name' => "Disco Panic",
				'des'=>"Units affected by Lightning Vortex will be |myst-lock|-ed."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Damage', 'val'=>'10 + 80% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'Heals After', 'val'=>'3s', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'250', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'3s'),
			array ('name'=>'Myst Cost', 'val'=>'75'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk2aug = array (
			array ('name' => "Shock From Pain",
				'des'=>"Units are |disarm|-ed by Static Discharge. Increases cooldown to 4."),
			array ('name' => "Not A Sadist",
				'des'=>"Prevents allied units from being damaged and |disarm|-ed but still get |purge|-d."),
			array ('name' => "One Is Enough",
				'des'=>"Static Discharge now instantly destroys enemy |clone|-s."),
			array ('name' => "No Refunds, No Bonuses",
				'des'=>"Static Discharge's damage will not heal back while also inflicting |myst-leak| for 3 seconds."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Damage', 'val'=>'125% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'Range', 'val'=>'600', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'300', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Travel Speed', 'val'=>'2000', 'ext'=>''),			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'17s'),
			array ('name'=>'Myst Cost', 'val'=>'40'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk3aug = array (
			array ('name' => "Intimate And Up Close",
				'des'=>"Grants Seline a 45% |frenzy| for 4 seconds after using Spark."),
			array ('name' => "Your Strength",
				'des'=>"Spark absorbs 35% physical damage from the target and gives it to Seline for 5 seconds. Does not work on allies."),
			array ('name' => "Squeezed Tight",
				'des'=>"Causes |expose| and a 30% |slow| for 3 seconds."),
			array ('name' => "Early Climax",
				'des'=>"Increases Spark's damage by 35%."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array  (
			array ('name'=>'Throw Interval', 'val'=>'0.3s', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'800', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'10s', 'ext'=>''),
			array ('name'=>'Movement Speed', 'val'=>'-50%', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'10s'),
			array ('name'=>'Myst Cost', 'val'=>'275'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'CHANNELING'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charultaug = array (
			array ('name' => "No Need To Flatter",
				'des'=>"Allows Seline to remain in Mist Cloud's |invisible|-lity and applies a 15% |partial-immunity| on her while channeling Lightning Storm."),
			array ('name' => "Missionary",
				'des'=>"Every 2 seconds while channeling Lightning Storm, every unit in the area of Lightning Storm will be |expose|-d for 1 second."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'Area of Effect', 'val'=>'250', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'2s', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'9s', 'ext'=>''),
			);
		$charextmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'13s'),
			array ('name'=>'Myst Cost', 'val'=>'65'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charextaug = array (
			array ('name' => "Extra Thick",
				'des'=>"Causes |invisible|-lity to return after 1 second after being broken as long as it does not exceed Mist Cloud's duration."),
			array ('name' => "Extra Long.",
				'des'=>"Increases Mist Cloud's duration to 14 seconds."), 
			);
	?>
@stop