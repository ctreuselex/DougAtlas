<?php
    $constantsArr = array (
        array('name' => 'phyDam', 'val' => 20),
        array('name' => 'mysDam', 'val' => 20),
        array('name' => 'mixDam', 'val' => 0),

        array('name' => 'critMul', 'val' => 1),
        array('name' => 'attRate', 'val' => 0.50),
        array('name' => 'moveSpd', 'val' => 250),

        array('name' => 'hPool', 'val' => 150),
        array('name' => 'hRgen', 'val' => 1),

        array('name' => 'mPool', 'val' => 150),
        array('name' => 'mRgen', 'val' => 1),

        array('name' => 'phyDef', 'val' => 5),
        array('name' => 'mysDef', 'val' => 5),
        array('name' => 'mixDef', 'val' => 0),
        );

    // -----------------------------------------------------
    // MIN
    // -----------------------------------------------------

    $statComps = array (
        'phyDam' => array( 'lum' => ($lum*1.4), 'aer' => ($aer*1.2) ),
        'mysDam' => array( 'mys' => ($mys*1.4), 'aer' => ($aer*1.2) ),
        'mixDam' => array( 'phyDam' => 0, 'mysDam' => 0 ),

        'critMul' => array( 'aer' => ($aer*0.05) ),
        'attRate' => array( 'aer' => ($aer*0.03), 'lum' => ($lum*0.02) ),
        'moveSpd' => array( 'aer' => ($aer*2.05) ),

        'hPool' => array( 'lum' => ($lum*15), 'gei' => ($gei*22) ),
        'hRgen' => array( 'lum' => ($lum*0.08), 'gei' => ($gei*0.18) ),

        'mPool' => array( 'mys' => ($mys*17), 'gei' => ($gei*12) ),
        'mRgen' => array( 'mys' => ($mys*0.18), 'gei' => ($gei*0.08) ),

        'phyDef' => array( 'lum' => ($lum*0.25), 'gei' => ($gei*0.20) ),
        'mysDef' => array( 'mys' => ($mys*0.25), 'gei' => ($gei*0.20) ),
        'mixDef' => array( 'phyDef' => 0, 'mysDef' => 0 ),
        );

    $statDecs = array (
        'mysDam' => array( 'lum' => ($statComps['mysDam']['mys'] * ($lum/($mys+30)) )),
        'mRgen' => array( 'lum' => ($lum*0.06)),

        'phyDef' => array( 'aer' => ($aer*0.015)),
        'mysDef' => array( 'aer' => ($aer*0.015)),

        'phyDam' => array( 'mys' => ($statComps['phyDam']['lum'] * ($mys/($lum+30)) )),
        'hPool' => array( 'mys' => ($mys*5)),

        'attRate' => array( 'gei' => ($statComps['attRate']['aer'] * ($gei/90))),
        'moveSpd' => array( 'gei' => ($statComps['moveSpd']['aer'] * ($gei/100))),
        );

    $finValues = array (
        'phyDam' => 0,
        'mysDam' => 0,
        'mixDam' => 0,

        'critMul' => 0,
        'attRate' => 0,
        'moveSpd' => 0,

        'hPool' => 0,
        'hRgen' => 0,

        'mPool' => 0,
        'mRgen' => 0,

        'phyDef' => 0,
        'mysDef' => 0,
        'mixDef' => 0,
        );

    foreach ($constantsArr as $st) {
        $statname = $st['name'];
        $stat = $st['val'];
        //stat Computation
        foreach ($statComps as $key => $vals) {
            if ($key == $statname ) {
                foreach ($vals as $v) {
                    $stat += $v;
                }
            }
        }
        //stat reductions
        foreach ($statDecs as $key => $vals) {
            if ($key == $statname ) {
                foreach ($vals as $v) {
                    $stat -= $v;
                }
            }
        }
        //stat finals
        foreach ($finValues as $key => $vals) {
            if ($key == $statname ) {
                $finValues[$key] = $stat;
                // echo($statname."=".$vals['val']."|");
            }
        }
    }

    $statComps['mixDam'] = array( 'phyDam' => $finValues['phyDam'], 'mysDam' => $finValues['mysDam'] );
    $statComps['mixDef'] = array( 'phyDef' => $finValues['phyDef'], 'mysDef' => $finValues['mysDef'] );

    $mixAer = 0.5;
    $mixGei = 0.5;

    $finValues['mixDam'] = ($finValues['phyDam'] + $finValues['mysDam']) * $mixAer;
    $finValues['mixDef'] = ($finValues['phyDef'] + $finValues['mysDef']) * $mixGei;

    // -----------------------------------------------------
    // MAX
    // -----------------------------------------------------

    $statMaxComps = array (
        'phyDam' => array( 'lum' => ($lumTotal*1.4), 'aer' => ($aerTotal*1.2) ),
        'mysDam' => array( 'mys' => ($mysTotal*1.4), 'aer' => ($aerTotal*1.2) ),
        'mixDam' => array( 'phyDam' => 0, 'mysDam' => 0 ),

        'critMul' => array( 'aer' => ($aerTotal*0.05) ),
        'attRate' => array( 'aer' => ($aerTotal*0.03), 'lum' => ($lumTotal*0.02) ),
        'moveSpd' => array( 'aer' => ($aerTotal*2.05) ),

        'hPool' => array( 'lum' => ($lumTotal*15), 'gei' => ($geiTotal*22) ),
        'hRgen' => array( 'lum' => ($lumTotal*0.08), 'gei' => ($geiTotal*0.18) ),

        'mPool' => array( 'mys' => ($mysTotal*17), 'gei' => ($geiTotal*12) ),
        'mRgen' => array( 'mys' => ($mysTotal*0.18), 'gei' => ($geiTotal*0.08) ),

        'phyDef' => array( 'lum' => ($lumTotal*0.25), 'gei' => ($geiTotal*0.20) ),
        'mysDef' => array( 'mys' => ($mysTotal*0.25), 'gei' => ($geiTotal*0.20) ),
        'mixDef' => array( 'phyDef' => 0, 'mysDef' => 0 ),
        );

    $statMaxDecs = array (
        'mysDam' => array( 'lum' => ($statMaxComps['mysDam']['mys'] * ($lumTotal/($mysTotal+30)) )),
        'mRgen' => array( 'lum' => ($lumTotal*0.06)),

        'phyDef' => array( 'aer' => ($aerTotal*0.015)),
        'mysDef' => array( 'aer' => ($aerTotal*0.015)),

        'phyDam' => array( 'mys' => ($statMaxComps['phyDam']['lum'] * ($mysTotal/($lumTotal+30)) )),
        'hPool' => array( 'mys' => ($mysTotal*5)),

        'attRate' => array( 'gei' => ($statMaxComps['attRate']['aer'] * ($geiTotal/90))),
        'moveSpd' => array( 'gei' => ($statMaxComps['moveSpd']['aer'] * ($geiTotal/100))),
        );

    $maxValues = array (
        'phyDam' => 0,
        'mysDam' => 0,
        'mixDam' => 0,

        'critMul' => 0,
        'attRate' => 0,
        'moveSpd' => 0,

        'hPool' => 0,
        'hRgen' => 0,

        'mPool' => 0,
        'mRgen' => 0,

        'phyDef' => 0,
        'mysDef' => 0,
        'mixDef' => 0,
        );

    foreach ($constantsArr as $st) {
        $statname = $st['name'];
        $stat = $st['val'];
        //stat Computation
        foreach ($statMaxComps as $key => $vals) {
            if ($key == $statname ) {
                foreach ($vals as $v) {
                    $stat += $v;
                }
            }
        }
        //stat reductions
        foreach ($statMaxDecs as $key => $vals) {
            if ($key == $statname ) {
                foreach ($vals as $v) {
                    $stat -= $v;
                }
            }
        }
        //stat finals
        foreach ($maxValues as $key => $vals) {
            if ($key == $statname ) {
                $maxValues[$key] = $stat;
                // echo($statname."=".$vals['val']."|");
            }
        }
    }

    $statMaxComps['mixDam'] = array( 'phyDam' => $maxValues['phyDam'], 'mysDam' => $maxValues['mysDam'] );
    $statMaxComps['mixDef'] = array( 'phyDef' => $maxValues['phyDef'], 'mysDef' => $maxValues['mysDef'] );

    $maxValues['mixDam'] = ($maxValues['phyDam'] + $maxValues['mysDam']) * $mixAer;
    $maxValues['mixDef'] = ($maxValues['phyDef'] + $maxValues['mysDef']) * $mixGei;

    // -----------------------------------------------------
    // RANKS
    // -----------------------------------------------------

    $statRanks = array (
        'phyDam' => number_format(round((($finValues['phyDam']-20) / 130) * 100)),
        'mysDam' => number_format(round((($finValues['mysDam']-20) / 130) * 100)),
        'mixDam' => number_format(round((($finValues['mixDam']-20) / 130) * 100)),

        'critMul' => number_format(round((($finValues['critMul'] - 1) / 4) * 100)),
        'attRate' => number_format(round((($finValues['attRate']-0.5) / 3) * 100)),
        'moveSpd' => number_format(round((($finValues['moveSpd'] - 250) / 150) * 100)),

        'hPool' => number_format(round(((($finValues['hPool'])-150) / 1500) * 100)),
        'hRgen' => number_format(round((($finValues['hRgen']-1) / 17) * 100)),

        'mPool' => number_format(round(((($finValues['mPool'])-150) / 2000) * 100)),
        'mRgen' => number_format(round((($finValues['mRgen']-1) / 17) * 100)),

        'phyDef' => number_format(round((($finValues['phyDef']-5) / 30) * 100)),
        'mysDef' => number_format(round((($finValues['mysDef']-5) / 30) * 100)),
        'mixDef' => number_format(round((($finValues['mixDef']-5) / 30) * 100)),
        );

    $statMaxRanks = array (
        'phyDam' => number_format(round((($maxValues['phyDam']-20) / 130) * 100)),
        'mysDam' => number_format(round((($maxValues['mysDam']-20) / 130) * 100)),
        'mixDam' => number_format(round((($maxValues['mixDam']-20) / 130) * 100)),

        'critMul' => number_format(round((($maxValues['critMul'] - 1) / 4) * 100)),
        'attRate' => number_format(round((($maxValues['attRate']-0.5) / 3) * 100)),
        'moveSpd' => number_format(round((($maxValues['moveSpd'] - 250) / 150) * 100)),

        'hPool' => number_format(round(((($maxValues['hPool'])-150) / 1500) * 100)),
        'hRgen' => number_format(round((($maxValues['hRgen']-1) / 17) * 100)),

        'mPool' => number_format(round(((($maxValues['mPool'])-150) / 2000) * 100)),
        'mRgen' => number_format(round((($maxValues['mRgen']-1) / 17) * 100)),

        'phyDef' => number_format(round((($maxValues['phyDef']-5) / 30) * 100)),
        'mysDef' => number_format(round((($maxValues['mysDef']-5) / 30) * 100)),
        'mixDef' => number_format(round((($maxValues['mixDef']-5) / 30) * 100)),
        );

    foreach ($statRanks as $key => $sr) {
        if ($sr>100) $statRanks[$key]=100;
    }
    foreach ($statMaxRanks as $key => $sr) {
        if ($sr>100) $statMaxRanks[$key]=100;
    }

    $chardiv = max($lumTotal, $aerTotal, $mysTotal, $geiTotal);

