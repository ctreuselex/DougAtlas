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