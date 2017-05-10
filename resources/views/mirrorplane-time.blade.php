<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mirrorplane | CTs Logs Timeline</title>
    <link rel="icon" href="{{ url('img/logo.png') }}" type="image/png"> 

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('css/modern-business.css') }}" rel="stylesheet">
    <link href="{{ url('css/pie-graph.css') }}" rel="stylesheet">
    <link href="{{ url('css/doug-atlas.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('css/rpg-awesome.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> -->

</head>

<body>

	@include('inc/navigation')

    <?php
        $curPage = 'time';
        $Color = '#18FF81';
        $cityname = 'Mirrorplane';
        // $ColorSub = '#18FF81';
        
        $pageNotes = array (
            array('ord'=>'', 'n'=>"Much Info",'v'=>"Build Stuff. Build Moar Stuff! Destroy Said Stuff. That's the plan!"),
            array('ord'=>'', 'n'=>"Oh Hey Look!",'v'=>"Look at all these backstories which are all going to be thrown out the window!"),
            );
    ?>

    <style type="text/css">
        .ad-dash-pa { border-right: 5px solid {{ $Color }}; }
        .ad-dash { 
            border-top: 1px solid {{ $Color }};
            background: url({{ url('img/hex-bg-l.png') }}); 
            background-size: 100%;
            background-blend-mode: multiply;
            background-color: grey; }
        .city-scape { background-color: grey; }
        .city-scape .moon { background-color: {{ $Color }}; }
        .city-scape .moon { box-shadow: 0 0 30px 0px white; border: 85px solid white; }
        .city-scape:hover .moon { box-shadow: 0 0 100px 10px {{ $Color }}; border: 10px solid white; }
        .bot-scro a.fir:hover, .bot-scro a.fir.active { background-color: {{ $Color }}; color: white; transition: 0.3s; }
        .bot-scro a.mid:hover, .bot-scro a.mid.active { background-color: {{ $Color }}; color: white; transition: 0.3s; } 
        .bot-scro a.las:hover, .bot-scro a.las.active { background-color: {{ $Color }}; color: white; transition: 0.3s; }
        .notes ul li b { background: {{ $Color }}; }
        
        .mp-cont li {
            padding: 5px;
            margin-bottom: 1px;
        }
        .mp-cont li.no-hvr {
            padding: 5px;
            margin-bottom: -4px;
        }
        .year-div {
            width: 100%;
            font-size: 10px;
            font-weight: bolder;
            border-bottom: 1px solid white;
            padding: 5px 20px;
        }
        a { color: #333; }
        .li-hvr {
            display: inline-block;
            vertical-align: middle;
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
            box-shadow: 0 0 1px rgba(0, 0, 0, 0);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -moz-osx-font-smoothing: grayscale;
            position: relative;
            background: #2098d1;
            -webkit-transition-property: color;
            transition-property: color;
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
        }
        .li-hvr:before {
            content: "";
            position: absolute;
            z-index: -1;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            -webkit-transform: scaleX(1);
            transform: scaleX(1);
            -webkit-transform-origin: 50%;
            transform-origin: 50%;
            -webkit-transition-property: transform;
            transition-property: transform;
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
            -webkit-transition-timing-function: ease-out;
            transition-timing-function: ease-out;
        }
        .li-hvr:hover, .li-hvr:focus, .li-hvr:active {
            color: white;
        }
        .li-hvr:hover:before, .li-hvr:focus:before, .li-hvr:active:before {
            -webkit-transform: scaleX(0);
            transform: scaleX(0);
        }
        #div-lum { background-color: #ff9800; color: white;}
        #div-aer { background-color: #e91e63; color: white;}
        #div-mys { background-color: #2196f3; color: white;}
        #div-gei { background-color: #8bc34a; color: white;}
        /*.sbx.pur { background-color: #EFE167; }*/
    </style>

    @foreach ($mirChars as $char)
        <?php 
            if($char['color']=='') {$char['color']='#d5d5d5'; $char['subcolor']='#d5d5d5';}
        ?>

        <style type="text/css">
            /*@if($char['color']!='')*/

            /*@endif*/
                li#{{$char['name']}} {
                    border-left: 5px solid {{ $char['color'] }};
                    border-right: 5px solid {{ $char['subcolor'] }};
                }
                li#{{$char['name']}}.li-hvr {
                    background: {{ $char['color'] }};
                    background: -moz-linear-gradient(left, {{ $char['color'] }} 0%, {{ $char['subcolor'] }} 100%);
                    background: -webkit-linear-gradient(left, {{ $char['color'] }} 0%, {{ $char['subcolor'] }} 100%);
                    background: linear-gradient(to right, {{ $char['color'] }} 0%, {{ $char['subcolor'] }} 100%); 
                    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='{{ $char['color'] }}', endColorstr=' {{ $char['subcolor'] }}',GradientType=1 );"> <center>{{ $char['color'] }} | <b>COLOR</b> SCHEME | {{ $char['subcolor'] }}</center> 
                }
            li#{{$char['name']}} i {
                color: {{ $char['color'] }};
                font-size: 20px;
                position: absolute;
                left: -10px;
                transition: 0.5s;
            }
            li#{{$char['name']}}:hover i {
                color: white;
                transition: 0.3s;
            }
            li#{{$char['name']}} .char-hvr {
                border-right: 5px solid {{ $char['subcolor'] }};
                transition: 0.3s;
            }
            /*li#{{$char['name']}}:hover img{
                filter: grayscale(100%) brightness(100%);
            }*/
        </style>
    @endforeach

    @include('mp-inc/dash')

    <div class="col-sm-10 col-sm-offset-2" style="padding: 15px;"> 

        <p><span class="char-name">CTS Timeline</span> | {{ count($mirLogs) }} Total logs for safe keeping</p>

        <div class="col-xs-9" style="padding:0">
            <ul id="log-list" class="mp-cont">
                <?php
                    $yearbr=1699;
                    foreach ($mirLogs as $key => $row) {
                        $year[$key]  = $row['y'];
                        $season[$key] = $row['s'];
                        $day[$key] = $row['d'];
                    }
                    array_multisort($year, SORT_DESC, $season, SORT_DESC, $day, SORT_DESC, $mirLogs); 
                ?>
                @foreach ($mirLogs as $log)
                    <?php if($yearbr>$log['y']) { $yearbr=$log['y']; echo '<div class="year-div">'.$yearbr.'</div>'; } ?>
                    <?php $ordlink = strtolower($log['ord']); if($ordlink=='moon') $ordlink = 'djerick'; ?>
                    <a href="/mirrorplane/{{$ordlink}}?cts={{$log['logn']}}">
                        @foreach ($mirChars as $char)
                            @if ($log['ord']==$char['name'])
                                <li id="{{ $char['name'] }}" name="{{ $log['name']  }}" class="li-hvr">
                            @endif
                        @endforeach
                        <span class="col-xs-3">
                            <b>{{ $log['y'] }}</b> | 
                            @if ($log['s']==1) Summer<!-- <img src="{{ url('img/lum.png') }}" width="30px"> -->
                            @elseif ($log['s']==2) Fall<!-- <img src="{{ url('img/aer.png') }}" width="30px"> -->
                            @elseif ($log['s']==3) Winter<!-- <img src="{{ url('img/mys.png') }}" width="30px"> -->
                            @elseif ($log['s']==4) Spring<!-- <img src="{{ url('img/gei.png') }}" width="30px"> -->
                            @endif
                            | {{ $log['d']  }}
                        </span>
                        <b class="col-xs-7">
                            @foreach ($mirChars as $char)
                                @if ($log['ord']==$char['name'])
                                    <i class="{{ $char['ico'] }}"></i> 
                                @endif
                            @endforeach
                        {{ $log['name']  }}</b>
                        <span class="col-xs-2 right capitalize">
                            <b>{{ $log['ord']  }}</b> | 
                            @foreach ($mirChars as $char)
                                @if ($log['ord']==$char['name'])
                                    {{ $log['y']-$char['year'] }}
                                @endif
                            @endforeach
                            </span>
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>

        <style type="text/css">
            .char-hvr {
                position: absolute;
                right: -5px;
                height: 0;
                width: calc(50% + 5px);
                background: white;
                font-size: 14px; 
                padding: 5px 10px;
                border: 1px solid #d5d5d5;
                border-bottom: 0;
                margin-top: 0;
                z-index: 999;
                opacity: 0;
                transition: 0.5s;
            }
            .li-hvr:hover .char-hvr {
                height: 94px;
                color: #333;
                /*font-size: 14px;*/
                margin-top: -99px;
                opacity: 1;
                transition: 0.3s;
            }
            i.down {   
                margin-top: -25px;
                margin-left: 90%;
                font-size: 40px; 
                opacity: 0;
            }
            .li-hvr:hover i.down {
                margin-top: -25px !important;
                margin-left: 90% !important;
                font-size: 40px !important;

                opacity: 1;
            }
    
        </style>

        <div class="col-xs-3">
            <input id="cts-search" class="form-control" type="text" placeholder="search"><br>
            <!-- CHARACTERS -->
            <ul class="mp-cont">
                <?php
                    foreach ($mirChars as $key => $row) {
                        $name[$key]  = $row['name'];
                    }
                    array_multisort($name, SORT_ASC, $mirChars); 
                ?>
                @foreach ($mirChars as $char)
                    @if ($char['ico']!='' && $char['color']!='' && $char['name']!='djerick' && $char['name']!='dom' && $char['name']!='cin')
                        <?php 
                            $charlink = strtolower($char['name']);
                            if ($char['name']=='moon') $charlink = 'djerick';

                            $logcount=0; $charyr=0;
                            foreach ($mirLogs as $logs) {
                                if($logs['ord'] == $char['name']) {
                                    $logcount++;
                                }
                            }
                            foreach ($mirYrs as $yrs) {
                                if($yrs['name'] == $char['name']) {
                                    $charin = $yrs['in'];
                                    $charyr = $yrs['year'];
                                    if($charin=='institute') $charyr = $charyr.'-'.($charyr+6);
                                }
                            }
                        ?>
                        <a href="/mirrorplane/{{$charlink}}">
                            <li id="{{ $char['name'] }}" class="li-hvr">
                                <div class="char-hvr">
                                    @if($charyr>0) <b class="capitalize">{{ $charin }}:</b> <br>{{ $charyr }} | {{ $charyr-$char['year'] }}<br> @endif
                                    Logs: <b>{{ $logcount }}</b><br>
                                    Reg Year: <b>{{ round(((236*1.35)*(1699-$char['year']))/365, 0) }}</b>
                                </div>
                                <i class="down fa fa-caret-down"></i>
                                <b class="col-xs-5 col-xs-offset-1 capitalize"><i class="{{ $char['ico'] }}"></i> {{ $char['name'] }}</b>
                                <span class="col-xs-6 right">
                                    {{ $char['year']  }} | 
                                    <b>{{ 1699-$char['year'] }}</b>
                                </span>
                            </li>
                        </a>
                    @endif
                @endforeach
            </ul><br>
            <!-- DIVISION HEADS -->
            <ul class="mp-cont"> 
                <?php $curdiv = ''; ?>
                @foreach ($mirDiv as $div)
                    @if ($curdiv!=$div['div'])
                        <?php 
                            $curdiv = $div['div']; 
                            $divname = '';
                            if($div['div']=='lum') $divname = 'luminos';
                            elseif($div['div']=='aer') $divname = 'aeros';
                            elseif($div['div']=='mys') $divname = 'mystos';
                            elseif($div['div']=='gei') $divname = 'geios';  
                        ?>
                        <li id="div-{{ $div['div'] }}" class="no-hvr"><b class="col-xs-12 capitalize">{{ $divname }}</b></li>
                    @endif
                    @foreach ($mirChars as $char)
                        @if ($div['name'] == $char['name'])
                            <?php 
                                $charlink = strtolower($char['name']); 
                                $charico="fa fa-user"; 
                                if($char['ico']!='') $charico=$char['ico'];  
                            ?>
                            <a href="/mirrorplane/{{$charlink}}">
                                <li id="{{ $char['name'] }}" class="li-hvr">
                                    <b class="col-xs-8 col-xs-offset-1 capitalize"><i class="{{ $charico }}"></i> {{ $char['name'] }} {{ $char['sur'] }}</b>
                                    <span class="col-xs-3 right">
                                        {{ $div['year']  }}
                                    </span>
                                </li>
                            </a>
                        @endif
                    @endforeach
                @endforeach
            </ul><br>
            <!-- DIVISION TEAMS -->
            <ul class="mp-cont">
                @foreach ($mirTeam as $team) 
                    <li id="div-{{ $team['div'] }}" class="no-hvr">
                        <b class="col-xs-6 capitalize">{{ $team['name'] }}</b>
                        <span class="col-xs-6 right">{{ $team['year'] }}</span>
                    </li>
                    @foreach ($mirMems as $mems)
                        @if ($mems['team']==$team['name'])
                            @foreach ($mirChars as $char)
                                @if ($mems['name'] == $char['name'])
                                    <?php 
                                        $charico="fa fa-user"; if($char['ico']!='') $charico=$char['ico'];  
                                        $charlink = strtolower($char['name']);
                                        if ($char['name']=='moon') $charlink = 'djerick';
                                    ?>
                                    <a href="/mirrorplane/{{$charlink}}">
                                        <li id="{{ $char['name'] }}" class="li-hvr">
                                            <b class="col-xs-11 col-xs-offset-1 capitalize"><i class="{{ $charico }}"></i> {{ $char['name'] }} {{ $char['sur'] }}</b>
                                        </li>
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endforeach
            </ul><br><br>
        </div>

    </div>

    @include('mp-inc/foot')

    <!-- jQuery -->
    <script src="{{ url('js/jquery.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('js/bootstrap.min.js') }}"></script>

    <!-- CUSTOM Script-->
    <script src="{{ url('js/doug-atlas.js') }}"></script>
    <script src="{{ url('js/pie-graph.js') }}"></script>

    <!-- <script href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> -->
    <script type="text/javascript">
        $("input#cts-search").bind("change", function() { 
            // alert($(this).val()); 

            var searchq = $(this).val().toLowerCase();
            $('#log-list a li').hide();

            if($(this).val().indexOf('+') >= 0) {
                var searchq = searchq.split('+');
                for (var i=0; i<searchq.length; i++) {
                    $('#log-list a li').each(function() {
                        if(this.id.toLowerCase().indexOf(searchq[i]) >= 0) {
                            $(this).show();
                        }
                        if($(this).attr('name').toLowerCase().indexOf(searchq[i]) >= 0) {
                            $(this).show();
                        }
                    });
                }
            } else {
                $('#log-list a li').each(function() {
                    if(this.id.toLowerCase().indexOf(searchq) >= 0) {
                        $(this).show();
                    }
                    if($(this).attr('name').toLowerCase().indexOf(searchq) >= 0) {
                        $(this).show();
                    }
                });
            }

            }
        );
    </script>

    <script type="text/javascript"> var pageNotes = <?php echo json_encode($pageNotes); ?>;</script>

</body>

</html>
