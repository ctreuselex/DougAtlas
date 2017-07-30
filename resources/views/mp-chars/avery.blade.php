@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Avery @stop
@section('char-meta')
	<?php 
		$charname = 'avery';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Avery Gebsen";
		$mcharFam = "<unknown>";
		$mcharDiv = "Aeros";
		$mcharAff = "Dominion | Institute";
		
		$mcharAft = "Paper";
		$mcharSty = "Maximo";
		$mcharWoc = "Tauroscene's Biblumancer";

		$charthemes = 'Papers, Witch, Wizard, Origami, Hopeless Romantic, Lookin\' Good';
		$cityname = 'Love';

		$domdes = "
			<p>Avery has a special case of staying late around at night and randomly trolling his friends and strangers through the CTs. It's actually quite suprising he's still not 'haunted' by the Order. Seems like he could use a visit from them.</p>
			<p>Aside from the frequent trolling, there's also the case of frequently staring at people. I'd say ladies if he's only staring at ladies but that doesn't seem to be the case.</p>
			<p>Regardless of those however is the talent to fold paper. Not only in an origami way to impress his folks but in a way that no other can seem to pull off; to make people his paper, or their souls first, seeing as it's the first thing he's tapping into. Though it remains a mystery how he discovered his power, as he keeps on changing topics when people ask him about it, he is famed throughout the city for such a discovery. A discovery that could have ended up being darker than it is now. Luckily, it fell in the hands of a reluctant perv.</p>
			<p>Mikael also seem to like spending his time writing long paragraphs about why Avery should consider his Psykeeper business more seriously.</p>";

		$lum = 6;
		$lumPlus = 17;
		$lumTotal = $lum+$lumPlus;

		$aer = 2;
		$aerPlus = 5;
		$aerTotal = $aer+$aerPlus;

		$mys = 10;
		$mysPlus = 31;
		$mysTotal = $mys+$mysPlus;

		$gei = 12;
		$geiPlus = 37;
		$geiTotal = $gei+$geiPlus;

		$charability = array(
			array ('name'=>"Fume Spray", 'sk'=>'pri',
				'des'=>"Biblumancer does not have a lot of functions, but it sure can spray death at enemies in front of Avery."),

			array ('name'=>"Paper Crane", 'sk'=>'sec',
				'des'=>"Avery has a thing for love, and likes letting people know it by paper cranes, so he sends a few which fires |poison| darts on them below."), 

			array ('name'=>"Devourer's Charm", 'sk'=>'sk1',
				'des'=>"Tags an enemy with a charm that absorbs their Myst whether they try to move away from Avery. It also does the same if they try moving closer to Avery. They should just stay put."), 

			array ('name'=>"Lifetread Jinx", 'sk'=>'sk2',
				'des'=>"Sets out a paper plane which then attaches itself at Avery's target. After delay, the jinx occurs and damages them depending on the difference between Avery and the target's remaining health."),  

			array ('name'=>"Dreaded Hex", 'sk'=>'sk3',
				'des'=>"Places an origami trap that curses whoever sets foot on it with a random curse."),

			array ('name'=>"Toxic Field", 'sk'=>'ult',
				'des'=>"Curses the ground which |leech|-es health from all enemies waddling on top of it. The origami hands sprouting below the ground may also leave scratches and nimbles on their legs which causes them to |bleed|."),

			array ('name'=>"Wizard Flight", 'sk'=>'ext',
				'des'=>"If Biblumancer have an actual function, it's flight. Avery can use his Biblumancer to zoom in and out of the field. Fume Spray will also take effect to those enemies Avery pass through while in flight."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'40% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'Range', 'val'=>'255 radius cone', 'ext'=>''),
			);
		$charprimcdm = array (
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'3/s'),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charpriaug = array (
			array ('name' => "Sucker For Love", 'ico' => "ra-bleeding-hearts",
				'des'=>"Causes Fume Spray to absorb Myst from affected units equivalent to 70% of it's damage."),
			array ('name' => "Sticky Load", 'ico' => "ra-fizzing-flask",
				'des'=>"Fume Spray inflicts a 25% |slow| for 2 seconds."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Range', 'val'=>'500', 'ext'=>''),

			array ('name'=>'Crane Damage', 'val'=>'20% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'poison Damage', 'val'=>'80% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'poison Duration', 'val'=>'4s', 'ext'=>''),
			array ('name'=>'Crane Attack Rate', 'val'=>'100%', 'ext'=>''),
			array ('name'=>'Crane Range', 'val'=>'300', 'ext'=>''),
			array ('name'=>'Crane Duration', 'val'=>'10s', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Cooldown', 'val'=>'15s'),
			array ('name'=>'Myst Cost', 'val'=>'30'),
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsecaug = array (
			array ('name' => "Two Timer",
				'des'=>"Allow two Paper Cranes at the same time."),
			array ('name' => "Really Attached", 'ico' => "ra-two-hearts",
				'des'=>"Every time Paper Crane hits a target, decreases 1 second off Lifetread Jinx's cooldown."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Range', 'val'=>'500', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'5s', 'ext'=>''),

			array ('name'=>'Myst Absorbed', 'val'=>'15 /tick', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Cooldown', 'val'=>'25s'),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "Damn Paper Cuts", 'ico' => "ra-cut-palm",
				'des'=>"Causes the charm to inflict the worst paper can do, which is |bleed|-ing, upon activation."),
			array ('name' => "Health Benefits", 'ico' => "ra-heart-bottle",
				'des'=>"Increases the damage dealt by Lifetread Jinx and Toxic Field to the unit affected by Devourer's Charm."), 
			array ('name' => "Myst Leeching", 'ico' => "ra-bottle-vapors",
				'des'=>"Increases Myst Absorbed to 25 per tick."),
			array ('name' => "No Strings Attached", 'ico' => "ra-chain",
				'des'=>"Causes |slow| the farther the distance the unit traveled from the point the charm took effect. Starts at -10% to -90% at 300."),
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Damage', 'val'=>'100% of Difference in Remaining Health', 'ext'=>'pur'),
			array ('name'=>'Delay', 'val'=>'3s', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Cooldown', 'val'=>'26s'),
			array ('name'=>'Myst Cost', 'val'=>'310'),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk2aug = array (
			array ('name' => "A Difference In Status", 'ico' => "ra-heart-tower",
				'des'=>"In contact, the jinx first heals Avery for 5% of his maximum health and damages the target for 5% of their maximum health. If Avery's remaining health is lower than the target, the effect is reversed. Only takes effect if the target is under Devourer's Charm."),
			array ('name' => "Always A Win", 'ico' => "ra-crowned-heart",
				'des'=>"if Avery's remaining health is lower than the target, the jinx then heals Avery for its supposed damage instead of damaging the target."), 
			array ('name' => "Hitting That Sweet Spot", 'ico' => "ra-targeted",
				'des'=>"Increases damage by 30% if the jinx hits a critical spot."),
			array ('name' => "Cheap Hooker", 'ico' => "ra-meat-hook",
				'des'=>"Decreases Myst cost to 190."),
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Range', 'val'=>'300', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'4s', 'ext'=>''),

			array ('name'=>'weaken', 'val'=>'70% Physical & Mystical Damage', 'ext'=>''),
			array ('name'=>'slow', 'val'=>'60%', 'ext'=>''),
			array ('name'=>'morph Duration', 'val'=>'2s', 'ext'=>''),
			array ('name'=>'myst-lock Duration', 'val'=>'3s', 'ext'=>''),
			array ('name'=>'Activation Range', 'val'=>'100', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Cooldown', 'val'=>'20s'),
			array ('name'=>'Myst Cost', 'val'=>'280'),
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk3aug = array (
			array ('name' => "Weakened By The Sight Of You", 'ico' => "ra-bleeding-eye",
				'des'=>"Increases chance of |weaken| and  increases its effect to 80%."),
			array ('name' => "Taking It Slow", 'ico' => "ra-player-despair",
				'des'=>"Increases chance of |slow| and increases its effect to 85%."), 
			array ('name' => "People Are Sheeple", 'ico' => "ra-sheep",
				'des'=>"Increases chance of |morph| and its duration to 4 seconds. Does not affect the duration of other curses."),
			array ('name' => "Power Of Love", 'ico' => "ra-glass-heart",
				'des'=>"Increases chance of |myst-lock| and its duration to 4 seconds. Does not affect the duration of other curses."),
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Damage', 'val'=>'100% Mystical Damage /s', 'ext'=>'mys'),
			array ('name'=>'Area of Effect', 'val'=>'300', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'500', 'ext'=>''),
			array ('name'=>'Cast Time', 'val'=>'1s', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'8s', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Cooldown', 'val'=>'150s'),
			array ('name'=>'Myst Cost', 'val'=>'365'),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'CHANNELING'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charultaug = array (
			array ('name' => "Acid Rain", 'ico' => "ra-poison-cloud",
				'des'=>"Having a Paper Crane on top of the field will inflict a 400% |frenzy| to it."),
			array ('name' => "Tough Love", 'ico' => "ra-shot-through-the-heart",
				'des'=>"Increases Toxic Field's damage by 120% which then diminishes by 5% every second."),
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'Travel Speed', 'val'=>'700', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'3s', 'ext'=>''),
			);
		$charextmcdm = array (
			array ('name'=>'Cooldown', 'val'=>'12s'),
			array ('name'=>'Myst Cost', 'val'=>'40 /s'),
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'TOGGLE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>true),
			);
		$charextaug = array (
			array ('name' => "Toxic Fumes", 'ico' => "ra-acid",
				'des'=>"Zooming through enemy units inflicts Paper Crane's |poison|."),
			array ('name' => "Charms & Hexes", 'ico' => "ra-bone-bite",
				'des'=>"Hitting a unit under Devourer's Charm while flying will leave a Dreaded Hex in his position."),
			);
	?>
@stop 