<?php
    $mirVols = array(
        array('id'=>"0", 'name'=>"Shorts", "chap"=>3 ),
        array('id'=>"1", 'name'=>"Geios", "chap"=>2 ),
        array('id'=>"2", 'name'=>"Mystos", "chap"=>2 ),
        array('id'=>"3", 'name'=>"Aeros", "chap"=>0 ),
        array('id'=>"4", 'name'=>"Luminos", "chap"=>0 ),
        array('id'=>"5", 'name'=>"Nimbocolumbus", "chap"=>0 ),
        array('id'=>"6", 'name'=>"Mirrorplane", "chap"=>0 ),
        );

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mirrorplane | The Story</title>
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
        $curPage = 'home';
        $charColor = '#18FF81';
        $charColorSub = '#AAAAAA';
        $charTexture = url('img/hex-bg-l.png'); 
        $cityname = 'Mirrorplane';

        $pageNotes = array (
            array('ord'=>'', 'n'=>"How It Works",'v'=>"The story is divided into the four divisions of Mirrorplane, each having 8 chapters which tackles the division's story, along with the main story and other minor stories the main characters passes through."),
            array('ord'=>'', 'n'=>"So What Story Now?",'v'=>"Having an over-arching story regarding the \"Weaver\". Division stories, which gives personality to each characters along with the organization they're supporting. And minor stories, that may be for a single character, or two, or three, or more if it pleases."),
            );
    ?>

    <style type="text/css">
        .ad-dash { border-bottom: 50px solid {{ $charColor }}; }
        .bot-scro a.fir:hover, .bot-scro a.fir.active { background-color: {{ $charColor }}; color: white; transition: 0.3s; }
        .bot-scro a.mid:hover, .bot-scro a.mid.active { background-color: {{ $charColor }}; color: white; transition: 0.3s; } 
        .bot-scro a.las:hover, .bot-scro a.las.active { background-color: {{ $charColor }}; color: white; transition: 0.3s; }
        .notes ul li b { background: {{ $charColor }}; }
        
        .mp-cont-char {
            padding: 0;
        }
        .mp-cont-char li {
            padding: 5px;
            margin-bottom: 1px;
        }
        .mp-cont-char li.no-hvr {
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

        .chap-div {
            float: left;
            width: 100%;
        }
        /*.feat-char {
            float: right;
            width: 210px;
            padding: 10px 20px;
        }*/
        .feat-char.drop { margin-top:20px; }
        .feat-char hr { margin:5px 0; }
        .feat-char b { margin-bottom:10px; }
        .feat-char p { margin:0; }
        .story-div {
            /*width: calc(100% - 210px);*/
            margin-bottom: 20px;
        }
        ul.story-div { padding: 0; }
        ul.story-div li {
            box-shadow: 0 0 0;
            padding: 0;
            margin-bottom: 0;
        }

        @foreach ($mirChars as $char)
            <?php 
                $ctscharnameful = $char['name'].' '.$char['sur'];
            ?>
            .cts-{{ $char['name'] }}:before {
                content: "{{ $ctscharnameful }}";
                position: absolute;
                background: white;  
                text-transform: capitalize;
                font-weight: bold;
                padding: 5px;     
                opacity: 0;                   
                transition: 0.5s;
            }
            .cts-{{ $char['name'] }}:hover:before {
                opacity: 1;
                margin-top: 20px;                      
                box-shadow: 0 1px 3px rgba(0,0,0,0.3);
                transition: 0.3s;
            }

            <?php 
                $ctscharcolor = $char['color']; if ($ctscharcolor=="") $ctscharcolor = "#ffffff"; 
                $ctssubcharcolor = $char['subcolor']; if ($ctssubcharcolor=="") $ctssubcharcolor = "#d5d5d5";
            ?>
            .cts-{{ $char['name'] }} i {
                position: static;
                font-size: 16px;
                color: {{ $ctscharcolor }};
                background: {{ $ctssubcharcolor }};
                padding: 2px;
                border-radius: 2px;
            }
            .cts-team i.{{ $char['name'] }} {
                position: static;
                font-size: 16px;
                margin-left: 3px;
                color: {{ $ctscharcolor }};
            }

        @endforeach

    .tab-volcont {
        /* display: block; */
        float: left;
        width: calc(100%); }

    .tab-vol {
        float: left;
        width: calc(100% / 7);
        background: rgba(255,255,255,0.5);
	    text-align: center;
    	line-height: 1.2;
        padding: 10px 5px;
        margin-bottom: 2px;
        cursor: pointer;
        transition: 0.3s; }
    .tab-vol b {
	    font-family: "Righteous";
	    font-size: 16px;
	    font-weight: bold; }
    .tab-vol:hover {
        background: white;
        transition: 0.3s; }
    .tab-vol.active {
        background: white; }

    @keyframes prevvol {
    	0% { top: 75px; opacity: 1; }
    	100% { top: 100%; opacity: 0; } }
    @keyframes nextvol {
    	50% { left: -100%; opacity: 0; }
    	100% { left: 15px; opacity: 1; } }

    /*.mp-cont li.vol-cont { display: none; }*/
    .mp-cont li.vol-cont { position: absolute; top: 75px; left: 15px; 
    	width: calc(100% - 30px);
    	z-index: -1;
    	opacity: 0; }
    .mp-cont li.vol-cont.prevvol { animation: prevvol 0.5s 1; animation-fill-mode:forwards;  }
    .mp-cont li.vol-cont.nextvol { animation: nextvol 1s 1; animation-fill-mode:forwards; }

    </style>

    @include('mp-inc/dash')

    <div class="col-sm-10 col-sm-offset-2" style="padding: 15px;">
        
		<?php $volcount = 0; $isActive=""; ?>
		<div class="tab-volcont">
		    @foreach($mirVols as $vol)
		        <?php 
		            if($volcount==0) $isActive = "active";
		            else $isActive = "";
		            $volcount++;
		     
		            $volid = $vol['id'];
		            $volname = $vol['name']; ?>        
	                <div class="tab-vol {{ $isActive }}" onclick="orgChange(this, '{{ $volid }}')">
		                @if($volid!='0') Volume {{ $volid }} @endif
		                <br>
		                <b>{{ $volname }}</b>
	                </div>
		    @endforeach
		</div>

		<?php $volcount = 0; $isActive=""; ?>
		<ul class="mp-cont" style="overflow: hidden;">
		    @foreach($mirVols as $vol)
		        <?php 
		            if($volcount==0) $isActive = "nextvol";
		            else $isActive = "";
		            $volcount++; ?> 
			    <li class="vol-cont {{ $vol['id'] }} {{ $isActive }}">
			    	@for($i=1; $i<=$vol['chap']; $i++)
                        @include("mp-vols/{$vol['id']}/chap{$i}")
			    	@endfor
			    </li>
		    @endforeach
		</ul>
        
    </div>
    <div class="clear"></div><br><br>

    @include('mp-inc/foot')


	<!-- jQuery -->
    <script src="{{ url('js/jquery.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('js/bootstrap.min.js') }}"></script>

    <!-- CUSTOM Script-->
    <script src="{{ url('js/doug-atlas.js') }}"></script>
    <script src="{{ url('js/pie-graph.js') }}"></script>

	<script type="text/javascript"> var mirVols = <?php echo json_encode($mirVols); ?>;</script>
	<script type="text/javascript">
	    function orgChange(ele, id) {
	        if(!$(ele).hasClass('active')){
                $('.tab-vol').removeClass('active');
                $(ele).addClass('active');

	            $('.vol-cont').removeClass('prevvol');
	            $('.vol-cont.nextvol').addClass('prevvol');

                $('.vol-cont').removeClass('nextvol');
                $('.vol-cont.'+id).removeClass('prevvol');
                $('.vol-cont.'+id).addClass('nextvol');

	        }
	    }

        $(document).ready(function() {
            var mirChars = <?php echo json_encode($mirChars); ?>;

            for (i=0; i<mirChars.length; i++) {
                var charico = mirChars[i]['ico'];
                if (charico=="") charico = "fa fa-user";

                $( '.cts-'+mirChars[i]['name'] ).append( "<i class='" + charico + "'></i>");
            }
        });
    </script>

    <script type="text/javascript"> var pageNotes = <?php echo json_encode($pageNotes); ?>;</script>

</body>

</html>
