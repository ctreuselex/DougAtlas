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
                    array('name'=>'Arms Race'),
                    array('name'=>'The Mission'),
                    array('name'=>'From The Rich'),
                    array('name'=>'Fire Against Fire'),
                    array('name'=>'Cinders of Innovation'),
                    array('name'=>'Divided We Fall'),
                    array('name'=>' 9'),
                    array('name'=>' 10'),
                    array('name'=>' 11'),
                    array('name'=>'United We Stand'),
                ),
            ),
            array('name'=>'Mystos',
                'color'=>'#2196f3',
                'chapters'=>array(
                    array('name'=>'Dark Nights'),
                    array('name'=>'Acquaintances'),
                    array('name'=>'Children of Mandalas'),
                    array('name'=>' 4'),
                    array('name'=>' 5'),
                    array('name'=>' 6'),
                    array('name'=>' 7'),
                    array('name'=>' 8'),
                    array('name'=>' 9'),
                    array('name'=>' 10'),
                    array('name'=>' 11'),
                    array('name'=>' 12'),
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
                    array('name'=>' 9'),
                    array('name'=>' 10'),
                    array('name'=>' 11'),
                    array('name'=>' 12'),
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
                    array('name'=>' 9'),
                    array('name'=>' 10'),
                    array('name'=>' 11'),
                    array('name'=>' 12'),
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
                    array('name'=>' 9'),
                    array('name'=>' 10'),
                    array('name'=>' 11'),
                    array('name'=>' 12'),
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
                    array('name'=>' 9'),
                    array('name'=>' 10'),
                    array('name'=>' 11'),
                    array('name'=>' 12'),
                ),
            ),
        );
    ?>
@stop

