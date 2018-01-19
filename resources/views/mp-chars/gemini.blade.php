@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Gemini @stop
@section('char-meta')
	<?php 
		$charname = 'gemini';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "May & June 'Gemini' Dioscuri";
		$mcharFam = "<unknown>";
		$mcharDiv = "";
		$mcharAff = "The Ark";
		$mcharPos = "";
		
		$mcharAft = "Temperature";
		$mcharSty = "Rudimenti | Cirkunesi";
		$mcharWoc = "Corporal Works' Twin Sabre, Hook Sword";

		$charthemes = 'Twins, Fire and Ice, Major Killer Instincts, Heat Vision, Freeze Ray, Ice Skating';
		$cityname = 'Orphans';

		$lum = 8;
		$lumPlus = 25;
		$lumTotal = $lum+$lumPlus;

		$aer = 7;
		$aerPlus = 20;
		$aerTotal = $aer+$aerPlus;

		$mys = 8;
		$mysPlus = 25;
		$mysTotal = $mys+$mysPlus;

		$gei = 7;
		$geiPlus = 20;
		$geiTotal = $gei+$geiPlus;

		$charability = array(
			array ('name'=>"Swing and Sway", 'sk'=>'pri',
				'des'=>"The twins are thought in the way of the sword but uses them very differently; May uses twin sabres and will do more ferocious slashes while June's Hook sword gives him a chance of |disarm|-ing his target."),

			array ('name'=>"Melting Point / Ice Track", 'sk'=>'sec',
				'des'=>"May causes her swords to overheat giving her additional damage and ability to inflict |burn| with Swing and Sway. June creates an ice track that allows him and May to slide like fancy ice skaters while on it."), 

			array ('name'=>"Heat Blast", 'sk'=>'sk1',
				'des'=>"If May's active, she spins and perform as downward spin which damages and inflicts |burn| and |root| on enemies in front of her, otherwise, May throws a fireball from behind June which damages and |burn|-s enemy units in the target area."), 

			array ('name'=>"Frost Spike", 'sk'=>'sk2',
				'des'=>"If June's active, he creates a giant ice spike which damages and leave enemy units in a |freeze|-d state, otherwise, June appears beside May and creates a ring of frost spikes around them dealing damage and inflicting |freeze|."),  

			array ('name'=>"Wombo Combo", 'sk'=>'sk3',
				'des'=>"If May's active, June creates a ice path in front of them in which May spins with her fiery blades, dealing damage to enemy units in the path while setting June as active. If June's active, he creates an ice pillar beneath to which is spins and throws May with him momentum, May lands dealing damage and |slow|-ing enemy units in the area, sets May as active."),

			array ('name'=>"Fire Cresent / Glacial Jaunt", 'sk'=>'ult',
				'des'=>"If May's active, she creates a massive cresent strike made of fire which deals massive damage while also inflicting |burn| to units in its path. If June's active, he throws himself into the air using a big ice pillar while later causing it to combust into an ice explosion damaging and |freeze|-ing all enemy units in the area."),

			array ('name'=>"Backup Call", 'sk'=>'ext',
				'des'=>"Calls the other twin to take position in the battlefield. Since both of them are considered as different units they can die separately, and obviously, some of their abilities cannot be used if one of them is dead or simply unable to; eg. |stun|-ned. Backup Call can be used even if the active twin is disabled."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'(May) Damage', 'val'=>'80% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'(May) Attack Rate', 'val'=>'130%', 'ext'=>''),
			array ('name'=>'(May) Range', 'val'=>'140 radius cone', 'ext'=>''),
			array ('name'=>'(June) Damage', 'val'=>'90% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'(June) Attack Rate', 'val'=>'100%', 'ext'=>''),
			array ('name'=>'(June) Range', 'val'=>'90 radius cone', 'ext'=>''),
			array ('name'=>'disarm Chance (June)', 'val'=>'10%', 'ext'=>''),
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
			array ('name' => "Swinging Wildly", 'ico' => "ra-spinning-sword",
				'des'=>"Increases May's attack rate by 30% as well as her range to 180 radius cone."),
			array ('name' => "Captain Hook", 'ico' => "ra-meat-hook",
				'des'=>"Increases June's |disarm| chance by another 10%."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Melting Point Damage', 'val'=>'+15%', 'ext'=>''),
			array ('name'=>'Melting Point Duration', 'val'=>'10s', 'ext'=>''),
			array ('name'=>'burn Duration (Melting Point)', 'val'=>'2s', 'ext'=>''),
			array ('name'=>'Ice Track Duration', 'val'=>'14s', 'ext'=>''),
			array ('name'=>'haste (Ice Track)', 'val'=>'100%', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'40 / 60'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsecaug = array (
			array ('name' => "Frost Fire", 'ico' => "ra-frostfire",
				'des'=>"Casting Melting Point now also affects June and will also increases his |disarm| chance by another 10% while active."),
			array ('name' => "Ice Princess", 'ico' => "ra-frost-emblem",
				'des'=>"Increases |haste| bonus to May by 50% while on the ice track, while also giving her a 20% |frenzy| for 4 seconds whenever she slides."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Damage', 'val'=>'140% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'Area of Effect', 'val'=>'300', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'0.5s', 'ext'=>''),
			array ('name'=>'burn Duration', 'val'=>'3s', 'ext'=>''),
			array ('name'=>'root Duration', 'val'=>'2s', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'12s'),
			array ('name'=>'Myst Cost', 'val'=>'90'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "Sun Blast", 'ico' => "ra-sunbeams",
				'des'=>"Increases damage dealt by Heat Blast by 40% as well as increasing its |burn| duration to 5 seconds."),
			array ('name' => "Napalm", 'ico' => "ra-burning-embers",
				'des'=>"If June's active, Heat Blast will leave a flaming goo on the target area which lasts for 4 seconds, dealing 20% Mystical damage every seconds while inflicting |burn|."),
			array ('name' => "I Realized I Have Two", 'ico' => "ra-dervish-swords",
				'des'=>"Adds a charge to Heat Blast, allowing May to cast it twice."),
			array ('name' => "Run and Gun", 'ico' => "ra-burning-eye",
				'des'=>"Allows May to cast Heat Blast freeform. Decreases cooldown to 9 seconds."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Damage', 'val'=>'130% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'Area of Effect', 'val'=>'350', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'freeze Duration', 'val'=>'2s', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'14s'),
			array ('name'=>'Myst Cost', 'val'=>'105'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk2aug = array (
			array ('name' => "Ice Shards", 'ico' => "ra-crystals",
				'des'=>"Causes the spikes to release ice shards which deals 30% of Frost Spike's damage to enemy units they come in contact with."),
			array ('name' => "Chilled", 'ico' => "ra-brain-freeze",
				'des'=>"Affected units will get a 40% |slow| and 20% |limp| after they are released from |freeze|."),
			array ('name' => "Mist Screen", 'ico' => "ra-hood",
				'des'=>"If May's active, June's Frost Spike will leave a mist which causes friendly units to become |invisible| for 3 seconds."),
			array ('name' => "Ohh That's Cold", 'ico' => "ra-crystal-cluster",
				'des'=>"If June's active, Frost Spike has a 35% chance to |disarm| affected units."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'(May) Damage', 'val'=>'110% Physical Damage /s', 'ext'=>'lum'),
			array ('name'=>'(May) Area of Effect', 'val'=>'200', 'ext'=>''),
			array ('name'=>'(May) Travel Speed', 'val'=>'400', 'ext'=>''),
			array ('name'=>'(May) Distance', 'val'=>'500', 'ext'=>''),
			array ('name'=>'(June) Damage', 'val'=>'150% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'(June) Range', 'val'=>'700', 'ext'=>''),
			array ('name'=>'(June) Area of Effect', 'val'=>'300', 'ext'=>''),
			array ('name'=>'slow (June)', 'val'=>'20%', 'ext'=>''),
			array ('name'=>'slow Duration (June)', 'val'=>'2s', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'19s'),
			array ('name'=>'Myst Cost', 'val'=>'140'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk3aug = array (
			array ('name' => "Sliding Long Jump", 'ico' => "ra-fast-ship",
				'des'=>"Increases the range and distance by 200."),
			array ('name' => "Momentum Shift", 'ico' => "ra-decapitation",
				'des'=>"If May's active, periodically increases her damage by 15% until she reached her destination."),
			array ('name' => "Power Slam", 'ico' => "ra-cog-wheel",
				'des'=>"If June's active, increases the damge dealt by 40% as well as increases the effect of the |slow| by 15%."),
			array ('name' => "Gymnastics", 'ico' => "ra-carrot",
				'des'=>"Decreases the cooldown to 11s and Myst cost to 90."), 
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'(May) Damage', 'val'=>'125% Mystical + 75% Physical Damage', 'ext'=>'aer'),
			array ('name'=>'(May) Range', 'val'=>'600', 'ext'=>''),
			array ('name'=>'(May) Area of Effect', 'val'=>'300', 'ext'=>''),
			array ('name'=>'burn Duration (May)', 'val'=>'3s', 'ext'=>''),
			array ('name'=>'(June) Damage', 'val'=>'150% Mystical', 'ext'=>'mys'),
			array ('name'=>'(June) Range', 'val'=>'800', 'ext'=>''),
			array ('name'=>'(June) Area of Effect', 'val'=>'500', 'ext'=>''),
			array ('name'=>'freeze Duration (June)', 'val'=>'3s', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'40s'),
			array ('name'=>'Myst Cost', 'val'=>'150 / 210'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charultaug = array (
			array ('name' => "Frost Cresent", 'ico' => "ra-snowflake ",
				'des'=>"If May's active, June replaces May with creating the cresent slash with an ice version which instead of |burn|-ing, causes enemy units to |freeze|. Turns damage to 200% Mystical damage. Increases Myst cost to 250."),
			array ('name' => "Solar Jaunt", 'ico' => "ra-sun",
				'des'=>"If June's active, May will do a fire version of Glacial Jaunt which combusts into a fiery explosion |burn|-ing enemy units around her origin point instead of |freeze|-ing them. Switches the active twin to May."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'Damage', 'val'=>'', 'ext'=>''),
			array ('name'=>'Heal', 'val'=>'', 'ext'=>''),
			array ('name'=>'Attack Rate', 'val'=>'', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'', 'ext'=>''),
			array ('name'=>'Travel Speed', 'val'=>'', 'ext'=>''),
			array ('name'=>'Distance', 'val'=>'', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'', 'ext'=>''),
			array ('name'=>'Charges', 'val'=>'', 'ext'=>''),
			);
		$charextmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'TOGGLE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charextaug = array (
			array ('name' => "Time Out", 'ico' => "ra-hospital-cross",
				'des'=>"Cuts the duration of status effects to the inactive twin by half."),
			array ('name' => "Elevated",
				'des'=>"Gives the inactive twin a 100% |health-regen| and |myst-regen|."), 
			);
	?>
@stop