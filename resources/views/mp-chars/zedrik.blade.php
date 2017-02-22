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
		
		$mcharAft = "Raw Myst | Combustion";
		$mcharSty = "Armagus | Maximo";
		$mcharWoc = "Corporal Works' Rune Blade";

		$charthemes = 'Berserker, Demon, Beast, Much Swag, Boom, Masochism, Boom!';

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

		// PRIMARY
		$charprinam = "Rune Blade / Runic Blast";
		$charprides = "Blades are used for slicing adn dicing, which is why, Zed uses his for slicing and dicing. Runic Blast, fires bolts of fire at the distance.";
		// SECONDARY
		$charsecnam = "Unbind";
		$charsecdes = "Zed does not like being affected by anything, like emotions and stuff like that, so he pulls them out of his system and throws it as a projectile. Does not affect Myst Lock, Stun, and Pause.";

		// SK1
		$charsk1nam = "Igni's Curse";
		$charsk1des = "Curses the target with harsh words which drains their Myst until they use their Myst which in turn Myst Locks them for a short period.";
		// SK2
		$charsk2nam = "Breath of Fire";
		$charsk2des = "Causes the surrounding Myst to burst into flames causing massive damage in front of Zed. Damage diminishes the farther the fire travels.";
		// SK3
		$charsk3nam = "Igni's Ground";
		$charsk3des = "Curses the ground with unpleasant bitterness causing it be void of Myst. Because of pain, the ground causes Zed to lose a percentage of health while he's standing on it.";

		// ULTIMATE
		$charultnam = "Azure Fire Assault";
		$charultdes = "Drains all Myst in the surrounding area to centralize in the target area, then causing it the combust into a glorious explosion.";
		// EXTRA
		$charextnam = "Runic Transfiguration";
		$charextdes = "Zed continiously combusts nearby Myst around him causing him to become the legendary 'Rune Beast'. At this state, Rune Blade becomes Runic Blast, he will not be able to regenerate Myst, and he will be slow. Zed can transform back at will or if his remaining Myst is 0.";
	?>
@stop 

<!-- PRIMARY  -->
@section('char-pri-sta')		
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Damage: <b>100% Physical Damage<i class="sbx lum"></i></b></li>
			<li>Attack Rate: <b>100%</b></li>
			<li>Area of Effect: <b>120 radius come</b></li>
		</ul>
	</div>
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>MELEE, sDIRECT DAMAGE</li>
			<li>FREEFORM</li>
			<!-- <li><i class="fa fa-eercast" aria-hidden="true"></i> MYST LOCK -able </li> -->
			<li><i class="fa fa-sign-language" aria-hidden="true"></i> DISARM -able </li>
		</ul>
	</div>
@stop
@section('char-pri-arg-1')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Blade Assimilation:</b>
		Causes Rune Blade to deal more damage equal to 15% of Zedrik's lost Health.
	</li>
