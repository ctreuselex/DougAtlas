@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Trevor @stop
@section('char-meta')
	<?php 
		$charname = 'trevor';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Trevor Wolgraff";
		$mcharFam = "<unknown>";
		$mcharDiv = "Aeros";
		$mcharAff = "Howler | Carnival of Madness";
		
		$mcharAft = "Flesh";
		$mcharSty = "Invorti | Cirkunesi";
		$mcharWoc = "His Trusty Claws";

		$charthemes = 'The Murderer, Big Bad Wolf, Alpha Alpha Wolf, Is actually the one more appropriate for the name \'Lupe\'';
		$cityname = 'Bones';

		$lum = 13;
		$lumPlus = 38;
		$lumTotal = $lum+$lumPlus;

		$aer = 7;
		$aerPlus = 21;
		$aerTotal = $aer+$aerPlus;

		$mys = 3;
		$mysPlus = 16;
		$mysTotal = $mys+$mysPlus;

		$gei = 7;
		$geiPlus = 25;
		$geiTotal = $gei+$geiPlus;

		$charability = array(
			array ('name'=>"Savage Strike", 'sk'=>'pri',
				'des'=>"Savagery is Trevor's personality and he always had the liking for murder so those two usually meet from time to time."),

			array ('name'=>"Pounce", 'sk'=>'sec',
				'des'=>"Jumps to the target area like the wolf he is inflicting |slow| to nearby enemy units."), 

			array ('name'=>"Power Smack", 'sk'=>'sk1',
				'des'=>"Smack enemy units in melee range with his powerful claws which damages and |disarm|-s."), 

			array ('name'=>"Ursine Roar", 'sk'=>'sk2',
				'des'=>"Activates Trevor's bear-like instincts which gives him more |frenzy| and physical |amplify| the lesser his remaining health is."),  

			array ('name'=>"Bloodthirst", 'sk'=>'sk3',
				'des'=>"Extreme savageness comes with the lack of morality which basically allows Trevor to eat those who don't know the difference between different kinds of knives in his collection giving him the ability to |leech| off their suffering."),

			array ('name'=>"Polymorph", 'sk'=>'ult',
				'des'=>"Trevor's mastery of morphing himself allowed him to try |morph|-ing other people. Makes him laugh whenever they try to flap their chicken wings or when they stop breathing because they're now a fish out of water."),

			array ('name'=>"The Wolf Within", 'sk'=>'ext',
				'des'=>"Trevor fully transforms himself into a giant wolf effectively giving him high physical |amplify|, |haste|, and physical |fortify|."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'90% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Attack Rate', 'val'=>'110%', 'ext'=>''),
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
			array ('name'=>'da', 'val'=>false),
			);
		$charpriaug = array (
			array ('name' => "Feral Strength", "ico" => "ra-lion",
				'des'=>"Increases Savage Strike's damage by 5% of Trevor's remaining health."),
			array ('name' => "Feral Agility", "ico" => "ra-rabbit",
				'des'=>"Passively increases Trevor's attack rate by 30%."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Range', 'val'=>'500', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'250', 'ext'=>''),
			array ('name'=>'slow', 'val'=>'25%', 'ext'=>''),
			array ('name'=>'slow Duration', 'val'=>'3s', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'15'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsecaug = array (
			array ('name' => "Brittle Footing", "ico" => "ra-boot-stomp",
				'des'=>"Leaves an area effect that lasts for 3 seconds which |slow|-s everyone standing on it by 25%."),
			array ('name' => "Far Leap", "ico" => "ra-overhead",
				'des'=>"Increases Pounce range to 800."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (	
			array ('name'=>'Damage', 'val'=>'130% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Area of Effect', 'val'=>'150 radius cone', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'15s'),
			array ('name'=>'Myst Cost', 'val'=>'90'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "Brother Bear", 'ico' => "ra-bear-trap",
				'des'=>"Power Smacking a |stun|-ned unit would deal 100% more damage."), 
			array ('name' => "Rapid Hammering", 'ico' => "ra-broken-bone ",
				'des'=>"|frenzy| now has an effect on reducing Power Smacks cooldown."),
			array ('name' => "Nasty Little Critters", 'ico' => "ra-fairy",
				'des'=>"Using Power Smack on a |morph|-ed unit will deal more damage base on the target's remaining health."),
			array ('name' => "Playing with Food", 'ico' => "ra-roast-chicken",
				'des'=>"Inflicts |expose| to the target for 2 seconds."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Duration', 'val'=>'10s', 'ext'=>''),
			array ('name'=>'amplify', 'val'=>'+8% Physical Damage', 'ext'=>''),
			array ('name'=>'frenzy', 'val'=>'+5%', 'ext'=>''),
			array ('name'=>'Threshold', 'val'=>'10% Health Lost', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'11s'),
			array ('name'=>'Myst Cost', 'val'=>'70'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk2aug = array (
			array ('name' => "Grizzly Bellow", "ico" => "ra-muscle-fat",
				'des'=>"Ursine Roar now inflicts a 7% |frangible| to all enemy units caught in its radius."),
			array ('name' => "Lone Hunter", "ico" => "ra-fox",
				'des'=>"Increases the effects of Ursine Roar by 50% if there are no nearby allies around Trevor."),
			array ('name' => "Mauling Sleuth", "ico" => "ra-decapitation",
				'des'=>"Gives nearby allies 50% of the buffs given by Ursine Roar."),
			array ('name' => "Growl Of Annoyance", "ico" => "ra-burning-eye",
				'des'=>"Passively grants 10% of Ursine Roar's effects to Trevor and all nearby allies. Stacks with Ursine Roar's actual effects."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Duration', 'val'=>'10s', 'ext'=>''),
			array ('name'=>'leech', 'val'=>'15%', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'15s'),
			array ('name'=>'Myst Cost', 'val'=>'100'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			// array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk3aug = array (
			array ('name' => "Savagery", "ico" => "ra-shark",
				'des'=>"Trevor's attacks, while affected by Bloodthirst, now also inflict |bleed|-ing for 2 seconds."),
			array ('name' => "The Weak Left Behind", "ico" => "ra-sheep",
				'des'=>"Having a |morph|-ed unit within the 500 radius of a unit affected by Bloodthirst, increases its |leech| to 40%."),
			array ('name' => "Sweet Return", "ico" => "ra-insect-jaws",
				'des'=>"Allows Trevor to cast Bloodthirst with no Myst cost while his health is below 40%."),
			array ('name' => "Wolf Pack", "ico" => "ra-wolf-head",
				'des'=>"Bloodthirst now also affects allied units within a 300 area of effect around Trevor."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Range', 'val'=>'800', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'4s', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'30s'),
			array ('name'=>'Myst Cost', 'val'=>'160'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charultaug = array (
			array ('name' => "Party Animal", "ico" => "ra-seagull",
				'des'=>"Allows for multiple |morph|-ing of enemy units with a 400 area of effect. Reduces duration to 3 seconds."),
			array ('name' => "The Wolves Among Us", "ico" => "ra-wolf-howl",
				'des'=>"Targets an ally, and morphs them into the likes of Trevor's Werewolf form, giving them half its benefits for twice the duration of Polymorph."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'amplify', 'val'=>'+40% Physical Damage', 'ext'=>''),
			array ('name'=>'haste', 'val'=>'+25%', 'ext'=>''),
			array ('name'=>'fortify', 'val'=>'+30% Physical Defense', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'2s', 'ext'=>''),
			);
		$charextmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'10/s'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'TOGGLE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charextaug = array (
			array ('name' => "Huff And Puff", "ico" => "ra-demolish",
				'des'=>"Doubles the |amplify| of Ursine Roar and |leech| of Bloodthirst while Trevor is in Werewolf form."),
			array ('name' => "The Degenerate", "ico" => "ra-bone-bite",
				'des'=>"Replace Werewolf form's Myst cost with 15 Health cost every second. Forces Trevor to transform back to his human form whenever his health reaches 15%."), 
			);
	?>
@stop