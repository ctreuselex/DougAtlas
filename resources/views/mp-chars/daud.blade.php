@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Daud @stop
@section('char-meta')
	<?php 
		$charname = 'daud';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Daud Irwin";
		$mcharFam = "Parents: Dianne & Cross Irwin";
		$mcharDiv = "Geios";
		$mcharAff = "Institute";
		
		$mcharAft = "Speed";
		$mcharSty = "Cirkunesi";
		$mcharWoc = "Landar Industries' ACMA Tech Mini Pistol";

		$charthemes = 'Speed, Sports, Arrows, Vectors, Hater of Cats, Lover of Non-Cats';
		$cityname = 'Fame';

		$lum = 8;
		$lumPlus = 34;
		$lumTotal = $lum+$lumPlus;

		$aer = 13;
		$aerPlus = 24;
		$aerTotal = $aer+$aerPlus;

		$mys = 4;
		$mysPlus = 13;
		$mysTotal = $mys+$mysPlus;

		$gei = 5;
		$geiPlus = 19;
		$geiTotal = $gei+$geiPlus;

		$charability = array(
			array ('name'=>"Kick Boxing", 'sk'=>'pri',
				'des'=>"Daud's mastery of using his fists and BPD bat in conjunction with his legs in combat makes him a very effective close-combat fighter."),

			array ('name'=>"Myst Pistol", 'sk'=>'sec',
				'des'=>"Getting an ACMA Tech Mini Pistol from Max can serve to be usefull at mid-range assaults and not just suicide."), 

			array ('name'=>"Mad Dash", 'sk'=>'sk1',
				'des'=>"Dashes forward through the wind, leaving all enemies he passed through, |disarm|-ed and |root|-ed."), 

			array ('name'=>"Trailblazer", 'sk'=>'sk2',
				'des'=>"Creates a vector arrow at Daud's current position causing him or any ally to gain |haste| whenever they step on it. The Trail's |haste| buff stacks with each other but each can only affect the same unit once."),  

			array ('name'=>"Kinetic Control", 'sk'=>'sk3',
				'des'=>"Daud takes control of every objects' velocity in the area and throws them off to a direction. A unit thrown by Kinetic Control will damage other units it comes in contact with and well as damage itself. Projectiles thrown will act like it's |reflect|-ed."),

			array ('name'=>"Cutting Wind", 'sk'=>'ult',
				'des'=>"Daud repeatedly dashes towards an enemy then jumps towards another nearby, damaging and |blind|-ing them for the duration. Daud is under |invulnerability| for the duration of the skill."),

			array ('name'=>"Vector Master", 'sk'=>'ext',
				'des'=>"Allow Daud to dash toward a direction he pleases while also granting him passive movement speed boost."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'50% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Attack Rate', 'val'=>'150%', 'ext'=>''),
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
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charpriaug = array (
			array ('name' => "The Speedster", "ico" => "ra-player-thunder-struck",
				'des'=>"Adds 15% of Daud's movement speed to Kick Boxing's damage."),
			array ('name' => "Leg Day", "ico" => "ra-boot-stomp",
				'des'=>"Increases Kick Boxing's damage by 25% whenever he does a kick attack and passively increases Daud's movement speed by 10%."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Damage', 'val'=>'45% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'Attack Rate', 'val'=>'175%', 'ext'=>''),
			array ('name'=>'Rounds', 'val'=>'5', 'ext'=>''),
			array ('name'=>'Reload Time', 'val'=>'1s', 'ext'=>''),
			);
		$charsecmcdm = array (
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
		$charsecaug = array (
			array ('name' => "Penetrating Rounds", "ico" => "ra-target-laser",
				'des'=>"Causes the pistol to deal 15% more damage and inflict |bleed|-ing on critical hits for 3 seconds. Cooldowns for 5 seconds."),
			array ('name' => "Got It From Max", "ico" => "ra-reactor",
				'des'=>"Holding the pistol and targeting an allied unit grants the target a |shield| which absorbs 75% damage and redirects it to Daud's Myst. Drains 1 Round per second."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Area of Effect', 'val'=>'150', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Travel Speed', 'val'=>'2000', 'ext'=>''),
			array ('name'=>'Distance', 'val'=>'600', 'ext'=>''),

			array ('name'=>'root Duration', 'val'=>'2s', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'21s'),
			array ('name'=>'Myst Cost', 'val'=>'125'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "Got Ya", "ico" => "ra-hand-emblem",
				'des'=>"Mad Dash now only |root|-s the first enemy unit Daud bumps to for 5 seconds."),
			array ('name' => "Echo Echo", "ico" => "ra-trail",
				'des'=>"Mad Dash leaves a 10% |haste| buff for 5 seconds."),
			array ('name' => "Gotta Go Fast", "ico" => "ra-player-dodge",
				'des'=>"Increases distance by 300 and causes allies who get caught in the dash to get their Myst replenished by 5% of their maximum Myst pool."),
			array ('name' => "Made You Look",
				'des'=>"Allows Mad Dash to be cast again which then pulls Daud back to his original position. Can only be used 2 seconds after the original cast, otherwise, the skill will go on cooldown. Decreases cooldown to 19 seconds."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Area of Effect', 'val'=>'250', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'5s', 'ext'=>''),
			array ('name'=>'Charges', 'val'=>'3', 'ext'=>''),

			array ('name'=>'haste', 'val'=>'+15%', 'ext'=>''),
			array ('name'=>'haste Duration', 'val'=>'3s', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>'35s'),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'40'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk2aug = array (
			array ('name' => "Flag Spiking Champion", "ico" => "ra-trophy",
				'des'=>"Going over 400 Movement Speed decreases Trailblazer's recharge rate by 1 second every second."),
			array ('name' => "Longer Lasting", "ico" => "ra-stopwatch",
				'des'=>"Increases Trailblazer's |haste| buff duration to 5 seconds."),
			array ('name' => "Faster, Better", "ico" => "ra-player-lift",
				'des'=>"Increases |haste| buff effect by 5."),
			array ('name' => "Never Skip Arms Day", "ico" => "ra-muscle-up",
				'des'=>"Trailblazers now also inflicts |frenzy| by 5% each."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Throw Damage', 'val'=>'150% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Area of Effect', 'val'=>'125', 'ext'=>''),
			array ('name'=>'Distance', 'val'=>'400', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1.5s', 'ext'=>''),
			array ('name'=>'reflect', 'val'=>'100%', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'22s'),
			array ('name'=>'Myst Cost', 'val'=>'100'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk3aug = array (
			array ('name' => "Speed Is My Element", "ico" => "ra-player-pyromaniac",
				'des'=>"Reduces cast time to 0.50 seconds if Daud is affected by a |haste| buff."),
			array ('name' => "Knocking Heads Together", "ico" => "ra-falling",
				'des'=>"Applies a 1 second |stun| to units hitting each other."),
			array ('name' => "Pythagoras Fan", "ico" => "ra-pyramids",
				'des'=>"Using Vector Master's dash upon throw will cause all thrown units and projectiles to change direction, as well as giving Daud a 15% |haste| which lasts for 4 seconds."),
			array ('name' => "High Velocity", "ico" => "ra-sideswipe",
				'des'=>"If applied on allies, buffs them which removes |slow| and |limp| and prevents them from being |slow|-ed and |limp|-ed by anything for 3 seconds."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Damage', 'val'=>'60% Physical Damage + 25% of Movement Speed /Kick', 'ext'=>'lum'),
			array ('name'=>'Kick Interval', 'val'=>'0.25s', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'500', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'3s', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'50s'),
			array ('name'=>'Myst Cost', 'val'=>'190'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'CHANNELING'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charultaug = array (
			array ('name' => "Mr. Far and Wide", "ico" => "ra-castle-emblem",
				'des'=>"Increases area of effect by 500 and allows freeform. Area of effect decreases by 25% every second."),
			array ('name' => "Do This More Frequently", "ico" => "ra-cycle",
				'des'=>"Decreases cooldown by 4 second for every time Daud creates a Trailblazer arrow."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'Dash Range', 'val'=>'150', 'ext'=>''),
			array ('name'=>'Dash Cooldown', 'val'=>'3s', 'ext'=>''),
			array ('name'=>'Movement Speed', 'val'=>'+15%', 'ext'=>''),
			);
		$charextmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			 //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>''), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'PASSIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charextaug = array (
			array ('name' => "Traveling Light", "ico" => "ra-forward",
				'des'=>"Increases Daud's Movement Speed by 30 but decreases his physical defense and myst resistance by 5%."),
			array ('name' => "Can't Hold Me Back", "ico" => "ra-drill",
				'des'=>"Prevent being affected by |slow|, |limp|, |root|, and |stun| if Daud is affected by a |haste| buff."), 
			);
	?>
@stop 