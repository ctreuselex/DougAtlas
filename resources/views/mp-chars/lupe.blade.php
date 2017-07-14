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
		$mcharSty = "Armagus | Metamorph";
		$mcharWoc = "His Trusty Wrench";

		$charthemes = 'The Mechanic, Big Bad Wolf, Alpha Wolf, Woof, Bark, Scratch';
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
			array ('name'=>"Savage Strike", 'sk'=>'pri',
				'des'=>"Normally, Lupe simply bashes people with his trusty wrench, but at times, he claws their innards and throw guts to nearby supposed-to-be animal abusers. That is, if they don't stop annoying him while he works."),

			array ('name'=>"Heavy Slam", 'sk'=>'sec',
				'des'=>"Lupe smashes the ground with his massive elephant hooves, knocking away all stupid free loaders who can't pay to see the current show."), 

			array ('name'=>"Bull Rush", 'sk'=>'sk1',
				'des'=>"Morphs bull horns on his head, which looks 'fucking badass' according to Koom, and dashes through the crowd of non-paying costumers."), 

			array ('name'=>"Ursine Roar", 'sk'=>'sk2',
				'des'=>"Activates Lupe's bear-like instincts which gives him more |frenzy| and physical |amplify| the lesser his remaining health is."),  

			array ('name'=>"Bloodthirst", 'sk'=>'sk3',
				'des'=>"Extreme savageness comes with the lack of morality which basically allows Lupe to eat those who don't know the difference between nuts, screws, and nails, giving him the ability to |leech| off their suffering."),

			array ('name'=>"Polymorph", 'sk'=>'ult',
				'des'=>"Lupe's mastery of morphing himself allowed him to try |morph|-ing other people. Makes him laugh whenever they try to flap their chicken wings or when they stop breathing because they're now a fish out of water."),

			array ('name'=>"The Wolf Within", 'sk'=>'ext',
				'des'=>"Lupe fully transforms himself into a giant wolf effectively giving him high physical |amplify|, |haste|, and physical |fortify|. Lupe also cannot be |disarm|-ed while in Werewolf form, cause obviously, his a wolf now, he needs no wrenches to wreck."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'100% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Attack Rate', 'val'=>'100%', 'ext'=>''),
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
				'des'=>"Increases Savage Strike's damage by 5% of Lupe's remaining health."),
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
			array ('name'=>'Knockback', 'val'=>'200', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'15'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charsecaug = array (
			array ('name' => "Brittle Footing", "ico" => "ra-boot-stomp",
				'des'=>"Leaves an area effect that lasts for 3 seconds which |slow|-s everyone standing on it by 25%."),
			array ('name' => "Not On My Ground", "ico" => "ra-groundbreaker",
				'des'=>"Increases area of effect to 300 and  knockback to 450."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (	
			array ('name'=>'Damage', 'val'=>'160% Physical Damage', 'ext'=>'lum'),
			array ('name'=>'Area of Effect', 'val'=>'200', 'ext'=>''),
			array ('name'=>'Distance', 'val'=>'600', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),
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
				'des'=>"Allows Bull Rush to be cast again, stopping Lupe's dash and follow with a horn strike which knockbacks and deals double of Bull Rush's damage and the duration of its |stun|."),
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
				'des'=>"Lupe's attacks, while affected by Bloodthirst, now also inflict |bleed|-ing for 2 seconds."),
			array ('name' => "The Weak Left Behind", "ico" => "ra-sheep",
				'des'=>"Having a |morph|-ed unit within the 500 radius of a unit affected by Bloodthirst, increases its |leech| to 40%."),
			array ('name' => "Sweet Return", "ico" => "ra-insect-jaws",
				'des'=>"Allows Lupe to cast Bloodthirst with no Myst cost while his health is below 40%."),
			array ('name' => "Wolf Pack", "ico" => "ra-wolf-head",
				'des'=>"Bloodthirst now also affects allied units within a 300 area of effect around Lupe."),  
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
				'des'=>"Doubles the |stun| duration of Bull Rush, |amplify| of Ursine Roar, and |leech| of Bloodthirst while Lupe is in Werewolf form."),
			array ('name' => "The Degenerate", "ico" => "ra-bone-bite",
				'des'=>"Replace Werewolf form's Myst cost with 15 Health cost every second. Forces Lupe to transform back to his human form whenever his health reaches 15%."), 
			);
	?>
@stop