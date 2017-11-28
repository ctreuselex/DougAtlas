<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Parser;


class MirrorplaneController extends Controller
{
    public function index(){ 
        $mirChars = $this->charMeta("char");
        $mirDiv = $this->charMeta("div");
        $mirTeam = $this->charMeta("team");
        $mirMems = $this->charMeta("mems");
        
        return view('mirrorplane-home')->with('mirChars',$mirChars)->with('mirDiv',$mirDiv)->with('mirTeam',$mirTeam)->with('mirMems',$mirMems); }

    public function character($char) {
        $viewchar = 'mp-chars.'.$char;
        $mirChars = $this->charMeta("char"); 
        $mirLogs = $this->charMeta("logs"); 
        $mirFrm = $this->charMeta("frm");

        return view($viewchar)->with('mirChars',$mirChars)->with('mirLogs',$mirLogs)->with('mirFrm',$mirFrm); }   

    public function charMeta($req) {
        $mirChars = array(
            array ( 'name'=>'dom','sur'=>'','year'=>0,'color'=>'#009688','subcolor'=>'#8BC34A','ico'=>'ra ra-castle-emblem' ),
            array ( 'name'=>'cin','sur'=>'','year'=>0,'color'=>'#8BC34A','subcolor'=>'#009688','ico'=>'ra ra-castle-emblem' ),

            array ( 'name'=>'andrei','sur'=>'','year'=>1666,'color'=>'','subcolor'=>'','ico'=>'ra ra-crystals' ),
            array ( 'name'=>'avery','sur'=>'gebsen','year'=>1668,'color'=>'#91DA2D','subcolor'=>'#9D2DDA','ico'=>'fa fa-paper-plane' ),
            array ( 'name'=>'bono','sur'=>'vasili','year'=>1568,'color'=>'','subcolor'=>'','ico'=>'ra ra-blade-bite' ),
            array ( 'name'=>'ceniza','sur'=>'corvera','year'=>1667,'color'=>'#9e0cd4','subcolor'=>'#f39b0f','ico'=>'ra ra-crystal-wand' ),
            array ( 'name'=>'chance','sur'=>'linus','year'=>1668,'color'=>'#673Ab7','subcolor'=>'#203E46','ico'=>'ra ra-diamond' ),
            array ( 'name'=>'daud','sur'=>'irwin','year'=>1674,'color'=>'#E64C15','subcolor'=>'#8C0B0B','ico'=>'ra ra-reverse' ),
            array ( 'name'=>'denise','sur'=>'','year'=>1662,'color'=>'','subcolor'=>'','ico'=>'ra ra-suits' ),
            array ( 'name'=>'froxy','sur'=>'rennis','year'=> 1668, 'color' =>'','subcolor'=>'','ico'=>'ra ra-crossed-axes' ),
            array ( 'name'=>'gemini','sur'=>'','year'=> 1676, 'color' =>'','subcolor'=>'','ico'=>'ra ra-gemini' ),
            array ( 'name'=>'herschel','sur'=>'','year'=>1667,'color'=>'#9C27B0','subcolor'=>'#00BCD4','ico'=>'ra ra-supersonic-arrow' ),
            array ( 'name'=>'ismael','sur'=>'immen','year'=> 1675,'color'=>'','subcolor'=>'','ico'=>'ra ra-heart-bottle' ), 
            array ( 'name'=>'jeanne','sur'=>'ark','year'=> 1665,'color'=>'#3F51B5','subcolor'=>'#1B2D92','ico'=>'ra ra-fluffy-swirl' ),
            array ( 'name'=>'kash','sur'=>'lorielle','year'=> 1668,'color'=>'#2590ab','subcolor'=>'#d0f30f','ico'=>'ra ra-crab-claw' ),
            array ( 'name'=>'kianna','sur'=>'halley','year'=>1670,'color'=>'#0D4E84','subcolor'=>'#00BCD4','ico'=>'ra ra-snowflake' ),
            array ( 'name'=>'kilosh','sur'=>'elizer','year'=> 1675,'color'=>'','subcolor'=>'','ico'=>'ra ra-shuriken' ),
            array ( 'name'=>'koom','sur'=>'','year'=>1685,'color'=>'','subcolor'=>'','ico'=>'ra ra-fox' ),
            array ( 'name'=>'frederick','sur'=>'lemaitre','year'=> 1543,'color'=>'','subcolor'=>'','ico'=>'ra ra-bird-mask' ),
            array ( 'name'=>'llaxine','sur'=>'loquintez','year'=>1677,'color'=>'#EC78A0','subcolor'=>'#EFE167','ico'=>'ra ra-fairy' ),
            array ( 'name'=>'lupe','sur'=>'wolgraff','year'=>1665,'color'=>'#DDAF47','subcolor'=>'#882826','ico'=>'ra ra-wolf-howl' ),
            array ( 'name'=>'maximus','sur'=>'redgrave','year'=>1673,'color'=>'#17EF79','subcolor'=>'#3D7D7A','ico'=>'ra ra-reactor' ),
            array ( 'name'=>'mikael','sur'=>'clayford','year'=> 1667,'color'=>'#00e7e7','subcolor'=>'#0067CD','ico'=>'ra ra-kitchen-knives' ),
            array ( 'name'=>'moon','sur'=>'beleaguer','year'=>1668,'color'=>'#26DC9F','subcolor'=>'#D2A368','ico'=>'ra ra-slash-ring' ),
            array ( 'name'=>'noemi','sur'=>'allium','year'=> 1664,'color'=>'#FFEB3B','subcolor'=>'#8BC34A','ico'=>'ra ra-flowers' ),
            array ( 'name'=>'rigel','sur'=>'','year'=>1666,'color'=>'#00BCD4','subcolor'=>'#D824A2','ico'=>'ra ra-daggers' ),
            array ( 'name'=>'riza','sur'=>'harmilton','year'=>1671,'color'=>'#E61547','subcolor'=>'#CD15E6','ico'=>'fa fa-cogs' ),
            array ( 'name'=>'rustom','sur'=>'kepler','year'=>1670,'color'=>'#E2C926','subcolor'=>'#D41818','ico'=>'ra ra-splash' ),
            array ( 'name'=>'seline','sur'=>'loquintez','year'=>1668,'color'=>'#EFE167','subcolor'=>'#00BCD4','ico'=>'ra ra-focused-lightning' ),              
            array ( 'name'=>'theodore','sur'=>'orcullo','year'=>1665,'color'=>'#18ff81','subcolor'=>'#B1127F','ico'=>'ra ra-axe' ),
            array ( 'name'=>'valkyr','sur'=>'soltaire','year'=>1664,'color'=>'#F3A40C','subcolor'=>'#F54C04','ico'=>'ra ra-heartburn' ),
            array ( 'name'=>'vines','sur'=>'roderick','year'=>1668,'color'=>'#18FF81','subcolor'=>'#E91E63','ico'=>'ra ra-dragonfly' ),
            array ( 'name'=>'vriskvin','sur'=>'dirk','year'=>1667,'color'=>'#E91E63','subcolor'=>'#5F0B28','ico'=>'ra ra-clockwork' ),
            array ( 'name'=>'xiscor','sur'=>'A','year'=> 1669,'color'=>'','subcolor'=>'','ico'=>'ra ra-crossbow' ),
            array ( 'name'=>'zedrik','sur'=>'azazel','year'=>1661,'color'=>'#FFC107','subcolor'=>'#00BCD4','ico'=>'ra ra-flaming-claw' ), 

            // non main
            array ( 'name'=>'amelia','sur'=>'beleaguer','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-snowflake' ),
            array ( 'name'=>'markus','sur'=>'beleaguer','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-flame-symbol' ),
            array ( 'name'=>'duellie','sur'=>'beleaguer','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-flame-symbol' ),
            array ( 'name'=>'trevor','sur'=>'wolgraff','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-wolf-howl' ),
            // heads
            array ( 'name'=>'thomas','sur'=>'dirk','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-frostfire' ),  
            array ( 'name'=>'george','sur'=>'holland','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-circular-saw' ), 
            array ( 'name'=>'zaldy','sur'=>'ruiz','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),  
            array ( 'name'=>'jon','sur'=>'horacio','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'gamora','sur'=>'asbistos','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),  
            array ( 'name'=>'samtiel','sur'=>'vance','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),  
            // landar
            array ( 'name'=>'sandra','sur'=>'redgrave','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-reactor' ),  
            array ( 'name'=>'landar','sur'=>'redgrave','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-reactor' ), 
            // irwin 
            array ( 'name'=>'cross','sur'=>'irwin','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-ankh' ),  
            array ( 'name'=>'dianne','sur'=>'irwin','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ), 
            // val
            array ( 'name'=>'mig','sur'=>'salatiel','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-burning-eye' ),  
            array ( 'name'=>'gene','sur'=>'salatiel','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-jigsaw-piece' ),  
            array ( 'name'=>'fae','sur'=>'soltaire','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-heartburn' ),
            // teammates   
            array ( 'name'=>'berex','sur'=>'fritzie','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-coffee-mug' ),
            array ( 'name'=>'aguilia','sur'=>'cristina','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),   
            array ( 'name'=>'hadji','sur'=>'feralte','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-health' ),  
            array ( 'name'=>'colin','sur'=>'forth','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),   
            array ( 'name'=>'marina','sur'=>'maramba','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            // leicel
            array ( 'name'=>'ceicil','sur'=>'leicel','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-gear-heart' ),
            array ( 'name'=>'cristine','sur'=>'leicel','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-gear-heart' ),
            // linus   
            array ( 'name'=>'eva','sur'=>'linus','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),  
            // skyforge
            array ( 'name'=>'helios','sur'=>'skyforge','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-anvil' ),
            array ( 'name'=>'jupiter','sur'=>'skyforge','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-anvil' ),
            // demeter
            array ( 'name'=>'demeter','sur'=>'von lehrer','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-book' ),
            array ( 'name'=>'romania','sur'=>'mars','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-apple' ),
            // mandalas
            array ( 'name'=>'karissa','sur'=>'arvy','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-snowflake' ),
            array ( 'name'=>'gliciero','sur'=>'quivince','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-brain-freeze' ),
            array ( 'name'=>'cryo','sur'=>'arvy','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-snowflake' ),
            array ( 'name'=>'felix','sur'=>'zacharias','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-castle-emblem' ),
            // kepler
            array ( 'name'=>'porlo','sur'=>'kepler','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-bleeding-hearts' ),
            array ( 'name'=>'rainier','sur'=>'de rain','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            // loquintez
            array ( 'name'=>'sylvia','sur'=>'loquintez','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-queen-crown' ),
            array ( 'name'=>'elliot','sur'=>'ebrahim','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'royd','sur'=>'calixto','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            // nacer
            array ( 'name'=>'nacer','sur'=>'witfield','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-angel-wings' ),
            array ( 'name'=>'knightier','sur'=>'golwerd','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-angel-wings' ),
            array ( 'name'=>'lance','sur'=>'dalton','year'=>0,'color'=>'','subcolor'=>'','ico'=>'ra ra-angel-wings' ),

            //alts
            array ( 'name'=>'djerick','sur'=>'beleaguer','year'=>1668,'color'=>'#26DC9F','subcolor'=>'#D8A37C','ico'=>'ra ra-slash-ring' ),

            // randoms
            array ( 'name'=>'jack','sur'=>'baulley','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'koba','sur'=>'gothlite','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'olive','sur'=>'ceniza','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'cathrine','sur'=>'montes','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'dian','sur'=>'biano','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'telik','sur'=>'obek','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'gorgo','sur'=>'demalino','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'jonto','sur'=>'cruz','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'leonard','sur'=>'cliff','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'kuzma','sur'=>'thaddeus','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'warner','sur'=>'zosimo','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'kendrik','sur'=>'manol','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'shakara','sur'=>'po','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'jogun','sur'=>'basher','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'gary','sur'=>'fruitcake','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'fiano','sur'=>'king','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'north','sur'=>'east','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'selina','sur'=>'koyle','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'ivan','sur'=>'ratemen','year'=>0,'color'=>'','subcolor'=>'','ico'=>'fa fa-user-o' ),
            array ( 'name'=>'sherkey','sur'=>'holes','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            array ( 'name'=>'plis','sur'=>'no','year'=>0,'color'=>'','subcolor'=>'','ico'=>'' ),
            );
        
        $mirFrm = array(
            array ('name'=>'george','act'=>'GeorgieGeorgie'),
            array ('name'=>'cristine','act'=>'thisisCristineCalling'),
            array ('name'=>'porlo','act'=>'theGreatMightyPorlo27'),
            array ('name'=>'kianna','act'=>'HalleysComet'),
            array ('name'=>'seline','act'=>'PrettySeline'),
            array ('name'=>'sandra','act'=>'Minimum28'),
            array ('name'=>'jeanne','act'=>'theBoat'),
            array ('name'=>'mig','act'=>'firebird'),
            array ('name'=>'demeter','act'=>'ocdVonLehrer'),
            array ('name'=>'noemi','act'=>'thelegendarylongcat'),
            array ('name'=>'vines','act'=>'ChuggingOnCaffeine'),
            array ('name'=>'berex','act'=>'thefangirl01'),
            //boyband
            array ('name'=>'maximus','act'=>'LandarsChild'),
            array ('name'=>'mikael','act'=>'mikeymouse'),
            array ('name'=>'daud','act'=>'flagSpikingChampion90'),
            array ('name'=>'avery','act'=>'paperman'),
            array ('name'=>'kash','act'=>'killerPrawn'),
            array ('name'=>'froxy','act'=>'whiteFlag101'),
            //randoms
            array ('name'=>'aguilia','act'=>'CristinaMEEE'),
            array ('name'=>'rainier','act'=>'H31P_m3'),
            array ('name'=>'olive','act'=>'juvilleee09'),
            array ('name'=>'selina','act'=>'catWalker36'),
            array ('name'=>'ivan','act'=>'FanofBill'),
            array ('name'=>'cathrine','act'=>'theWall36'),
            //nonames
            array ('name'=>'coldking','act'=>'COLDking'),
            array ('name'=>'thechroniclez','act'=>'thechroniclez'),
            array ('name'=>'mastehfianchow','act'=>'mastehFianchow'),
            array ('name'=>'totodip','act'=>'ToToDip'),
            array ('name'=>'lopushouse','act'=>'LopusHouse'),
            array ('name'=>'grimmerday','act'=>'grimmerday'),
            array ('name'=>'fortitude6','act'=>'fortitude6'),
            array ('name'=>'01coumug','act'=>'01coumug'),
            array ('name'=>'skadooshiedoo','act'=>'Skadooshiedoo'),
            array ('name'=>'merandaciti','act'=>'meRandaCiti'),
            array ('name'=>'sherkeythelocker','act'=>'SherkeytheLocker'),
            array ('name'=>'pessimist101','act'=>'Pessimist101'),
            array ('name'=>'chookey','act'=>'chookey'),
            array ('name'=>'nanobeermachines','act'=>'nanoBeerMachines'),
            array ('name'=>'crankydude69','act'=>'crankyDude69'),
            //rep
            array ('name'=>'kendrik','act'=>'KendrikManol'),
            array ('name'=>'jogun','act'=>'JogunSkullBasher'),
            );

        $mirYrs = array(
            array ('name' => 'avery', 'in' => 'institute', 'year' => '1686'),
            array ('name' => 'ceniza', 'in' => 'institute', 'year' => '1685'),
            array ('name' => 'chance', 'in' => 'institute', 'year' => '1686'),
            array ('name' => 'daud', 'in' => 'institute', 'year' => '1690'),
            array ('name' => 'froxy', 'in' => 'institute', 'year' => '1686'),
            array ('name' => 'ismael', 'in' => 'institute', 'year' => '1690'),
            array ('name' => 'jeanne', 'in' => 'institute', 'year' => '1683'),
            array ('name' => 'kash', 'in' => 'institute', 'year' => '1686'),
            array ('name' => 'kianna', 'in' => 'mandalas', 'year' => '1679'),
            array ('name' => 'kilosh', 'in' => 'institute', 'year' => '1693'),
            array ('name' => 'llaxine', 'in' => 'institute', 'year' => '1693'),
            array ('name' => 'maximus', 'in' => 'institute', 'year' => '1686'),
            array ('name' => 'mikael', 'in' => 'institute', 'year' => '1685'),
            array ('name' => 'moon', 'in' => 'institute', 'year' => '1686'),
            array ('name' => 'noemi', 'in' => 'institute', 'year' => '1682'),
            array ('name' => 'rustom', 'in' => 'institute', 'year' => '1685'),
            array ('name' => 'seline', 'in' => 'institute', 'year' => '1686'),
            array ('name' => 'theodore', 'in' => 'institute', 'year' => '1683'),
            array ('name' => 'vines', 'in' => 'institute', 'year' => '1686'),
            array ('name' => 'vriskvin', 'in' => 'institute', 'year' => '1685'),
            array ('name' => 'zedrik', 'in' => 'the ark', 'year' => '1680'),
            );

        $mirDiv = array (
            array ('div' => 'lum', 'name' => 'theodore', 'year' => '1692'),
            array ('div' => 'lum', 'name' => 'gamora', 'year' => '1683'),
            array ('div' => 'aer', 'name' => 'mikael', 'year' => '1690'),
            array ('div' => 'aer', 'name' => 'samtiel', 'year' => '1679'),
            array ('div' => 'aer', 'name' => 'jon', 'year' => '1660'),
            array ('div' => 'mys', 'name' => 'ceniza', 'year' => '1693'),
            array ('div' => 'mys', 'name' => 'thomas', 'year' => '1680'),
            array ('div' => 'mys', 'name' => 'markus', 'year' => '1665'),
            array ('div' => 'gei', 'name' => 'vriskvin', 'year' => '1695'),
            array ('div' => 'gei', 'name' => 'maximus', 'year' => '1693'),
            array ('div' => 'gei', 'name' => 'george', 'year' => '1680'),
            );

        $mirTeam = array (
            array ('name' => 'storm', 'div' => 'lum', 'year' => '1687-1698'),
            array ('name' => 'tornado', 'div' => 'lum', 'year' => '1694~'),
            array ('name' => 'crustacean', 'div' => 'aer', 'year' => '1687~'),
            array ('name' => 'serpentes', 'div' => 'aer', 'year' => '1687~'),
            array ('name' => 'lupus', 'div' => 'mys', 'year' => '1693~'),
            array ('name' => 'bootes', 'div' => 'mys', 'year' => '1687-1693'),
            array ('name' => 'circinus', 'div' => 'mys', 'year' => '1687-1691'),
            array ('name' => 'auriga', 'div' => 'mys', 'year' => '1665-1686'),
            array ('name' => 'escutcheon', 'div' => 'gei', 'year' => '1692~'),
            array ('name' => 'genesis', 'div' => 'gei', 'year' => '1665-1680'),
            );

        $mirMems = array (
            array ('name' => 'berex', 'team' => 'storm'),
            array ('name' => 'seline', 'team' => 'storm'),
            array ('name' => 'aguilia', 'team' => 'storm'),
            array ('name' => 'llaxine', 'team' => 'tornado'),
            array ('name' => 'ismael', 'team' => 'tornado'),
            array ('name' => 'kilosh', 'team' => 'tornado'),
            array ('name' => 'avery', 'team' => 'crustacean'),
            array ('name' => 'froxy', 'team' => 'crustacean'),
            array ('name' => 'kash', 'team' => 'crustacean'),
            array ('name' => 'hadji', 'team' => 'serpentes'),
            array ('name' => 'vriskvin', 'team' => 'bootes'),
            array ('name' => 'moon', 'team' => 'bootes'),
            array ('name' => 'rustom', 'team' => 'bootes'),
            array ('name' => 'chance', 'team' => 'lupus'),
            array ('name' => 'rustom', 'team' => 'lupus'),
            array ('name' => 'vines', 'team' => 'lupus'),
            array ('name' => 'gene', 'team' => 'auriga'),
            array ('name' => 'mig', 'team' => 'auriga'),
            array ('name' => 'colin', 'team' => 'auriga'),
            array ('name' => 'cristine', 'team' => 'circinus'),
            array ('name' => 'maximus', 'team' => 'circinus'),
            array ('name' => 'maximus', 'team' => 'escutcheon'),
            array ('name' => 'daud', 'team' => 'escutcheon'),
            array ('name' => 'george', 'team' => 'genesis'),
            array ('name' => 'thomas', 'team' => 'genesis'),
            array ('name' => 'zaldy', 'team' => 'genesis'),
            );


        // array ( 'y'=>, 's'=>, 'd'=>'', 'ord'=>'', 'name'=>''),
        $mirLogs = array(
            array ( 'y'=>1687, 's'=>1, 'd'=>'32', 'ord'=>'valkyr', 'logn'=>5, 'name'=>'Miracle Of Life'),
            array ( 'y'=>1685, 's'=>3, 'd'=>'59', 'ord'=>'valkyr', 'logn'=>4, 'name'=>'How Not To Give An Idea'),
            array ( 'y'=>1683, 's'=>2, 'd'=>'52', 'ord'=>'valkyr', 'logn'=>3, 'name'=>'Mind Blogs'),
            array ( 'y'=>1683, 's'=>1, 'd'=>'35', 'ord'=>'valkyr', 'logn'=>2, 'name'=>'I Didn\'t Know Boats Could Be So Beautiful'),
            array ( 'y'=>1666, 's'=>4, 'd'=>'49', 'ord'=>'valkyr', 'logn'=>1, 'name'=>'The Rebirth'),

            array ( 'y'=>1698, 's'=>3, 'd'=>'58', 'ord'=>'seline', 'logn'=>5, 'name'=>'Above The Clouds'),
            array ( 'y'=>1693, 's'=>2, 'd'=>'15', 'ord'=>'seline', 'logn'=>4, 'name'=>'Goddess Of The Moon'),
            array ( 'y'=>1686, 's'=>2, 'd'=>'10', 'ord'=>'seline', 'logn'=>3, 'name'=>'Minimum Effort'),
            array ( 'y'=>1684, 's'=>4, 'd'=>'59', 'ord'=>'seline', 'logn'=>2, 'name'=>'Peasant Hating'),
            array ( 'y'=>1676, 's'=>3, 'd'=>'5', 'ord'=>'seline', 'logn'=>1, 'name'=>'Ultra Violet'),

            array ( 'y'=>1692, 's'=>3, 'd'=>'55', 'ord'=>'maximus', 'logn'=>5, 'name'=>'From The Other Side'),
            array ( 'y'=>1691, 's'=>4, 'd'=>'50', 'ord'=>'maximus', 'logn'=>4, 'name'=>'Light \'em Up'),
            array ( 'y'=>1687, 's'=>2, 'd'=>'30', 'ord'=>'maximus', 'logn'=>3, 'name'=>'Badasses'),
            array ( 'y'=>1686, 's'=>2, 'd'=>'14', 'ord'=>'maximus', 'logn'=>2, 'name'=>'Maximum Effort'),
            array ( 'y'=>1677, 's'=>1, 'd'=>'16', 'ord'=>'maximus', 'logn'=>1, 'name'=>'Long Lasting Battery'),

            array ( 'y'=>1697, 's'=>1, 'd'=>'18', 'ord'=>'vriskvin', 'logn'=>4, 'name'=>'Mind\'s Eye'),
            array ( 'y'=>1693, 's'=>1, 'd'=>'54', 'ord'=>'vriskvin', 'logn'=>3, 'name'=>'Inheritance'),
            array ( 'y'=>1687, 's'=>1, 'd'=>'32', 'ord'=>'vriskvin', 'logn'=>2, 'name'=>'Stopping Continuity'),
            array ( 'y'=>1678, 's'=>3, 'd'=>'53', 'ord'=>'vriskvin', 'logn'=>1, 'name'=>'Just About Time'),

            array ( 'y'=>1696, 's'=>1, 'd'=>'4', 'ord'=>'kianna', 'logn'=>5, 'name'=>'Another Falling'),
            array ( 'y'=>1694, 's'=>4, 'd'=>'54', 'ord'=>'kianna', 'logn'=>4, 'name'=>'A Stab On The Back'),
            array ( 'y'=>1685, 's'=>4, 'd'=>'42', 'ord'=>'kianna', 'logn'=>3, 'name'=>'To Serve The People'),
            array ( 'y'=>1685, 's'=>3, 'd'=>'1', 'ord'=>'kianna', 'logn'=>2, 'name'=>'Another Rising'),
            array ( 'y'=>1679, 's'=>3, 'd'=>'3', 'ord'=>'kianna', 'logn'=>1, 'name'=>'Writings Of The Cold Hearted'),

            array ( 'y'=>1694, 's'=>1, 'd'=>'18', 'ord'=>'rigel', 'logn'=>3, 'name'=>'Reinventing The Wheel To Run Myself Over'),
            array ( 'y'=>1684, 's'=>4, 'd'=>'20', 'ord'=>'rigel', 'logn'=>2, 'name'=>'Life Not Killing'),
            array ( 'y'=>1680, 's'=>2, 'd'=>'16', 'ord'=>'rigel', 'logn'=>1, 'name'=>'Early Haunting'),

            array ( 'y'=>1693, 's'=>1, 'd'=>'58', 'ord'=>'herschel', 'logn'=>5, 'name'=>'The Right Turn'),
            array ( 'y'=>1690, 's'=>1, 'd'=>'18', 'ord'=>'herschel', 'logn'=>4, 'name'=>'Rumors Of My Demise Has Been Greatly Exaggerated'),
            array ( 'y'=>1686, 's'=>1, 'd'=>'48', 'ord'=>'herschel', 'logn'=>3, 'name'=>'Cloudy Night For Stargazing'),
            array ( 'y'=>1685, 's'=>1, 'd'=>'6', 'ord'=>'herschel', 'logn'=>2, 'name'=>'Happy Birthday!'),
            array ( 'y'=>1684, 's'=>4, 'd'=>'28', 'ord'=>'herschel', 'logn'=>1, 'name'=>'Shooting Stars'),

            array ( 'y'=>1696, 's'=>1, 'd'=>'3', 'ord'=>'moon', 'logn'=>5, 'name'=>'Colder Dawn'),
            array ( 'y'=>1695, 's'=>4, 'd'=>'59', 'ord'=>'moon', 'logn'=>4, 'name'=>'When Winter Fell'),
            array ( 'y'=>1691, 's'=>3, 'd'=>'30', 'ord'=>'moon', 'logn'=>3, 'name'=>'To The Lower Rings'),
            array ( 'y'=>1689, 's'=>3, 'd'=>'21', 'ord'=>'moon', 'logn'=>2, 'name'=>'Hey, Time Keeper!'),
            array ( 'y'=>1686, 's'=>2, 'd'=>'11', 'ord'=>'moon', 'logn'=>1, 'name'=>'The Talentless'),

            array ( 'y'=>1696, 's'=>2, 'd'=>'34', 'ord'=>'llaxine', 'logn'=>5, 'name'=>'Why Don\'t You Come Down Here?'),
            array ( 'y'=>1695, 's'=>1, 'd'=>'48', 'ord'=>'llaxine', 'logn'=>4, 'name'=>'Electric Outdoor Lightings'),
            array ( 'y'=>1693, 's'=>3, 'd'=>'3', 'ord'=>'llaxine', 'logn'=>3, 'name'=>'Pain And Pleasure'),
            array ( 'y'=>1693, 's'=>2, 'd'=>'10', 'ord'=>'llaxine', 'logn'=>2, 'name'=>'Worthy Of Song'),
            array ( 'y'=>1688, 's'=>3, 'd'=>'35', 'ord'=>'llaxine', 'logn'=>1, 'name'=>'Fluffy And Deadly'),

            array ( 'y'=>1691, 's'=>4, 'd'=>'31', 'ord'=>'riza', 'logn'=>2, 'name'=>'He Who Wears Pink'),
            array ( 'y'=>1690, 's'=>2, 'd'=>'3', 'ord'=>'riza', 'logn'=>1, 'name'=>'The Birds And The Bees'),

            array ( 'y'=>1697, 's'=>4, 'd'=>'8', 'ord'=>'daud', 'logn'=>5, 'name'=>'Some Sort Of Implications'),
            array ( 'y'=>1694, 's'=>1, 'd'=>'23', 'ord'=>'daud', 'logn'=>4, 'name'=>'When The Schools Come Alive'),
            array ( 'y'=>1692, 's'=>3, 'd'=>'58', 'ord'=>'daud', 'logn'=>3, 'name'=>'Future BFFs'),
            array ( 'y'=>1691, 's'=>4, 'd'=>'6', 'ord'=>'daud', 'logn'=>2, 'name'=>'That\'s My Boy!'),
            array ( 'y'=>1690, 's'=>4, 'd'=>'58', 'ord'=>'daud', 'logn'=>1, 'name'=>'Smooth As A Desert Cactus'),

            array ( 'y'=>1696, 's'=>1, 'd'=>'2', 'ord'=>'chance', 'logn'=>3, 'name'=>'Hitting 12 O\'Clock'),
            array ( 'y'=>1693, 's'=>2, 'd'=>'5', 'ord'=>'chance', 'logn'=>2, 'name'=>'Totally Unacceptable'),
            array ( 'y'=>1687, 's'=>4, 'd'=>'29', 'ord'=>'chance', 'logn'=>1, 'name'=>'Sorry, Not Sorry'),

            array ( 'y'=>1692, 's'=>2, 'd'=>'13', 'ord'=>'avery', 'logn'=>4, 'name'=>'Paraphrasing'),
            array ( 'y'=>1691, 's'=>4, 'd'=>'8', 'ord'=>'avery', 'logn'=>3, 'name'=>'Girls Like Jocks You Know'),
            array ( 'y'=>1689, 's'=>3, 'd'=>'22', 'ord'=>'avery', 'logn'=>2, 'name'=>'Time Keeper, Hey!'),
            array ( 'y'=>1686, 's'=>2, 'd'=>'11', 'ord'=>'avery', 'logn'=>1, 'name'=>'Paperman'),

            array ( 'y'=>1697, 's'=>1, 'd'=>'25', 'ord'=>'rustom', 'logn'=>4, 'name'=>'Back From The Dead'),
            array ( 'y'=>1696, 's'=>1, 'd'=>'1', 'ord'=>'rustom', 'logn'=>3, 'name'=>'Storming In'),
            array ( 'y'=>1694, 's'=>1, 'd'=>'19', 'ord'=>'rustom', 'logn'=>2, 'name'=>'The Universe Is Not That Vast If Despite My Avoidance, I\'m Still Guaranteed To Cross You'),
            array ( 'y'=>1687, 's'=>3, 'd'=>'10', 'ord'=>'rustom', 'logn'=>1, 'name'=>'Personal Babysitter'),

            array ( 'y'=>1695, 's'=>3, 'd'=>'9', 'ord'=>'vines', 'logn'=>4, 'name'=>'Instantaneous Repositioning'),
            array ( 'y'=>1693, 's'=>2, 'd'=>'7', 'ord'=>'vines', 'logn'=>3, 'name'=>'The Guy With The Shiny Head'),
            array ( 'y'=>1688, 's'=>3, 'd'=>'16', 'ord'=>'vines', 'logn'=>2, 'name'=>'Raging Fire'),
            array ( 'y'=>1685, 's'=>1, 'd'=>'17', 'ord'=>'vines', 'logn'=>1, 'name'=>'Renaissance'),

            array ( 'y'=>1689, 's'=>2, 'd'=>'25', 'ord'=>'zedrik', 'logn'=>1, 'name'=>'Good To Be Bad'),

            array ( 'y'=>1688, 's'=>1, 'd'=>'10', 'ord'=>'noemi', 'logn'=>2, 'name'=>'Be Reasonable'),
            array ( 'y'=>1683, 's'=>3, 'd'=>'21', 'ord'=>'noemi', 'logn'=>1, 'name'=>'Weird Eyed'),

            array ( 'y'=>1697, 's'=>2, 'd'=>'10', 'ord'=>'theodore', 'logn'=>2, 'name'=>'Loose Rope'),
            array ( 'y'=>1696, 's'=>4, 'd'=>'4', 'ord'=>'theodore', 'logn'=>1, 'name'=>'There\'s A Man On The Door'),

            array ( 'y'=>1697, 's'=>2, 'd'=>'4', 'ord'=>'mikael', 'logn'=>3, 'name'=>'Dream Come True'),
            array ( 'y'=>1695, 's'=>1, 'd'=>'15', 'ord'=>'mikael', 'logn'=>2, 'name'=>'Goodbye My Sour Prince'),
            array ( 'y'=>1690, 's'=>4, 'd'=>'15', 'ord'=>'mikael', 'logn'=>1, 'name'=>'Silly Walks'),

            array ( 'y'=>1691, 's'=>3, 'd'=>'35', 'ord'=>'lupe', 'logn'=>1, 'name'=>'Wolves Howl'),

            array ( 'y'=>1685, 's'=>1, 'd'=>'16', 'ord'=>'jeanne', 'logn'=>1, 'name'=>'To Be Everywhere At Once'),

            array ( 'y'=>1688, 's'=>4, 'd'=>'8', 'ord'=>'ceniza', 'logn'=>1, 'name'=>'Fit Like A Glove'),

            );

        if($req=="char") return $mirChars;
        else if ($req=="frm") return $mirFrm;
        else if ($req=="yrs") return $mirYrs;
        else if ($req=="div") return $mirDiv;
        else if ($req=="team") return $mirTeam;
        else if ($req=="mems") return $mirMems;
        else if ($req=="logs") return $mirLogs;
    }

    public function ctstime() {
        $mirChars = $this->charMeta("char");
        $mirYrs = $this->charMeta("yrs");
        $mirDiv = $this->charMeta("div");
        $mirTeam = $this->charMeta("team");
        $mirMems = $this->charMeta("mems");
        $mirLogs = $this->charMeta("logs");

        return view('mirrorplane-time')->with('mirChars',$mirChars)->with('mirYrs',$mirYrs)->with('mirDiv',$mirDiv)->with('mirTeam',$mirTeam)->with('mirMems',$mirMems)->with('mirLogs',$mirLogs);
    }

    public function thestory() {
        $mirChars = $this->charMeta("char");
        // $mirYrs = $this->charMeta("yrs");
        // $mirDiv = $this->charMeta("div");
        // $mirTeam = $this->charMeta("team");
        // $mirMems = $this->charMeta("mems");
        // $mirLogs = $this->charMeta("logs");

        // return view('mirrorplane-story')->with('mirChars',$mirChars)->with('mirYrs',$mirYrs)->with('mirDiv',$mirDiv)->with('mirTeam',$mirTeam)->with('mirMems',$mirMems)->with('mirLogs',$mirLogs);
        return view('mirrorplane-story')->with('mirChars',$mirChars);
    }

}
