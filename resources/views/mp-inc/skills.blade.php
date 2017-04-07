<?php
    $statusEffects = array (
        //debuffs
        // damage
        array ('name'=>'weaken', 'purge'=>true, 'ico'=>'ra ra-lightning-sword',
            'des'=>'Decreases physical and/or mystical  damage.'),
        //defs
        array ('name'=>'frangible', 'purge'=>true, 'ico'=>'ra ra-crystal-cluster',
            'des'=>'Increases incoming damage received.'),
        array ('name'=>'break', 'purge'=>true, 'ico'=>'ra ra-broken-shield',
            'des'=>'Decreases physical defense and/or myst resistance.'),
        array ('name'=>'health-degen', 'purge'=>true, 'ico'=>'ra ra-health-decrease',
            'des'=>'Decreases health regeneration.'),
        array ('name'=>'myst-degen', 'purge'=>true, 'ico'=>'ra ra-health-decrease',
            'des'=>'Decreases myst regeneration.'),
        //speed
        array ('name'=>'slow', 'purge'=>true, 'ico'=>'ra ra-footprint',
            'des'=>'Decreases movement speed.'),
        array ('name'=>'limp', 'purge'=>true, 'ico'=>'ra ra-hand',
            'des'=>'Decreases attact rate.'),
        //stuns
        array ('name'=>'disarm', 'purge'=>false, 'ico'=>'fa fa-sign-language',
            'des'=>'Disables certain abilities. Instantly ends on weapon retrieval.'),
        array ('name'=>'freeze', 'purge'=>true, 'ico'=>'ra ra-frost-emblem',
            'des'=>'Prevents any action. -60% physical defense. Removed on hit or struggling.'),
        array ('name'=>'root', 'purge'=>true, 'ico'=>'ra ra-thorny-vine',
            'des'=>'Prevents moving. Instantly removed on dash, blink, teleport.'),
        array ('name'=>'stun', 'purge'=>true, 'ico'=>'ra ra-doubled',
            'des'=>'Disables all actions.'),
        array ('name'=>'pause', 'purge'=>false, 'ico'=>'ra ra-clockwork',
            'des'=>'Disables everything. Delays healing, damage, and other effects until removed.'),
        array ('name'=>'petrify', 'purge'=>true, 'ico'=>'ra ra-groundbreaker',
            'des'=>'Periodically slows and prevents any action after a 10 second delay. Instantly kills on hit. Removed by healing, if healing done is equal or greater than 20% of remaining health.'),
        //etc
        array ('name'=>'blind', 'purge'=>true, 'ico'=>'ra ra-bleeding-eye',
            'des'=>'Fills screen with darkness.'),
        array ('name'=>'bleed', 'purge'=>true, 'ico'=>'ra ra-dripping-blade',
            'des'=>'Prevents any form of healing. Deals 1% of remaining health as physical damage every second.'),
        array ('name'=>'burn', 'purge'=>true, 'ico'=>'ra ra-fire',
            'des'=>'Deals 7/15/23 physical damage every second. Increases damage for every instance, maximum of 3. Removed on water.'),
        array ('name'=>'drench', 'purge'=>true, 'ico'=>'ra ra-droplet',
            'des'=>'Decreases movement speed and attack rate by 10%. Decreases damage from Burn by 50%. Lasts for 3 seconds out of water.'),
        array ('name'=>'expose', 'purge'=>true, 'ico'=>'ra ra-targeted',
            'des'=>'Increases the next critical hit damage by 15% along with a 1 second disable. Removed on critical hit. Also, opens crotch shots. Yep. Crotch shots.'),
        array ('name'=>'myst-lock', 'purge'=>false, 'ico'=>'fa fa-eercast',
            'des'=>'Disables certain abilities. Mixed damage deals 50% less damage.'),
        array ('name'=>'myst-leak', 'purge'=>true, 'ico'=>'ra ra-bottle-vapors',
            'des'=>'Prevents myst regeneration and any form of replenishing myst.'),
        array ('name'=>'poison', 'purge'=>true, 'ico'=>'ra ra-skull',
            'des'=>'Deals damage every second. Removed by healing, if healing done is equal or greater than periodic damage.'),
        array ('name'=>'thundershock', 'purge'=>true, 'ico'=>'ra ra-lightning-trio',
            'des'=>'Disables all actions for 1 second. Has a 20% chance of jumping to nearby units on impact, 100% chance if the unit is drenched.'),
        
        //buffs 
        //damage
        array ('name'=>'amplify', 'purge'=>true, 'ico'=>'ra ra-all-for-one',
            'des'=>'Increases physical and/or mystical damage.'),
        array ('name'=>'leech', 'purge'=>true, 'ico'=>'ra ra-insect-jaws',
            'des'=>'Damage dealt converts as health. Counts as healing.'),
        //defs
        array ('name'=>'partial-immunity', 'purge'=>true, 'ico'=>'ra ra-bolt-shield',
            'des'=>'Reduces damage taken.'),
        array ('name'=>'fortify', 'purge'=>true, 'ico'=>'ra ra-shield',
            'des'=>'Increases physical defense and/or myst resistance.'),
        array ('name'=>'invulnerability', 'purge'=>true, 'ico'=>'ra ra-heavy-shield',
            'des'=>'Prevents all kind of damage.'),
        array ('name'=>'health-regen', 'purge'=>true, 'ico'=>'ra ra-health-increase',
            'des'=>'Increases health regeneration. Counts as healing.'),
        array ('name'=>'myst-regen', 'purge'=>true, 'ico'=>'ra ra-health-increase',
            'des'=>'Increases myst regeneration.'),
        array ('name'=>'shield', 'purge'=>true, 'ico'=>'ra ra-reactor',
            'des'=>'Absorbs a percentage of incoming damage into lost Myst.'),
        array ('name'=>'reflect', 'purge'=>true, 'ico'=>'ra ra-divert',
            'des'=>'Reflects a percentage of incoming damage. Only applies to direct damage. Melee reflects instantly while projectiles simply bounces off.'),
        //speed
        array ('name'=>'haste', 'purge'=>true, 'ico'=>'ra ra-footprint',
            'des'=>'Increases movement speed.'),
        array ('name'=>'frenzy', 'purge'=>true, 'ico'=>'ra ra-hand',
            'des'=>'Increases attack rate.'),
        //etc
        array ('name'=>'disable', 'purge'=>false, 'ico'=>'ra ra-interdiction',
            'des'=>'Diables all actions.'),
        array ('name'=>'clone', 'purge'=>false, 'ico'=>'ra ra-double-team',
            'des'=>'Copy of someone. Non-perfect deals only 30% of the original damage and takes 170% damage.'),
        array ('name'=>'invisible', 'purge'=>true, 'ico'=>'ra ra-hood',
            'des'=>'Prevents being seen by enemies. Removed by Reveal or when attacking/casting.'),

        //statuseffect
        array ('name'=>'purge', 'purge'=>true, 'ico'=>'ra ra-defibrilate',
            'des'=>'Removes status effects. Does not work on: '),
        array ('name'=>'immunity', 'purge'=>false, 'ico'=>'ra ra-gem-pendant',
            'des'=>'Prevents most status effects. does not work against Myst Lock and Pause.'),
        array ('name'=>'reveal', 'purge'=>true, 'ico'=>'ra ra-eyeball',
            'des'=>'Prevents invisiblity.'),
    );

    $purgedes = ""; $purgedesadd = "";
    foreach ($statusEffects as $se) {
        if (!$se['purge']) $purgedesadd .= $se['name'].", ";
        if ($se['name']=='purge') $purgedes = $se['des'];
         
    }
    $purgedes = $purgedes.$purgedesadd;
