@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Ceniza @stop
@section('char-meta')
	<?php 
		$charname = 'ceniza';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Ceniza Corvera";
		$mcharFam = "<unknown>";
		$mcharDiv = "Mystos";
		$mcharAff = "Institute | Dominion";
		$mcharPos = "Head of Mystos";
		
		$mcharAft = "Fire";
		$mcharSty = "Maximo";
		$mcharWoc = "Tauroscene's Cometcaller";

		$charthemes = 'You Shall Not Pass, Tropical Vacations, Typical Fire Mage, Fireball!';
		$cityname = 'Ashes';

		$lum = 12;
		$lumPlus = 28;
		$lumTotal = $lum+$lumPlus;

		$aer = 5;
		$aerPlus = 25;
		$aerTotal = $aer+$aerPlus;

		$mys = 7;
		$mysPlus = 25;
		$mysTotal = $mys+$mysPlus;

		$gei = 6;
		$geiPlus = 11;
		$geiTotal = $gei+$geiPlus;

		$charability = array(
			array ('name'=>"Fireball", 'sk'=>'pri',
				'des'=>"Even the masters uses the most basic of skills, but in Ceniza's case, her fire burns hotter even for the tiniest of cinder that remain. Inflicts |burn|."),

			array ('name'=>"Staff Hack", 'sk'=>'sec',
				'des'=>"She might be a mage, but Ceniza can totally wreck anyone in close-combat with her super awesome bo staff hacking moves."), 

			array ('name'=>"Bo Twister", 'sk'=>'sk1',
				'des'=>"Spins around her position like it's tango class damaging all nearby aggressive dancers, ending it with a literal blast which |knockback|-s and |disarm|-s. No final blast if |myst-lock|-ed."), 

			array ('name'=>"Comet Fall", 'sk'=>'sk2',
				'des'=>"Calls forth a comet which falls on the target area and damages all bandits' skulking around the place like those time when they thought that the staff is just for show."),  

			array ('name'=>"Ring Of Fire", 'sk'=>'sk3',
				'des'=>"Creates circling flames which surrounds Ceniza, |burn|-ing the hands of those snatchers which tries to pick her purse like last time. The ring widens and contracts as it follows Ceniza."),

			array ('name'=>"Corvera's Security Firewall", 'sk'=>'ult',
				'des'=>"Conjures a massive wall of fire that damages anyone that dares to pass through it, creating a semi-transparent, slightly distorted blockade which Ceniza can still see the crying of those criminals who failed to eat her cake."),

			array ('name'=>"Molten Skin", 'sk'=>'ext',
				'des'=>"While stading still for a few seconds, Ceniza's aura will cause |burn|-ning to all nearby lawbreakers. Passively makes Ceniza immune to the effects of |burn|, |drench|, and |freeze|."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'100% Mixed Damage', 'ext'=>'aer'),
			array ('name'=>'Attack Rate', 'val'=>'80%', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'900', 'ext'=>''),
			array ('name'=>'burn Duration', 'val'=>'2s', 'ext'=>''),
			);
		$charprimcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'5'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charpriaug = array (
			array ('name' => "Big Boomers", 'ico' => "ra-burning-meteor",
				'des'=>"Channeling Fireball increases it's damage by 15% and area of effect by 100 every second. Maximum of 3 seconds."),
			array ('name' => "Molten Core", 'ico' => "ra-flame-symbol",
				'des'=>"Fireball now inflicts a 30% physical |break| for 4 seconds."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Damage', 'val'=>'120% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Attack Rate', 'val'=>'100%', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'120 radius cone', 'ext'=>''),			
		);
		$charsecmcdm = array (
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
		$charsecaug = array (
			array ('name' => "Fire on Fire Action", 'ico' => "ra-burning-embers",
				'des'=>"Hitting an enemy affected by |burn| will cause a mini-explosion that deals 70% damage of Staff Hack to all nearby enemy units around the target."),
			array ('name' => "Hot Rod",
				'des'=>"Staff Hack now inflicts |burn| for 2 seconds, as well as removes |drench| from the target."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Damage', 'val'=>'130% Physical Damage /s', 'ext'=>'lum'),
			array ('name'=>'Area of Effect', 'val'=>'200', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'2s', 'ext'=>''),
			array ('name'=>'knockback', 'val'=>'200', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'16s'),
			array ('name'=>'Myst Cost', 'val'=>'125'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk1aug = array (
			array ('name' => "You'll Dance Better On Fire", 'ico' => "ra-burning-eye",
				'des'=>"Increases damage dealt by Bo Twsiter by 80% to enemy units affected by |burn|."),
			array ('name' => "Floor is Lava", 'ico' => "ra-lava",
				'des'=>"Creates a pool of lava upon the final blast which lasts for 4 seconds and deals 80% mixed damage to units standing on it."),
			array ('name' => "Tropical Finale", 'ico' => "ra-doubled",
				'des'=>"Causes the final blast to |stun| enemies' hit for 2 seconds."),
			array ('name' => "Always Liked Coconut", 'ico' => "ra-bubbling-potion", 
				'des'=>"Decreases cast time of all skills for Ceniza and all nearby allies by 50% for the next 5 seconds."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Damage', 'val'=>'75 + 140% Mixed Damage', 'ext'=>'aer'),
			array ('name'=>'Area of Effect', 'val'=>'350', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Delay', 'val'=>'2s', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'18s'),
			array ('name'=>'Myst Cost', 'val'=>'160'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk2aug = array (
			array ('name' => "Twin Meteor", 'ico' => "ra-fire-bomb",
				'des'=>"Adds another meteor falling seconds after the first one fell."),
			array ('name' => "I am the Comet Caller",  'ico' => "ra-bomb-explosion", 
				'des'=>"Decreases cooldown to 5 seconds and cast time to 0."),
			array ('name' => "Make a Wish", 'ico' => "ra-fairy-wand",
				'des'=>"Removes all negative status effects on allies, regardless of where they are, once the comet hits the ground."),
			array ('name' => "Comets are Actually Ice", 'ico' => "ra-crystals",
				'des'=>"Causes Comet fall yo |freeze| enemies on hit."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Damage', 'val'=>'20 + 30% Mixed Damage /s', 'ext'=>'aer'),
			array ('name'=>'Maximum AoE', 'val'=>'350', 'ext'=>''),
			array ('name'=>'Minumum AoE', 'val'=>'150', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'8s', 'ext'=>''),
			array ('name'=>'burn Duration', 'val'=>'3s', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'22s'),
			array ('name'=>'Myst Cost', 'val'=>'120'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk3aug = array (
			array ('name' => "Scintillation", 'ico' => "ra-frostfire",
				'des'=>"Getting hit while Ring of Fire is active will cause the attacker to catch on fire, a |burn| for 3 seconds."),
			array ('name' => "Ring of Death", 'ico' => "ra-fire-ring",
				'des'=>"Causes 7% |frangible|-ility to enemy units on contact with the ring of fire."),
			array ('name' => "Bonfire", 'ico' => "ra-fire",
				'des'=>"Standing still for 3 seconds while Ring of Fire is active will grant Ceniza and all nearby allies with 100% |health-regen| for 5 seconds."),
			array ('name' => "Solar Flare", 'ico' => "ra-sun",  
				'des'=>"Enemy units casting within the range of the fire ring will be damaged equivalent to the amount of Myst they used to cast."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Damage', 'val'=>'90 + 150% Mixed Damage /s', 'ext'=>'aer'),
			array ('name'=>'Wall Length', 'val'=>'800', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'150', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'2s', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'5s', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'35s'),
			array ('name'=>'Myst Cost', 'val'=>'220'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charultaug = array (
			array ('name' => "Burn You and Your House Down", 'ico' => "ra-arson",
				'des'=>"Increases damage dealt by the firewall by 20% for every second the unit remains standing on it like an idiot."),
			array ('name' => "Mother Of Dragons", 'ico' => "ra-fire-breath",
				'des'=>"Increases the width / area of effect on the wall to 250 and duration to 8 seconds."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			);
		$charextmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			// array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'PASSIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charextaug = array (
			array ('name' => "Pyromaniac", 'ico' => "ra-player-pyromaniac",
				'des'=>"|burn| caused by Ceniza will deal 50% more damage."),
			array ('name' => "Sticky Icky Gone In A Flicky", 'ico' => "ra-burst-blob",
				'des'=>"Prevents nearby allies from being affected by |drench|, as well as prevents them from being |slow|-ed if they are affected by |burn|."), 
			);
	?>
@stop