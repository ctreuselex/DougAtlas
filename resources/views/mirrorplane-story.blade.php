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
        $curPage = 'story';
        $Color = '#18FF81';
        $cityname = 'Mirrorplane';
        // $ColorSub = '#18FF81';

        $pageNotes = array (
            array('ord'=>'', 'n'=>"How It Works",'v'=>"The story is divided into the four divisions of Mirrorplane, each having 8 chapters which tackles the division's story, along with the main story and other minor stories the main characters passes through."),
            array('ord'=>'', 'n'=>"So What Story Now?",'v'=>"Having an over-arching story regarding the \"Weaver\". Division stories, which gives personality to each characters along with the organization they're supporting. And minor stories, that may be for a single character, or two, or three, or more if it pleases."),
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
    </style>

    @include('mp-inc/dash')

    <?php
        $mirVols = array(
            array('og'=>'in','title'=>'Introduction', 'sub'=>'The Sun, the Moon, and the Stars' ),
            array('og'=>'v1','title'=>'Volume 1', 'sub'=>'' ),
            array('og'=>'v2','title'=>'Volume 2', 'sub'=>'' ),
            array('og'=>'v3','title'=>'Volume 3', 'sub'=>'' ),
            array('og'=>'v4','title'=>'Volume 4', 'sub'=>'' ),
            array('og'=>'v5','title'=>'Volume 5', 'sub'=>'' ),
            array('og'=>'v6','title'=>'Volume 6', 'sub'=>'' ),
            );

        $mirChaps = array(
            array('og'=>'in','title'=>"The Sun",
                'cont'=>"Still looking for his beloved, Jeanne, Valkyr visits an old bar they used to go to, properly named; the Anchor. Val showed the bartender -who is totally not Noemi- a picture of Jeanne and proceeds to smirk knowing that the bartender is actually just Noemi. Noemi then proceeds to plant smack Val out of the bar and calls for a fight. As the crowd cheers for the not-actually-a-bartender Noemi, Zedrik stomps down the backdoor and brought down the fight. Val and Zed fought each other instead and Noemi simply pouts and angrily walks out the backdoor. Sending the whole building and a few of the alcoholics on fire, Zed wins by stabbing Val on the chest, which he totally laughed at since he can just quickly heal himself. The Psykeepers came down as Zed fleds, bringing all the blame of arson on Val.",
                'char'=>'valkyr,noemi,zedrik'
                ),
            array('og'=>'in','title'=>"The Moon",
                'cont'=>"Max reports to Vriskvin about a stolen shipment of weapons from the Landar Industries, along with the burning down of the Anchor, to a currently emo Vriskvin who is looking down the city from his office as the head of Geios. But then, an attacker came by and splashes water at them which Max blocked with his amazing blocking skills. The attacker revealed himself as Moon, who is supposed to be dead 2 cycles ago. Max was sent to the door to watch as Vriskvin and Moon duked it out. As Vriskvin wins by smashing Moon's face into the the floor, Moon -the actual Moon- reveals that he can now make copies of himself and mocks Vriskvin's not-improving fighting style. Moon told them that he does not know how he got resurrected but is willing to use his second chance at life to get his revenge for the death of his family, telling Vriskvin, or any of his Psykeeper friends, not to follow him in his path.",
                'char'=>'moon,vriskvin,maximus'
                ),
            array('og'=>'in','title'=>"The Stars",
                'cont'=>"Told to hunt down the \"Weaver\", Herschel and Rigel illegally climbs up the middle ring of Geios to get to the said prison the \"Weaver\" is supposed to be held in. Killing at least 8 fodder guards on their way, the duo found their not-so-evil-sister Kalli, waiting for them at the edge of the wall, along with her also-not-evil-twins sidekicks; June and May. As Rigel unwillingly insults their lame introduction, everybody fought for the sake of fighting scenes. Ending with Kalli and her sidekicks retreating but not because they lost, but because of prophecy of course, because Kalli is a certified fortune teller now. Due to them wanting their sister back, Herschel asked Rigel to follow Kalli as she proceed with their mission to find and bring back the \"Weaver\".",
                'char'=>'herschel,rigel,kalli,gemini'
                ),

            // VOLUME 1
            array('og'=>'v1','title'=>"Chapter One: Jail Games",
                'cont'=>"A drug-induced Valkyr meets up with Dom who has been imprisoned for stealing a lemon. As Herschel shoots an ethereal shot from a hundred meters away to the door of the prison, Dom reveals to a barely awake Val that he actually just asked to be imprisoned for free food. Herschel's shot shutdown the prison's defenses along with Max who is walking to the prison with Moon. Herschel puts up a fight with the guards, which she easily won since they can't use myst, and then with Moon, which is also easy since he can't hit her while phased. Though despite not being able to land any hit, the fight took time as Herschel is quite impressive by Moon's preseverance and impressive breakdancing skills. Dom then slams down the door, stops the fight, and frees Val followed by asking all three of them to follow him, while confused, Herschel and Moon followed with Moon carrying the unconcious Val. Dom brought the three to Moon's rented appartment at Andrei's which he questioned Dom's knowledge of. The four, with an already asleep Val, then talked about how they got into the prison; Moon telling how Val is supposed to be accused of arson, he himself following Max since Vriskvin is a dick who doesn't want to come, Dom stealing a lemon, and Herschel being tasked to rescue the \"Weaver\" which she believes is Dom.",
                'char'=>'dom,valkyr,herschel,moon,maximus,cin'
                ), 
            array('og'=>'v1','title'=>"Chapter Two: Out of Desperation",
                'cont'=>"Waking up to everyone gone, Moon walks up to Andrei, the owner of the building, and asked about his newly found friends, but was left unanswered. Of the three though, he was surprised to still find Dom just outside the building apparently waiting for him to wake up and haven't stolen anything yet. Dom brought Moon for coffee and had him pay up only for him to find that his card was missing, he blamed Dom, but Dom wouldn't expect him to pay if he stole his wallet wouldn't he? As the two went into a chase, at the same time escaping the coffee booth, they bumped into Llaxine who is not surprised that Moon is still alive and has been looking for someone to team up with for her mission. Being obviously followed by her instructor, Max, Moon recommended the living armor since he doesn't want to deal with Psykeeper bussiness at the moment. With the inclusion of Daud, who is very persuasive, Llaxine was able to team up with Moon but also with Max. Dom then decided to join for the lulz and Daud brought himself a temporary position in the Landar Industries while its head is casually having a stroll with his date and their small and smaller third and fourth wheel.",
                'char'=>'moon,andrei,dom,llaxine,maximus,daud'
                ), 
            array('og'=>'v1','title'=>"Chapter Three: Expert Tracking",
                'cont'=>"Val calls up Eagle that he'd be late for home using Moon's card, then meets up with Bono who has been chilling with the bad-mouthed Corry and Vox, his raccoon, in some dark alleyway, probably smoking some illegal shit. While Bono lectures Val about his obsession in finding his former girlfriend/wife/whatever, a strange girl appeared out of the wall and asked for directions. They tried their best to answer her queries but was all left confused. Meanwhile, the dysfunctional team of Llaxine, Moon, and Max -and Dom as well- decided to meet up with one of the caught member of the Dark Crusade from last night's robbery and interrogated him with quite a bit. With a bit of punching and stabbing, the guy pretty much revealed everything there is to know. On their way to the place the poor bloke told them. One of the members of the Dark Crusade noticed Max, seeing as he's the head of the Landar Industries which they are stealing weapons from. Thankfully tho, with the guy's incredibly obvious panic, the team was able to notice him and chase him down, pinned him down, and made him spit the Dark Crusade's base of operations, which is basically the same place the other guy told them.",
                'char'=>'valkyr,bono,hr,moon,llaxine,maximus,dom'
                ), 
            array('og'=>'v1','title'=>"Chapter Four: Deus Vult",
                'cont'=>"The amazing team of Llaxine, Moon, and Max -and Dom- sneaked their way into the buidling which they believed, as the guy they stabbed in the foot said, is the base of operations of the Dark Crusade. But as they break out of their stealth a few steps from the entrance of the building, the whole thing turned out to be a trap, ending up with everyone breaking their backs, exploding, and dying painfully, except for the team of course because of plot. The team, now excluding Dom because he is tasked to watch from the outside, enters the building and found stacks of weapons from different manufacturers suchs as Landar's and Corporal's. Two guys who calls themselves the \"Destroyer\" and the \"Maker\" appeared out of the ceiling and challenged them for a duel. Which also ended up with a painful interrogation, but without getting any answers.",
                'char'=>'moon,llaxine,maximus,dom'
                ), 
            array('og'=>'v1','title'=>"Chapter Five: The Get Together",
                'cont'=>"Moon wakes up to Val knocking at the door and asking for the picture he left, as Dom randomly poofs into existence in the hallway, Val returns Moon's card and invites them for breakfast. Meanwhile, Herschel meets up with Rigel who got a message from Lemaitre, which is to kill whoever is preventing her from getting to the Weaver. Herschel complies and shoots for Valkyr, who is whole-heartedly talking about Jeanne, but also purposely misses because she is such a rebel. Rigel grunts then quickly gets into the resto and single-handedly beat up Val and Moon with Dom just watching from the other side until Herschel decided to show up and aim her bow at Rigel. Rigel questioned Herschel's side and left agreeing with her sister's choice without a word. With the whole place turned into a mess, Herschel gets her arrow back and helps Val and Moon out and ran out like hell. Being left behind, Dom punched a whole into the wall and followed.",
                'char'=>'moon,valkyr,dom,herschel,rigel'
                ), 
            array('og'=>'v1','title'=>"Chapter Six: Another Lead",
                'cont'=>"Another food service bussiness is in ruin and Max guesses that Valkyr probably have something to with it. And he's right. Asking the owners is not that hard especially if they're super descriptive about these kind of matters. Shortly after, Daud tells Max about another attack on one of his factories near the lower ring wall, somewhat still surprised, Max decided to check out on the event. Meanwhile, Val tries to invite his new awesome team into his quest of finding his missing wife. Everyone seem to be uninterested but seeing as they have nothing else to do at the moment, it's for the best. Daud, who happened to zoomed in through them, asked the group if they wanted to come with them for the investigation on the new attack. Val agrees as it's basically the closest lead he can get to the whereabouts of the Ark. Max gets into his factory still on fire with Vriskvin patiently waiting for them, not doing anything to help, he then asks Moon about his mission of not getting involved about Psykeeper bussiness and yet, here he is. Herschel sees that there are still people inside and Daud decided to help them get out. Val, after seeing strange beastly marks on the walls and ceillings, suggested that the attack may not be from the Dark Crusade, but from the Ark itself.",
                'char'=>'maximus,daud,hr,dom,valkyr,moon,herschel,vriskvin'
                ), 
            array('og'=>'v1','title'=>"Chapter Seven: Truly Expert Tracking",
                'cont'=>"Following a set of tracks set by the \"beast\", Max questions the validity of what they're doing seeing as it's most likely to be another trap. Val explains that he himself has been tracking the Ark around for cycles, and one thing he knows about the Dark Crusade's true relationship with its brother organization is that their brother really hates them because of reasons. The track ends in an abandoned building near the edge of Geios to Luminos, and with a little examining around, they found coordinates on Landar Industries' and Corporal Works' factories, most of which are already raided by the crusade for weapons. Zedrik shows himself out of the dark, and stops Val as he tries to blasts his face with fire, followed by Daud attackng, then Max almost getting blow up, then Val going all ham, then Dom and Llaxine pinning him on the wall. Happy with Val finding new friends, Zedrik asks the group to go to the Dark Crusade's main hide out and give them a little \"scare\". Not conviced, Maximus asked for more proof for Zedrik's words and he gave them the entire background behind the crusade; that they're founded by an ignorant prick and is nothing but a fraud. Plus, the fact that they'd pretty much find out about all the info if they tried to look harder around the place without him having to interfere, but him not having a lot time, truck load of hatred, and little patience, decided to show up and spoon fed them all the details. Val disaproves of trusting Zed and so does everyone else, but Herschel seeing nobody else around and the fact that it's pretty much handed to them conviced them to just be done with it.",
                'char'=>'maximus,valkyr,daud,moon,herschel,dom,zedrik'
                ), 
            array('og'=>'v1','title'=>"Chapter Eight: Mindless Violence",
                'cont'=>"On location, Herschel sees that there are a lot of people inside the structure, she tells them that she can shoot through at least five walls and would need a clear shot to succeed in completely immobilizing the \"Liberator\", as he calls himself, without killing him. She also can't use her ethereal shot due to the fact that there's a wall blocking. Formulating the plan, Llaxine shows up and asked why she's not invited to her own mission and was really disappointed but still joined in to the fun. The Liberator commences a speach about freedom and equality among people, saying that the wall and rings are nothing but discriminatory apparatuses used by the Dominion to make themselves, and only themselves, powerful. Before he finishes his inspiring speach, Dom and Val lands in with a gaint flaming sword from above while Daud and Llaxine come in from each side to separate the crowd. Moon, appears through the backstage and fights off the guards the Liberator has on his side whilst keeping him on stage. Max conjures a powerful wave which cuts the crowd into each side, making way for Herschel's shot. Shortly after, Herschel fires her shot and hits the Liberator through both of his legs, leaving him unable to move. Some of the members of the crusade became more aggressive and dies due to the main characters' awesomeness while some, who are a bit smarter, decided to flee. As the group celebrated their victory inside, Herschel remained out and was visited by Rigel, who then tells her about Kalli being there, watching them.",
                'char'=>'herschel,maximus,valkyr,llaxine,moon,daud,dom,rigel'
                ), 

            // VOLUME 2 
            array('og'=>'v2','title'=>"Chapter One: New Moon",
                'cont'=>"Entering Mystos, Moon reminisces his old life with his family, and as he walks from roof to roof, looking at the floating district of Nimbocolumbus, Moon catches a glimpse of a glowing white wisp escaping from a window below. Curious, Moon decided to check it out only to reveal a woman healing a dying father and his daughter. As the woman sees Moon, he recognizes her as the current Ice Queen, Kianna, but she quickly flies away before he can say anything. Val wakes up to Herschel staring out the window on their abandoned old building, asking her if she ever sleeps and Moon and Dom's whereabouts. Herschel responds that she's simply always cautious and that the other two were gone since last night. Moon meets up with Ceniza, the head of Mystos, at the place where he was reawoken and asked her if its the same place his family burried. Ceniza answered with a yes, telling him that they were an important family to Mystos which is why they were burried in the hall of heroes. He then said that he remembers the night they were killed, they were not being heroes, they were rebelling. And if they were important, why is it he alone was reawoken. Dom then reveals himself to be following Moon for the night, and answers him that this next life must be he second chance. And what it's for really just depends on himself; whether he'll spend it living a new life, or spend it seeking for revenge. Meanwhile, Vriskvin tells Seline about Moon and asks her to get him back to the Dominion.",
                'char'=>'moon,kianna,dom,herschel,valkyr,ceniza,cin,hr,vriskvin,seline'
                ), 
            array('og'=>'v2','title'=>"Chapter Two:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v2','title'=>"Chapter Three:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v2','title'=>"Chapter Four: Hands of Frost",
                'cont'=>"",
                'char'=>'kianna,lance'
                ), 
            array('og'=>'v2','title'=>"Chapter Five:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v2','title'=>"Chapter Six:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v2','title'=>"Chapter Seven: This Very Moment",
                'cont'=>"The event went on with Max debating with Helios and the Corporal Works' heads about who really is supposed to be the one behind the attacks, Valkyr and Herschel enjoying their talk with Vriskvin, Llaxine and Daud about how talented they all are, Dom and Avery drinking punch, and Moon trying his best staying away from Seline. The time went on and the presentation of Landar's new weapon, the RCMG, has come, but only to reveal Sandra tied up inside the glass along with several dozens of it. A voice from above began asking the guests about the city's obsession with weapons and the art of killing. Of how small the city is and with the ever increasing number of people it have, is killing the only way for them to survive? What ever happened to morality, to equality among men? Meanwhile, Moon, who has been hiding all this time found a girl walking out dragging a box, as Moon approaches, the girl shoots out a dart which Moon successfully dodges followef by a counter hit which revealed the box to be full of RCMGs. The girl, Noemi, quickly grabs Moon with a vine and shoots a paralyzing dart to his neck to put him to sleep. Max, Vriskvin, Kianna, went on to debating with the voice about humanity, and was being countered with the actions of the Institute, the Dominion, and the Mandalas in the recent cycles; where they have been putting down people who are sick and hungry instead of helping them out of their unfotunate lives. As the voice get tired of never agreeing, the voice delivered his final argument and dropped one of the bombs on the guests, but it was only a distraction as he activates the one Sandra is held up on inside the glass box.",
                'char'=>'maximus,kianna,valkyr,herschel,vriskvin,llaxine,daud,dom,avery,moon,seline,sandra,zedrik,noemi'
                ), 
            array('og'=>'v2','title'=>"Chapter Eight: Framing Pictures",
                'cont'=>"Max and a lot of the guests suffered injuries from the blast, with which Kianna and her snow angels attended to. As vriskvin and Seline interrogate Val, Herschel, and Dom about their relation to the attack, Moon appears out of the hallway with the darts still on his neck. Val says that the Ark might be behind the attack, but with him recognizing Noemi's darts that Moon brought with him, he is sure that the Ark is responsible. With almost everyone blaming Val and Herschel due to them not being Dominion, Vriskvin asks Moon and his friends to leave and hide for the moment as the craze cool down. On their way out, Kianna stops Moon and thanked him for the warning. Chance then comes marching towards Vriskvin with Vines and Rustom trying to stop him, as he questions Vriskvin's thinking. Vriskvin then gave him an option to follow Val, but  denies Vines and Rustom from helping as they have better things to do; finding the Ark.",
                'char'=>'herschel,valkyr,dom,vriskvin,seline,moon,kianna,chance,rustom,vines'
                ), 

            // VOLUME 3
            array('og'=>'v3','title'=>"Chapter One: Night Full of Stars",
                'cont'=>"Val stops a woman from robbing a librarian and puts both of them in questioning as Moon and Dom joins in through the window. And between Romania, a lone mother only doing what she can to helping her children, and Demeter, a lone librarian whose work in literature had brought fame in his name but commotion in his family, the former is winning, and the latter pretty much agrees. Until Herschel comes in and recognizes the face which helped her with the choice she made back then. Herschel and Demeter ends up arguing about the difference between self-worth and selflessness. Why would he help her if he got nothing left on him? As tension rises between the two, Herschel gives up and thought of Demeter as a fool. As she confirms Dom that returning him to Lemaitre is her mission, she realizes that she hasn't really changed and that she is still under Lemaitre after all. Dom mentions that her mission hasn't been anything about the Weaver since she decided to join them back then, and that she did decided this for herself without Lemaitre. Herschel goes back to Demeter and gave him the hug he asked for when they first met, saying that she respects him, and admires him for his understanding of everything.",
                'char'=>'valkyr,romania,demeter,moon,dom,herschel,cin'
                ), 
            array('og'=>'v3','title'=>"Chapter Two: The Masquerade",
                'cont'=>"",
                'char'=>'mikael,froxy,kash,zedrik,hr,dom,herschel,moon,valkyr,lupe,koom,denise'
                ), 
            array('og'=>'v3','title'=>"Chapter Three:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v3','title'=>"Chapter Four: The Cypher",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v3','title'=>"Chapter Five: Tragedy of Madness",
                'cont'=>"",
                'char'=>'denise,lupe,koom,dom,valkyr,herschel,moon,avery,froxy,kash,bono'
                ), 
            array('og'=>'v3','title'=>"Chapter Six:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v3','title'=>"Chapter Seven:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v3','title'=>"Chapter Eight: Fate Called",
                'cont'=>"",
                'char'=>'valkyr,herschel,moon,dom,rigel,kalli,gemini,zedrik,noemi,jeanne'
                ), 

            // VOLUME 4
            array('og'=>'v4','title'=>"Chapter One: The Day We Crossed Paths",
                'cont'=>"It was in Luminos when Val first met Jeanne, and his memories of her written in almost every wall of the damn place reminded him that things will never be the same. He walked from place to place, finding a place to calm himself down, he finds the old building he used to stay in with her. He dreamt about the past, about the time they were young and full of hope, about the time he promised to bring her out of the wall, about the time when the idea haven't consumed her yet. There were smiles in their faces, not a care in the city they wanted to escape from. The thought only made him madder and Val knows that the only thing he can do know is stop her from ending herself. Out of nowhere, Dom shows up in a couch behind Val, telling him that he can scream his frustrations. He might think he made a mistake by planting his idea on Jeanne, but he did made a mistake by leaving their daughter behind to try correcting it. He was a bad man and know he's just the worst. Val called Eagle and asked for Blue, and as he hears her voice asking for him; is there something he needs? she'll be there. Val sobs as he smiles, telling her that he'll be home soon.",
                'char'=>'valkyr,jeanne,dom,cin'
                ), 
            array('og'=>'v4','title'=>"Chapter Two:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v4','title'=>"Chapter Three:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v4','title'=>"Chapter Four:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v4','title'=>"Chapter Five:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v4','title'=>"Chapter Six:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v4','title'=>"Chapter Seven: The Ultimatum",
                'cont'=>"",
                'char'=>'vriskvin,jeanne,maximus,llaxine,hr,valkyr,zedrik,hr,kalli,herschel,hr,seline,moon,noemi,gemini,hr,dom,cin'
                ), 
            array('og'=>'v4','title'=>"Chapter Eight: Fall",
                'cont'=>"",
                'char'=>'valkyr,jeanne,hr,herschel,kalli,hr,maximus,llaxine,zedrik,hr,dom,cin'
                ), 

            // VOLUME 5
            array('og'=>'v5','title'=>"Chapter One: The Aftermath",
                'cont'=>"",
                'char'=>'dom,bono,herschel,moon,riza,fae'
                ), 
            array('og'=>'v5','title'=>"Chapter Two:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v5','title'=>"Chapter Three:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v5','title'=>"Chapter Four: Eye for an Eye",
                'cont'=>"",
                'char'=>'vriskvin,rigel,herschel,frederick'
                ), 
            array('og'=>'v5','title'=>"Chapter Five:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v5','title'=>"Chapter Six:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v5','title'=>"Chapter Seven: Nobody's Home",
                'cont'=>"",
                'char'=>'herschel,jeanne,fae,hr,dom,cin'
                ), 
            array('og'=>'v5','title'=>"Chapter Eight: Motherless Land",
                'cont'=>"",
                'char'=>'moon,vriskvin,kianna,rustom,vines'
                ), 

            // VOLUME 6
            array('og'=>'v6','title'=>"Chapter One:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v6','title'=>"Chapter Two:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v6','title'=>"Chapter Three:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v6','title'=>"Chapter Four:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v6','title'=>"Chapter Five:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v6','title'=>"Chapter Six:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v6','title'=>"Chapter Seven:",
                'cont'=>"",
                'char'=>''
                ), 
            array('og'=>'v6','title'=>"Chapter Eight:",
                'cont'=>"",
                'char'=>''
                ), 

            array('og'=>'','title'=>"",
                'cont'=>"",
                'char'=>''
                ), 
            );

    ?>


    <div class="col-sm-10 col-sm-offset-2" style="padding: 15px;">
        
        @foreach($mirVols as $vol)
            <p><span class="char-name"> {{ $vol['title'] }} </span>
                @if($vol['sub']!='') | {{ $vol['sub'] }} @endif
            </p>

            <ul class="mp-cont">
                <li>
                    @foreach($mirChaps as $chap)
                        @if($vol['og']==$chap['og'])
                            <div class="chap-div">
                                <?php $chars = explode(',', $chap['char']); ?>
                                <b class="mp-title"> {{ $chap['title'] }} </b> |
                                @foreach($chars as $char)
                                    @if($char!='hr') <span class="cts-{{$char}}"></span>
                                    @else |
                                    @endif 
                                @endforeach
                                <div class="story-div"> {{ $chap['cont'] }} </div>
                            </div>
                        @endif 
                    @endforeach
                </li>
            </ul>
        @endforeach
        
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

    <script type="text/javascript">
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
