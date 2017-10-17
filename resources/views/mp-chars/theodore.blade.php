@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Theodore @stop
@section('char-meta')
	<?php 
		$charname = 'theodore';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Theodore Orcullo";
		$mcharFam = "<unknown>";
		$mcharDiv = "Geios";
		$mcharAff = "Institute";
		$mcharPos = "Head of Luminos";
		
		$mcharAft = "Weapons";
		$mcharSty = "Armagi | Cirkunesi";
		$mcharWoc = "Tauroscene's Dire";

		$charthemes = 'Dark Souls, Death Kight, Oh no Murder, Has a Puppy which Wield Swords';
		$cityname = 'Guilt';

		$lum = 13;
		$lumPlus = 34;
		$lumTotal = $lum+$lumPlus;

		$aer = 4;
		$aerPlus = 16;
		$aerTotal = $aer+$aerPlus;

		$mys = 4;
		$mysPlus = 12;
		$mysTotal = $mys+$mysPlus;

		$gei = 9;
		$geiPlus = 28;
		$geiTotal = $gei+$geiPlus;

		$charability = array(
			array ('name'=>"Massacre", 'sk'=>'pri',
				'des'=>"Wildly swings Dire, chopping limbs to get all those vessels pumping blood all over the floor. Has a chance of causing |limp|."),

			array ('name'=>"Ghost Hound", 'sk'=>'sec',
				'des'=>"Orders beloved Noxa to either attack a target or be on a defensive position circling Theo. When Noxa dies-and she won't, she will be revived after 60 seconds."), 

			array ('name'=>"The Culling", 'sk'=>'sk1',
				'des'=>"Summon weapons from the ground at the back-or front, depends on which is facing Theo- of the target, blocking its path, as well as damaging and |stun|-ing those who are on place to get piked by the weapons."), 

			array ('name'=>"Quartermaster", 'sk'=>'sk2',
				'des'=>"With command over anything that can reduce people to red goo, Theo |disarm|-s all enemy units around him and calls all weapons towards him for funsies."),  

			array ('name'=>"Gloom and Doom", 'sk'=>'sk3',
				'des'=>"Theo allows his guilt to overcome him generating an aura of sadness and damnation that |weaken| everyone around him, while also preventing him from being |disarm|-ed for the duration."),

			array ('name'=>"God of War", 'sk'=>'ult',
				'des'=>"Each damage dealt to nearby units that reaches a certain threshold increases Theo's Fury stack, which in turn he can activate to gain physical |amplify| in the form of immense will to stop living for a few seconds."),

			array ('name'=>"Blood Ties", 'sk'=>'ext',
				'des'=>"Causes Theo and Noxa to gain |frenzy| and |haste| equivalent to the difference between their healths. Noxa's death will cause Theo to gain Blood Ties' maximum buffs for 5 seconds."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'100% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Attack Rate', 'val'=>'100%', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'120 radius cone', 'ext'=>''),
			array ('name'=>'limp', 'val'=>'30%', 'ext'=>''),
			array ('name'=>'limp Chance', 'val'=>'15%', 'ext'=>''),
			array ('name'=>'limp Duration', 'val'=>'3s', 'ext'=>''),
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
			array ('name' => "Everlasting Pain", 'ico' => "ra-cut-palm",
				'des'=>"Increases |limp|'s duration to 8 seconds."),
			array ('name' => "Battlethirst", 'ico' => "ra-crossed-axes",
				'des'=>"Passively increases Massacre's damage by 20% but turns to -20% for 3 seconds whenever Theo hits someone affected by |disarm| or |stun|."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Noxa\'s Damage', 'val'=>'120% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Noxa\'s Attack Rate', 'val'=>'100%', 'ext'=>''),
			array ('name'=>'Noxa\'s Health', 'val'=>'80% of Health', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsecaug = array (
			array ('name' => "Assault Canine", 'ico' => "ra-sword",
				'des'=>"Noxa's bite will inflict |expose| to her targets for 3 seconds."),
			array ('name' => "Defense Canine", 'ico' => "ra-shield",
				'des'=>"Grants 20% physical |fortify| to both Theo and Noxa when she's on her defensive position."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Damage', 'val'=>'120% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Area of Effect', 'val'=>'150', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'4s', 'ext'=>''),
			array ('name'=>'stun Duration', 'val'=>'1s', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'25s'),
			array ('name'=>'Myst Cost', 'val'=>'95'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "No Honor on the Battlefield", 'ico' => "ra-all-for-one",
				'des'=>"|expose|-d units hit by The Culling's weapons will receive trice its supposed damage as well as twice the duration of its |stun|."),
			array ('name' => "To Arms", 'ico' => "ra-blade-bite",
				'des'=>"Increases damage dealt by 30% as well as the number of weapons summoned to narrow the escape area."),
			array ('name' => "Dog Rush", 'ico' => "ra-wolf-head",
				'des'=>"If Noxa is on defensive position, casting The Culling will cause her to jump on the target and inflict a 3 second 30% |slow|."), 
			array ('name' => "Skyforged", 'ico' => "ra-anvil",
				'des'=>"Causes nearby allies to get a 5% physical |amplify| which doubles its value every second. Lasts for 5 seconds."),
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Area of Effect', 'val'=>'500', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'22s'),
			array ('name'=>'Myst Cost', 'val'=>'40'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk2aug = array (
			array ('name' => "Darkened Skies", 'ico' => "ra-kitchen-knives",
				'des'=>"Allows Theo to channel for 2 seconds and throw all weapons to rain down in the area, dealing damage equal to Theo's physical damage multiplied by the number of weapons stolen. Damage is distributed."),
			array ('name' => "Sharpened Blades", 'ico' => "ra-dripping-sword",
				'des'=>"For every stolen weapon, buffs Theo with 4% Physical |amplify| for a single strike with Massacre."),
			array ('name' => "Play Fetch", 'ico' => "ra-broken-bone",
				'des'=>"If Noxa's close, she will steal one of the weapons and attack its owner with it, dealing damage equivalent to the owner's damage plus Noxa's own. She will drop the weapon after three strikes."),
			array ('name' => "The General", 'ico' => "ra-locked-fortress",
				'des'=>"Prevent Quartermaster from affecting allied units."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'weaken', 'val'=>'35%', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'500', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'8s', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'19s'),
			array ('name'=>'Myst Cost', 'val'=>'75'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk3aug = array (
			array ('name' => "Death Knight", 'ico' => "ra-helmet",
				'des'=>"Causes all nearby enemy units to lose 1% of their health every second while Gloom and Doom is active."),
			array ('name' => "Ticket to Tartarus", 'ico' => "ra-crystal-cluster",
				'des'=>"If Gloom and Doom is active, The Culling will inflict a 20% |frangible|-ility to the target for 4 seconds."),
			array ('name' => "Hellhound", 'ico' => "ra-burning-eye",
				'des'=>"Noxa's attacks will inflict |burn| for 3 seconds while Gloom and Doom is active."),
			array ('name' => "Boss is Here", 'ico' => "ra-overmind",
				'des'=>"Prevents allies from being |weaken|-ed by Gloom and Doom."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Damage Threshold', 'val'=>'1% of Maximum Health', 'ext'=>''),
			array ('name'=>'Maximum Fury Stack', 'val'=>'40', 'ext'=>''),
			array ('name'=>'amplify per Fury', 'val'=>'3% Physical Damage', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'10s', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'15s'),
			array ('name'=>'Myst Cost', 'val'=>'220'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charultaug = array (
			array ('name' => "Oh The Fury!",
				'des'=>"Increases |amplify| to 5% per Fury"),
			array ('name' => "My Death, Your Death", 'ico' => "ra-bleeding-hearts",
				'des'=>"Who ever kills Theo while God of War is active will also die. Both will be |slow|-ed by 60% for 10 seconds after reviving."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'frenzy', 'val'=>'0.3%', 'ext'=>''),
			array ('name'=>'haste', 'val'=>'0.5%', 'ext'=>''),
			);
		$charextmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>''), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'PASSIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charextaug = array (
			array ('name' => "Man's Best Friend", 'ico' => "ra-love-howl",
				'des'=>"Increases buff increment of |frenzy| to 0.4% and |haste| to 0.7%."),
			array ('name' => "You Dare Not", 'ico' => "ra-cancel",
				'des'=>"Whenever Theo or Noxa gets damaged, the other will get the benefit of the buff at maximum for 2 seconds. Cooldowns for 5 second."), 
			);
	?>
@stop