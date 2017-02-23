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
		$mcharSty = "Maximo | Sigilios";
		$mcharWoc = "Corporal Works' Ritual Broadsword";

		$charthemes = 'Light, Sigils, Cosmos, Seriously? Like Are You Serious? Why So Serious?';

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
			array ('name'=>"Patterend Strike", 'sk'=>'pri',
				'des'=>"Rustom slices up his enemies with his sword that charges up every three hit. A slash from his charged sword deals additional damage."),

			array ('name'=>"Lunatic Albedo", 'sk'=>'sec',
				'des'=>"Counters a direct hit, creating several Stardusts around Rustom and causing all nearby Stardusts to target the countered enemy."), 

			array ('name'=>"Lunar Eclipse", 'sk'=>'sk1',
				'des'=>"Creates a sigil on the ground that |petrify|-ies everyone standing on it after a short delay, creating quietness."), 

			array ('name'=>"Distant Quasar", 'sk'=>'sk2',
				'des'=>"Sends himself out of the field for a duration and blasts back into the target location, creating several Stardusts in place."),  

			array ('name'=>"Nebula Cloud", 'sk'=>'sk3',
				'des'=>"Creates a miniture nebula at the target area that |slow|-s all enemies inside while also creating Stardusts inside it every second."),

			array ('name'=>"Supernovae", 'sk'=>'ult',
				'des'=>"Rustom absorbs all light within the vicinity to supercharge his sword and slams it into the ground causing a devastating explosion, damaging enemies and healing allies."),

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
			array ('name' => "Crescent Penumbra",
				'des'=>"Causes Patterned Strike's attack to cleave over a 150 radius cone at the back of the target for 80% of its damage."),
			array ('name' => "Star Shot",
				'des'=>"Allows Patterned Strike's charged attack to deal 30% more damage while also causing it to shoot a projectile that passes through enemies with a 600 range."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Duration', 'val'=>'2s', 'ext'=>''),
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
			array ('name' => "Perfect Reflection",
				'des'=>"Increases damage blocked to 100% while also creating a perfect |clone| of Rustom on the countered position which lasts for 4 seconds."),
			array ('name' => "Lunar Alignment",
				'des'=>"Countering an attack inflicts a 2 second |petrify| to the countered. Increases cooldown to 13 seconds."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Range', 'val'=>'900', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'200', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'2s', 'ext'=>''),
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
			array ('name' => "Extreme Contrast",
				'des'=>"Causes the sigil to create 5 Stardusts on its side after activation."),
			array ('name' => "Stone Breaker",
				'des'=>"Allows all of Rustom's damage to pass through |petrify|'s physical defense without breaking it."),
			array ('name' => "Cosmic Strike",
				'des'=>"The sigil will not activate if there are no enemy unit inside it, causing it to lasts for 15 seconds more. It then activates if an enemy unit enters it."),
			array ('name' => "Moon Stone",
				'des'=>"Increases |petrify|'s physical defense increase to 100% on allies."), 
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
			array ('name' => "Fast Travel",
				'des'=>"Decreases cooldown to 15 seconds and cast time to 0.5 second."),
			array ('name' => "Pragmatic Entrance",
				'des'=>"Inflicts |disarm| to all enemy units within 300 radius of Rustom's landing point."),
			array ('name' => "Beam Me Up",
				'des'=>"Increases Quasar's distance to global. Increases its cast time to 3 seconds."),
			array ('name' => "Mass Transport",
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
			array ('name' => "Fire And Dust",
				'des'=>"Decreases cooldown by 7 seconds and increases duration by 3 seconds."),
			array ('name' => "Counting Stars",
				'des'=>"Increases Stardust created by Nebula Clouds by 1 every second."),
			array ('name' => "Cosmic Energy",
				'des'=>"Patterned Strike will now remain charged when Rustom is inside a Nebula Cloud."),
			array ('name' => "The Quiet",
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
			array ('name' => "Black Hole",
				'des'=>"Upon releasing Supernovae with at least a 4 second charge time, will create a black hole which sucks all enemy units towards the center for 2 seconds while |stun|-ning them."),
			array ('name' => "New Born",
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
				'des'=>"Gives Stardusts a 35% chance of creating another Stardust upon dealing damage or healing a unit. Gives Stardusts a 35% chance of creating another Stardust upon dealing damage or healing a unit."),
			array ('name' => "Spirit Healer",
				'des'=>"Increases Stardust healing to allies by 30%."), 
			);

		// PRIMARY
		$charprinam = "Patterned Strike";
		$charprides = "Rustom slices up his enemies with his sword that charges up every three hit. A slash from his charged sword deals additional damage.";
		// SECONDARY
		$charsecnam = "Lunatic Albedo";
		$charsecdes = "Counters a direct hit, creating several Stardusts around Rustom and causing all nearby Stardusts to target the countered enemy.";

		// SK1
		$charsk1nam = "Eclipse";
		$charsk1des = "Creates a sigil on the ground that petrifies everyone standing on it after a short delay, creating quietness.";
		// SK2
		$charsk2nam = "Quasar";
		$charsk2des = "Sends himself out of the field for a duration and blasts back into the target location, creating several Stardusts in place.";
		// SK3
		$charsk3nam = "Nebula Cloud";
		$charsk3des = "Creates a miniture nebula at the target area that slows all enemies inside while also creating Stardusts inside it every second.";

		// ULTIMATE
		$charultnam = "Supernova";
		$charultdes = "Rustom absorbs all light within the vicinity to supercharge his sword and slams it into the ground causing a devastating explosion, damaging enemies and healing allies.";
		// EXTRA
		$charextnam = "Stardust";
		$charextdes = "Are orbs/miniature stars that will home oer the nearest enemy or ally and damages or heals them respectively.";
	?>
@stop 

<!-- PRIMARY  -->
@section('char-pri-sta')		
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Damage: <b>60% Physical Damage<i class="sbx lum"></i></b></li>
			<li>Charged Damage: <b>+50% Mystical Damage<i class="sbx mys"></i></b></li>
			<li>Attack Rate: <b>115%</b></li>
			<li>Area of EffectL <b>90 radius cone</b></li>
		</ul>
	</div>
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>MELEE, DIRECT DAMAGE</li>
			<li>FREEFORM</li>
			<!-- <li><i class="fa fa-eercast" aria-hidden="true"></i> MYST LOCK -able </li> -->
			<li><i class="fa fa-sign-language" aria-hidden="true"></i> DISARM -able </li>
		</ul>
	</div>
@stop
@section('char-pri-arg-1')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Crescent Penumbra:</b>
		Causes Patterned Strike's attack to cleave over a 150 radius cone at the back of the target for 80% of its damage.
	</li>
@stop
@section('char-pri-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Star Shot:</b>
		Allows Patterned Strike's charged attack to deal 30% more damage while also causing it to shoot a projectile that passes through enemies with a 600 range.
	</li>
@stop
<!-- // END -->

<!-- SECONDARY -->
@section('char-sec-sta')
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Counter Duration: <b>2s</b></li>
			<li>Damage Blocked: <b>50%</b></li>
			<li>Stardusts Created: <b>3</b></li>
		</ul>
	</div>
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Cooldown: <b>10s</b></li>
			<li>CHANNELING, STATIONARY</li>
			<li><i class="fa fa-eercast" aria-hidden="true"></i> MYST LOCK -able </li>
			<li><i class="fa fa-sign-language" aria-hidden="true"></i> DISARM -able </li>
		</ul>
	</div>
@stop
@section('char-sec-arg-1')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Perfect Reflection:</b>
		Increases damage blocked to 100% while also creating a perfect copy of Rustom on the countered position which lasts for 4 seconds.
	</li>
@stop
@section('char-sec-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Lunar Alignment:</b>
		Countering an attack inflicts a 2 second petrify to the countered. Increases cooldown to 13 seconds..
	</li>
@stop
<!-- // END -->

<!-- SK1 -->
@section('char-sk1-sta')
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Duration: <b>2s</b></li>
			<li>Delay: <b>1s</b></li>
			<li>Range: <b>900</b></li>
			<li>Area of Effect: <b>200</b></li>
		</ul>
	</div>
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Cooldown: <b>16s</b></li>
			<li>Myst Cost: <b>80</b></li>
			<li>ACTIVE, FREEFORM</li>
			<li><i class="fa fa-eercast" aria-hidden="true"></i> MYST LOCK -able </li>
			<!-- <li><i class="fa fa-sign-language" aria-hidden="true"></i> DISARM -able </li> -->
		</ul>
	</div>
@stop
@section('char-sk1-arg-1')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Extreme Contrast:</b>
	 	Causes the sigil to create 5 Stardusts on its side after activation.
	</li>
@stop
@section('char-sk1-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Stone Breaker:</b>
		Allows all of Rustom's damage to pass through petrify's physical defense.
	</li>
@stop
@section('char-sk1-arg-3')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Cosmic Scribe:</b>
		The sigil will not activate if there are no enemy unit inside it, causing it to lasts for 15 seconds more. It then activates if an enemy unit enters it.  
	</li>
@stop
@section('char-sk1-arg-4')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Moon Stone:</b>
		Increases petrify's physical defense increase to 80% on allies.
	</li>
@stop
<!-- // END -->

<!-- SK2 -->
@section('char-sk2-sta')
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Stardusts Created: <b>3</b></li>
			<li>Distance: <b>2000</b></li>
			<li>Cast Time: <b>1.5s</b></li>
			<li>Duration: <b>1s</b></li>
		</ul>
	</div>
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Cooldown: <b>25s</b></li>
			<li>Myst Cost: <b>80</b></li>
			<li>CHANNELING, STATIONARY</li>
			<li><i class="fa fa-eercast" aria-hidden="true"></i> MYST LOCK -able </li>
			<!-- <li><i class="fa fa-sign-language" aria-hidden="true"></i> DISARM -able </li> -->
		</ul>
	</div>
@stop
@section('char-sk2-arg-1')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Fast Travel:</b>
	 	Decreases cooldown to 15 seconds and cast time to 0.5 second.
	</li>
@stop
@section('char-sk2-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Pragmatic Entrance:</b>
		Inflicts disarm to all enemy units within 300 radius of Rustom's landing point.
	</li>
@stop
@section('char-sk2-arg-3')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Beam Me Up:</b>
		Increases Quasar's distance to global. Increases its cast time to 3 seconds.  
	</li>
@stop
@section('char-sk2-arg-4')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Mass Transport:</b>
		Quasar now also takes allied units if they stay close (200 radius) to Rustom while casting.
	</li>
@stop
<!-- // END -->

<!-- SK3 -->
@section('char-sk3-sta')
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Stardusts Created: <b>2 /s</b></li>
			<li>Movement Speed: <b>-35%</b></li>
			<li>Area of Effect: <b>200</b></li>
			<li>Duration: <b>5s</b></li>
			<li>Delay: <b>1s</b></li>
		</ul>
	</div>
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Cooldown: <b>18s</b></li>
			<li>Myst Cost: <b>120</b></li>	
			<li>ACTIVE, FREEFORM</li>
			<li><i class="fa fa-eercast" aria-hidden="true"></i> MYST LOCK -able </li>
			<!-- <li><i class="fa fa-sign-language" aria-hidden="true"></i> DISARM -able </li> -->
		</ul>
	</div>
@stop
@section('char-sk3-arg-1')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Fire and Dust:</b>
	 	Decreases cooldown by 7 seconds and increases duration by 3 seconds..
	</li>
@stop
@section('char-sk3-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Counting Stars:</b>
		Increases Stardust created by Nebula Clouds by 1 every second..
	</li>
@stop
@section('char-sk3-arg-3')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Cosmic Energy:</b>
		Patterned Strike will now remain charged when Rustom is inside a Nebula Cloud.  
	</li>
@stop
@section('char-sk3-arg-4')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> The Quiet:</b>
		Causes Rustom and other allied units to become invisible inside Nebula Clouds.
	</li>
@stop
<!-- // END -->

<!-- ULTIMATE -->
@section('char-ult-sta')
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Damage / Heal: <b>50 + 60% Mystical Damage /s charged<i class="sbx pur"></i></b></li>
			<li>Max Charge Time: <b>8s</b></li>
			<li>Min Charge Time: <b>1s</b></li>
			<li>Area of Effect: <b>900</b></li>
		</ul>
	</div>
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Cooldown: <b>60s</b></li>
			<li>Myst Cost: <b>210</b></li>
			<li>INDIRECT DAMAGE</li>
			<li>CHANNELING, STATIONARY</li>
			<li><i class="fa fa-eercast" aria-hidden="true"></i> MYST LOCK -able </li>
			<li><i class="fa fa-sign-language" aria-hidden="true"></i> DISARM -able </li>
		</ul>
	</div>
@stop
@section('char-ult-arg-1')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Black Hole:</b>
	 	Upon releasing Supernova with at least a 4 second charge time, will create a black hole which sucks all enemy units towards the center for 2 seconds while stunning them.
	</li>
@stop
@section('char-ult-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> New Born:</b>
		Creates 6 to 48 Stardusts, depending on the time spent charging, upon releasing Supernova.
	</li>
@stop
<!-- // END -->

<!-- EXTRA -->
@section('char-ext-sta')
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Damage / Heal: <b>15 + 30% Mystical Damage<i class="sbx mys"></i></b></li>
			<li>Delay: <b>1.5s</b></li>
			<li>Homing AoE: <b>100</b></li>
			<li>Duration: <b>5s</b></li>
		</ul>
	</div>
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>INDIRECT DAMAGE</li>
			<li>PASSIVE</li>
			<!-- <li><i class="fa fa-eercast" aria-hidden="true"></i> MYST LOCK -able </li> -->
			<!-- <li><i class="fa fa-sign-language" aria-hidden="true"></i> DISARM -able </li> -->
		</ul>
	</div>
@stop
@section('char-ext-arg-1')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Shooting Stars:</b>
	 	Gives Stardusts a 35% chance of creating another Stardust upon dealing damage or healing a unit. Gives Stardusts a 35% chance of creating another Stardust upon dealing damage or healing a unit.
	</li>
@stop
@section('char-ext-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Spirit Healer:</b>
		Increases Stardust healing to allies by 30%.
	</li>
@stop
<!-- // END -->