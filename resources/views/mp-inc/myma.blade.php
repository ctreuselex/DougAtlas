<?php
    $mirMyma = array(
        array('name' => "Armagi", 'tag' => "We are without the lack of creativity",
            'imgCnt' => 8,
            'des' => "Weapon use is commonplace before Myst manipulations began to sprung, and when it did, manipulations are still incredibly raw and uncontrolled. Mystics who found themselves refining their art in Myst manipulation in those times soon applied their art along with their weapon mastery, bringing birth to the school of Armagi.
                <br>
                <br>Armagus, people who practice the art of mixing manipulations along with their weapons are still the most common type of Mystics to this day. This is mostly due to the minimal use of Myst and better physique, thus allowing them to engage in combat without the need to rest every three minutes because of the lack of stamina or overuse of Myst connections. They are also know to be extremely creative and innovative in their application of Myst.
                <br>
                <br>Any type of material affinity and weapon type is respected within the Armagi. As long as one can use their weapon on par with their ability to manipulate their medium, they are good to go. Anyone who is an Armagus always have other practices of Myst Manipulation in their arsenals, although not but not always on par with their pure counterparts."),

        array('name' => "Extenebri", 'tag' => "From the void, bring it forth",
            'imgCnt' => 7,
            'des' => "Is the practice of using Myst itself without a medium. Extenebrus used have affinities of their own but would have deteriorated in the process of training the practice. There are exceptions who were able to keep themselves affiliated but their sense over the medium is severely weakened.
                <br>
                <br>Extenebri is a style that mostly consist of Myst crystallization; creating weapons, objects, armors with Myst itself and fight off opponents with extreme versatility and unpredictableness. Its practice began from Frederick Lemaitre who first discovered that if one can sense Myst out of a medium, why not go further and pull that out of the medium and use the Myst itself as a weapon. It was a difficult task as Myst out of the medium means losing track of of it entirely, but Lemaitre was determined. He found a way to free himself of his affinity by draining his surrounding of it. Being once affiliated with fire, he stayed in a frozen room and attempted to connect himself to the Myst surrounding him inside in the heat inside him. It was a success, and he was a revolutionary. He then opened up the school of Extenebri within the Institute in hopes of spreading his discovery.
                <br>
                <br>Another practice of Extenebri is an even more uncommon one, called 'Voiding'. Voiding is the process of removing Myst from a particular area, preventing all Mystics from using it to their advantage or being 'Myst Locked' in Mystics' terms. Voiding is a recent discovery by an unknown Mystic/s. The first record of it's usage is within Aeros, thought the possibly of it being used even earlier is possible."),

        array('name' => "Rudimenti", 'tag' => "To connect to the source of everything",
            'imgCnt' => 8,
            'des' => "Rudimenti is the creation of one's material affinity using Myst. It's the most basic practice yet, it is the hardest to master. This is due to Myst can easily be tapped once a Mystic knows about it's existence, but Myst can be used up for most of Rudimenti's conjurations and connecting to more sources of Myst can be really difficult; it's like to be able to create fire, there must be fire nearby.
                <br>
                <br>The grand practice of Rudementi is called 'Sigilios', which is the creation of the so called \"Sigils\" to connect the user to the ultimate source of Myst, the Myst Core, which grants them possibly infinite source of Myst for a short period of time or as long as they can hold to the massive surge of Myst flowing through the window they just created. The main process behind Sigilios, outside of the creation of sigils themselves, is still unknown, and tapping to such great power is considered reckless and irresponsible by most.
                <br>
                <br>Control is out of Rudimenti's bounds as a practice and is the main reason Sigilios is a hard for the to master. But a Rudimentus also practice Cirkunesi would be a though opponent to battle against."),

        array('name' => "Cirkunesi", 'tag' => "The very city is your ally",
            'imgCnt' => 7,
            'des' => "The rarest practice of all is Cirkunesi, which is the bringing of the city itself into one's own hands. It is the manipulate of one's affinity by they sheer force of will.
                <br>
                <br>It is due the Dominion's superiority complex which is why the Cirkunesi is a rare practice today. They used to think that the creation of matter is the most powerful thing a Mystic can do and that limiting one's poewr to only manipulate what's already existing is weak and pointless, this lead to them battling against anyone to tries to 'vadalized' their 'creations', leading to death and torture. But as they change their goals, the Dominions view on Cirkunesus have also changed, leading them into seeking these Cirkunesus for their new vision of the city. The newer generation of Mystics are now cautious whenever they discover that their affinity has the potential of Cirkunesi, for in the past few years; it means death, but now it means being insanely rich, but what's the catch?
                <br>
                <br>Due to being considered as the practice of 'control'. Cirkunesus have the easiest time in making Sigils out of their medium, they can not, however, tap into it unless an Extenebrus or Rudimentus voluntarily so."),

        array('name' => "Invorti", 'tag' => "To manipulate anything or anyone",
            'imgCnt' => 6,
            'des' => "Is a new kind of Myst Manipulation only discovered recently by an unknown band of individuals in the deeper areas of Aeros. It is the practice of transmuting an object into another and is never a school in the Institute.
                <br>
                <br>No one is certain as to where or who first invoked the practice. But it has become a large priority of talented Mystics in Aeros to figure out it's secrets either to stop it for it's violating effects as they can be permanently damaging to the user or others or even further excercise it to achieve it's maximum effect."),
        );
?>

<ul class="mp-cont">
    <li>
        <b class="mp-title">Material Affinity</b>
        <br>Myst Manipulation is what separates a Mystic from a Mydow. Everyone in Mirrorplane is connected to the source, to Myst, but only Mystics can perceive Myst through a certain medium called affinity. A material affinity is the way a Mystic 'sees' or 'feels' Myst in their surroundings, and it is through their affinity which allows them to manipulate Myst itself or the medium they are using.
        <br>
        <br>Mydows are not all that powerless fortunately, they also have material affinities of their own, but only lacks the ability to manipulate Myst by themselves.
        <br>
        <br>Material Affinities can range from the most basics of matter such as: solids, liquids, gases, etc. to something more bizzare and abstract like the likes of: speed, time, space, etc. Being able to see Myst through their affinities, a Mystic affiliated with fire can detect any form of heat in his surroundings and depending in his practice, may be able to create or control fire in any way he needs to.
    </li>
    @foreach($mirMyma as $myma)
        <li>
        <b class="mp-title">{{ $myma['name'] }}</b> | "{{ $myma['tag'] }}"
            <br><?php echo $myma['des'] ?>
            <!-- <div class="mp-ref" id="scroll-divi{{ $myma['name'] }}">
                <div class="mp-scroll-div">
                    @for($i=1; $i<=$myma['imgCnt']; $i++)
                        <img src="{{ url('img/myma/myma'.$myma['name'].' ('.$i.').jpg') }}">
                    @endfor
                </div>
                <div class="mp-scroll-prog"></div>
                <i class="mp-scroll max left fa fa-caret-left"></i>
                <i class="mp-scroll right fa fa-caret-right"></i>
            </div> -->

            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @for($i=1; $i<=$myma['imgCnt']; $i++)
                        <?php
                            $url = 'img/myma/myma'.$myma['name'].'%20('.$i.').jpg';
                            $size = getimagesize(url($url));
                            $por = 300 / $size[1]; 
                            $height = $por * $size[1];
                            $width = $por * $size[0];
                        ?>
                        <div class="swiper-slide" style="width: {{ $width }}px; height: {{ $height }}px; ">
                            <img src="{{ url($url) }}" width="100%">
                        </div>
                    @endfor
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </li>
    @endforeach
</ul>

<!-- <script type="text/javascript">
    var mirMyma = <?php echo json_encode($mirMyma); ?>;
    $(window).load(function() {
        for(var i=0; i<mirMyma.length; i++) {
            createSlide("#scroll-divi"+mirMyma[i]['name']);
        }   
    });
</script> -->

<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: 1,
        pagination: {
            el: '.swiper-pagination',
            type: 'progressbar',
        },
    });
</script>