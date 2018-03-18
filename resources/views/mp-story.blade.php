@extends('templates.mp-main')

<!-- METAS -->
@section('title') Mirrorplane @stop

@section('meta')
    <?php
        $charname = '';
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
            array('name'=>'Shorts',
                'color'=>'grey',
                'chapters'=>array(
                    array('name'=>'The Sun'),
                    array('name'=>'The Moon'),
                    array('name'=>'The Stars'),
                ),
            ),
            array('name'=>'Geios',
                'color'=>'#8bc34a',
                'chapters'=>array(
                    array('name'=>'Enter Light'),
                    array('name'=>'Back to Business'),
                    array('name'=>' 3'),
                    array('name'=>'The Mission'),
                    array('name'=>'Fire Against Fire'),
                    array('name'=>' 6'),
                    array('name'=>' 7'),
                    array('name'=>'United We Stand'),
                ),
            ),
            array('name'=>'Mystos',
                'color'=>'#2196f3',
                'chapters'=>array(
                    array('name'=>' 1'),
                    array('name'=>' 2'),
                    array('name'=>' 3'),
                    array('name'=>' 4'),
                    array('name'=>' 5'),
                    array('name'=>' 6'),
                    array('name'=>' 7'),
                    array('name'=>' 8'),
                ),
            ),
            array('name'=>'Aeros',
                'color'=>'#e91e63',
                'chapters'=>array(
                    array('name'=>' 1'),
                    array('name'=>' 2'),
                    array('name'=>' 3'),
                    array('name'=>' 4'),
                    array('name'=>' 5'),
                    array('name'=>' 6'),
                    array('name'=>' 7'),
                    array('name'=>' 8'),
                ),
            ),
            array('name'=>'Luminos',
                'color'=>'#ff9800',
                'chapters'=>array(
                    array('name'=>' 1'),
                    array('name'=>' 2'),
                    array('name'=>' 3'),
                    array('name'=>' 4'),
                    array('name'=>' 5'),
                    array('name'=>' 6'),
                    array('name'=>' 7'),
                    array('name'=>' 8'),
                ),
            ),
            array('name'=>'Nimbocolumbus',
                'color'=>'#333333',
                'chapters'=>array(
                    array('name'=>' 1'),
                    array('name'=>' 2'),
                    array('name'=>' 3'),
                    array('name'=>' 4'),
                    array('name'=>' 5'),
                    array('name'=>' 6'),
                    array('name'=>' 7'),
                    array('name'=>' 8'),
                ),
            ),
            array('name'=>'Mirrorplane',
                'color'=>'#18FF81',
                'chapters'=>array(
                    array('name'=>' 1'),
                    array('name'=>' 2'),
                    array('name'=>' 3'),
                    array('name'=>' 4'),
                    array('name'=>' 5'),
                    array('name'=>' 6'),
                    array('name'=>' 7'),
                    array('name'=>' 8'),
                ),
            ),
        );
    ?>
@stop

