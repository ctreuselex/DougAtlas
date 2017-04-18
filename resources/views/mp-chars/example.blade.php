@extends('templates.mp-char')

<!-- METAS -->
@section('title') Mirrorplane | EXAMPLE @stop
@section('char-meta')
	<?php 
		$charname = '';
		foreach ($mirChars as $char) {
			if ($char['name']==$charname) {
				$charColor = $char['color'];
				$charColorSub = $char['subcolor'];
				$charIco = $char['ico'];
				$mcharAge = $char['year'];
			}
		}

		$mcharNam = "";
		$mcharFam = "<unknown>";
		$mcharDiv = "Luminos Aeros";
		$mcharAff = "None";
		
		$mcharAft = "Mydow";
		$mcharSty = "None";
		$mcharWoc = "None";

		$charthemes = '';
		$cityname = '';

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
			array ('name'=>"", 'sk'=>'pri',
				'des'=>""),

			array ('name'=>"", 'sk'=>'sec',
				'des'=>""), 

			array ('name'=>"", 'sk'=>'sk1',
				'des'=>""), 

			array ('name'=>"", 'sk'=>'sk2',
				'des'=>""),  

			array ('name'=>"", 'sk'=>'sk3',
				'des'=>""),

			array ('name'=>"", 'sk'=>'ult',
				'des'=>""),

			array ('name'=>"", 'sk'=>'ext',
				'des'=>""),
			);

		// ------------------------------------------------------------ //
		// PRIMARY
		// ------------------------------------------------------------ //
		$charpristats = array (
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
			array ('name'=>'Rounds', 'val'=>'', 'ext'=>''),
			array ('name'=>'Reload Time', 'val'=>'', 'ext'=>''),
			array ('name'=>'Charges', 'val'=>'', 'ext'=>''),
			);
		$charprimcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charpriaug = array (
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""), 
			);
		// ------------------------------------------------------------ //
		// SECONDARY
		// ------------------------------------------------------------ //
		$charsecstats = array (
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
			array ('name'=>'Rounds', 'val'=>'', 'ext'=>''),
			array ('name'=>'Reload Time', 'val'=>'', 'ext'=>''),
			array ('name'=>'Charges', 'val'=>'', 'ext'=>''),
			);
		$charsecmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsecaug = array (
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""), 
			);

		// ------------------------------------------------------------ //
		// SK1
		// ------------------------------------------------------------ //
		$charsk1stats = array (
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
		$charsk1mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk1aug = array (
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""), 
			);
		// ------------------------------------------------------------ //
		// SK2
		// ------------------------------------------------------------ //
		$charsk2stats = array (
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
		$charsk2mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk2aug = array (
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""), 
			);
		// ------------------------------------------------------------ //
		// SK3
		// ------------------------------------------------------------ //
		$charsk3stats = array (
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
		$charsk3mcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charsk3aug = array (
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""),  
			);

		// ------------------------------------------------------------ //
		// ULTIMATE
		// ------------------------------------------------------------ //
		$charultstats = array (
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
		$charultmcdm = array (
			array ('name'=>'Recharge Rate', 'val'=>''),
			array ('name'=>'Cooldown', 'val'=>''),
			array ('name'=>'Myst Cost', 'val'=>''),
			array ('name'=>'Health Cost', 'val'=>''),
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charultaug = array (
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""), 
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
			array ('name'=>'dp', 'val'=>false), //damage point // 't=direct' 'f=indirect'
			array ('name'=>'cd', 'val'=>'FREEFORM'), //cast design // 'freeform' 'stationary'
			array ('name'=>'sd', 'val'=>''), //skill design // 'active' 'passive' 'channeling' 'toggle'
			array ('name'=>'ml', 'val'=>false), //constraints
			array ('name'=>'da', 'val'=>false),
			);
		$charextaug = array (
			array ('name' => "",
				'des'=>""),
			array ('name' => "",
				'des'=>""), 
			);
	?>
@stop