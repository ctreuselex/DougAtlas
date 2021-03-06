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
    <link href="{{ url('css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('css/modern-business.css') }}" rel="stylesheet">
    <link href="{{ url('css/pie-graph.css') }}" rel="stylesheet">
    <link href="{{ url('css/doug-atlas.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.5/css/swiper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.5/css/swiper.min.css">

    <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('css/rpg-awesome.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{ url('js/jquery.js') }}"></script>
    <script src="{{ url('js/jquery-ui.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.5/js/swiper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.5/js/swiper.min.js"></script>

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

        .char-per p { border-bottom: 2px solid {{ $charColorSub }}; }
        .char-per i { color: {{ $charColorSub }} ;}
        .modal-header { padding-top: 30px; background-color: {{ $charColor }}; }
        .modal-footer { background-color: {{ $charColorSub }}; }
        .modal-footer .btn { background: {{ $charColor }}; color: white; }
        .bot-scro a { color: {{ $charColorSub }};}
        .bot-scro a.fir:hover, .bot-scro a.fir.active { background-color: {{ $charColor }}; color: white; transition: 0.3s; }
        .bot-scro a.mid:hover, .bot-scro a.mid.active { background-color: {{ $charColor }}; color: white; transition: 0.3s; } 
        .bot-scro a.las:hover, .bot-scro a.las.active { background-color: {{ $charColor }}; color: white; transition: 0.3s; }
        .notes ul li b { background: {{ $charColor }}; }


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

    <div class="col-sm-10 col-sm-offset-2" style="padding: 0;">

        @include("mp-inc/char-head")

        <div style="padding: 5px; margin-bottom: 5px; color: white;
            background: {{ $charColor }};
            background: -moz-linear-gradient(left, {{ $charColor }} 0%, {{ $charColorSub }} 100%);
            background: -webkit-linear-gradient(left, {{ $charColor }} 0%, {{ $charColorSub }} 100%);
            background: linear-gradient(to right, {{ $charColor }} 0%, {{ $charColorSub }} 100%);"> <center>{{ $charColor }} | <b>COLOR</b> SCHEME | {{ $charColorSub }}</center>
        </div>

        <div style="display: inline-block; padding: 15px;">
            @include('mp-inc/skills')
        </div>

        @include('mp-inc/char-sel')

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
                @include("mp-chars/cts-files/{$datatar}")
            @endif
        @endforeach
    </div>

    @include('mp-inc/foot')

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('js/bootstrap.js') }}"></script>

    <!-- CUSTOM Script-->
    <script src="{{ url('js/doug-atlas.js') }}"></script>
    <script src="{{ url('js/pie-graph.js') }}"></script>

    @if(isset($_GET['cts']))
        <?php echo '<input id="ctslog-id" value="'.$_GET['cts'].'">' ?>
        <script>
            $(document).ready(function() {
                var ctsid = $("#ctslog-id").val();
                var ctsname = $("#cts-"+ctsid).data("target");
                $(ctsname).modal('show');

                setTimeout(function() {
                    $('.modal-backdrop').append('<div class="diamond"></div>');
                    $('.modal-backdrop').append('<div class="diamond-border"></div>');
                },500);
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