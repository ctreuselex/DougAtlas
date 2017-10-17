@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Rustom @stop
@section('char-meta')
	<?php 
		$charname = 'rustom';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Rustom Kepler";
		$mcharFam = "Brother: Porlo Kepler";
		$mcharDiv = "Mystos";
		$mcharAff = "Institute";
		
		$mcharAft = "Light";
		$mcharSty = "Rudimenti | Sigilios";
		$mcharWoc = "Corporal Works' Ascalon";

		$charthemes = 'Light, Sigils, Cosmos, Seriously? Like Are You Serious? Why So Serious?';
		$cityname = 'Disputes';

		$lum = 9;
		$lumPlus = 25;
		$lumTotal = $lum+$lumPlus;

		$aer = 5;
		$aerPlus = 16;
		$aerTotal = $aer+$aerPlus;

		$mys = 6;
		$mysPlus = 25;
		$mysTotal = $mys+$mysPlus;

		$gei = 10;
		$geiPlus = 24;
		$geiTotal = $gei+$geiPlus;

		$charability = array(
			array ('name'=>"Patterned Strike", 'sk'=>'pri',
				'des'=>"Rustom slices up his enemies with Ascalon that charges up every three hit. A slash from charged Ascalon deals additional damage."),

			array ('name'=>"Lunatic Albedo", 'sk'=>'sec',
				'des'=>"Counters a direct hit, creating several Stardusts around Rustom and causing all nearby Stardusts to target the countered enemy."), 

			array ('name'=>"Lunar Eclipse", 'sk'=>'sk1',
				'des'=>"Creates a sigil on the ground that |petrify|-ies everyone standing on it after a short delay, creating quietness."), 

			array ('name'=>"Distant Quasar", 'sk'=>'sk2',
				'des'=>"Sends himself out of the field for a duration and blasts back into the target location, creating several Stardusts in place."),  

			array ('name'=>"Nebula Cloud", 'sk'=>'sk3',
				'des'=>"Creates a miniture nebula at the target area that |slow|-s all enemies inside while also creating Stardusts inside it every second."),

			array ('name'=>"Supernova", 'sk'=>'ult',
				'des'=>"Rustom absorbs all light within the vicinity to supercharge Ascalon and slams it into the ground causing a devastating explosion, damaging enemies and healing allies."),

			array ('name'=>"Stardust", 'sk'=>'ext',
				'des'=>"Are orbs/miniature stars that will home over the nearest enemy or ally and damages or heals them respectively."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'60% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Charged Damage', 'val'=>'+50% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'Attack Rate', 'val'=>'115%', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'90 radius cone', 'ext'=>''),
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
			array ('name' => "Crescent Penumbra", 'ico' => "ra-omega",
				'des'=>"Causes Patterned Strike's attack to cleave over a 150 radius cone at the back of the target for 80% of its damage."),
			array ('name' => "Star Shot", 'ico' => "ra-circular-saw",
				'des'=>"Allows Patterned Strike's charged attack to deal 30% more damage while also causing it to shoot a projectile that passes through enemies with a 600 range."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Duration', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Damage Blocked', 'val'=>'50%', 'ext'=>''),
			array ('name'=>'Stardust Created', 'val'=>'3', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'10'),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'CHANNELING'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsecaug = array (
			array ('name' => "Perfect Reflection", 'ico' => "ra-mirror",
				'des'=>"Increases damage blocked to 100% while also creating a perfect |clone| of Rustom on the countered position which lasts for 4 seconds."),
			array ('name' => "Lunar Alignment", 'ico' => "ra-slash-ring",
				'des'=>"Countering an attack inflicts |petrify| to the countered. Increases cooldown to 13 seconds."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Range', 'val'=>'900', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'200', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'2s', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'16s'),
			array ('name'=>'Myst Cost', 'val'=>'80'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk1aug = array (
			array ('name' => "Extreme Contrast", 'ico' => "ra-ball",
				'des'=>"Causes the sigil to create 5 Stardusts on its side after activation."),
			array ('name' => "Stone Breaker", 'ico' => "ra-groundbreaker",
				'des'=>"Decreases Lunar Eclipse's |petrify|-cation's delay to 6 seconds."),
			array ('name' => "Patience Is Virtue", 'ico' => "ra-hourglass",
				'des'=>"The sigil will not activate if there are no enemy unit inside it, causing it to lasts for 15 seconds more. It then activates if an enemy unit enters it."),
			array ('name' => "Strong Allegiances", 'ico' => "ra-jigsaw-piece",
				'des'=>"Prevents allies from being affected by Lunar Eclipse's |petrify|."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Cast Time', 'val'=>'1.5s', 'ext'=>''),
			array ('name'=>'Distance', 'val'=>'2000', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'3s', 'ext'=>''),
			array ('name'=>'Stardusts Created', 'val'=>'3', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'25s'),
			array ('name'=>'Myst Cost', 'val'=>'80'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'CHANNELING'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk2aug = array (
			array ('name' => "Fast Travel", 'ico' => "ra-feather-wing",
				'des'=>"Decreases cooldown to 15 seconds and cast time to 0.5 second."),
			array ('name' => "Pragmatic Entrance", 'ico' => "ra-heavy-fall",
				'des'=>"Inflicts |disarm| to all enemy units within 300 radius of Rustom's landing point."),
			array ('name' => "Beam Me Up", 'ico' => "ra-spawn-node",
				'des'=>"Increases Quasar's distance to global. Increases its cast time to 3 seconds."),
			array ('name' => "Mass Transport", 'ico' => "ra-overmind",
				'des'=>"Quasar now also takes allied units if they stay close (200 radius) to Rustom while casting."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Area of Effect', 'val'=>'200', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'5s', 'ext'=>''),
			array ('name'=>'slow', 'val'=>'30%', 'ext'=>''),
			array ('name'=>'Stardusts Created', 'val'=>'2 /s', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'18s'),
			array ('name'=>'Myst Cost', 'val'=>'120'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk3aug = array (
			array ('name' => "Fire And Dust", 'ico' => "ra-frostfire",
				'des'=>"Decreases cooldown by 7 seconds and increases duration by 3 seconds."),
			array ('name' => "Counting Stars", 'ico' => "ra-sun",
				'des'=>"Increases Stardust created by Nebula Clouds by 1 every second."),
			array ('name' => "Cosmic Energy", 'ico' => "ra-kaleidoscope",
				'des'=>"Patterned Strike will now remain charged when Rustom is inside a Nebula Cloud."),
			array ('name' => "The Quiet", 'ico' => "ra-burning-eye",
				'des'=>"Causes Rustom and other allied units to become |invisible| inside Nebula Clouds."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Damage', 'val'=>'50 + 100% Mystical Damage /s charged', 'ext'=>'pur'),
			array ('name'=>'Heal', 'val'=>'100% of Supposed Damage', 'ext'=>'pur'),
			array ('name'=>'Area of Effect', 'val'=>'900', 'ext'=>''),
			array ('name'=>'Min Cast Time', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Min Cast Time', 'val'=>'8s', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'60s'),
			array ('name'=>'Myst Cost', 'val'=>'210'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'CHANNELING'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charultaug = array (
			array ('name' => "Black Hole", 'ico' => "ra-site",
				'des'=>"Upon releasing Supernova with at least a 4 second charge time, will create a black hole which sucks all enemy units towards the center for 2 seconds while |stun|-ning them."),
			array ('name' => "New Born", 'ico' => "ra-sunbeams",
				'des'=>"Creates 6 to 48 Stardusts, depending on the time spent charging, upon releasing Supernova."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'Damage', 'val'=>'15 + 30% Mystical Damage', 'ext'=>'pur'),
			array ('name'=>'Heal', 'val'=>'100% of Supposed Damage', 'ext'=>'pur'),
			array ('name'=>'Range', 'val'=>'150', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'1.5s', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'5s', 'ext'=>''),
			);
		$charextmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>''), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'PASSIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charextaug = array (
			array ('name' => "Shooting Stars",
				'des'=>"Gives Stardusts a 35% chance of creating another Stardust upon dealing damage or healing a unit."),
			array ('name' => "Spirit Healer", 'ico' => "ra-level-three-advanced",
				'des'=>"Increases Stardust healing to allies by 30%."), 
			);
	?>
@stop 