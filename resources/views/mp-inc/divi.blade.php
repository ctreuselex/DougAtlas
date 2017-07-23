<ul class="mp-cont">
    <li>
        <div class="col-xs-8 no-pad">
        <img class="mp-img" src="{{ url('img/lum.png') }}" width="125px">
        <b class="mp-title">Luminos</b> | The division of Fire, Summer, and Power.
        <br>
        <br>The division of Luminos is the warmest of the four divisions. It is also the only division in which the Children of Mandalas does not storm with winter, because Luminos is the very first divsion the Mandalas cathedral enters after the recurrence, coming with the celebration and with the annual rest of their members.
        <br>
        <br>The Lower Ring of Luminos is considerably lower in altitute compared to the rest, making half of it flooded by the surrounding waters. Houses in these parts tends to rely on bridges and boats to connect from one another.
        <br>
        <br>Luminos is home of the Corporal Works, and their part in the Institute practices the Armagi.
        <br>
        <br>Luminos teams are named after natural disasters, destructive elements.
        </div>
        <div class="col-xs-4">
        <ul class="mp-cont-char"> 
            <?php $curdiv = ''; ?>
            @foreach ($mirDiv as $div)
                @if ($div['div']=='lum')
                    @foreach ($mirChars as $char)
                        @if ($div['name'] == $char['name'])
                            <?php 
                                $charlink = strtolower($char['name']); 
                                $charico="fa fa-user"; 
                                if($char['ico']!='') $charico=$char['ico'];  
                            ?>
                            <a href="/mirrorplane/profile/{{$charlink}}">
                                <li id="{{ $char['name'] }}" class="li-hvr">
                                    <b class="col-xs-8 col-xs-offset-1 capitalize"><i class="{{ $charico }}"></i> {{ $char['name'] }} {{ $char['sur'] }}</b>
                                    <span class="col-xs-3 right">
                                        {{ $div['year']  }}
                                    </span>
                                </li>
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
        <br>
        <ul class="mp-cont-char">
            @foreach ($mirTeam as $team) 
                @if ($team['div']=='lum')
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
                                    <a href="/mirrorplane/profile/{{$charlink}}">
                                        <li id="{{ $char['name'] }}" class="li-hvr">
                                            <b class="col-xs-11 col-xs-offset-1 capitalize"><i class="{{ $charico }}"></i> {{ $char['name'] }} {{ $char['sur'] }}</b>
                                        </li>
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
        </div>
        <br>
        <img class="mp-ref" src="{{ url('img/ref-lum.png') }}" width="100%">
        <div class="clear"></div>
    </li>
    <li>
        <div class="col-xs-8 no-pad">
        <img class="mp-img" src="{{ url('img/aer.png') }}" width="125px">
        <b class="mp-title">Aeros</b> | The division of Air, Autumn, and Freedom.
        <br>
        <br>The division of Aeros is the most crowded in the entire city, causing the houses to be stacked on top of each other, bringing a lot of vertical space and momentum to the entire division. This also, results in many shady businesses and secret organizations, especially in the deeper parts of the streets that the light doesn't reach. Some of the houses almost reach the the top of the wall of the next Ring, is also becoming a problem to the higher ups.
        <br>
        <br>The Great Aeros Fire, happened in 1666, is an incredibly large fire which razed almost half of the division and lasted almost 2 weeks and has taken thousands of lives in the process. The people of Aeros brought a bright side to such a tragic disaster, with the Carnival of Madness, which happens right in the center of the fire, every 16th of Fall.
        <br>
        <br>The Aeros division of the Institute practices Exnihille.
        <br>
        <br>Aeros teams are named after animals.
        </div>
        <div class="col-xs-4">
        <ul class="mp-cont-char"> 
            <?php $curdiv = ''; ?>
            @foreach ($mirDiv as $div)
                @if ($div['div']=='aer')
                    @foreach ($mirChars as $char)
                        @if ($div['name'] == $char['name'])
                            <?php 
                                $charlink = strtolower($char['name']); 
                                $charico="fa fa-user"; 
                                if($char['ico']!='') $charico=$char['ico'];  
                            ?>
                            <a href="/mirrorplane/profile/{{$charlink}}">
                                <li id="{{ $char['name'] }}" class="li-hvr">
                                    <b class="col-xs-8 col-xs-offset-1 capitalize"><i class="{{ $charico }}"></i> {{ $char['name'] }} {{ $char['sur'] }}</b>
                                    <span class="col-xs-3 right">
                                        {{ $div['year']  }}
                                    </span>
                                </li>
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
        <br>
        <ul class="mp-cont-char">
            @foreach ($mirTeam as $team) 
                @if ($team['div']=='aer')
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
                                    <a href="/mirrorplane/profile/{{$charlink}}">
                                        <li id="{{ $char['name'] }}" class="li-hvr">
                                            <b class="col-xs-11 col-xs-offset-1 capitalize"><i class="{{ $charico }}"></i> {{ $char['name'] }} {{ $char['sur'] }}</b>
                                        </li>
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
        </div>
        <br>
        <img class="mp-ref" src="{{ url('img/ref-aer.png') }}" width="100%">
        <div class="clear"></div>
    </li>
    <li>
        <div class="col-xs-8 no-pad">
        <img class="mp-img" src="{{ url('img/mys.png') }}" width="125px">
        <b class="mp-title">Mystos</b> | The division of Water, Winter, and Change.
        <br>
        <br>The division of Mystos is considered to be the most powerful division in the entire city, bringing most of the most talented students into the Institute. However, on top of this is that they are also considered to be full of evil people, especially in the Higher Ring, as Mystos is also the home of the Felix Zacharias, which is the leader of the Dominion. They did also brought the Children of Mandalas though, so they got that going for them, which is n-ice.
        <br>
        <br>With the Dominion mostly, consisting of Mystos population, the only way up to the Nimbocolumbus is through the Institute's Mystos Division, which requires extensive indentification protocols, including background check, scanning of criminal records, checking of diseases, scanning of criminal records of your dog, and more, and can take several days to be validated. Most would rather not, seeing that almost everyone they'll meet up there are assholes.
        <br>
        <br>Mystos also acquire all the entry applicants for the Institute and interview begins on the 10th of Fall then those who are accepted will begin their semester on the 1st of Winter.
        <br>
        <br>The Institute's Mystos Division practices Maximo.
        <br>
        <br>Mystos teams are named after star constellations.
        </div>
        <div class="col-xs-4">
        <ul class="mp-cont-char"> 
            <?php $curdiv = ''; ?>
            @foreach ($mirDiv as $div)
                @if ($div['div']=='mys')
                    @foreach ($mirChars as $char)
                        @if ($div['name'] == $char['name'])
                            <?php 
                                $charlink = strtolower($char['name']); 
                                $charico="fa fa-user"; 
                                if($char['ico']!='') $charico=$char['ico'];  
                            ?>
                            <a href="/mirrorplane/profile/{{$charlink}}">
                                <li id="{{ $char['name'] }}" class="li-hvr">
                                    <b class="col-xs-8 col-xs-offset-1 capitalize"><i class="{{ $charico }}"></i> {{ $char['name'] }} {{ $char['sur'] }}</b>
                                    <span class="col-xs-3 right">
                                        {{ $div['year']  }}
                                    </span>
                                </li>
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
        <br>
        <ul class="mp-cont-char">
            @foreach ($mirTeam as $team) 
                @if ($team['div']=='mys')
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
                                    <a href="/mirrorplane/profile/{{$charlink}}">
                                        <li id="{{ $char['name'] }}" class="li-hvr">
                                            <b class="col-xs-11 col-xs-offset-1 capitalize"><i class="{{ $charico }}"></i> {{ $char['name'] }} {{ $char['sur'] }}</b>
                                        </li>
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
        </div>
        <br>
        <img class="mp-ref" src="{{ url('img/ref-mys.png') }}" width="100%">
        <div class="clear"></div>
    </li>
    <li>
        <div class="col-xs-8 no-pad">
        <img class="mp-img" src="{{ url('img/gei.png') }}" width="125px">
        <b class="mp-title">Geios</b> | The division of Earth, Spring, and Strength.
        <br>
        <br>The division of Geios have the reputation of being the wealthiest, that's not part of the Dominion, and being incredibly neat all the time. The Higher and Middle Rings of Geios can go toe-to-toe with the Dominion when it comes to beauty, aesthetics, and practicability, despite the Dominion's obvious flying schlick. And the Lower Ring of Geios is even rich enough to go on par with the Higher Rings of the other divisions.
        <br>
        <br>Geios also have the most trees per houses in the entire city, and are very well educated, and very strict, when it comes to taking care of their surroundings. Tree-huggers, they are called, and they'll also let the tree stab you in the face if they see you throwing your trash irresponsibly.
        <br>
        <br>Geios also helds the celebration for the graduation of the students of the Institute during the first of Spring, congratulating them for six cycles of passion and hard work.
        <br>
        <br>Geios's Intititute Division practices Cirkunesi, but due to the fact that it's really difficult to practice, they consider the Exnihille as well. But Cirkunesi will always be the priority.
        <br>
        <br>Geios teams are named after anomalies, uncommon words.
        </div>
        <div class="col-xs-4">
        <ul class="mp-cont-char"> 
            <?php $curdiv = ''; ?>
            @foreach ($mirDiv as $div)
                @if ($div['div']=='gei')
                    @foreach ($mirChars as $char)
                        @if ($div['name'] == $char['name'])
                            <?php 
                                $charlink = strtolower($char['name']); 
                                $charico="fa fa-user"; 
                                if($char['ico']!='') $charico=$char['ico'];  
                            ?>
                            <a href="/mirrorplane/profile/{{$charlink}}">
                                <li id="{{ $char['name'] }}" class="li-hvr">
                                    <b class="col-xs-8 col-xs-offset-1 capitalize"><i class="{{ $charico }}"></i> {{ $char['name'] }} {{ $char['sur'] }}</b>
                                    <span class="col-xs-3 right">
                                        {{ $div['year']  }}
                                    </span>
                                </li>
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
        <br>
        <ul class="mp-cont-char">
            @foreach ($mirTeam as $team) 
                @if ($team['div']=='gei')
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
                                    <a href="/mirrorplane/profile/{{$charlink}}">
                                        <li id="{{ $char['name'] }}" class="li-hvr">
                                            <b class="col-xs-11 col-xs-offset-1 capitalize"><i class="{{ $charico }}"></i> {{ $char['name'] }} {{ $char['sur'] }}</b>
                                        </li>
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
        </div>
        <br>
        <img class="mp-ref" src="{{ url('img/ref-gei.png') }}" width="100%">
        <div class="clear"></div>
    </li>
</ul>