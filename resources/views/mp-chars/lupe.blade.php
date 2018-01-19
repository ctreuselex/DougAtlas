@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Lupe @stop
@section('char-meta')
	<?php 
		$charname = 'lupe';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Lupe Wolgraff";
		$mcharFam = "<unknown>";
		$mcharDiv = "Aeros";
		$mcharAff = "Howler | Carnival of Madness";
		
		$mcharAft = "Metal";
		$mcharSty = "Invorti";
		$mcharWoc = "His Trusty Wrench";

		$charthemes = 'The Mechanic, Big Good? Wolf, Alpha Wolf, Woof, Is Actually More of a Bull';
		$cityname = 'Comradery';

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
			array ('name'=>"Bash", 'sk'=>'pri',
				'des'=>"Lupe bashes people with his trusty wrench whenever they try sneaking into the show and when they don't stop annoying him while he works."),

			array ('name'=>"Heavy Slam", 'sk'=>'sec',
				'des'=>"Smashes the ground with his invorted elephant hooves, |knockback|-ing away all stupid free loaders who can't pay to see the current show."), 

			array ('name'=>"Bull Rush", 'sk'=>'sk1',
				'des'=>"With the permanent bull horns on his head, which looks 'fucking badass' according to Koom, Lupe dashes through the crowd of non-paying costumers."), 

			array ('name'=>"Ursine Roar", 'sk'=>'sk2',
				'des'=>"Activates Lupe's bear-like instincts which gives him more |frenzy| and physical |amplify| the lesser his remaining health is."),  

			array ('name'=>"Surprise Attack", 'sk'=>'sk3',
				'des'=>"Lupe digs into his toolbox and throws whatever he finds into the target enemy, leaving them |stun|-ned for a short period of time. If the target is hit on the back,  the |stun| duration is doubled."),

			array ('name'=>"Polymorph", 'sk'=>'ult',
				'des'=>"Lupe's mastery of morphing himself allowed him to try |morph|-ing other people. Makes him sad whenever they try to flap their chicken wings or when they stop breathing because they're now a fish out of water."),

			array ('name'=>"The Wolf Within", 'sk'=>'ext',
				'des'=>"Lupe fully transforms himself into a giant wolf effectively giving him high physical |amplify|, |haste|, and physical |fortify|. Lupe also cannot be |disarm|-ed while in Werewolf form, cause obviously, his a wolf now, he needs no wrenches to wreck."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'100% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Attack Rate', 'val'=>'70%', 'ext'=>''),
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
			array ('name' => "Feral Strength", "ico" => "ra-lion",
				'des'=>"Gives Bash a 20% chance of inflicting |stun| to enemy units for 0.5 second."),
			array ('name' => "Feral Agility", "ico" => "ra-rabbit",
				'des'=>"Passively increases Lupe's attack rate by 20%."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Damage', 'val'=>'180% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Attack Rate', 'val'=>'60%', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'250', 'ext'=>''),
			array ('name'=>'knockback', 'val'=>'200', 'ext'=>''),
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
			array ('name' => "Get Out of My Garage", "ico" => "ra-groundbreaker",
				'des'=>"Increases area of effect to 300 and |knockback| to 450."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (	
			array ('name'=>'Damage', 'val'=>'160% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Area of Effect', 'val'=>'200', 'ext'=>''),
			array ('name'=>'Distance', 'val'=>'600', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1.5s', 'ext'=>''),
			array ('name'=>'stun Duration', 'val'=>'1s', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'18s'),
			array ('name'=>'Myst Cost', 'val'=>'145'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "Samson Force", "ico" => "ra-horns",
				'des'=>"Allows Bull Rush to be cast again, stopping Lupe's dash and follow with a horn strike which |knockback|-s for 200 and deals double of Bull Rush's damage and the duration of its |stun|."),
			array ('name' => "Red Like Blood", "ico" => "ra-burst-blob",
				'des'=>"Attacking an enemy unit affected by |bleed|-ing has 20% chance of inflicting a 1 second |stun|."), 
			array ('name' => "Stampede", "ico" => "ra-desert-skull",
				'des'=>"Gives a 30% |haste|, which lasts for 5 seconds, to all allied units Lupe ran through with Bull Rush."),
			array ('name' => "Not In The Eye", "ico" => "ra-site",
				'des'=>"Getting hit in a critical spot allows Lupe to cast Bull Rush with 25 Myst cost while also ignoring its cooldown for 4 seconds."),
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
				'des'=>"Increases the effects of Ursine Roar by 50% if there are no nearby allies around Lupe."),
			array ('name' => "Mauling Sleuth", "ico" => "ra-decapitation",
				'des'=>"Gives nearby allies 50% of the buffs given by Ursine Roar."),
			array ('name' => "Growl Of Annoyance", "ico" => "ra-burning-eye",
				'des'=>"Passively grants 10% of Ursine Roar's effects to Lupe and all nearby allies. Stacks with Ursine Roar's actual effects."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'stun Duration', 'val'=>'1s', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'15s'),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsk3aug = array (
			array ('name' => "Well That Was Random", "ico" => "ra-uncertainty",
				'des'=>"Gives a 30% chance that Surprise Attack will end up throwing a grenade which explodes on contact, dealing 120% physical damage along with the stun."),
			array ('name' => "Infinity Toolbox", "ico" => "ra-repair",
				'des'=>"Decreases Surprise Attack's cooldown to 4 seconds."),
			array ('name' => "Doink!", "ico" => "ra-doubled",
				'des'=>"Now inflicts |expose| for 3 seconds."),
			array ('name' => "Play Fetch", "ico" => "ra-wolf-head",
				'des'=>"With Trevor as a ally, inflcts a 30% |frangible|-ility on the target for 5 seconds."),  
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
			array ('name' => "The Wolves Among Us",
				'des'=>"Targets an ally, and morphs them into the likes of Lupe's Werewolf form, giving them half its benefits for twice the duration of Polymorph."), 
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
				'des'=>"Doubles the |stun| duration of Bull Rush and |amplify| of Ursine Roar while Lupe is in Werewolf form."),
			array ('name' => "The Degenerate", "ico" => "ra-bone-bite",
				'des'=>"Replace Werewolf form's Myst cost with 15 Health cost every second. Forces Lupe to transform back to his human form whenever his health reaches 15%."), 
			);
	?>
@stop