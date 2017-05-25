@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Jeanne @stop
@section('char-meta')
	<?php 
		$charname = 'jeanne';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Jeanne Ark";
		$mcharFam = "<unknown>";
		$mcharDiv = "Luminos";
		$mcharAff = "The Ark";
		
		$mcharAft = "Space";
		$mcharSty = "Armagus";
		$mcharWoc = "Tauroscene's Capo Ferro";

		$charthemes = 'Divine Calling, Teleportation, Space, Stabbing, Definitely French, Oui?';
		$cityname = 'Prisoners';

		$lum = 10;
		$lumPlus = 20;
		$lumTotal = $lum+$lumPlus;

		$aer = 8;
		$aerPlus = 34;
		$aerTotal = $aer+$aerPlus;

		$mys = 5;
		$mysPlus = 20;
		$mysTotal = $mys+$mysPlus;

		$gei = 7;
		$geiPlus = 16;
		$geiTotal = $gei+$geiPlus;

		$charability = array(
			array ('name'=>"Espada Ropera", 'sk'=>'pri',
				'des'=>"Jeanne rapidly stabs her enemies with Capo Ferro with extreme precision, allowing her to utilize her damage through critical strikes."),

			array ('name'=>"True Strike", 'sk'=>'sec',
				'des'=>"A forward strike that dashes Jeanne a short distance, closing the distance between her and her target whilst inflicting a physical |break| for a few seconds."), 

			array ('name'=>"Disposition", 'sk'=>'sk1',
				'des'=>"Allows Jeanne to quickly teleport herself through a Void Door or switch places with a target."), 

			array ('name'=>"Void Root", 'sk'=>'sk2',
				'des'=>"Causes the target Void Door to collapse and |root| all nearby enemy units in place for a few seconds."),  

			array ('name'=>"Leadership", 'sk'=>'sk3',
				'des'=>"Jeanne's natural ability to lead allows her and her allies to gain additional physical and mystical damage whenever an ally is nearby."),

			array ('name'=>"Duel", 'sk'=>'ult',
				'des'=>"Using Void Doors, Jeanne teleports herself and her target into a mirror dimension where they can only target each other. Uses two charges of Void Door, only one if a Void Door is present underneath the target."),

			array ('name'=>"Void Door", 'sk'=>'ext',
				'des'=>"Creates a door on the target location which opens up posibilities for Jeanne to use her Myst Manipulations."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'100% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Attack Rate', 'val'=>'120%', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'20 radius cone', 'ext'=>''),
			array ('name'=>'Critical Multiplier', 'val'=>'+50%', 'ext'=>''),
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
			array ('name' => "Void Strike",
				'des'=>"A hit with a Void Door underneath the target will cause a 1.5 second |stun|."),
			array ('name' => "Armor Breaker",
				'des'=>"Jeanne's attack now removes every |fortify| buffs from her targets."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Damage', 'val'=>'200% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Cast Time', 'val'=>'50% of Attack Rate', 'ext'=>''),
			array ('name'=>'Distance', 'val'=>'200', 'ext'=>''),
			array ('name'=>'break', 'val'=>'-30% Physical Defense', 'ext'=>''),
			array ('name'=>'break Duration', 'val'=>'3s', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsecaug = array (
			array ('name' => "Molinetto",
				'des'=>"If surrounded by more than one enemy, Jeanne performs a circular True Strike which affects all nearby enemy units while dashing."),
			array ('name' => "Riposte",
				'des'=>"If Jeanne hasn't attack or damaged for 5 seconds, allows her to quicky parry the next incoming direct melee attack and respond with a True Strike. Only applies if Jeanne is facing the attacker."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Range', 'val'=>'600', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'15s'),
			array ('name'=>'Myst Cost', 'val'=>'40'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "Taglio",
				'des'=>"When switching places with an enemy, Jeanne clips in a cut which damages the target for 100% physical damage while also inflicting |bleed|-ing for 2 seconds."),
			array ('name' => "Trovar di Spada",
				'des'=>"When affected by a |fortify| buff, switching places with an enemy is replaced by teleporting both into the middle of their positions, allowing Jeanne to inflict a 1.5 second |stun| on the target."),
			array ('name' => "Tactical Minds",
				'des'=>"Increases range to 900 and reduces cast time to 0.5 seconds."),
			array ('name' => "Cavazione",
				'des'=>"Switching with an enemy gives Jeanne a 30% |partial-immunity| for 5 seconds."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Area of Effect', 'val'=>'300', 'ext'=>''),
			array ('name'=>'root Duration', 'val'=>'4s', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'18s'),
			array ('name'=>'Myst Cost', 'val'=>'60'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk2aug = array (
			array ('name' => "Coup de Grace",
				'des'=>"|root|-ing a opponent under 20% of their maximum health will cause them to take damage and die within the duration of the |root|."),
			array ('name' => "Eye Gouging",
				'des'=>"Causes Void Root to inflict |blind| for 2 seconds."),
			array ('name' => "Dark Matter",
				'des'=>"Catching more than 2 enemy units with Void Root replenishes 1 charge of Void Door."),			
			array ('name' => "Root Door",
				'des'=>"Allows Jeanne to use any |root|-ed enemies as Void Doors. Removes the |root| effect if used and does not activates other Void Door effects."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Area of Effect', 'val'=>'600', 'ext'=>''),
			array ('name'=>'Physical Damage', 'val'=>'+20%', 'ext'=>''),
			array ('name'=>'Mystical Damage', 'val'=>'+15%', 'ext'=>''),
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
			array ('name' => "Team Player",
				'des'=>"Having a nearby allied unit doubles Void Door's recharge rate."),
			array ('name' => "prioritization",
				'des'=>"Causes Jeanne's attacks to inflict 10% |frangible|-ility for 2 seconds, whenever an allied unit is nearby."),
			array ('name' => "En Garde",
				'des'=>"Gives Jeanne and all nearby allies a 20% physical and 15% mystical |fortify| upon first encountering an enemy. Lasts for 5 seconds."),
			array ('name' => "La Destreza",
				'des'=>"Adds a 15% movement speed and 5% attack rate buff to Leadership."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Duration', 'val'=>'8s', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'65s'),
			array ('name'=>'Myst Cost', 'val'=>'120'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charultaug = array (
			array ('name' => "First Blood",
				'des'=>"Whoever gets damaged first whilst entering the Duel will be affected by a 40% |frangible|-ility which lasts for the whole Duel."),
			array ('name' => "The Victor Goes Out",
				'des'=>"Grants whoever wins the Duel with 50% physical and mystical |amplify| for 10 seconds. Does not take effect if no one dies/wins in the Duel."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'Duration', 'val'=>'10s', 'ext'=>''),
			array ('name'=>'Charges', 'val'=>'4', 'ext'=>''),
			);
		$charextmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>'30s'),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'25'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charextaug = array (
			array ('name' => "Dark Bite",
				'des'=>"Closing a Void Door, either by using it or ending it's duration, will cause it to inflict a 30% |slow| to all nearby enemy units for 3 seconds."),
			array ('name' => "Thinking With Portals",
				'des'=>"Opening a Void Door inflicts |expose| to all nearby enemy units for 3 seconds."), 
			);
	?>
@stop