@section('main')
    
    <style type="text/css">
        .load-story {
            position: relative;
            width: 100%;
            height: 100vh;
            background-color: #333;
            z-index: 99999; }
            .load-story img{
                position: absolute;
                top: 35%;
                left: calc(50% - 50px);
                width: 100px;
                margin: -180px 0 -100px;
                transform: rotate(45deg); }

        .story-characters {
            display: none;
            position: fixed; top: 50px; left: 0;
            width: 83.33333333%; height: 55px;
            background-color: #eee;
            overflow: hidden;
            z-index: 999; }
            .story-characters .char-group {
                float: left;
                width: 100%; height: 25px;
                background-color: grey;
                padding: 0 5px;
                border-bottom: 1px solid white;
                transition: 0.3s; }
                .story-characters .cgroup {
                    float: left;
                    height: 25px;
                    background-color: #eee;
                    color: #333;
                    font-size: 8px;
                    padding: 5px;
                    border-right: 1px solid #656565;
                    text-transform: uppercase;
                    cursor: pointer;
                    transition: 0.3s; }
                    .story-characters .cgroup.off {
                        background-color: grey;
                        color: white;
                        transition: 0.3s; }
        .story-characters .title {
            position: absolute; top: 25px;
            background-color: #eee;
            font-family: "Righteous";
            font-weight: bold;
            text-transform: uppercase;
            padding: 5px 15px;
            z-index: 9; }
        .story-characters .characters {
            position: absolute; top: 25px;
            height: 30px;
            background-color: grey;
            cursor: grab; }
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
            display: none;
            float: left;
            padding: 55px 0 0;
            margin-bottom: 30px;
            overflow: hidden; }
        .story-volumes .volume {
            float: left;
            position: relative;
            width: 2000px; }
            .story-volumes .volume .title {
                position: absolute; top: 0; left: 30px;
                width: 100%; height: 30px;
                color: white;
                font-family: "Righteous";
                font-weight: bold;
                text-transform: uppercase;
                padding: 5px 10px;
                transform: rotate(90deg);
                transform-origin: 0 0;
                z-index: 9; }
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
                        position: absolute;
                        height: 30px;
                        color: white;                         
                        font-size: 12px;
                        padding: 5px 15px;
                        border-bottom: 1px solid white;
                        z-index: 99; }
                        .story-volumes .volume-story .volume-chapter .subtitle:before {
                            content: ""; 
                            position: absolute;
                            top: 0; left: 0;
                            width: 100%; height: 100%;
                            background-color: rgba(0,0,0,0.3);
                            mix-blend-mode: soft-light; }
                    .story-volumes .volume-story .volume-chapter .chapter-story {
                        position: relative;
                        background-color: transparent; }
                        .story-volumes .volume-story .volume-chapter .chapter-story:hover {
                            background-color: #67e3da; }
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
                                .story-volumes .volume-story .volume-chapter .chapter-story .point .desc {
                                    display: none;
                                    position: absolute; top: 30px; left: 0;
                                    width: 300px;
                                    color: #333;
                                    background-color: white;
                                    font-size: 11px;
                                    text-align: left;
                                    white-space: pre-line;
                                    padding: 10px;
                                    border: 0;
                                    box-shadow: 0 3px 3px rgba(0,0,0,0.3);
                                    z-index: 9; }
                                .story-volumes .volume-story .volume-chapter .chapter-story .point.active.open .desc {
                                    display: block; }
                                    .story-volumes .volume-story .volume-chapter .chapter-story .point.active .char {
                                        display: inline-block;
                                        color: #d5d5d5;
                                        background-color: white;
                                        width: 25px;
                                        height: 25px;
                                        font-size: 14px;
                                        text-align: center;
                                        padding: 4px 0;
                                        border-radius: 5px;
                                        margin: 0 0 3px; }
                            .story-volumes .volume-story .volume-chapter .chapter-story .point.open {
                                transition: 0.3s; }

        @foreach($mirVols as $key => $volume)
            .story-volumes .volume.{{ $volume['name'] }},
            .story-volumes .volume.{{ $volume['name'] }} .title,
            .story-volumes .volume.{{ $volume['name'] }} .subtitle {
                background-color: {{ $volume['color'] }} }
        @endforeach

        @foreach ($mirChars as $char)
            <?php if($char['color']=='') { $char['color']='#d5d5d5'; $char['subcolor']='#d5d5d5'; } ?>
            .story-volumes .volume-story .volume-chapter .chapter-story .point.{{$char['name']}}.active {
                color: {{ $char['subcolor'] }}; }
            .story-volumes .volume-story .volume-chapter .chapter-story .point.{{$char['name']}}.active .desc {
                border-bottom: 5px solid {{ $char['color'] }}; }
            .story-volumes .volume-story .volume-chapter .chapter-story .point.{{$char['name']}}.open {
                color: white;
                background-color: {{ $char['color'] }}; }

            <?php if($char['color']=='') { $char['color']='white'; $char['subcolor']='#d5d5d5'; } ?>
            .story-volumes .volume-story .volume-chapter .chapter-story .point.active .char.{{$char['name']}} {
                color: {{ $char['subcolor'] }};
                background-color: {{ $char['color'] }} }
        @endforeach



        .group-hide {
            position: relative;
            width: 40px; height: 30px;
            overflow: hidden;
            transition: 0.3s; }

        .editor {
            position: fixed; bottom: 0; left: 0; /*left: 16.66666667%;*/
            width: calc(16.66666667% - 5px);
            height: calc(100vh - 190px - 50px);
            font-family: "Open Sans";
            font-size: 12px;
            padding: 15px;
            z-index: 999; }
            .editor#editor-char,
            .editor#editor-vol,
            .editor#editor-chap {
                height: 30px; }
            .editor#editor-char {
                bottom: calc(100vh - 190px - 50px - (30px * 1)); }
            .editor#editor-vol {
                bottom: calc(100vh - 190px - 50px - (30px * 2)); }
            .editor#editor-chap {
                bottom: calc(100vh - 190px - 50px - (30px * 3)); }
            .editor#editor-desc {
                height: calc(100vh - 190px - 50px - (30px * 3)); }

            .editor-save,
            .editor-saved {
                position: fixed; bottom: 0; left: 0;
                width: calc(16.66666667% - 5px);
                height: 50px;
                color: white;
                background-color: grey;
                text-transform: uppercase;
                padding: 15px;
                border: 0;
                z-index: 999;
                cursor: pointer; }
                .editor-saved {
                    bottom: -50px;
                    /*left: calc(16.66666667% - 5px);*/
                    /*width: 200px;*/
                    text-align: center;
                    transition: 0.3s; }
                    .editor-saved.active {
                        bottom: 0;
                        transition: 0.3s; }
                    .editor-saved {
                        background-color: {{ $charColor }}; }
    </style>

    <div class="load-story">
        <img src="{{ url('img/loading-diamond.gif') }}">
    </div>

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
                                <!-- <a href="/mirrorplane/profile/{{$charlink}}"> -->
                                    <i class="char {{ $char['name'] }} {{ $char['ico'] }}"></i>
                                <!-- </a> -->
                            @endif
                        @endforeach
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    <div class="story-volumes">

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
                                                        foreach ($txtStory as $story) :
                                                            if ( $story['char']==$char['name']  && $story['vol']==$vol && $story['chap']==$chap+1 ) : 
                                                                $hasStory = $story['desc']; break;
                                                            else : $hasStory = "";
                                                            endif;
                                                        endforeach;

                                                        $forEditId = $char['name'].$vol.($chap+1);
                                                    ?>

                                                    <div id="{{ $forEditId }}" class="point {{ $char['name'] }}" onclick="callEditor( '{{ $char['name'] }}', '{{ $vol }}', '{{ $chap+1 }}' )">
                                                        <i class="{{ $char['ico'] }}"></i>
                                                        <div class="desc"></div>
                                                    </div>
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

    <form>
        <input id="editor-char" class="editor" type="text" placeholder="Character" disabled>
        <input id="editor-vol" class="editor" type="text" placeholder="Volume" disabled>
        <input id="editor-chap" class="editor" type="text" placeholder="Chapter" disabled>
        <textarea id="editor-desc" class="editor"></textarea>
        <!-- <div class="editor-save" onclick="editorSave()">Save</div> -->
        <div class="editor-saved">Saved</div>
    </form>

    <div class="col-xs-12" style="padding: 0;">
        @include('mp-inc/char-sel')
    </div>


    <!-- <div class="story-next">
        NEXT
    </div> -->

    <script type="text/javascript">
        var txtStory = <?= json_encode($txtStory) ?>;

        $(window).on('load', function() {
            $('.story-characters').show('fast');
            $('.story-volumes').show('fast');
            $('.load-story').slideUp('fast', function() {

                var charGroup = [];
                $('.story-characters .group').each(function() {
                    charGroup.push($(this));
                });
                var storyGroup = [];
                $('.chapter-story .group').each(function() {
                    storyGroup.push($(this));
                });

                var colDiv = $('.ad-dash-pa').width() + 20;
                $('.story-characters').width( 3000 - colDiv );
                $('.story-characters').css('left', colDiv);
                
                var chapTitleWidth = getMaxWidth('.story-volumes .volume-chapter .subtitle', 30);

                $('.story-volumes .volume-chapter .chapter-story').css('width', '3000px');
                $('.story-volumes .volume-chapter .chapter-story').css('left', chapTitleWidth + 'px');

                $('.story-characters .title').css('width', chapTitleWidth + 30);
                $('.story-characters .characters').css('width', '3000px');
                $('.story-characters .characters').css('left', 'calc(' + chapTitleWidth + 'px + 30px)');

                findActivePoints();

                $('.story-volumes .volume-story .volume-chapter .chapter-story .point').on('click', function() {
                    if($(this).hasClass('open') == false) {
                        $('.story-volumes .volume-story .volume-chapter .chapter-story .point').removeClass('open');
                        $(this).addClass('open');
                    } else {
                        $(this).removeClass('open');
                        $('#editor-char').val('');
                        $('#editor-vol').val('');
                        $('#editor-chap').val('');
                        $('#editor-desc').val('');
                    }
                })

                $('.story-next').on('click', function() {
                    for(var i=0; i<3; i++) {
                        charGroup[i].hide();
                        storyGroup[i].hide();
                    }
                });

                // DRAG ITEMS
                var maxLeft = chapTitleWidth,
                    maxRight = ((($(window).width() * 0.8333333333) - chapTitleWidth) / 2) * -1;
                var storyOrigin = chapTitleWidth;
                var downPoint, movePoint, upPoint, drag;
                var storyDrag = false;
                var windowWidth = 0.8333333333;
                $('.story-characters .characters').on('mousedown', function(event) {
                    downPoint = (event.pageX * windowWidth);
                    storyDrag = true; 
                });
                $(window).on('mousemove', function(event) {
                    if(storyDrag) {
                        movePoint = downPoint - (event.pageX * windowWidth);
                        drag = storyOrigin - movePoint;

                        if( drag < maxLeft && drag > maxRight ) {
                            $('.story-characters .characters').css('left', drag + 30);
                        } else if ( drag > maxLeft && drag > maxRight ) {
                            $('.story-characters .characters').css('left', maxLeft + 30);
                            drag = maxLeft;
                        } else if ( drag < maxLeft && drag < maxRight ) {
                            $('.story-characters .characters').css('left', maxRight + 30);
                            drag = maxRight;
                        }
                        // $('.story-volumes .volume-chapter .chapter-story').css('left', drag);
                    }h
                });
                $(window).on('mouseup', function(event) {
                    if(storyDrag) {
                        storyDrag = false;
                        storyOrigin = drag;

                        $('.story-volumes .volume-chapter .chapter-story').animate({
                            left: drag,
                        }, 500);
                    }
                });
                // $('#editor-desc').val(maxLeft + ' || ' + maxRight);

            });

        });

        function hideGroup(el, group) {
            if( $(el).hasClass('off') == false ) {
                $(el).addClass('off');
                // $('.group.g-' + group).addClass('group-hide');
                $('.group.g-' + group).fadeOut('fast');
            } else {
                $(el).removeClass('off');
                // $('.group.g-' + group).removeClass('group-hide');
                $('.group.g-' + group).fadeIn('fast');
            }
        }

        function findActivePoints() {
            $('.story-volumes .volume-story .volume-chapter .chapter-story .point').removeClass('active');
            $('.story-volumes .volume-story .volume-chapter .chapter-story .point .desc').html('');

            for(var i=0; i<txtStory.length; i++) {
                var charid = txtStory[i]['char'] + txtStory[i]['vol'] + txtStory[i]['chap'];
                $('#' + charid).addClass('active');

                $('#' + charid + ' .desc').html(txtStory[i]['desc']);
            }
        }

        function callEditor(char, vol ,chap) {
            var found = false;
            for(var i=0; i<txtStory.length; i++) {
                if(txtStory[i]['char'] == char && txtStory[i]['vol'] == vol && txtStory[i]['chap'] == chap) {
                    $('#editor-char').val(txtStory[i]['char']);
                    $('#editor-vol').val(txtStory[i]['vol']);
                    $('#editor-chap').val(txtStory[i]['chap']);
                    $('#editor-desc').val(txtStory[i]['desc']);
                    found = true;
                    break;
                }
            }
            if(!found) {
                $('#editor-char').val(char);
                $('#editor-vol').val(vol);
                $('#editor-chap').val(chap);
                $('#editor-desc').val('');
            }
        }

        $(document).keypress(function(e) {
            if(e.which == 13) {
                editorSave();
            }
        });

        function editorSave() {
            var char = $('#editor-char').val();
            var vol = $('#editor-vol').val();
            var chap = $('#editor-chap').val();
            var desc = $('#editor-desc').val();

            if(char != '' || vol != '' || chap != '') {
                var found = false;
                if(desc != '') {
                    for(var i=0; i<txtStory.length; i++){
                        if( txtStory[i]['char'] == char && txtStory[i]['vol'] == vol && txtStory[i]['chap'] == chap ){
                            txtStory[i]['desc'] = desc;
                            found = true;
                            break;
                        }
                    }

                    if(!found) {
                        txtStory.push({
                            char: $('#editor-char').val(),
                            vol:  $('#editor-vol').val(),
                            chap: $('#editor-chap').val(),
                            desc: $('#editor-desc').val(),
                        })
                    }

                } else {
                    for(var i=0; i<txtStory.length; i++){
                        if( txtStory[i]['char'] == char && txtStory[i]['vol'] == vol && txtStory[i]['chap'] == chap ){
                            txtStory.splice(i, 1);
                            break;
                        }
                    }
                }

                var url = "<?=URL::to('/editor-save')?>";
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });

                $.ajax({
                    url: url,
                    type: "POST",
                    data: { info : JSON.stringify(txtStory) },

                    success:function(data){
                        $('.editor-saved').html('Saved');
                        $('.editor-saved').addClass('active');
                        setTimeout( function() {
                            $('.editor-saved').removeClass('active');
                        }, 3000);

                        findActivePoints();

                    },error:function(jqXHR){ 
                        alert(jqXHR.status + ' ' + jqXHR.statusText + ' $.post failed!');
                    }
                }); 
            } else {
                $('.editor-saved').html('Nope');
                $('.editor-saved').addClass('active');
                setTimeout( function() {
                    $('.editor-saved').removeClass('active');
                }, 3000);
            }
           
        }

        // GENERIC
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