@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Rigel @stop
@section('char-meta')
	<?php 
		$charname = 'rigel';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Rigel 'Razor Gale'";
		$mcharFam = "Mentor: Lemaitre";
		$mcharDiv = "";
		$mcharAff = "Order of the Void";
		
		$mcharAft = "Unknown*";
		$mcharSty = "Extenebri";
		$mcharWoc = "None";

		$charthemes = 'Wind, Blades, Invisibility, Lots of Floating Blades, Surprisingly Not-So-Grumpy';
		$cityname = 'Rats';

		$lum = 6;
		$lumPlus = 17;
		$lumTotal = $lum+$lumPlus;

		$aer = 17;
		$aerPlus = 50;
		$aerTotal = $aer+$aerPlus;

		$mys = 5;
		$mysPlus = 14;
		$mysTotal = $mys+$mysPlus;

		$gei = 2;
		$geiPlus = 9;
		$geiTotal = $gei+$geiPlus;

		$charability = array(
			array ('name'=>"Shard Throw", 'sk'=>'pri',
				'des'=>"Throws a weirdly-shaped crystal Myst shard which damage dissipates the farther it travels, making effective face-to-face throws."),

			array ('name'=>"Fan Of Knives", 'sk'=>'sec',
				'des'=>"Fans multiple Shards in front preventing possible misses. Those which missed will disappear after couple of seconds, leaving no trace that Rigel is a horrible shot."), 

			array ('name'=>"Wind Blade", 'sk'=>'sk1',
				'des'=>"Rigel surrounds herself with her weird obsession with blades and slices all nearby flesh into sushi, her favorite."), 

			array ('name'=>"Swift", 'sk'=>'sk2',
				'des'=>"Dashes a small distance forward whilst spinning, for maximum effect, that |knockback|-s enemies on her landing point."),  

			array ('name'=>"Razor Wings", 'sk'=>'sk3',
				'des'=>"Forms wings made of, guess what, blades, on Rigel's back, which awesomeness exerts fear into her enemies' hearts that it increases her damage to them."),

			array ('name'=>"Zephyr", 'sk'=>'ult',
				'des'=>"If speed is a requirement, then fuck the requirement, Rigel doesn't care about all that, she's always fast anyway. Plus she can further increase her speed, |haste| and |frenzy|, with her skills, this in particular, but at the cost of increasing the damage she takes."),

			array ('name'=>"Blend", 'sk'=>'ext',
				'des'=>"Rigel can instantly become |invisible| once nobody is looking at her, 'no shit' you say, but did you know that she still remain |invisible| after even if she's right in front of people? Does not take effect if Rigel is being fabulous with her Razor Wings, however."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'100% Mixed Damage', 'ext'=>'aer'),
			array ('name'=>'Damage Reduction', 'val'=>'10% /100 Distance', 'ext'=>''),
			array ('name'=>'Attack Rate', 'val'=>'100%', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'1000', 'ext'=>''),
			);
		$charprimcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'5 /shard'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charpriaug = array (
			array ('name' => "Lucky Shot", 'ico' => "ra-clover",
				'des'=>"Landing a critical hit marks the target for death, inflicting 5% |frangible| for 5 seconds."),
			array ('name' => "I Don't Miss, Sometimes", 'ico' => "ra-reverse",
				'des'=>"Allow shards to ricochet off obstacles thrice if it does not hit a unit. Reduces damage reduction to 7%."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Number of Shards', 'val'=>'4', 'ext'=>''),
			array ('name'=>'Shard Spread', 'val'=>'90 radius cone', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1.5s', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'15'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsecaug = array (
			array ('name' => "Precision", 'ico' => "ra-targeted",
				'des'=>"Decreases the radius cone to 50."),
			array ('name' => "More Chances Of Hitting",
				'des'=>"Adds another 2 shards to Fan of Shards. Increases Myst cost to 25."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Damage', 'val'=>'100% Mixed Damage', 'ext'=>'aer'),
			array ('name'=>'Damage Reduction', 'val'=>'10% /Enemy', 'ext'=>''),
			array ('name'=>'Area of Effect', 'val'=>'200', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'2s'),
			array ('name'=>'Myst Cost', 'val'=>'30'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "No One To Help", 'ico' => "ra-player-pain",
				'des'=>"Causes Windblade to inflict |bleed| for 4 seconds."),
			array ('name' => "Crescent Blade", 'ico' => "ra-circular-shield",
				'des'=>"Creates a blade that appears after Windblade and shoots out in the direction Rigel is facing dealing Windblade's damage and inflicting effects. Has a range of 600."),
			array ('name' => "Cause Of Rust", 'ico' => "ra-lightning-sword",
				'des'=>"Windblade now causes |expose| to all affected enemy units for 3 seconds."),
			array ('name' => "I'm The Only One", 'ico' => "ra-hood",
				'des'=>"Causes Windblade to |reveal| units which lasts for 5 seconds."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Travel Speed', 'val'=>'800', 'ext'=>''),
			array ('name'=>'Distance', 'val'=>'300', 'ext'=>''),
			array ('name'=>'Charges', 'val'=>'2', 'ext'=>''),

			array ('name'=>'knockback', 'val'=>'200', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>'16s'),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'60'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk2aug = array (
			array ('name' => "Swift Tricks", 'ico' => "ra-regeneration",
				'des'=>"Decrease Swift's Myst cost to 10 and allows casting of Windblade for only 5 Myst for 3 seconds after using Swift."),
			array ('name' => "Vacuum", 'ico' => "ra-radial-balance",
				'des'=>"Reverses the |knockback| effect of Swift on its landing point."),
			array ('name' => "Slow Down A Little", 'ico' => "ra-footprint",
				'des'=>"Swift now inflicts a 20% |slow| on affected enemies' for 3 seconds."),
			array ('name' => "Flying With Wings", 'ico' => "ra-feather-wing",
				'des'=>"Casting Swift creates 2 Razor Wings, increases Myst cost to 90."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Shard Throw Damage', 'val'=>'+5% /Wing', 'ext'=>''),
			array ('name'=>'Windblade Damage', 'val'=>'+20% /Wing', 'ext'=>''),
			array ('name'=>'Max Wings', 'val'=>'6', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'12s', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'1s'),
			array ('name'=>'Myst Cost', 'val'=>'15'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk3aug = array (
			array ('name' => "Now We're Even", 'ico' => "ra-angel-wings",
				'des'=>"Casting Razor Wings out of Blend's invisibility gives 2 wings instead of just 1."),
			array ('name' => "The Sharpest Tool", 'ico' => "ra-plain-dagger",
				'des'=>"Increases damage increase per wing by 3%."),
			array ('name' => "Caught In A Landslide", 'ico' => "ra-groundbreaker",
				'des'=>"Each Razor Wing gives Rigel 2% physical |fortify|."),
			array ('name' => "Angel Of Death", 'ico' => "ra-batwings",
				'des'=>"Increases each Wing's duration to 16 seconds."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Attack Rate', 'val'=>'+50%', 'ext'=>''),
			array ('name'=>'Movement Speed', 'val'=>'+40%', 'ext'=>''),
			array ('name'=>'frangible', 'val'=>'+30%', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'40 /s'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'TOGGLE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charultaug = array (
			array ('name' => "Not Taking Chances", 'ico' => "ra-blade-bite",
				'des'=>"Removes |frangible| caused by Zephyr."),
			array ('name' => "Even With Your Eyes On Me", 'ico' => "ra-bleeding-eye",
				'des'=>"Zephyr now also gives |invisible|-lity. Does not trigger if Rigel has Razor Wings."), 
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
			array ('name'=>'cd', 'val'=>''), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'PASSIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charextaug = array (
			array ('name' => "Out Of The Corner Of Your Eye", 'ico' => "ra-player-dodge",
				'des'=>"Causes Rigel's attack breaking her |invisible|-lity to deal 40% more damage."),
			array ('name' => "Take It From Behind", 'ico' => "ra-aware",
				'des'=>"Attacks struck from the back will deal 15% more damage."), 
			);
	?>
@stop 