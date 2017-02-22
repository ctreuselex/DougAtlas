@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Moon @stop
@section('char-meta')
	<?php 
		$charname = 'moon';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Djerick 'Moon' Beleaguer";
		$mcharFam = "Parents: Amelia & Markus Beleaguer, Sibling: Duellie Beleaguer";
		$mcharDiv = "Mystos";
		$mcharAff = "Dominion | Institute";
		
		$mcharAft = "Water";
		$mcharSty = "Armagus";
		$mcharWoc = "Custom-made Aquadextrius";

		$charthemes = 'Pole-arms, Mirrors, Illusions, Wicked Dance Moves';

		$lum = 11;
		$lumPlus = 21;
		$lumTotal = $lum+$lumPlus;

		$aer = 10;
		$aerPlus = 35;
		$aerTotal = $aer+$aerPlus;

		$mys = 2;
		$mysPlus = 18;
		$mysTotal = $mys+$mysPlus;

		$gei = 7;
		$geiPlus = 16;
		$geiTotal = $gei+$geiPlus;


		$charability = array(
			array ('name'=>"Aquadextrius", 'sk'=>'pri',
				'des'=>"Moon's own custom made pole-arm is as deadly as rust rushing through open wounds and a breakdancer having a very long third leg."),

			array ('name'=>"Water Image", 'sk'=>'sec',
				'des'=>"For some magical reason, Moon can create a |clone| of himself to fight along side him using a body of water. Not even him understand how this whole thing works. But he likes it."), 

			array ('name'=>"Aqua Blast", 'sk'=>'sk1',
				'des'=>"This trick shot allows Moon to quickly damage and annoy his target with a blast to the face along with a |clone| of himself."), 

			array ('name'=>"Whirlpool", 'sk'=>'sk2',
				'des'=>"Unleashes his inner breakdancer and wildly swings Aquadextrius around damaging those who are damned and nearby while also allowing him to |reflect| damage."),  

			array ('name'=>"Water Affinity", 'sk'=>'sk3',
				'des'=>"Moon's affinity to water grants him additional buffs whenever he is on water. Like a fish."),

			array ('name'=>"Percutiens Aerugo", 'sk'=>'ult',
				'des'=>"Recreates an enormous Aquadextrius with water which can be shot at a direction in which Moon hates the most, damages and |stun|-s enemies hit."),

			array ('name'=>"Geyser", 'sk'=>'ext',
				'des'=>"Creates a geyser sprout at the target point which damages and |stun|-s enemies after a short delay. The geyser will also leave a puddle to roll on which will disappear after a short time."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'100% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Attack Rate', 'val'=>'100%', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'150 radius cone', 'ext'=>''),
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
			array ('name' => "Extra Precision",
				'des'=>"Decreases Aquadextrius' Damage by 15% while increasing its critical multiplier by 1."),
			array ('name' => "Hyperactivity",
				'des'=>"Passively increases Aquadextrius' attack rate by 30%."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Charges', 'val'=>'3', 'ext'=>''),
			array ('name'=>'clone Duration', 'val'=>'7s', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>'45s'),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'20'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsecaug = array (
			array ('name' => "Perfect Copy",
				'des'=>"Turns Water Image's |clone|-s of Moon into a perfect copy of himself. Decreases their duration to 4 seconds."),
			array ('name' => "Moon Party",
				'des'=>"Gives Moon a passive 30% chance of creating a |clone| of himself when he attacks with Aquadextrius, Whirlpool, or Percutiens Aerugo. Decreases Water Image's charges to 1."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Damage', 'val'=>'45 + 10% Physical Damage', 'ext'=>'aer'),
			array ('name'=>'Range', 'val'=>'800', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'6s'),
			array ('name'=>'Myst Cost', 'val'=>'45'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "Speed Blast",
				'des'=>"Decreases Aqua Blast's cooldown to 2 seconds while increasing its Myst cost to 60 and 15 if cast on water."),
			array ('name' => "Pocket Of Stones",
				'des'=>"Aqua Blast now leaves a 25% |slow| on the target for 3 seconds."),
			array ('name' => "Hydro Bubble",
				'des'=>"Allows Aqua Blast's damage and effects to also affect enemy units within 250 radius of the target."),
			array ('name' => "Sharp Waters",
				'des'=>"Adds additional 40% of physical damage to Aqua Blast's damage."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Damage', 'val'=>'85% Physical Damage /Hit', 'ext'=>'lum'),
			array ('name'=>'Attack Rate', 'val'=>'350%', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'150', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'2s', 'ext'=>''),
			array ('name'=>'reflect', 'val'=>'75%', 'ext'=>''),
			array ('name'=>'Movement Speed', 'val'=>'-50%', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'8s'),
			array ('name'=>'Myst Cost', 'val'=>'120'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'CHANNELING'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk2aug = array (
			array ('name' => "Speed Pool",
				'des'=>"Causes Moon's Movement Speed to remain at 100% while casting Whirlpool."),
			array ('name' => "Slice And Dice",
				'des'=>"Gives Whirlpool's hits a 65% |slow| effect which lasts for 0.75 seconds."),
			array ('name' => "Everybody Do The Twist",
				'des'=>"Casting Whirlpool will cause all of Moon's |clone|-s to also cast Whirlpool at the cost of increasing Whirlpool's Myst cost to 160."),
			array ('name' => "Vanity Blades",
				'des'=>"Moon now reflects back projectiles. Melee hits are instantly thrown back at the attackers. Damage reflected deals 50% less than the original."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Physical Damage', 'val'=>'+25%', 'ext'=>''),
			array ('name'=>'Attack Rate', 'val'=>'+20%', 'ext'=>''),
			array ('name'=>'Movement Speed', 'val'=>'+30%', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>''), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'PASSIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk3aug = array (
			array ('name' => "Essence Of Water",
				'des'=>"Allows the buffs of Water Affinity to linger for 8 seconds after Moon steps out of water."),
			array ('name' => "Bloodbather",
				'des'=>"Hitting enemy units with Aquadextrius, Whirlpool, or Percutiens Aerugo has a 15% chance of giving the effects of Water Affinity for 3 seconds. |clone|-s get this ability too."),
			array ('name' => "Tide Turner",
				'des'=>"Each charge of Water Image, if cast of water, now creates two copies of Moon instead of one but after a 1 second delay."),
			array ('name' => "Total Fanatic",
				'des'=>"Charging towards an enemy unit while on water causes all of Moon's |clone|-s to charge towards the target while giving them all 40% more Movement Speed. Has a cooldown of 6 seconds."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Damage', 'val'=>'175% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Range', 'val'=>'800', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),

			array ('name'=>'stun Duration', 'val'=>'1s', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'9s'),
			array ('name'=>'Myst Cost', 'val'=>'135'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charultaug = array (
			array ('name' => "Cry Me A River",
				'des'=>"Causes Percutiens Aerugo to deal additional 45% more damage while also having it leave a 150 radius puddle along it's trail that lasts for 8 seconds."),
			array ('name' => "River Roller",
				'des'=>"Percutiens Aerugo now causes Moon to dash through it and stops when he collides with an enemy unit or reaches range while also leaving a |clone| of Moon on his initial position. Decreases Percutiens Aerugo's cooldown to 5 seconds."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'Damage', 'val'=>'85 + 10% Physical Damage', 'ext'=>'aer'),
			array ('name'=>'Area of Effect', 'val'=>'250', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'2s', 'ext'=>''),
			array ('name'=>'Puddle Duration', 'val'=>'8s', 'ext'=>''),
			array ('name'=>'stun Duration', 'val'=>'1.5s', 'ext'=>''),
			);
		$charextmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'20s'),
			array ('name'=>'Myst Cost', 'val'=>'90'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charextaug = array (
			array ('name' => "Hydroxplosion",
				'des'=>"Removes the delay of Geyser while increasing its area of effect to 800. Also replaces its |stun| with a 30% |slow| which lasts for 5 seconds."),
			array ('name' => "Mirror Dome",
				'des'=>"reates a mirror dome at the area after Geyser's eruption. The mirror dome will block anyone who isn't Moon from going in or out of it while also continuously creating |clone|-s of Moon every second as long as he is inside it. The dome will lasts for 3 seconds."), 
			);

		// PRIMARY
		$charprinam = "Aquadextrius";
		$charprides = "Moon's own custom made pole-arm is as deadly as rust rushing through open wounds and a breakdancer having a very long third leg.";
		// SECONDARY
		$charsecnam = "Water Image";
		$charsecdes = "For some magical reason, Moon can create a copy of himself to fight along side him using a body of water. Not even him understand how this whole thing works. But he likes it.";

		// SK1
		$charsk1nam = "Aqua Blast";
		$charsk1des = "This trick shot allows Moon to quickly damage and annoy his target with a blast to the face along with a copy of himself.";
		// SK2
		$charsk2nam = "Whirlpool";
		$charsk2des = "Unleashes his inner breakdancer and wildly swings Aquadextrius around damaging those who are damned and nearby while also blocking direct damage.";
		// SK3
		$charsk3nam = "Water Affinity";
		$charsk3des = "Moon's affinity to water grants him additional buffs whenever he is on water while also disregarding its negative effects.";

		// ULTIMATE
		$charultnam = "Percutiens Aerugo";
		$charultdes = "Recreates an enormous Aquadextrius with water which can be shot at a direction in which Moon hates the most, damages and stuns enemies hit.";
		// EXTRA
		$charextnam = "Geyser";
		$charextdes = "Creates a geyser sprout at the target point which damages and stuns enemies after a short delay. The geyser will also leave a puddle to roll on which will disappear after a short time.";
	?>
@stop 

<!-- PRIMARY  -->
@section('char-pri-sta')		
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Damage: <b>100% Physical Damage <i class="sbx lum"></i></b></li>
			<li>Attack Rate: <b>100%</b></li>
			<li>Area of Effect: <b>150 radius cone</b></li>
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
		<b> Extra Precision:</b>
		Decreases Aquadextrius' Damage by 15% while increasing its critical multiplier by 1.
	</li>
@stop
@section('char-pri-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Hyperactivity:</b>
		Passively increases Aquadextrius' attack rate by 30%.
	</li>
@stop
<!-- // END -->

<!-- SECONDARY -->
@section('char-sec-sta')
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Illusion | Damage: <b>30% Physical Damage <i class="sbx lum"></i></b></li>
			<li>Illusion | Damage Taken: <b>150%</b></li>
			<li>Illusion | Duration: <b>7s</b></li>
			<li>Charges: <b>3</b></li>
		</ul>
	</div>
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Recharge Rate: <b>45s</b></li>
			<li>Myst Cost: <b>20</b></li>
			<li>FREEFORM</li>
			<li><i class="fa fa-eercast" aria-hidden="true"></i> MYST LOCK -able </li>
			<!-- <li><i class="fa fa-sign-language" aria-hidden="true"></i> DISARM -able </li> -->
		</ul>
	</div>
@stop
@section('char-sec-arg-1')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Perfect Copy:</b>
		Turns Water Image's copy of Moon into a perfect copy of himself. Decreases their duration to 4 seconds.
	</li>
@stop
@section('char-sec-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Moon Party:</b>
		Gives Moon a passive ability that has a 30% chance of creating a copy of himself when he attacks with Aquadextrius, Whirlpool, or Piercing Strike. Decreases Water Image's charges to 1.
	</li>
@stop
<!-- // END -->

<!-- SK1 -->
@section('char-sk1-sta')
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Damage: <b>45 + 10% Physical Damage <i class="sbx lum"></i></b></li>
			<li>Cast Range: <b>800</b></li>
		</ul>
	</div>
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Cooldown: <b>6s</b></li>
			<li>Myst Cost: <b>45</b></li>
			<li>DIRECT DAMAGE</li>
			<li>ACTIVE, FREEFORM</li>
			<li><i class="fa fa-eercast" aria-hidden="true"></i> MYST LOCK -able </li>
			<!-- <li><i class="fa fa-sign-language" aria-hidden="true"></i> DISARM -able </li> -->
		</ul>
	</div>
@stop
@section('char-sk1-arg-1')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Speed Blast:</b>
		Decreases Aqua Blast's cooldown to 2 seconds while increasing its Myst cost to 60 and 15 if cast on water.
	</li>
@stop
@section('char-sk1-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Pocket of Stones:</b>
		Aqua Blast now has a slowing effect that decreases the target's movement speed by 25% that lasts for 3 seconds.
	</li>
@stop
@section('char-sk1-arg-3')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Hydro Bubble:</b>
		Allows Aqua Blast's damage and effects to also affect enemy units within 250 radius of the target.
	</li>
@stop
@section('char-sk1-arg-4')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Sharp Waters:</b>
		Adds additional 40% of physical damage to Aqua Blast's damage.
	</li>
@stop
<!-- // END -->

<!-- SK2 -->
@section('char-sk2-sta')
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Damage: <b>85% Physical Damage /Hit<i class="sbx lum"></i></b></li>
			<li>Hits /s: <b>5</b></li>
			<li>Area of Effect: <b>150</b></li>
			<li>Duration: <b>2s</b></li>
			<li>Movement Speed: <b>-50%</b></li>
			<li>Damage Blocked: <b>75%</b></li>
		</ul>
	</div>
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Cooldown: <b>8s</b></li>
			<li>Myst Cost: <b>120</b></li>
			<li>MELEE, DIRECT DAMAGE</li>
			<li>CHANNELING, FREEFORM</li>
			<li><i class="fa fa-eercast" aria-hidden="true"></i> MYST LOCK -able </li>
			<li><i class="fa fa-sign-language" aria-hidden="true"></i> DISARM -able </li>
		</ul>
	</div>
@stop
@section('char-sk2-arg-1')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Speed Pool:</b>
		Causes Moon's Movement Speed to remain at 100% while casting Whirlpool.
	</li>
@stop
@section('char-sk2-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Slice and Dice:</b>
		Gives Whirlpool's hits a slowing effect that decreases the movement speed of enemy units hit by 65% for 0.75 seconds.
	</li>
@stop
@section('char-sk2-arg-3')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Everybody do the Twist:</b>
		Casting Whirlpool will cause all of Moon's copies to also cast Whirlpool at the cost of increasing Whirlpool's Myst Cost to 160.
	</li>
@stop
@section('char-sk2-arg-4')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Reflective Blades:</b>
		Moon now reflects back projectiles. Melee hits are instantly thrown back at the attackers. Damage reflected deals 50% less than the original.
	</li>
@stop
<!-- // END -->

<!-- SK3 -->
@section('char-sk3-sta')
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Physical Damage: <b>+25%</b></li>
			<li>Attack Rate: <b>+20%</b></li>
			<li>Movement Speed: <b>+30%</b></li>
		</ul>
	</div>
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>PASSIVE</li>
			<!-- <li><i class="fa fa-eercast" aria-hidden="true"></i> MYST LOCK -able </li> -->
			<!-- <li><i class="fa fa-sign-language" aria-hidden="true"></i> DISARM -able </li> -->
		</ul>
	</div>
@stop
@section('char-sk3-arg-1')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Essence of Water:</b>
		Allows the buffs of Water Affinity to linger for 8 seconds after Moon steps out of water.
	</li>
@stop
@section('char-sk3-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Bloodbather:</b>
		Hitting enemy units with Aquadextrius, Whirlpool, or Piercing Strike has a 15% chance of giving the effects of Water Affinity for 3 seconds. Illusions get this ability too. 
	</li>
@stop
@section('char-sk3-arg-3')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Tide Turner:</b>
		Each charge of Water Image, if cast of water, now creates two copies of Moon instead of one but after a 1 second delay.
	</li>
@stop
@section('char-sk3-arg-4')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Total Fanatic:</b>
		Charging towards an enemy unit while on water causes all of Moon's illusions to charge towards the target while giving 40% more Movement Speed. Has a cooldown of 6 seconds.
	</li>
@stop
<!-- // END -->

<!-- ULTIMATE -->
@section('char-ult-sta')
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Damage: <b>175% Physical Damage <i class="sbx lum"></i></b></li>
			<li>Stun Duration <b>1s</b></li>
			<li>Range: <b>800</b></li>
			<li>Cast Time: <b>1s</b></li>
		</ul>
	</div>
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Cooldown: <b>9s</b></li>
			<li>Myst Cost: <b>135</b></li>
			<li>INDIRECT DAMAGE</li>
			<li>ACTIVE, STATIONARY</li>
			<li><i class="fa fa-eercast" aria-hidden="true"></i> MYST LOCK -able </li>
			<li><i class="fa fa-sign-language" aria-hidden="true"></i> DISARM -able </li>
		</ul>
	</div>
@stop
@section('char-ult-arg-1')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Cry Me a River:</b>
		Causes Percutiens Aerugo to deal additional 45% more damage while also having it leave a 150 radius puddle along it's trail that lasts for 8 seconds.
	</li>
@stop
@section('char-ult-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> River Roller:</b>
		Percutiens Aerugo now causes Moon to dash through it and stops when he collides with an enemy unit or reaches range while also leaving a copy of Moon on his initial position. Decreases Percutiens Aerugo's Cooldown to 5 seconds.
	</li>
@stop
<!-- // END -->

<!-- EXTRA -->
@section('char-ext-sta')
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Damage: <b>85 <i class="sbx lum"></i></b></li>
			<li>Stun Duration: <b>1.5s</b></li>
			<li>Eruption Delay: <b>2s</b></li>
			<li>Area of Effect: <b>250</b></li>
			<li>Puddle Duration: <b>8s</b></li>
		</ul>
	</div>
	<div class="col-xs-6">
		<ul class="skill-stat">
			<li>Cooldown: <b>20s</b></li>
			<li>Myst Cost: <b>90</b></li>
			<li>ACTIVE, FREEFORM</li>
			<li><i class="fa fa-eercast" aria-hidden="true"></i> MYST LOCK -able </li>
			<!-- <li><i class="fa fa-sign-language" aria-hidden="true"></i> DISARM -able </li> -->
		</ul>
	</div>
@stop
@section('char-ext-arg-1')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Hydroxplosion:</b>
		Removes the delay of Geyser while increasing its area of effect to 800. Also replaces its stun with a slow that decreases movement speed by 30% and lasts for 5 seconds.
	</li>
@stop
@section('char-ext-arg-2')
	<li><i class="fa fa-superpowers" aria-hidden="true"></i>
		<b> Mirror Dome:</b>
		Creates a mirror dome at the area after Geyser's eruption. The mirror dome will block anyone who isn't Moon from going in or out of it while also continuously creating copies of Moon every second as long as he is inside it. The dome will lasts for 3 seconds.
	</li>
@stop
<!-- // END -->