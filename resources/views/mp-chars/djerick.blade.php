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
		$mcharSty = "Cirkunesi";
		$mcharWoc = "Custom Aquadextrius";

		$charthemes = 'Pole-arms, Mirrors, Wicked Dance Moves, A Little Too Short On Everything';
		$cityname = 'Deceit';

		$lum = 12;
		$lumPlus = 29;
		$lumTotal = $lum+$lumPlus;

		$aer = 10;
		$aerPlus = 27;
		$aerTotal = $aer+$aerPlus;

		$mys = 2;
		$mysPlus = 18;
		$mysTotal = $mys+$mysPlus;

		$gei = 6;
		$geiPlus = 16;
		$geiTotal = $gei+$geiPlus;


		$charability = array(
			array ('name'=>"Aquadextrius", 'sk'=>'pri',
				'des'=>"Moon's own custom made pole-arm is as deadly as rust rushing through open wounds and a breakdancer having a very long third leg."),

			array ('name'=>"Geyser Strike", 'sk'=>'sec',
				'des'=>"Swings an upward strike which throws the target into air, damaging and |disarm|-ing them in the process. Can be cast again for 35 Myst cost for a second hit with a water blast which damages again, but now |knockback|-s and |drench|-es."),

			array ('name'=>"Aqua Blast", 'sk'=>'sk1',
				'des'=>"This trick shot allows Moon to quickly damage, |drench|, and annoy his target with a blast of water to the face along with a |clone| of himself. Double the annoyance."), 

			array ('name'=>"Whirlpool", 'sk'=>'sk2',
				'des'=>"Unleashes his inner breakdancer and wildly swings Aquadextrius around damaging those who are damned and nearby while also allowing him to |reflect| damage."),  

			array ('name'=>"Water Affinity", 'sk'=>'sk3',
				'des'=>"Moon's affinity to water grants him additional buffs whenever he is |drench|-ed. Like a fish. And like fish, |drench| will not decrease his movement speed and attack rate."),

			array ('name'=>"Percutiens Aerugo", 'sk'=>'ult',
				'des'=>"Recreates an enormous Aquadextrius with water which can be shot at a direction in which Moon hates the most, damages and |stun|-s enemies hit."),

			array ('name'=>"Water Image", 'sk'=>'ext',
				'des'=>"For some magical reason, Moon can create a |clone| of himself to fight along side him using a body of water. Not even him understand how this whole thing works. But he likes it."), 
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
			array ('name' => "Extra Precision", "ico" => "ra-targeted",
				'des'=>"Decreases Aquadextrius' Damage by 15% while increasing its critical multiplier by 1."),
			array ('name' => "Hyperactivity", "ico" => "ra-bomb-explosion",
				'des'=>"Passively increases Aquadextrius' attack rate by 30%."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'First Strike Damage', 'val'=>'140% Physical Damage', 'ext'=>'aer'),
			array ('name'=>'Second Strike Damage', 'val'=>'85 + 30% Physical Damage', 'ext'=>'aer'),
			array ('name'=>'Cast Time', 'val'=>'70% of Attack Rate', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'150 radius cone', 'ext'=>''),
			array ('name'=>'knockback', 'val'=>'200', 'ext'=>''),

			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsecaug = array (
			array ('name' => "Hydroxplosion", "ico" => "ra-gloop",
				'des'=>"The second strike now leaves a 400 radius puddle in front of Moon which lasts for 8 seconds."),
			array ('name' => "Dirty Mirror", "ico" => "ra-food-chain",
				'des'=>"Hitting an |expose|-d unit with the first strike will trigger as a critical hit, then reapplyies the |expose| effect."), 
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
			array ('name'=>'Myst Cost', 'val'=>'25'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "Speed Blast", "ico" => "ra-blast",
				'des'=>"Decreases Aqua Blast's cooldown to 2 seconds while increasing its Myst cost to 50 and 15 if cast on water."),
			array ('name' => "Pocket Of Stones", "ico" => "ra-crush",
				'des'=>"Aqua Blast now leaves a 25% |slow| on the target for 3 seconds."),
			array ('name' => "Hydro Bubble", "ico" => "ra-ball",
				'des'=>"Allows Aqua Blast's damage and effects to also affect enemy units within 250 radius of the target."),
			array ('name' => "Sharp Waters", "ico" => "ra-dripping-knife",
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
			array ('name' => "Speed Pool", "ico" => "ra-doubled",
				'des'=>"Causes Moon's Movement Speed to remain at 100% while casting Whirlpool."),
			array ('name' => "Slice And Dice", "ico" => "ra-spinning-sword",
				'des'=>"Gives Whirlpool's hits a 65% |slow| effect which lasts for 0.75 seconds."),
			array ('name' => "Everybody Do The Twist", "ico" => "ra-falling",
				'des'=>"Casting Whirlpool will cause all of Moon's |clone|-s to also cast Whirlpool at the cost of increasing Whirlpool's Myst cost to 160."),
			array ('name' => "Spin To Win",
				'des'=>"Whirlpool's now |reflect|-s 100% of incoming damage."), 
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
			array ('name' => "Essence Of Water",  "ico" => "ra-ocean-emblem",
				'des'=>"Allows |drench| to linger longer for up to 8 seconds on Moon."),
			array ('name' => "Bloodbather",  "ico" => "ra-droplet-splash",
				'des'=>"Hitting enemy units with Aquadextrius, Whirlpool, or Percutiens Aerugo has a 15% chance of |drench|-ing Moon and whoever it is he's hitting. |clone|-s get this ability too."),
			array ('name' => "Tide Turner",  "ico" => "ra-double-team",
				'des'=>"Each charge of Water Image, if cast on water, now creates two copies of Moon instead of one but after a 1 second delay."),
			array ('name' => "Total Fanatic",  "ico" => "ra-hydra-shot",
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
			array ('name' => "Cry Me A River", "ico" => "ra-droplet",
				'des'=>"Causes Percutiens Aerugo to deal additional 45% more damage while also having it leave a 150 radius puddle along it's trail that lasts for 8 seconds."),
			array ('name' => "River Roller", "ico" => "ra-trail",
				'des'=>"Percutiens Aerugo now causes Moon to dash through it and stops when he collides with an enemy unit or reaches range while also leaving a |clone| of Moon on his initial position. Decreases Percutiens Aerugo's cooldown to 5 seconds."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //

		$charextstats = array (
			array ('name'=>'Charges', 'val'=>'3', 'ext'=>''),
			array ('name'=>'clone Duration', 'val'=>'7s', 'ext'=>''),
			);
		$charextmcdm = array (
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
		$charextaug = array (
			array ('name' => "Perfect Copy", "ico" => "ra-aware",
				'des'=>"Turns Water Image's |clone|-s of Moon into a perfect copy of himself. Decreases their duration to 4 seconds."),
			array ('name' => "Moon Party","ico" =>  "ra-moon-sun",
				'des'=>"Gives Moon a passive 30% chance of creating a |clone| of himself when he attacks with Aquadextrius, Whirlpool, or Percutiens Aerugo. Decreases Water Image's charges to 1."), 
			);
	?>
@stop 