?>

<style type="text/css">

    .row-skill-stat {
        display: -webkit-box;
        /*background: url({{ $charTexture }}); 
        background-size: 300px;
        background-blend-mode: overlay;
        background-color: {{ $charColorSub }};*/
        transition: 0.5s;
    }
    /*.skill-box:hover div .row .row-skill-stat {
        background-blend-mode: overlay;
        background-color: {{ $charColor }};
        transition: 0.3s;
    }*/

    .aug.{{ $charname }} i {
        color: {{ $charColor }};
        font-size: 18px;
        position: relative;
    }

    @foreach ($statusEffects as $se)
        <?php
            if ($se['name']=='purge') $se['des'] = $purgedes;
        ?>
        .inf-{{ $se['name'] }} {
            text-transform: capitalize;
            /*font-weight: bold;*/
        }
        .inf-{{ $se['name'] }}:before {
            position: absolute;
            background: white;  
            text-transform: none;
            font-weight: normal;
            font-size: 12px;
            padding: 5px;
            z-index: 9999;     
            opacity: 0;                   
            transition: 0.5s;
        }
        .inf-{{ $se['name'] }}:hover:before {
            content: "{{ $se['des'] }}";
            opacity: 1;
            margin-top: -2px;
            margin-left: -134px;
            width: 150px;                   
            border: 1px solid #d5d5d5;   
            box-shadow: 0 1px 3px rgba(0,0,0,0.3);
            transition: 0.3s;
        }
        .inf-{{ $se['name'] }} i {
            position: static;
            font-size: 12px !important;
            color: white !important;
            background-color: #a5a5a5;
            border-radius: 3px;
            padding: 2px;
            margin-right: 2px; 
        }
    @endforeach 
