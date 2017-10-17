@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Llaxine @stop
@section('char-meta')
	<?php 
		$charname = 'llaxine';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Llaxine Shia Henrich Loquintez";
		$mcharFam = "Parents: Sylvia Loquintez & Elliot Ebrahim, Half-Sibling: Seline Loquintez";
		$mcharDiv = "Mystos";
		$mcharAff = "Dominion | Institute";
		
		$mcharAft = "Light";
		$mcharSty = "Rudimenti | Sigilios";
		$mcharWoc = "Tauroscene's Spike Bracelets";

		$charthemes = 'Light, Ballet, Bracelets, Twisting and Spinning, Poof';
		$cityname = 'Talents';

		$lum = 6;
		$lumPlus = 20;
		$lumTotal = $lum+$lumPlus;

		$aer = 11;
		$aerPlus = 30;
		$aerTotal = $aer+$aerPlus;

		$mys = 8;
		$mysPlus = 26;
		$mysTotal = $mys+$mysPlus;

		$gei = 5;
		$geiPlus = 14;
		$geiTotal = $gei+$geiPlus;

		$charability = array(
			array ('name'=>"Spike Bracelets", 'sk'=>'pri',
				'des'=>"Llaxine rapidly stabs her enemies while happily performing her favorite ballet routine. Complete with a bright smile on her face. Always."),

			array ('name'=>"Diamond Strike", 'sk'=>'sec',
				'des'=>"Llaxine throws the spike from her bracelets and latches it on the first foe they come in contact with dealing damage per second and leaving Llaxine |disarm|-ed. Can be retrieved if cast again."), 

			array ('name'=>"Celestial Apparition", 'sk'=>'sk1',
				'des'=>"Conjures a slow moving apparition of Llaxine herself that goes towards the direction while damaging and |blind|-ing enemy units it passes through."), 

			array ('name'=>"Celestial Strike", 'sk'=>'sk2',
				'des'=>"Strikes the target location with pure devastating light that damages enemy units caught within its radius after a short delay. Where the light comes from remains classified."),  

			array ('name'=>"Light Orb", 'sk'=>'sk3',
				'des'=>"Generates a light orb that deals damage after being charged for 2 seconds. Releasing the orb for less than 2 seconds will make it deal lesser damage and with less wow factor."),

			array ('name'=>"Divine Mercy", 'sk'=>'ult',
				'des'=>"Releases a ray of light that damages nearby enemies who dared came close to her while also healing nearby allies who were so nice tanking all the damage. Divine Mercy will also be cast by the Celestial Apparition and the damage and heal will stack."),

			array ('name'=>"Shift", 'sk'=>'ext',
				'des'=>"Llaxine temporarily shifts herself out of existence for a short period, becoming affected by |immunity| and |invulnerability|. Where she goes during this remains classified."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'85% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Attack Rate', 'val'=>'140%', 'ext'=>''),
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
			array ('name' => "Ballerina", "ico" => "ra-flower",
				'des'=>"Grants Llaxine with 15% |haste| that lasts for 1 second whenever she attacks with Spike Bracelets."),
			array ('name' => "Summer Heat", "ico" => "ra-sun",
				'des'=>"Adds 30% Mystical damage to Spike Bracelets while also causing it to inflict |burn| which lasts for 2 seconds."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Damage', 'val'=>'35% Mystical Damage /s', 'ext'=>'mys'),
			array ('name'=>'Range', 'val'=>'800', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'5s', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'20s'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsecaug = array (
			array ('name' => "Girl Accessories", "ico" => "ra-daggers",
				'des'=>"Prevents Llaxine from being |disarm|-ed by Diamond Strike or any other sources."),
			array ('name' => "Light Weight",
				'des'=>"Allow Llaxine to gain 50% more movement speed while |disarm|-ed."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Damage', 'val'=>'35 + 50% Mystical Damage /s', 'ext'=>'mys'),
			array ('name'=>'Range', 'val'=>'1200', 'ext'=>''),
			array ('name'=>'Travel Speed', 'val'=>'400', 'ext'=>''),

			array ('name'=>'blind Duration', 'val'=>'1s', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'9s'),
			array ('name'=>'Myst Cost', 'val'=>'80'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "Evanescent", "ico" => "ra-candle",
				'des'=>"Celestial Apparition now |knockback|-s Llaxine for 125 causing the apparition to move faster by increasing its travel speed to 650."),
			array ('name' => "Lissome", "ico" => "ra-hood",
				'des'=>"Llaxine and allied units become |invisible| whenever they are within 200 radius of the apparition."),
			array ('name' => "Light Giver", "ico" => "ra-light-bulb",
				'des'=>"Allied units staying within the apparition's 200 radius are healed by 80% of the apparition's supposed damage every second."),
			array ('name' => "Ghost Sigil", "ico" => "ra-circular-shield",
				'des'=>"Allows casting of Celestial Apparition while Myst Locked at an increased Myst cost of 120."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Damage', 'val'=>'45 + 80% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'Area of Effect', 'val'=>'175', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'1.5s', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'12s'),
			array ('name'=>'Myst Cost', 'val'=>'95'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk2aug = array (
			array ('name' => "Opulent Light", "ico" => "ra-explosion",
				'des'=>"Increases Celestial Strike's damage by 30%."),
			array ('name' => "Serendipity", "ico" => "ra-spawn-node",
				'des'=>"Casts another Celestial Strike at the unit Diamond Strike is attached to whenever Llaxine casts Celestial Strike."),
			array ('name' => "Hard Light", "ico" => "ra-tower",
				'des'=>"Celestial Strike now |stun|-s affected units for 1.50 seconds."),
			array ('name' => "Sun Sigil", "ico" => "ra-circular-saw",
				'des'=>"Allows casting of Celestial Strike while Myst Locked at an increased Myst cost of 140."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Damage', 'val'=>'30% ~ 300% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'Range', 'val'=>'150 radius cone', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'3s', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'5s'),
			array ('name'=>'Myst Cost', 'val'=>'30/s'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk3aug = array (
			array ('name' => "Heaven's Light", "ico" => "ra-angel-wings",
				'des'=>"Causes Light Orb to heal allied units for 80% of its supposed damage."),
			array ('name' => "Luminescent", "ico" => "ra-alien-fire",
				'des'=>"Creates an apparition that charges Light Orb for Llaxine. Increases cooldown to 8 seconds."),
			array ('name' => "Shia Surprise", "ico" => "ra-defibrilate",
				'des'=>"Casting Light Orb now turns Llaxine |invisible| for the duration of the charging."),
			array ('name' => "The Prism", "ico" => "ra-overmind",
				'des'=>"When Light Orb hits a unit which Diamond Strike is attached to; the damage is doubled for every unit hit."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Damage', 'val'=>'90 + 50% Mystical Damage', 'ext'=>'pur'),
			array ('name'=>'Heal', 'val'=>'100% of Supposed Damage', 'ext'=>'pur'),
			array ('name'=>'Area of Effect', 'val'=>'325', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'15s'),
			array ('name'=>'Myst Cost', 'val'=>'160'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charultaug = array (
			array ('name' => "Not A Hater", "ico" => "ra-fire-symbol",
				'des'=>"Increases Divine Mercy's damage and heal by 35%."),
			array ('name' => "Heaven Sigil", "ico" => "ra-sun-symbol",
				'des'=>"Allows casting of Divine Mercy while Myst Locked at an increased Myst cost of 210."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'Duration', 'val'=>'1s', 'ext'=>''),
			);
		$charextmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'8s'),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'CHANNELING'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charextaug = array (
			array ('name' => "Can't Touch This", "ico" => "ra-crystals",
				'des'=>"Reduces Shift's cooldown to 4 seconds."),
			array ('name' => "Immunity", "ico" => "ra-gem-pendant",
				'des'=>"Grants Llaxine |immunity| for 2 seconds after she gets out of Shift."), 
			);
	?>
@stop 