@stop
@section('char-pri-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Demonic Vantage:</b>
		Runic Blasts now deals additional damage equivalent to 3% of the target's lost Myst as well as burning their Myst by 30% of Runic Blasts' damage.
	</li>
@stop
<!-- // END -->

<!-- SECONDARY -->
@section('char-sec-sta')
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Range: <b>900</b></li>
		</ul>
	</div>
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Cooldown: <b>9s</b></li>
			<li>DIRECT DAMAGE</li>
			<li>FREEFORM</li>
			<li><i class="fa fa-eercast" aria-hidden="true"></i> MYST LOCK -able </li>
			<!-- <li><i class="fa fa-sign-language" aria-hidden="true"></i> DISARM -able </li> -->
		</ul>
	</div>
@stop
@section('char-sec-arg-1')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Aversion:</b>
		Causes the projectile thrown to explode and deal 50% of Zedrik's Mystical damage in a 200 radius AoE as well as applying all the status effects to all units affected.
	</li>
@stop
@section('char-sec-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Conversion:</b>
		Turns the debuffs into 50 Myst per status effect removed instead of throwing it as a projectile.
	</li>
@stop
<!-- // END -->

<!-- SK1 -->
@section('char-sk1-sta')
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Myst Drained: <b>1.50% of Maximum Myst /s</b></li>
			<li>Duration: <b>5s</b></li>
			<li>Myst Lock | Duration: <b>2s</b></li>
			<li>Range: <b>900</b></li>
		</ul>
	</div>
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Cooldown: <b>18s</b></li>
			<li>Myst Cost: <b>60</b></li>
			<li>ACTIVE, FREEFORM</li>
			<li><i class="fa fa-eercast" aria-hidden="true"></i> MYST LOCK -able </li>
			<!-- <li><i class="fa fa-sign-language" aria-hidden="true"></i> DISARM -able </li> -->
		</ul>
	</div>
@stop
@section('char-sk1-arg-1')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Pain Amplification:</b>
	 	Causes the cursed target and Zedrik himself to receive 25% more damage.
	</li>
@stop
@section('char-sk1-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Adrenaline Rush:</b>
		Increases Zedrik's attack rate by 15% whenever an enemy units is cursed.
	</li>
@stop
@section('char-sk1-arg-3')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Burn Out:</b>
		Increases Myst drained per second to 5% while decreasing duration to 2.  
	</li>
@stop
@section('char-sk1-arg-4')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Blood Sacrifice:</b>
		Removes Igni's Curse's Myst cost and causes it to deal 60 pure damage to the target.
	</li>
@stop
<!-- // END -->

<!-- SK2 -->
@section('char-sk2-sta')
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Damage: <b>125 + 100% Mystical Damage<i class="sbx mys"></i></b></li>
			<li>Damage (Farthest): <b>25% of Damage</b></li>
			<li>Range: <b>400</b></li>
		</ul>
	</div>
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Cooldown: <b>25s</b></li>
			<li>Myst Cost: <b>225</b></li>
			<li>INDIRECT DAMAGE</li>
			<li>ACTIVE, STATIONARY</li>
			<li><i class="fa fa-eercast" aria-hidden="true"></i> MYST LOCK -able </li>
			<!-- <li><i class="fa fa-sign-language" aria-hidden="true"></i> DISARM -able </li> -->
		</ul>
	</div>
@stop
@section('char-sk2-arg-1')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Life Break:</b>
	 	Increases Breath of Fire's damage by 25% and replaces its cost to 10% of maximum health instead of 225 Myst.
	</li>
@stop
@section('char-sk2-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Fire Spin:</b>
		Zedrik replaces Breath of Fire with a 250 radius AoE sword spin explosion with 20% more damage. Reverts back to Breath of Fire if Runic Transfiguration is active.
	</li>
@stop
@section('char-sk2-arg-3')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Burning Magic:</b>
		Breath of Fire now burns affected units' Myst by 100% of its damage.  
	</li>
@stop
@section('char-sk2-arg-4')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> No Ashes:</b>
		Breath of Fire now also purges most buffs and debuffs off affected units.
	</li>
@stop
<!-- // END -->

<!-- SK3 -->
@section('char-sk3-sta')
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Duration: <b>3s</b></li>
			<li>Area of Effect: <b>200</b></li>
		</ul>
	</div>
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Cooldown: <b>22s</b></li>
			<li>Myst Cost: <b>75</b></li>
			<li>ACTIVE, FREEFORM</li>
			<li><i class="fa fa-eercast" aria-hidden="true"></i> MYST LOCK -able </li>
			<!-- <li><i class="fa fa-sign-language" aria-hidden="true"></i> DISARM -able </li> -->
		</ul>
	</div>
@stop
@section('char-sk3-arg-1')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> The Berserker:</b>
	 	Increases Zedrik's attack rate by 20% whenever he is standing on Igni's Ground.
	</li>
@stop
@section('char-sk3-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Hyperbolic:</b>
		Decreases the physical defense and myst resistance of all units within Igni's Ground by 8%.
	</li>
@stop
@section('char-sk3-arg-3')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Passed Curse:</b>
		Causes all enemy units on Igni's Ground to get Igni's Curse whenever a cursed enemy unit is on Igni's Ground.  
	</li>
@stop
@section('char-sk3-arg-4')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Blue Fire:</b>
		Decreases Azure Fire Assault's delay to 1 second when cast inside Igni's Ground.
	</li>
@stop
<!-- // END -->

<!-- ULTIMATE -->
@section('char-ult-sta')
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Base Damage: <b>275<i class="sbx pur"></i></b></li>
			<li>Additional Damage: <b>65% of collective Myst Lost<i class="sbx pur"></i></b></li>
			<li>Delay: <b>3s</b></li>
			<li>Area of Effect: <b>175</b></li>
		</ul>
	</div>
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Cooldown: <b>150s</b></li>
			<li>Myst Cost: <b>400</b></li>
			<li>INDIRECT DAMAGE</li>
			<li>ACTIVE, FREEFORM</li>
			<li><i class="fa fa-eercast" aria-hidden="true"></i> MYST LOCK -able </li>
			<!-- <li><i class="fa fa-sign-language" aria-hidden="true"></i> DISARM -able </li> -->
		</ul>
	</div>
@stop
@section('char-ult-arg-1')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Retribution:</b>
	 	Causes Rune Blade and Runic Blasts to deal pure damage for 3 seconds if Azure Fire Assault successfully hit an enemy.
	</li>
@stop
@section('char-ult-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Hellfire:</b>
		Increases Azure Fire Assault's base damage to 450.
	</li>
@stop
<!-- // END -->

<!-- EXTRA -->
@section('char-ext-sta')
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Transformation Delay: <b>1s</b></li>
			<li>Runic Blasts | Damage: <b>125% Mystical Damage<i class="sbx mys"></i></b></li>
			<li>Runic Blasts | Attack Rate: <b>120%</b></li>
			<li>Runic Blasts | Myst Cost: <b>50 /bolt</b></li>
			<li>Runic Blasts | Movement Speed: <b>-30%</b></li>
		</ul>
	</div>
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Cooldown: <b>5s</b></li>
			<li>TOGGLE, STATIONARY</li>
			<li><i class="fa fa-eercast" aria-hidden="true"></i> MYST LOCK -able </li>
			<li><i class="fa fa-sign-language" aria-hidden="true"></i> DISARM -able </li>
		</ul>
	</div>
@stop
@section('char-ext-arg-1')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Radiant Accession:</b>
	 	Causes Zedrik to deal 35 pure damage to enemy units within 400 radius of himself every second. Adds 12 Myst Cost per second while active.
	</li>
@stop
@section('char-ext-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Lucifer's Child:</b>
		Increases Runic Blasts' damage to 160% of Mystical damage.
	</li>
@stop
<!-- // END -->