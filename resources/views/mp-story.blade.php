@extends('templates.mp-main')

<!-- METAS -->
@section('title') Mirrorplane @stop

@section('meta')
    <?php
        $curPage = 'home';
        $charColor = '#18FF81';
        $charColorSub = '#009688';
        $charTexture = url('img/hex-bg-l.png'); 
        $cityname = 'Mirrorplane';

        $pageNotes = array (
            array('ord'=>'', 'n'=>"How It Works",'v'=>"The story is divided into the four divisions of Mirrorplane, each having 8 chapters which tackles the division's story, along with the main story and other minor stories the main characters passes through."),
            array('ord'=>'', 'n'=>"So What Story Now?",'v'=>"Having an over-arching story regarding the \"Weaver\". Division stories, which gives personality to each characters along with the organization they're supporting. And minor stories, that may be for a single character, or two, or three, or more if it pleases."),
            );

        $mirVols = array(
            array('id'=>"0", 'name'=>"Shorts", "chaps"=>array(
                array('title'=>"The Sun", 'img'=>"",
                    'chars'=>'valkyr,noemi,zedrik'), 
                array('title'=>"The Moon", 'img'=>"https://orig00.deviantart.net/bf3a/f/2017/234/8/9/down_to_the_bottom_by_ctreuse109-dbcv7zs.png",
                    'chars'=>'maximus,vriskvin,moon'), 
                array('title'=>"The Stars", 'img'=>"https://orig00.deviantart.net/c908/f/2017/234/5/f/shot_in_the_dark_by_ctreuse109-dbcg3rb.png",
                    'chars'=>'herschel,rigel,kalli,gemini'), 
                )),
            array('id'=>"1", 'name'=>"Geios", "chaps"=>array(
                array('title'=>"Intro", 'img'=>"",
                    'chars'=>''), 
                array('title'=>"Intro 2", 'img'=>"",
                    'chars'=>''), 
                )),
            array('id'=>"2", 'name'=>"Mystos", "chaps"=>array(
                array('title'=>"Intro", 'img'=>"",
                    'chars'=>''), 
                array('title'=>"Intro 2", 'img'=>"",
                    'chars'=>''), 
                )),
            array('id'=>"3", 'name'=>"Aeros", "chaps"=>array(
                array('title'=>"Intro", 'img'=>"",
                    'chars'=>''), 
                array('title'=>"Intro 2", 'img'=>"",
                    'chars'=>''), 
                )),
            array('id'=>"4", 'name'=>"Luminos", "chaps"=>array(
                array('title'=>"Intro", 'img'=>"",
                    'chars'=>''), 
                array('title'=>"Intro 2", 'img'=>"",
                    'chars'=>''), 
                )),
            array('id'=>"5", 'name'=>"Nimbocolumbus", "chaps"=>array(
                array('title'=>"Intro", 'img'=>"",
                    'chars'=>''), 
                array('title'=>"Intro 2", 'img'=>"",
                    'chars'=>''), 
                )),
            array('id'=>"6", 'name'=>"Mirrorplane", "chaps"=>array(
                array('title'=>"Intro", 'img'=>"",
                    'chars'=>''), 
                array('title'=>"Intro 2", 'img'=>"",
                    'chars'=>''), 
                )),
            );
    ?>
@stop

@section('main')
    
    <style type="text/css"> 
        .chap-div {
            float: left;
            width: 100%; }
        .feat-char.drop { margin-top:20px; }
        .feat-char hr { margin:5px 0; }
        .feat-char b { margin-bottom:10px; }
        .feat-char p { margin:0; }
        .story-div {
            margin-bottom: 20px; }
        ul.story-div { padding: 0; }
        ul.story-div li {
            box-shadow: 0 0 0;
            padding: 0;
            margin-bottom: 0; }

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
            background: {{ $charColor }};
            color: white; }

        @keyframes prevvol {
            0% { left: 15px; opacity: 1; }
            100% { left: 100%; opacity: 0; } }
        @keyframes nextvol {
            50% { left: -100%; opacity: 0; }
            100% { left: 15px; opacity: 1; } }

        /*.mp-cont li.vol-cont { display: none; }*/
        .mp-cont li.vol-cont { 
            position: absolute; top: 75px; left: 15px; 
            width: calc(100% - 30px);
            background-color: transparent;
            padding: 0;
            box-shadow: 0 0 0 transparent; 
            z-index: -1;
            opacity: 0; }
        .mp-cont li.vol-cont.prevvol { animation: prevvol 0.5s 1; animation-fill-mode:forwards;  }
        .mp-cont li.vol-cont.nextvol { animation: nextvol 1s 1; animation-fill-mode:forwards; }

        .mp-cont li.vol-cont .story {    
            float: left;
            width: 65%; }
        .mp-cont li.vol-cont .plot {    
            float: left;
            width: calc(35% - 5px);
            background-color: white;
            padding: 20px;
            margin-left: 5px;
            box-shadow: 1px 1px 0 #DDD, 2px 2px 0 #BBB; }

        .mp-cont li.vol-cont .point {
            float: left; width: 100%;
            background-color: white;
            padding: 15px;
            margin-bottom: 1px;
            box-shadow: 1px 1px 0 #DDD, 2px 2px 0 #BBB;  }
        .mp-cont li.vol-cont .title {
            font-family: "Righteous";
            font-size: 24px;
            font-weight: bold; }
        .mp-cont li.vol-cont .img {
            float: right;
            width: 250px; height: 250px;
            background-color: grey;
            margin-left: 15px; }
        .mp-cont li.vol-cont .chars {
            float: right;
            margin-top: -25px; }
        .mp-cont li.vol-cont hr {
            margin: 0 0 15px; }

        .point ul {
            padding: 0; }
        .point li {
            display: block;
            padding: 0;
            box-shadow: 0 0 0; }
    </style>

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
                <div class="story">
                @foreach($vol['chaps'] as $key => $chap)
                    <?php $tempkey = $key+1; ?>
                    <div class="point">
                        <div class="img" style="background-image: url('{{ $chap['img'] }}'); 
                            background-size: cover; background-position: center;"></div>
                        <div class="title">{{ $chap['title'] }}</div>
                        <div class="chars">
                            <?php $chars = explode(',', $chap['chars']); ?>
                            @foreach($chars as $char)
                                @if($char!='hr')<span class="cts-{{$char}}"></span>
                                @else |
                                @endif 
                            @endforeach</div>
                            <hr>
                            @include("mp-vols/{$vol['id']}/chap{$tempkey}")
                    </div>
                @endforeach
                </div>
                <div class="plot">
                    
                </div>
            </li>
        @endforeach
    </ul>

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
                $('.vol-cont.'+id).show();

                setTimeout(function () {
                    $('.vol-cont').not('.nextvol').hide();
                }, 1000);
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

@stop 