</style>

<!-- <div class="row"> -->
@foreach ($charability as $ability)
    <?php 
        $abilityprefix = "";
        if($ability['sk']=='pri') $abilityprefix='Primary:';
        if($ability['sk']=='sec') $abilityprefix='Secondary:';
        if($ability['sk']=='ult') $abilityprefix='Ultimate:';
        if($ability['sk']=='ext') $abilityprefix='Core:';
        $rowdiv = "4";
        if($ability['sk']=='pri'||$ability['sk']=='sec'||$ability['sk']=='ult'||$ability['sk']=='ext') $rowdiv = "6";
        $rowpos = "";
        $abilitystat = "";
        $abilitymcdm = "";
        $abilityaug = "";
        if($ability['sk']=='pri') { 
            $abilitystat=$charpristats; $abilitymcdm=$charprimcdm; $abilityaug=$charpriaug; $rowpos="ski-top"; }
        if($ability['sk']=='sec') { 
            $abilitystat=$charsecstats; $abilitymcdm=$charsecmcdm; $abilityaug=$charsecaug; $rowpos="ski-top"; }
        if($ability['sk']=='sk1') { 
            $abilitystat=$charsk1stats; $abilitymcdm=$charsk1mcdm; $abilityaug=$charsk1aug; $rowpos="ski-base"; }
        if($ability['sk']=='sk2') { 
            $abilitystat=$charsk2stats; $abilitymcdm=$charsk2mcdm; $abilityaug=$charsk2aug; $rowpos="ski-base"; }
        if($ability['sk']=='sk3') { 
            $abilitystat=$charsk3stats; $abilitymcdm=$charsk3mcdm; $abilityaug=$charsk3aug; $rowpos="ski-base"; }
        if($ability['sk']=='ult') { 
            $abilitystat=$charultstats; $abilitymcdm=$charultmcdm; $abilityaug=$charultaug; $rowpos="ski-bot"; }
        if($ability['sk']=='ext') { 
            $abilitystat=$charextstats; $abilitymcdm=$charextmcdm; $abilityaug=$charextaug; $rowpos="ski-bot"; }
    ?>

    <div class="col-sm-{{ $rowdiv }}">
        <div class="skill-box {{ $rowpos }}">
            <div class="col-xs-12">
                <p class="skill-name" style="border-bottom: 2px solid {{ $charColor }}"> {{ $abilityprefix }} <b>{{ $ability['name'] }}</b> </p>
            </div>
            <img class="skill-img" src="{{ url('img/mp-char/skills/'.$charname.'/'.$ability['sk'].'.png') }}" width="120px">
            <div class="col-xs-12"> 
                <div class="row"> 
                    <div class="col-xs-12">
                        <p class="row col-xs-10">
                            <?php
                                $des = explode("|", $ability['des']); 
                                foreach ($des as $d) {
                                    $found=false;
                                    foreach ($statusEffects as $se) {
                                        if ($d == $se['name']) {
                                            $sename = $d;
                                            $seico = "";
                                            foreach ($statusEffects as $se) {
                                                if($se['name']==$sename) $seico=$se['ico'];   
                                            }
                                            ?>

                                            <span class="inf-{{ $d }}"><i class="{{ $seico }}"></i>{{ str_replace('-',' ',$sename) }}</span> 
                                            
                                            <?php
                                            $found=true;
                                        }
                                    }
                                    if (!$found) echo $d;
                                }
                            ?>
                            </p>
                    </div>
                    <div class="clear"></div>
                    <div class="row-skill-stat">
                        @if($rowpos=="ski-base") <div class="col-xs-6"> @else <div class="col-xs-8"> @endif 
                            <ul class="skill-stat"> 
                                @foreach ($abilitystat as $stat)
                                    <?php
                                        $statname = $stat['name']; 
                                        $statval = $stat['val']; 
                                        $statext = $stat['ext'];
                                    ?>
                                    @if ($statval!='')
                                        <?php
                                            if ($statext=='lum') { $statext = 'sbx lum'; }
                                            else if ($statext=='mys') { $statext = 'sbx mys'; }
                                            else if ($statext=='aer') { $statext = 'sbx aer'; }
                                            else if ($statext=='pur') { $statext = 'sbx pur'; }

                                            $des = explode("|", $statname); 
                                            foreach ($des as $d) {
                                                $found=false;
                                                foreach ($statusEffects as $se) {
                                                    // var_dump($sename);
                                                    if (strpos($d, $se['name']) !== false) {
                                                        $d = $se['name'];
                                                        $seico = "";
                                                        foreach ($statusEffects as $se) {
                                                            if($se['name']==$d) $seico=$se['ico'];   
                                                        }
                                                        $found=true;
                                                    }
                                                }
                                            }
                                        ?>
                                        @if (!$found)
                                            <li>{{ $statname }}: <b>{{ $statval }} <i class="{{ $statext }}"></i></b></li>
                                        @else
                                            <li><span class="inf-{{ $des[0] }}"><i class="{{ $seico }}"></i>{{ str_replace('-',' ',$des[0]) }}</span>: <b>{{ $statval }} <i class="{{ $statext }}"></i></b></li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        @if($rowpos=="ski-base") <div class="col-xs-6"> @else <div class="col-xs-4"> @endif 
                            <ul class="skill-stat">
                                @foreach ($abilitymcdm as $stat)
                                    <?php 
                                        $statname = $stat['name']; 
                                        $statval = $stat['val'];
                                        if($statname=='ml' && $statval==true) { $statname = 'fa fa-eercast'; $statval = 'MYSTLOCK -able'; }
                                        if($statname=='da' && $statval==true) { $statname = 'fa fa-sign-language'; $statval = 'DISARM -able'; }
                                        if($statname=='dp' && $statval==true) { $statname = 'DIRECT DAMAGE'; }
                                        if($statname=='dp' && $statval==false) { $statname = 'INDIRECT DAMAGE'; }
                                    ?>
                                    @if ($stat['name']=='ml' || $stat['name']=='da')
                                        <li><i class="{{ $statname }}" aria-hidden="true"></i> {{ $statval }}</li>
                                    @elseif ($stat['name']=='dp')
                                        <li>{{ $statname }}</li>
                                    @elseif ($stat['name']=='cd' || $stat['name']=='sd')
                                        <li>{{ $statval }}</li>
                                    @elseif ($stat['val']!='')
                                        <li>{{ $statname }}: <b>{{ $statval }}</b></li>
                                    @endif

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <ul class="skill-args">
                    @foreach ($abilityaug as $aug)
                        <li class="aug {{ $charname }}">
                            <i class="fa fa-superpowers" aria-hidden="true" 
                                style="position: absolute;
                                    font-size: 20px;
                                    margin-top: 0px;
                                    margin-left: -1px;
                                    opacity: 0.5;
                                    color: {{ $charColorSub }}"></i>
                            <i class="{{ $charIco }}" aria-hidden="true"></i>
                            <b>{{ $aug['name'] }}: </b>
                            <?php
                                $des = explode("|", $aug['des']); 
                                foreach ($des as $d) {
                                    $found=false;
                                    foreach ($statusEffects as $se) {
                                        if ($d == $se['name']) {
                                            $sename = $d;
                                            $seico = "";
                                            foreach ($statusEffects as $se) {
                                                if($se['name']==$sename) $seico=$se['ico'];   
                                            }
                                            ?> 

                                            <span class="inf-{{ $d }}"><i class="{{ $seico }}"></i>{{ str_replace('-',' ',$sename) }}</span> 
                                            
                                            <?php
                                            $found=true;
                                        }
                                    }
                                    if (!$found) echo $d;
                                }
                            ?>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
@endforeach
<!-- </div> -->