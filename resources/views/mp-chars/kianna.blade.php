@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | Kianna @stop
@section('char-meta')
	<?php 
		$charname = 'kianna';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "Kianna 'Ice Queen' Halley";
		$mcharFam = "Mentor: Amelia Beleaguer";
		$mcharDiv = "Mystos";
		$mcharAff = "Children of Mandalas";
		
		$mcharAft = "Frost";
		$mcharSty = "Maximo | Sigilios";
		$mcharWoc = "None";

		$charthemes = 'Frost, Snow, Fabulousness, Queen, Ultimate Rebel';
		$cityname = 'Secrets';

		$lum = 2;
		$lumPlus = 7;
		$lumTotal = $lum+$lumPlus;

		$aer = 5;
		$aerPlus = 12;
		$aerTotal = $aer+$aerPlus;

		$mys = 12;
		$mysPlus = 38;
		$mysTotal = $mys+$mysPlus;

		$gei = 11;
		$geiPlus = 33;
		$geiTotal = $gei+$geiPlus;
		
		$charability = array(
			array ('name'=>"Icicle", 'sk'=>'pri',
				'des'=>"Kianna can throw icicles made of frozen Myst water that can penetrate even the toughest of armors and the holiest of faith."),

			array ('name'=>"Hail", 'sk'=>'sec',
				'des'=>"Creates a hail in front which slows enemies in front of her, making them bow to the Queen. Enemies that stays within the hail for more than 3 seconds will be |freeze|-d."), 

			array ('name'=>"Glacier Shard", 'sk'=>'sk1',
				'des'=>"Snow Angels can sometimes be so aggressive that they throw large ice spears into someone nearby, which damages and |slow|-s and leaves a rather large gaping hole in their abdomen."), 

			array ('name'=>"Frost Cloud", 'sk'=>'sk2',
				'des'=>"Channels a frost cloud on the target area that damages and slows enemies within. Enemies staying for more than 3 seconds within the frost cloud will be |freeze|-d."),  

			array ('name'=>"Purify", 'sk'=>'sk3',
				'des'=>"Cleanses the target ally of all the sins they commited in their lifetime, |purge|-ing and healing them for a short period of time, after which they can proceed to go on with sinning again."),

			array ('name'=>"Frost Guard", 'sk'=>'ult',
				'des'=>"Blesses the allied target with a spell that allows them to ignore all damage taken during the spell's guard phase. A percentage of the total damage taken is then cast upon them throughout a duration on the spell's end phase. Frost Guard will not protect them if the damage dealt is greater than their remaining health. End phase's damage is pure but non-lethal."),

			array ('name'=>"All Around Queen", 'sk'=>'ext',
				'des'=>"Grants Kianna all the benefits of being a Queen, a floating chair, unlimited supply of crollux bars, a fabulous crown, and additional Myst Pool and Myst regeneration."),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
			array ('name'=>'Damage', 'val'=>'100% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'Attack Rate', 'val'=>'80%', 'ext'=>''),
			array ('name'=>'Range', 'val'=>'800', 'ext'=>''),
			);
		$charprimcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'2'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charpriaug = array (
			array ('name' => "Ice Fan",
				'des'=>"Causes Kianna to shoot three icicles in a fan instead of a single one."),
			array ('name' => "Snowball Fighter",
				'des'=>"Allows critical hits with Icicle to knock back the target. Reduces damage by 15%."), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
			array ('name'=>'Range', 'val'=>'225 radius cone', 'ext'=>''),
			array ('name'=>'slow', 'val'=>'20%', 'ext'=>''),
			array ('name'=>'freeze Duration', 'val'=>'2s', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>'8 /s'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsecaug = array (
			array ('name' => "Snow Angel",
				'des'=>"Removes Hail's |freeze|-ing effect and replaces it with a healing effect that heals allies for 60% Kianna's Mystical damage per second."),
			array ('name' => "Hard as Ice",
				'des'=>"Hail now damages enemy units caught within range for 120% mystical damage per second. Increases Myst Cost to 9 per second."), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
			array ('name'=>'Damage', 'val'=>'85 + 75% Mystical Damage', 'ext'=>'mys'),
			array ('name'=>'Range', 'val'=>'800', 'ext'=>''),

			array ('name'=>'slow', 'val'=>'15%', 'ext'=>''),
			array ('name'=>'slow Duration', 'val'=>'2s', 'ext'=>''),
			);
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'7s'),
			array ('name'=>'Myst Cost', 'val'=>'125'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>true), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "Piercing Shard",
				'des'=>"Causes Glacier Shard to pierce through enemies instead of being destroyed at first contact. Increases Range to 1200."),
			array ('name' => "Won't Let Them Go",
				'des'=>"Decreases Glacier Shard's cooldown to 3 and Myst cost to 80."),
			array ('name' => "Pure Catalyst",
				'des'=>"Glacier Shard now deals pure damage which ignores physical defense and Myst resistance."),
			array ('name' => "Offense Is Best Defense",
				'des'=>"Allows Glacier Shard to be charged for 2 seconds which increases it's damage by 10% every 0.50 second."), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
			array ('name'=>'Damage', 'val'=>'15 + 80% Mystical Damage /s', 'ext'=>'mys'),
			array ('name'=>'Area of Effect', 'val'=>'250', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'6s', 'ext'=>''),

			array ('name'=>'limp', 'val'=>'20%', 'ext'=>''),
			array ('name'=>'slow', 'val'=>'35%', 'ext'=>''),
			);
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'12s'),
			array ('name'=>'Myst Cost', 'val'=>'35/s'),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'STATIONARY'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'CHANNELING'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk2aug = array (
			array ('name' => "Healing Waters",
				'des'=>"Allied units within the Frost Cloud are healed."),
			array ('name' => "Absolute Zero",
				'des'=>"Decreases the time it takes to |freeze| enemies to 1.50 seconds."),
			array ('name' => "Forever Winter",
				'des'=>"|freeze|-d enemy units will remain |freeze|-d for as long as Kianna is channeling the Frost Cloud."),
			array ('name' => "No Interruptions",
				'des'=>"Prevents Kianna from being |stun|-ned while channeling Frost Cloud."), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
			array ('name'=>'Damage', 'val'=>'', 'ext'=>''),
			array ('name'=>'Heal', 'val'=>'45 + 120% Mystical Damage', 'ext'=>'pur'),
			array ('name'=>'Range', 'val'=>'600', 'ext'=>''),
			array ('name'=>'Duration', 'val'=>'5s', 'ext'=>''),
			);
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'9s'),
			array ('name'=>'Myst Cost', 'val'=>'145'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk3aug = array (
			array ('name' => "Divinity",
				'des'=>"Increases Purify's healing by 40%."),
			array ('name' => "Frost Bites",
				'des'=>"Can now target enemy units which instead of healing them, damages them while also |purge|-ing all status effects currently affecting them."),
			array ('name' => "Oh Golly",
				'des'=>"The target will now instantly receive all of Purify's heal or damage."),
			array ('name' => "Snow Party",
				'des'=>"Cause Purify to affect multiple units within a 250 area of effect around the main target."),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
			array ('name'=>'Range', 'val'=>'600', 'ext'=>''),

			array ('name'=>'End Phase Damage', 'val'=>'70% of Damage Absorbed', 'ext'=>'pur'),
			array ('name'=>'Guard Phase Duration', 'val'=>'5s', 'ext'=>''),
			array ('name'=>'End Phase Duration', 'val'=>'5s', 'ext'=>''),
			);
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>'110s'),
			array ('name'=>'Myst Cost', 'val'=>'275'),
			array ('name'=>'Health Cost', 'val'=>''),
			// array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>'ACTIVE'), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>true), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charultaug = array (
			array ('name' => "Give Me More Time",
				'des'=>"Increases the duration of Frost Guard to 8 seconds for both phases."),
			array ('name' => "Myst, The Gathering",
				'des'=>"Unit affected by Frost Guard will have a 80% mystical |amplify| for the whole duration of the spell."), 
			);
		// ------------------------------------------------------------ //
		// EXTRA
		// ------------------------------------------------------------ //
		$charextstats = array (
			array ('name'=>'Myst Pool', 'val'=>'+400', 'ext'=>''),
			array ('name'=>'Myst Regeneration', 'val'=>'+3', 'ext'=>''),
			);
		$charextmcdm = array (
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
		$charextaug = array (
			array ('name' => "Revenge Served Cold",
				'des'=>"When dying, Kianna burst into a freezing wave that |freeze|-s all enemy units around a 600 radius for 3 seconds."),
			array ('name' => "Public Servant",
				'des'=>"Nearby allied units within 1600 radius also receives All Around Queen's benefit but cuts the additional Myst pool to 275 and Myst regeneration to 2."), 
			);
	?>
@stop 