@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Noemi @stop
@section('char-meta')
	<?php 
		$charname = 'noemi';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Noemi";
		$mcharFam = "<unknown>";
		$mcharDiv = "Geios";
		$mcharAff = "The Ark | Dominion";
		
		$mcharAft = "Plants";
		$mcharSty = "Cirkunesi";
		$mcharWoc = "None";

		$charthemes = 'Plants, Poison Ivy, Big Ass Flowers, Whips, Thorns, Emotional Attachments';
		$cityname = 'Flora';

		$lum = 10;
		$lumPlus = 27;
		$lumTotal = $lum+$lumPlus;

		$aer = 5;
		$aerPlus = 17;
		$aerTotal = $aer+$aerPlus;

		$mys = 6;
		$mysPlus = 34;
		$mysTotal = $mys+$mysPlus;

		$gei = 9;
		$geiPlus = 12;
		$geiTotal = $gei+$geiPlus;

		$charability = array(
			array ('name'=>"Thorn Whip", 'sk'=>'pri',
				'des'=>"Noemi whips around a thorn whip which damages any fool who tries to get close to her. She doesn't even have to aim it."),

			array ('name'=>"Vine Hold", 'sk'=>'sec',
				'des'=>"Causes thorned vines to burst out of the ground catching every enemy caught in its radius, leaving them |root|-ed for the first 3 seconds, then completely |disable|-d after. Removed if the target is affected by |burn|."), 

			array ('name'=>"Myst Bulb", 'sk'=>'sk1',
				'des'=>"Plants a bulb full of Myst which restores massive amount of Myst to allies that grabs it. The plant can be attacked and goes back to the ground if it dies, it can also explode if affected by |burn|."), 

			array ('name'=>"Poison Dart", 'sk'=>'sk2',
				'des'=>"Fires three poison darts at a direction with deals a small amount of damage and latches on the target for 2 seconds. After that, it then releases toxins which causes the target to be inflicted with |poison|."),  

			array ('name'=>"Oak Skin", 'sk'=>'sk3',
				'des'=>"Covers an ally with bark which gives a significant physical |fortify| while also preventing them from getting |thundershock|. Using it on herself will make her appear as an ally to enemies units as long as she uses it before any enemy sees her and not all enemy is present to see her in her current disguise."),

			array ('name'=>"Keeper of the Grove", 'sk'=>'ult',
				'des'=>"Noemi summons a treant out of the forest - even if there's no forest in sight - to fight her battles. The treant is also in the shape of a lion, just because she likes big cats."),

			array ('name'=>"Undergrowth", 'sk'=>'ext',
				'des'=>"Fills a large area with underground vines which allows Noemi to |reveal| all hidden enemies, as well as improving the effectiveness of her other skills."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'100% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Attack Rate', 'val'=>'70%', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'320 radius cone', 'ext'=>''),
			);
		$charprimcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charpriaug = array (
			array ('name' => "Whipping Fun", 'ico' => "ra-spiked-tentacle",
				'des'=>"Doubles the thorn whip Noemi uses."),
			array ('name' => "Burning Passion", 'ico' => "ra-heartburn",
				'des'=>"Causes Thorn Whip to inflict |burn| for 3 seconds if Noemi herself is affected by |burn|."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Area of Effect', 'val'=>'200', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'5s', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'55/s'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsecaug = array (
			array ('name' => "Prolonged Hold", 'ico' => "ra-player-teleport",
				'des'=>"Allows Noemi to hold enemies in position longer by increasing Vine Hold's duration to 8s."),
			array ('name' => "Overgrowth", 'ico' => "ra-sprout",
				'des'=>"If used over an Undergrowth, every second while holding an enemy has a 20% chance of sprouting a Myst Bulb nearby the target."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Explosion Damage', 'val'=>'150% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'Explosion AoE', 'val'=>'300', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'2s', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'10s', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'12s'),
			array ('name'=>'Myst Cost', 'val'=>'100'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "Watch Your Step", 'ico' => "ra-boot-stomp",
				'des'=>"Bulbs become resistant to |burn| and now explode in contact with enemy units."),
			array ('name' => "Forest Fire", 'ico' => "ra-fire",
				'des'=>"Increases explosion damage by 60% and area of effect to 450."),
			array ('name' => "Bulb Spores",
				'des'=>"If the bulb's duration ends without anyone grabbing it or killing it, it releases three floating, wandering spores which has the same effects as a bulb. The spores will lasts for 20 seconds."),
			array ('name' => "Healing Fog", 'ico' => "ra-level-three-advanced",
				'des'=>"If affected by |poison|, the bulb explodes into a healing myst which gives +100% |health-regen| to all nearby allies for 10 seconds."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Damage', 'val'=>'50% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'poison Damage', 'val'=>'50% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'poison Duration', 'val'=>'3s', 'ext'=>''),

			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'15s'),
			array ('name'=>'Myst Cost', 'val'=>'80'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk2aug = array (
			array ('name' => "Maddening Toxin", 'ico' => "ra-biohazard",
				'des'=>"Units affected by Poison Dart's |poison| will become mad giving them +10% physical |amplify| and -20% |break|."),
			array ('name' => "Firefly Kiss", 'ico' => "ra-flame-symbol",
				'des'=>"Charging Poison Dart for 2 seconds before releasing will cause it to combust into fiery projectile and deal 200% of its damage, causes |burn|, but removes its poison effect."),
			array ('name' => "Sleep Dart", 'ico' => "ra-diving-dagger",
				'des'=>"Causes darts to inflict |sleep|-iness into their target for 4 seconds."),
			array ('name' => "Poison Cloud", 'ico' => "ra-poison-cloud",
				'des'=>"Darts will now explode into a poison cloud inflicting its |poison| to all enemy units for 3 second before disappearing. With Firefly Kiss, poison cloud will then become an explosion similar to that of Myst Bulbs."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'fortify', 'val'=>'+60% Physical Defense', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'8s', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'18s'),
			array ('name'=>'Myst Cost', 'val'=>'95'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk3aug = array (
			array ('name' => "Covered By Ivy", 'ico' => "ra-trefoil-lily",
				'des'=>"Enemies attacking a unit affected by Oak Skin at melee range will be inflicted by Poison Dart's |poison|."),
			array ('name' => "Walking Sequoia", 'ico' => "ra-dead-tree",
				'des'=>"Using Oak Skin on a keeper will reset it's duration and sets its health to full."),
			array ('name' => "Impenetrable", 'ico' => "ra-shield",
				'des'=>"Oak Skin's |fortify| will give +80% for both of its aspects then goes back to its original values after the initial 3 seconds."),
			array ('name' => "Mystical Oak Tree", 'ico' => "ra-bottle-vapors",
				'des'=>"Adds a layer of mystical |fortify| which adds +20% myst resistance."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Keeper Damage', 'val'=>'200% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Keeper Health', 'val'=>'1200', 'ext'=>''),
			array ('name'=>'Keeper Attack Rate', 'val'=>'2', 'ext'=>''),
			array ('name'=>'Keeper Range', 'val'=>'180 radius cone', 'ext'=>''),
			array ('name'=>'Keeper Duration', 'val'=>'20s', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'3s', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'120'),
			array ('name'=>'Myst Cost', 'val'=>'235'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charultaug = array (
			array ('name' => "Wrath of Nature", 'ico' => "ra-arcane-mask",
				'des'=>"If the keeper gets hit which damages it for more that 5% of its maximum health at once, the keeper will slam the ground dealing 250% of its damage to all nearby enemy units while also creating a smaller Undergrowth around it."),
			array ('name' => "The Giving Tree", 'ico' => "ra-pine-tree",
				'des'=>"The Keeper releases a healing aura which restores 25 health to all nearby friendly units."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'Vine Hold Cast Time', 'val'=>'0', 'ext'=>''),
			array ('name'=>'Vine Hold Myst Cost', 'val'=>'25/s', 'ext'=>''),
			array ('name'=>'Myst Bulb Myst Cost', 'val'=>'-50', 'ext'=>''),
			array ('name'=>'Poison Dart Cooldown', 'val'=>'8s', 'ext'=>''),
			array ('name'=>'Oak Skin Myst Cost', 'val'=>'-55', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'15s', 'ext'=>''),
			);
		$charextmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'20s'),
			array ('name'=>'Myst Cost', 'val'=>'80'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charextaug = array (
			array ('name' => "Thorn Field", 'ico' => "ra-spikeball",
				'des'=>"Causes all enemy units that stand on the Undergrowth to be |slow|-ed by 15%."),
			array ('name' => "Cotton Field", 'ico' => "ra-clover",
				'des'=>"Gives all allied units that stand on the Undergrowth a 40% |health-regen|."), 
			);
	?>
@stop