@section('main')
    
    <style type="text/css">
        .story-characters {
            position: fixed; top: 50px; left: 0;
            width: 83.33333333%;
            background-color: #eee;
            z-index: 999; }
            .story-characters .char-group {
                float: left;
                width: 100%;
                background-color: grey;
                border-bottom: 1px solid white;
                transition: 0.3s; }
                .story-characters .cgroup {
                    float: left;
                    color: white;
                    font-size: 10px;
                    font-weight: bold;
                    padding: 5px 10px;
                    text-transform: uppercase;
                    cursor: pointer;
                    transition: 0.3s; }
                    .story-characters .cgroup.off {
                        background-color: #eee;
                        color: #333;
                        transition: 0.3s; }
        .story-characters .title {
            float: left;
            font-family: "Righteous";
            font-weight: bold;
            text-transform: uppercase;
            padding: 5px 15px; }
        .story-characters .characters {
            float: left;
            height: 30px;
            background-color: grey; }
            .story-characters .characters .group {
                 float: left;
                 border-right: 10px solid grey }
                .story-characters .characters .char {
                    float: left;
                    color: #d5d5d5;
                    background-color: white;
                    width: 30px;
                    height: 30px;
                    font-size: 20px;
                    text-align: center;
                    padding: 4px 0;
                    border-right: 1px solid white; }

        @foreach ($mirChars as $char)
            <?php if($char['color']=='') { $char['color']='white'; $char['subcolor']='#d5d5d5'; } ?>
            .story-characters .characters .char.{{$char['name']}} {
                color: {{ $char['subcolor'] }};
                background-color: {{ $char['color'] }} }
        @endforeach

        .story-volumes { 
            float: left;
            padding: 55px 0 30px; }
        .story-volumes .volume {
            float: left;
            position: relative;
            width: 2000px; }
            .story-volumes .volume .title {
                position: absolute; bottom: -8px; left: 0;
                color: white;
                font-family: "Righteous";
                font-weight: bold;
                text-transform: uppercase;
                margin: 0 5px;
                transform: rotate(-90deg);
                transform-origin: 0 0; }
            .story-volumes .volume-story {
                float: left;
                width: calc(100%);
                margin: 0 0 0 30px;
                background-color: rgba(255,255,255,0.5) }
                .story-volumes .volume-story .volume-chapter {
                    float: left;
                    width: 100%;
                    border-bottom: 1px solid rgba(0,0,0,0.3); }
                    .story-volumes .volume-story .volume-chapter .subtitle {
                        float: left;
                        height: 29px;
                        color: white;
                        background-color: rgba(0,0,0,0.3);                        
                        font-size: 12px;
                        padding: 5px 15px; }
                    .story-volumes .volume-story .volume-chapter .chapter-story {
                        float: left;
                        width: calc(100%); }
                        .story-volumes .volume-story .volume-chapter .chapter-story .group {
                                 float: left;
                                 border-right: 10px solid grey }
                            .story-volumes .volume-story .volume-chapter .chapter-story .point {
                                float: left;
                                width: 30px;
                                height: 30px;
                                color: rgba(0,0,0,0.1);
                                text-align: center;
                                border-right: 1px solid white;
                                padding: 5px 0; }
                            .story-volumes .volume-story .volume-chapter .chapter-story .point.active {
                                position: relative;
                                background-color: rgba(255,255,255,0.7);
                                cursor: pointer;
                                transition: 0.3s; }
                                .story-volumes .volume-story .volume-chapter .chapter-story .point.active.open {
                                    transition: 0.3s; }
                                .story-volumes .volume-story .volume-chapter .chapter-story .point.active .desc {
                                    display: none;
                                    position: absolute; top: 30px; left: 0;
                                    width: 200px;
                                    color: #333;
                                    background-color: white;
                                    font-size: 12px;
                                    text-align: left;
                                    padding: 5px;
                                    box-shadow: 0 3px 3px rgba(0,0,0,0.3);
                                    z-index: 999; }

        @foreach($mirVols as $key => $volume)
            .story-volumes .volume.{{ $volume['name'] }} {
                background-color: {{ $volume['color'] }} }
        @endforeach

        @foreach ($mirChars as $char)
            <?php if($char['color']=='') { $char['color']='#d5d5d5'; $char['subcolor']='#d5d5d5'; } ?>
            .story-volumes .volume-story .volume-chapter .chapter-story .point.{{$char['name']}}.active {
                color: {{ $char['subcolor'] }}; }
            .story-volumes .volume-story .volume-chapter .chapter-story .point.{{$char['name']}}.active.open {
                color: white;
                background-color: {{ $char['color'] }}; }
            .story-volumes .volume-story .volume-chapter .chapter-story .point.{{$char['name']}}.active .desc {
                border-bottom: 5px solid {{ $char['color'] }}; }
        @endforeach

        .group-hide {
            position: relative;
            width: 40px; height: 30px;
            overflow: hidden;
            transition: 0.3s; }

        .editor {
            position: fixed; bottom: 0; left: 16.66666667%;
            width: 500px;
            height: 150px;
            font-family: "Open Sans";
            font-size: 12px;
            padding: 15px;
            z-index: 999; }
    </style>

    <div class="story-characters">
        <div class="char-group">
            @foreach ($mirStoryArg as $arg)
                <div class="cgroup" onclick="hideGroup(this, '{{ $arg['id'] }}')"> {{ $arg['name'] }} </div>
            @endforeach
        </div>
        <div class="title">Characters</div>
        <div class="characters">
            @foreach ($mirStoryArg as $arg)
                <div class="group g-{{ $arg['id'] }}">
                    @foreach ($arg['mem'] as $a)
                        @foreach ($mirChars as $char)
                            @if ($char['name'] == $a)
                                <?php 
                                    $charlink = strtolower($char['name']);
                                    if ($char['name']=='moon') $charlink = 'djerick';
                                ?>
                                <a href="/mirrorplane/profile/{{$charlink}}">
                                    <i class="char {{ $char['name'] }} {{ $char['ico'] }}"></i>
                                </a>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    <div class="story-volumes">
        <?php $volEditor = array(); ?>

        @foreach($mirVols as $vol => $volume)
            <div class="volume {{$volume['name']}}">
                @if($vol == 0) <div class="title">{{ $volume['name'] }}</div>
                @else <div class="title">Volume {{ $vol }}: {{ $volume['name'] }}</div>
                @endif

                <div class="volume-story">

                    @foreach($volume['chapters'] as $chap => $chapter)
                        <div class="volume-chapter">
                            <div class="subtitle"> {{ $chap+1 }} | <b>{{ $chapter['name'] }}</b> </div>
                            <div class="chapter-story">

                                <!-- CHARACTERS -->
                                @foreach ($mirStoryArg as $arg)
                                    <div class="group g-{{ $arg['id'] }}">

                                        @foreach ($arg['mem'] as $a)
                                            @foreach ($mirChars as $char)

                                                @if ($char['name'] == $a)

                                                    <?php 
                                                        $charlink = strtolower($char['name']);
                                                        if ($char['name']=='moon') $charlink = 'djerick';

                                                        $hasStory = "";
                                                        foreach ($mirStory as $story) :
                                                            if ( $story['char']==$char['name']  && $story['vol']==$vol && $story['chap']==$chap+1 ) : 
                                                                $hasStory = $story['desc']; break;
                                                            else : $hasStory = "";
                                                            endif;
                                                        endforeach;

                                                        $forEditId = $char['name'].$vol.$chap;
                                                        $forEditDesc = "";
                                                        if($hasStory!="") $forEditDesc = $story['desc'];
                                                        $forEdit = array( 'id'=>$forEditId, 
                                                            'details'=>array( 'char'=>$char['name'], 'vol'=>$vol, 'chap'=>$chap+1, 'desc'=>$forEditDesc));
                                                        array_push($volEditor, $forEdit);
                                                    ?>

                                                    @if($hasStory!="") 
                                                        <div class="point {{ $char['name'] }} active" onclick="callEditor( '{{ $forEditId }}' )">
                                                            <i class="{{ $char['ico'] }}"></i>
                                                            <div class="desc"> {{ $story['desc'] }} </div>
                                                        </div>
                                                    @else 
                                                        <div class="point {{ $char['name'] }}" onclick="callEditor( '{{ $forEditId }}' )">
                                                            <i class="{{ $char['ico'] }}"></i>
                                                        </div>
                                                    @endif
                                                @endif

                                            @endforeach
                                        @endforeach

                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        @endforeach
    </div>

    <textarea class="editor">Junkie Editor</textarea>

    <div class="col-xs-12" style="padding: 0;">
        @include('mp-inc/char-sel')
    </div>


    <!-- <div class="story-next">
        NEXT
    </div> -->

    <script type="text/javascript">
        var volEditor = <?= json_encode($volEditor) ?>;

        $(window).on('load', function() {
            var charGroup = [];
            $('.story-characters .group').each(function() {
                charGroup.push($(this));
            });
            var storyGroup = [];
            $('.chapter-story .group').each(function() {
                storyGroup.push($(this));
            });

            var colDiv = $('.ad-dash-pa').width() + 20;
            $('.story-characters').width( 2000 - colDiv );
            $('.story-characters').css('left', colDiv);

            
            var chapTitleWidth = getMaxWidth('.story-volumes .volume-chapter .subtitle', 30);
            $('.story-volumes .volume-chapter .chapter-story').css('width', 'calc(100% - '+chapTitleWidth+'px)');
            $('.story-characters .title').css('width', chapTitleWidth + 30);
            $('.story-characters .characters').css('width', 'calc(100% - '+chapTitleWidth+'px - 30px)');

            $('.story-volumes .volume-story .volume-chapter .chapter-story .point.active').on('click', function() {
                if($(this).hasClass('open') == false) $(this).addClass('open');
                else $(this).removeClass('open');

                $('.desc', this).slideToggle('fast');
            })

            $('.story-next').on('click', function() {
                for(var i=0; i<3; i++) {
                    charGroup[i].hide();
                    storyGroup[i].hide();
                }
            });

        });

        function hideGroup(el, group) {
            if( $(el).hasClass('off') == false ) {
                $(el).addClass('off');
                $('.group.g-' + group).addClass('group-hide');
                // $('.group.g-' + group).fadeOut('fast');
            } else {
                $(el).removeClass('off');
                $('.group.g-' + group).removeClass('group-hide');
                // $('.group.g-' + group).fadeIn('fast');
            }
        }

        function callEditor(id) {
            for(var i=0; i<volEditor.length; i++) {
                if(volEditor[i]['id'] == id) {
                    var edit = "array (";
                        edit += "'char'=>'" + volEditor[i]['details']['char'] + "', ";
                        edit += "'vol'=>'" + volEditor[i]['details']['vol']+ "', ";
                        edit += "'chap'=>'" + volEditor[i]['details']['chap'] + "',\n";
                        edit += "'desc'=>'" + volEditor[i]['details']['desc'] + "'";
                    edit += "),";
                }
            }

            $('textarea.editor').val(edit);
        }

        function getMaxWidth(el, add) {
            var elementHeights = $(el).map(function() { return $(this).width(); });
            var maxHeight = Math.max.apply(null, elementHeights);
            $(el).css("width", maxHeight + add)
            return maxHeight + add;
        } 
        function getMaxHeight(el, add) {
            var elementHeights = $(el).map(function() { return $(this).height(); });
            var maxHeight = Math.max.apply(null, elementHeights);
            $(el).css("height", maxHeight + add)
            return maxHeight + add;
        }
    </script>

@stop 