?>

<style type="text/css">
    .st {
        height: 30px;
        /*background-color: #e0e0e0;*/
        padding: 3px 10px;
        margin-bottom: 1px;
        background: url({{ url('img/hex-bg-l.png') }});
        background-size: 100%;
    }
    .st:after {
        position: absolute;
        font-size: 10px;
        color: white;
        font-weight: bold;
    }
    .st .per:after {
        content: "";
        height: 30px;
        position: absolute;
        background: rgba(255,255,255,0.5);
        border-right: 2px solid darkslategrey;
        mix-blend-mode: overlay;
    }
    .st .per {
        height: 30px;
        position: absolute;
        background: grey;
        margin-left: -10px;
        margin-top: -3px;
    }
    .st b {
        position: absolute;
        color: white;
        right: 25px;
        background: rgba(0,0,0,0.2);
        padding: 2px 5px;
    }

    .st.phyDam { border-right: 5px solid #ff9800; }
    .st.mysDam { border-right: 5px solid #2196f3; }
    .st.mixDam { border-right: 5px solid #e91e63; }

    .st.critMul { border-right: 5px solid #e91e63; }
    .st.attRate { border-right: 5px solid #e91e63; }
    .st.moveSpd { border-right: 5px solid #e91e63; }

    .st.hPool { border-right: 5px solid #8bc34a; }
    .st.hRgen { border-right: 5px solid #8bc34a; }

    .st.mPool { border-right: 5px solid #2196f3; }
    .st.mRgen { border-right: 5px solid #2196f3; }

    .st.phyDef { border-right: 5px solid #ff9800; }
    .st.mysDef { border-right: 5px solid #2196f3; }
    .st.mixDef { border-right: 5px solid #8bc34a; }

    .st.phyDam .per { background: #ff9800; }
    .st.mysDam .per { background: #2196f3; }
    .st.mixDam .per { background: #e91e63; }

    .st.critMul .per { background: #e91e63; }
    .st.attRate .per { background: #e91e63; }
    .st.moveSpd .per { background: #e91e63; }

    .st.hPool .per { background: #8bc34a; }
    .st.hRgen .per { background: #8bc34a; }

    .st.mPool .per { background: #2196f3; }
    .st.mRgen .per { background: #2196f3; }

    .st.phyDef .per { background: #ff9800; }
    .st.mysDef .per { background: #2196f3; }
    .st.mixDef .per { background: #8bc34a; }

    .st.phyDam:after { content: "Physical Damage: " }
    .st.mysDam:after { content: "Mystical Damage: " }
    .st.mixDam:after { content: "Mixed Damage: " }

    .st.critMul:after { content: "Critical Multiplier: " }
    .st.attRate:after { content: "Attack Rate: " }
    .st.moveSpd:after { content: "Movement Speed: " }

    .st.hPool:after { content: "Health Pool: " }
    .st.hRgen:after { content: "Health Regeneration: " }

    .st.mPool:after { content: "Myst Pool: " }
    .st.mRgen:after { content: "Myst Regeneration: " }

    .st.phyDef:after { content: "Physical Defense: " }
    .st.mysDef:after { content: "Myst Resistance: " }
    .st.mixDef:after { content: "Mixed Defense: " }

    <?php for ($i=0; $i<=100; $i++) { ?>
        
        .st .per.b{{ $i }}:after {
            width: {{ ($i/100)*250 }}px; 
        }
        .st .per.a{{ $i }} {
            width: {{ ($i/100)*250 }}px;
        }

    <?php } ?>

    .st b .details {
        position: absolute;
        left: 0;
        height: 24px;
        width: 200px;
        background: white;
        color: #333;
        font-size: 12px;
        padding-top: 4px;
        margin-top: -22px;
        opacity: 0;
        transition: 0.3s;
    }
    .st:hover b .details {
        left: -200px;
        opacity: 1;
        transition: 0.5s;
        z-index: 10;
    }
    .details span { background: grey; padding: 5px; color: white; }
    .details span.lum, .details span.phyDam, .details span.phyDef { background :#ff9800; }
    .details span.aer { background :#e91e63; }
    .details span.mys, .details span.mysDam, .details span.mysDef { background :#2196f3; }
    .details span.gei { background :#8bc34a; }
</style>

<div class="col-sm-6">
    <div class="col-xs-6">
        <h3 class="skill-name right" style="    background: white; padding: 5px 10px; margin-bottom: 1px; border-bottom: 2px solid {{ $charColor }};"><b>Statistics</b></h3>

        @foreach ($finValues as $key => $val)
            <div class="st {{ $key }}"><div class="per b{{ $statRanks[$key] }} a{{ $statMaxRanks[$key] }}"></div>
                <b>
                    @if ($key=='phyDam' || $key=='mysDam' || $key=='mixDam' || $key=='moveSpd' || $key=='hPool' || $key=='mPool')
                        {{ number_format(round($val, 2), 0) }}
                    @else
                        {{ number_format(round($val, 2), 2) }}
                    @endif
                    -
                    @if ($key=='phyDam' || $key=='mysDam' || $key=='mixDam' || $key=='moveSpd' || $key=='hPool' || $key=='mPool')
                        {{ number_format(round($maxValues[$key], 2), 0) }}
                    @else
                        {{ number_format(round($maxValues[$key], 2), 2) }}
                    @endif

                    <div class="details">
                        <?php $constantext = false; ?>
                        @foreach ($statMaxComps[$key] as $comps => $val)
                            <!-- constant -->
                            @foreach ($constantsArr as $cons) 
                                @if ($cons['name']==$key && $key!='mixDam' && $key!='mixDef' && !$constantext) 
                                    <span> {{ $cons['val'] }} </span> 
                                    <?php $constantext = true; ?>
                                @endif
                            @endforeach
                            <!-- adds -->
                            <span class="{{ $comps }}">
                                @if ($key=='phyDam' || $key=='mysDam' || $key=='mixDam' || $key=='moveSpd' || $key=='hPool' || $key=='mPool')
                                    {{ number_format(round($val, 2), 0) }}
                                @else
                                    {{ number_format(round($val, 2), 2) }}
                                @endif
                            </span>
                        @endforeach

                        <!-- deductions -->
                        @foreach ($statMaxDecs as $decs => $val) @if ($decs==$key)
                            @foreach ($val as $d => $v)
                                <span class="{{ $d }}">
                                    @if ($key=='phyDam' || $key=='mysDam' || $key=='mixDam' || $key=='moveSpd' || $key=='hPool' || $key=='mPool')
                                        - {{ number_format(round($v, 2), 0) }}
                                    @else
                                        - {{ number_format(round($v, 2), 2) }}
                                    @endif
                                </span>
                            @endforeach 
                        @endif @endforeach

                        @if ($key=='mixDam') <span class="aer">{{ number_format(round($mixAer*100, 2), 0) }}%</span> @endif
                        @if ($key=='mixDef') <span class="gei">{{ number_format(round($mixGei*100, 2), 0) }}%</span> @endif
                        <!-- <i class="fa fa-caret-right" aria-hidden="true"></i> -->
                    </div>
                </b>
            </div>
        @endforeach
    </div>
    <div class="col-xs-6">
        <section>
            @if ($chardiv == $lumTotal)
                <img class="pie-division" src="{{ url('img/lum.png') }}">
            @elseif ($chardiv == $aerTotal)
                <img class="pie-division" src="{{ url('img/aer.png') }}">
            @elseif ($chardiv == $mysTotal)
                <img class="pie-division" src="{{ url('img/mys.png') }}">
            @elseif ($chardiv == $geiTotal)
                <img class="pie-division" src="{{ url('img/gei.png') }}">
            @endif
            <div class="pieID pie"></div>
            <ul class="pieID legend">
                <li><b>Luminos</b> | {{ $lum }} + {{ $lumPlus }} <span>{{ $lumTotal }}</span></li>
                <li><b>Aeros</b> | {{ $aer }} + {{ $aerPlus }}<span>{{ $aerTotal }}</span></li>
                <li><b>Mystos</b> | {{ $mys }} + {{ $mysPlus }}<span>{{ $mysTotal }}</span></li>
                <li><b>Geios</b> | {{ $gei }} + {{ $geiPlus }}<span>{{ $geiTotal }}</span></li>
                <p class="right">{{ $lum+$aer+$mys+$gei }} | <b>{{ $lumTotal+$aerTotal+$mysTotal+$geiTotal }}</b></p>
            </ul>
        </section>
        <br>
    </div>
</div>