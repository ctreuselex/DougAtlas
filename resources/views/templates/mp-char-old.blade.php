<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <link rel="icon" href="{{ url('img/logo.png') }}" type="image/png"> 

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
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

    <!-- jQuery -->
    <script src="{{ url('js/jquery.js') }}"></script>
    <script src="{{ url('js/jquery-ui.min.js') }}"></script>

</head>

<body>

    @include('inc/navigation')

    <?php 
        $curPage = 'char';
        $charTexture = url('img/hex-bg-l.png');
        // $charTexture = url('img/mp-char/texture/'.$charname.'.jpg'); 
        $pageNotes = array (
            array('ord'=>'', 'n'=>"Game Stats",'v'=>"I have no idea why these people have stats."),
            array('ord'=>'', 'n'=>"Skillset",'v'=>"Skill sets seem reasonable, calculating damage and effect output of each is over-the-top ridiculous, however."),

            array('ord'=>'daud', 'n'=>"Quicksilver",'v'=>"More like a discount Flash. But with hair loss and cat allergy."),
            array('ord'=>'jeanne', 'n'=>"Joan is that you?",'v'=>"She's the Joan of Arc. Noah as well. Add in Siegfried to Valkyr's Brynhildr for good measure."),
            array('ord'=>'jeanne', 'n'=>"Naiademn",'v'=>"Everyone recognizes it, nobody knows what it is."),
            array('ord'=>'kalli', 'n'=>"Naiademn",'v'=>"Everyone recognizes it, nobody knows what it is."),
            array('ord'=>'kianna', 'n'=>"Let It Go",'v'=>"Nope. has a thing for keeping things concealed and not being felt."),
            array('ord'=>'maximus', 'n'=>"Old Self",'v'=>"The guy used to not be human, and then he became a non-stereotypical genius bully. Which is still close to being inhuman."),
            array('ord'=>'moon', 'n'=>"Natural Satellite",'v'=>"It's a really stupid name until you realize its connection. There isn't any. But we can still make stuff up."),
            array('ord'=>'seline', 'n'=>"Domination",'v'=>"Hey kid, are you interested in some form of pain and pleasure?"),
            array('ord'=>'valkyr', 'n'=>"Inception",'v'=>"\"Stop it, Val! Stop it! lol. It's too late anyway! haha.\" - says Jeanne as they reanact the Inception movie, or Joan of Arc, or Noah's Tale, or the Volsunga Saga."),
            array('ord'=>'vriskvin', 'n'=>"Naiademn",'v'=>"Everyone recognizes it, nobody knows what it is."),
            );
    ?>

    @yield('char-meta')

    <style type="text/css">
        /*.ad-dash { border-bottom: 50px solid {{ $charColor }}; }*/
        .char-logs.per li { border-left: 5px solid {{ $charColor }}; }
        .char-logs.per li:before { background: {{ $charColor }}; }

        .char-per p { border-bottom: 2px solid {{ $charColor }}; }
        .char-per i { color: {{ $charColorSub }} ;}
        .modal-header { padding-top: 30px; background-color: {{ $charColor }}; }
        .modal-footer { background-color: {{ $charColorSub }}; }
        .modal-footer .btn { background: {{ $charColor }}; color: white; }
        .bot-scro a { color: {{ $charColorSub }};}
        .bot-scro a.fir:hover, .bot-scro a.fir.active { background-color: {{ $charColor }}; color: white; transition: 0.3s; }
        .bot-scro a.mid:hover, .bot-scro a.mid.active { background-color: {{ $charColor }}; color: white; transition: 0.3s; } 
        .bot-scro a.las:hover, .bot-scro a.las.active { background-color: {{ $charColor }}; color: white; transition: 0.3s; }
        .notes ul li b { background: {{ $charColor }}; }

        .log-name { border-left: 1px solid rgba(0,0,0,0.3); }
        li:hover .log-name { border-left: 1px solid white; }

        @foreach ($mirChars as $char)
            <?php 
                $ctscharnamesub = substr($char['name'], 0, 1).'.'.substr($char['sur'], 0, 1);  
                $ctscharnameful = $char['name'].' '.$char['sur'];

                if($char['name']=='riza') {
                    $ctscharnamesub = '&lt;unknown&gt;';  
                    $ctscharnameful = '&lt;account not found in archives&gt;';
                }
            ?>
            .cts-{{ $char['name'] }}:after {
                content: "{{ $ctscharnamesub }}";
                text-transform: capitalize;
                font-weight: bold; }
            .cts-{{ $char['name'] }}:hover:after {
                content: "{{ $ctscharnameful }}";
                text-transform: capitalize;
                font-weight: bold; }
            <?php $ctscharcolor = $char['color']; if ($ctscharcolor=="") $ctscharcolor = "#d5d5d5"; ?>
            .cts-{{ $char['name'] }} i {
                position: static;
                font-size: 14px;
                margin: 0 3px;
                color: {{ $ctscharcolor }}; }

        @endforeach

        @foreach ($mirFrm as $frm)
            .cts-{{ $frm['name'] }}-frm:after {
                content: "{{ $frm['act'] }}";
                font-weight: bold; }
            @foreach ($mirChars as $char)
                @if ($frm['name']==$char['name'])  
                    <?php  
                        $ctscharnameful = $char['name'].' '.$char['sur'];
                        $ctscharcolor = $char['color']; if ($ctscharcolor=="") $ctscharcolor = "#d5d5d5"; 
                    ?>

                    .cts-{{ $char['name'] }}-frm:before {
                        content: "{{ $ctscharnameful }}";
                        position: absolute;
                        background: white;  
                        text-transform: capitalize;
                        font-weight: bold;
                        padding: 5px;     
                        opacity: 0;                   
                        transition: 0.5s; }
                    .cts-{{ $char['name'] }}-frm:hover:before {
                        opacity: 1;
                        margin-top: 20px;                      
                        box-shadow: 0 1px 3px rgba(0,0,0,0.3);
                        transition: 0.3s; }
                @endif
            @endforeach
            .cts-{{ $frm['name'] }}-frm i {
                position: static;
                font-size: 14px;
                margin: 0 3px;
                color: {{ $ctscharcolor }}; }
        @endforeach
    </style>

    @include('mp-inc/dash')

    <div class="col-sm-10 col-sm-offset-2" style="padding: 15px;"> 

        <style type="text/css">
            .char-back {
                display: none;
                position: absolute; top: -20px; left: -12%;
                width: calc(100% + 12%);
                height: 650px;
                z-index: 9;
        </style>

        <div class="row">
            <div class="col-sm-5">
                <div class="char-back" style="background-image: url('{{ url('img/mp-char/'.$charname.'.png') }}'); 
                    background-size: 100%; background-position: top center;"></div> 
                <!-- <img src="{{ url('img/mp-char/'.$charname.'.png') }}" width="120%" style="margin-top:-20px; margin-left:-12%;"> -->
            </div>
            <div class="col-sm-6 char-details" style="padding:0;">
                <div class="col-sm-12">
                    <span class="char-name">{{ $mcharNam }}</span>
                    <p>{{ $charthemes}}</p>
                </div>
                <div class="col-xs-6" style="padding:0;">
                    <div class="col-xs-12 char-per"><p><b>Character</b></p><i class="{{ $charIco }}" aria-hidden="true"></i>
                        <div class="col-xs-12">
                            <ul class="char-logs">
                                <!-- <li>Full Name: <b>{{ $mcharNam }}</b><span></li> -->
                                <li>Age: 
                                    <b>{{ round(((236*1.35)*(1699-$mcharAge))/365, 0) }} | {{ 1699-$mcharAge }} | {{ $mcharAge }}</b>
                                </li>
                                <!-- <li>Relatives: <b>{{ $mcharFam }}</b></li> -->
                                @if ($mcharDiv != '')
                                    <li>Home Division: 
                                        @if ($mcharDiv == 'Luminos')
                                            <img src="{{ url('img/lum.png') }}" width="30px">
                                        @elseif ($mcharDiv == 'Aeros')
                                            <img src="{{ url('img/aer.png') }}" width="30px">
                                        @elseif ($mcharDiv == 'Mystos')
                                            <img src="{{ url('img/mys.png') }}" width="30px">
                                        @elseif ($mcharDiv == 'Geios')
                                            <img src="{{ url('img/gei.png') }}" width="30px">
                                        @endif
                                        <b>{{ $mcharDiv }}</b>
                                    </li> <!-- Luminos | Aeros | Mystos | Geios -->
                                @endif
                                <li>Affiliation: <b>{{ $mcharAff }}</b></li>
                                <?php if(isset($mcharPos)) { ?><li>Current Rep: <b>{{ $mcharPos }}</b></li> <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 char-per"><p><b>Combat</b></p><i class="fa fa-gamepad" aria-hidden="true"></i>
                        <div class="col-xs-12">
                            <ul class="char-logs">
                                <li>Material Affinity: <b>{{ $mcharAft }}</b></li> <!-- Fire | Water | Air | Electricity | Etc... -->
                                <li>MM Style: <b>{{ $mcharSty }}</b></li> <!-- Armagi | Exnihille | Maximo | Cirkunesi -->
                                <li>Weapon: <b>{{ $mcharWoc }}</b></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 char-per"><p><b>CTs Logs</b></p><i class="fa fa-inbox" aria-hidden="true"></i>
                        <div class="col-xs-12">
                            <ul class="char-logs per">
                                <?php $ctsnum = 1; ?>
                                @foreach ($mirLogs as $logs)
                                    @if ($logs['ord']==$charname)
                                        <?php 
                                            $datatar = strtolower($logs['name']);
                                            $datatar = str_replace(" ","-",$datatar);
                                            $datatar = str_replace(",","",$datatar);
                                            $datatar = str_replace("'","",$datatar);
                                            $datatar = str_replace("!","",$datatar);
                                            $datatar = str_replace("?","",$datatar);
                                        ?>

                                        <a href="" type="button" id="cts-{{ $logs['logn'] }}" data-toggle="modal" data-target="#{{ $datatar }}"><li>
                                            <span class="col-xs-2" style="padding: 0;">{{ $logs['y'] }}</span>
                                            <b class="col-xs-9 log-name">{{ $logs['name'] }}</b>
                                            <span class="col-xs-1" style="padding: 0;">
                                                {{ round(((236*1.35)*($logs['y']-$mcharAge))/365, 0) }}</span>
                                        </li></a>

                                        @include("mp-chars/cts-files/{$datatar}")
                                        <?php $ctsnum++; ?>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @include('mp-inc/stats')
            </div>
        </div>
        </div>

        <div class="clear"></div>

        <div class="col-xs-12">
            <div style="padding: 5px; margin-bottom: 5px; color: white;
                background: {{ $charColor }};
                background: -moz-linear-gradient(left, {{ $charColor }} 0%, {{ $charColorSub }} 100%);
                background: -webkit-linear-gradient(left, {{ $charColor }} 0%, {{ $charColorSub }} 100%);
                background: linear-gradient(to right, {{ $charColor }} 0%, {{ $charColorSub }} 100%); 
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='{{ $charColor }}', endColorstr=' {{ $charColorSub }}',GradientType=1 );"> <center>{{ $charColor }} | <b>COLOR</b> SCHEME | {{ $charColorSub }}</center>
            </div>
        </div>

        @include('mp-inc/skills')
        
        <div class="clear"></div><br><br>
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

    @if(isset($_GET['cts']))
        <?php echo '<input id="ctslog-id" value="'.$_GET['cts'].'">' ?>
        <script>
            $(document).ready(function() {
                var ctsid = $("#ctslog-id").val();
                var ctsname = $("#cts-"+ctsid).data("target");
                $(ctsname).modal('show');
            });
        </script>
    @endif

    <script type="text/javascript">
        $(document).ready(function() {
            var mirChars = <?php echo json_encode($mirChars); ?>;
            var mirFrm = <?php echo json_encode($mirFrm); ?>;

            for (i=0; i<mirChars.length; i++) {
                var charico = mirChars[i]['ico'];
                if (charico=="") charico = "fa fa-user";

                $( '.cts-'+mirChars[i]['name'] ).append( "<i class='" + charico + "'></i>" );
                // $( '.cts-'+mirChars[i]['name']+'-frm' ).append( "<i class='" + charico + "'></i>" );
            }
            // alert(mirFrm.length);
            for (i=0; i<mirFrm.length; i++) {
                var found=false;
                var charico = '';
                var frmname = mirFrm[i]['name']; 
                for (j=0; j<mirChars.length; j++) {
                    // console.log(mirChars[j]['name'] + " - " + frmname);
                    if (mirChars[j]['name']==frmname) {
                        charico = mirChars[j]['ico'];
                        if (charico=="") charico = "fa fa-user";

                        $( '.cts-'+mirChars[j]['name']+'-frm' ).append( "<i class='" + charico + "'></i>" );
                        found=true;
                        j = mirChars.length;
                    } 
                }
                if (!found) {
                    charico = "fa fa-user";
                    $( '.cts-'+frmname+'-frm' ).append( "<i class='" + charico + "'></i>" );
                    // console.log('nope' + frmname);
                }
            }

            var imgHeight = $('.char-details').height() + 15;
            $('.char-back').css('height', imgHeight+"px");
            $('.char-back').slideDown();
            console.log(imgHeight);


            // $('img[src="http://localhost:8000/img/mp-char/skills/valkyr/pri.png"]').hide();
        });
    </script>

    <script type="text/javascript"> 
        var charname = <?php echo json_encode($charname); ?>;
        var pageNotes = <?php echo json_encode($pageNotes); ?>;
    </script>

</body>

</html>