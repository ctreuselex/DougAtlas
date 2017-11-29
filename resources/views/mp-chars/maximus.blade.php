@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Maximus @stop
@section('char-meta')
	<?php 
		$charname = 'maximus';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Maximus Redgrave";
		$mcharFam = "Parents: Sandra & Landar Redgrave";
		$mcharDiv = "Geios";
		$mcharAff = "Institute";
		$mcharPos = "Co-owner of Landar Industries";
		
		$mcharAft = "Metal*";
		$mcharSty = "Extenebri";
		$mcharWoc = "Landar Industries' MMGA Tech Prototype";

		$charthemes = 'Shields, Tethers, Technology, Armor, Nerd in a Bully Costume';
		$cityname = 'Design';

		$lum = 2;
		$lumPlus = 5;
		$lumTotal = $lum+$lumPlus;

		$aer = 4;
		$aerPlus = 13;
		$aerTotal = $aer+$aerPlus;

		$mys = 10;
		$mysPlus = 36;
		$mysTotal = $mys+$mysPlus;

		$gei = 14;
		$geiPlus = 36;
		$geiTotal = $gei+$geiPlus;

		$charability = array(
			array ('name'=>"Crystal Fist", 'sk'=>'pri',
				'des'=>"Max didn't create his armor for the sole purpose of unlimited Myst source, it's also for attracting ladies and punching dudes in the face."),

			array ('name'=>"Tether", 'sk'=>'sec',
				'des'=>"Max binds his armor to an ally, allowing them to share Health regeneration, Myst regeneration, and other forms of healing. Tether breaks if the ally is too far away or Max decides that he have someone else better to share things with."), 

			array ('name'=>"Mystbind Push", 'sk'=>'sk1',
				'des'=>"Creates a blast of Myst that damages and |knockback|-s all non friendly people along its path."), 

			array ('name'=>"Mystbind Pull", 'sk'=>'sk2',
				'des'=>"Max pulls out the first person his Myst first comes in contact with, along with other people caught in the middle of it. If the unit has Myst less than 10% of their maximum Myst, pull will have no effect but Myst is still absorbed."),  

			array ('name'=>"Mystbind Shield", 'sk'=>'sk3',
				'des'=>"Using the prototype DMBS tech, generates a |shield|, in the form of wicked hexagons, that absorbs 50% damage. When deactivated, the shield is less flashy, but increases Max's Myst regeneration."),

			array ('name'=>"Overcharge", 'sk'=>'ult',
				'des'=>"Instantly replenishes Max's Myst pool by 100% while using the excess Myst to damage everyone nearby and |disable|-ing Max for 3 seconds after, because, somehow, Max didn't thought this through. Damage will occur over the 3 second duration and enemies will be |myst-lock|-ed. Total Damage is distributed."),

			array ('name'=>"Reinforced Battery", 'sk'=>'ext',
				'des'=>"Max concentrates on the next incoming direct damage and completely block its damage and effects like the badass he is. Receiving a critical hit on his MMGA's Core will add another 1 second to Reinforced Battery's cooldown."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'100% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Attack Rate', 'val'=>'120%', 'ext'=>''),
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
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charpriaug = array (
			array ('name' => "Crystal Edge", 'ico' => "ra-crystal-cluster",
				'des'=>"Max's attacks leaves a 6% |frangible| on the target for 1 second."),
			array ('name' => "Offensive Core", 'ico' => "ra-alien-fire",
				'des'=>"Converts 3% of Max's remaining Myst into Crystal Fists' extra damage."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Range', 'val'=>'900', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsecaug = array (
			array ('name' => "Dual Core", 'ico' => "ra-honeycomb",
				'des'=>"The tethered unit's Mystbind |shield| now make use of the their own Myst pool."),
			array ('name' => "Over-Overcharge", 'ico' => "ra-defibrilate",
				'des'=>"Casting Overcharge will now also cause the tethered unit to cast Overcharge but without the after effect. Over-Overcharge's total damage is added from both units then distributed."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Damage', 'val'=>'60 + 5% of Remaining Myst', 'ext'=>'mys'),
			array ('name'=>'Range', 'val'=>'600', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'250', 'ext'=>''),
			array ('name'=>'knockback', 'val'=>'400', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'15s'),
			array ('name'=>'Myst Cost', 'val'=>'15% of Remaining Myst'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "No Trespassing", 'ico' => "ra-interdiction",
				'des'=>"Increases Mystbind Push's range to 900 and causes it to inflict |disarm|."),
			array ('name' => "Efficient Bullying", 'ico' => "ra-laser-site",
				'des'=>"Mystbind Push now deals additional 45 damage, while also inflicting |myst-leak| for 5 seconds."),
			array ('name' => "Compassion Spray", 'ico' => "ra-fizzing-flask",
				'des'=>"Allied units caught in Mystbind Push's path are healed for 75% of its damage."),
			array ('name' => "Effective Punching", 'ico' => "ra-muscle-up",
				'des'=>"Decreases Mystbind Push's cooldown to 6 and Myst cost to 8% of remaining Myst."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Myst Absorbed', 'val'=>'10% of Maximum Myst', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'600', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'250', 'ext'=>''),
			array ('name'=>'Pull', 'val'=>'100', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'15s'),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk2aug = array (
			array ('name' => "Nobody Runs Away", 'ico' => "ra-footprint",
				'des'=>"Mystbind Pull leaves a 20% |slow| to all units affected for 4 seconds."),
			array ('name' => "Far Reach", 'ico' => "ra-heavy-fall",
				'des'=>"Increases Mystbind Pull's range to 800."),
			array ('name' => "Life Pull", 'ico' => "ra-shot-through-the-heart",
				'des'=>"Mystbind Pull now also absorbs 6% of the target's maximum health and gives it to Max."),
			array ('name' => "Strategic Bullying", 'ico' => "ra-targeted",
				'des'=>"Removes Mystbind Pull's ability to drag along other enemy units and increases Myst Absorbed to 12%."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'shield', 'val'=>'50%', 'ext'=>''),
			array ('name'=>'myst-regen', 'val'=>'+4', 'ext'=>''),

			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'TOGGLE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk3aug = array (
			array ('name' => "Thicker Hexagons", 'ico' => "ra-hive-emblem",
				'des'=>"Increases the Mystbind |shield|'s damage absorption by to 70%."),
			array ('name' => "Landar's Generators",
				'des'=>"Increases Mystbind Shield's |myst-regen| when deactivated to 12."),
			array ('name' => "Consistent Bullying", 'ico' => "ra-energise",
				'des'=>"Causes Mystbind Shield to zap enemy units within the 275 radius of Max dealing 3% of his remaining myst as mystical damage every 2 seconds when active."),
			array ('name' => "The Protector", 'ico' => "ra-heavy-shield",
				'des'=>"Allow Mystbind |shield| to also affect the tethered unit. Uses Max's own Myst Pool for both units, unless, with Dual Core."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Area of Effect', 'val'=>'300', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1.5s', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'3s', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'90s'),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charultaug = array (
			array ('name' => "Quick Recharge", 'ico' => "ra-gear-hammer",
				'des'=>"Decreases Max's 3 second |disable| on himself to 1 second by decreasing Overcharge's total damage output by 15%."),
			array ('name' => "Dramatic Flair", 'ico' => "ra-explosive-materials",
				'des'=>"Allow Max to dash for a maximum of 600 range to a point in which he can begin casting Overcharge."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'Counter Duration', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Damage Blocked', 'val'=>'100%', 'ext'=>''),
			);
		$charextmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'4s'),
			array ('name'=>'Max Cooldown', 'val'=>'9s'),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'CHANNELING'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charextaug = array (
			array ('name' => "Sharing Is Caring", 'ico' => "ra-gears",
				'des'=>"Reinforced Battery now also triggers through the tethered unit. Doubles cooldown speed when tethered."),
			array ('name' => "Myst Paradox", 'ico' => "ra-tesla",
				'des'=>"Every time Reinforced Battery is triggered, it replenishes Max's Myst pool by 100% of the supposed damage that was blocked."), 
			);
	?>
@stop 