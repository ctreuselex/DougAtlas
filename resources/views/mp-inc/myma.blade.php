<?php
    $mirMyma = array(
        array('name' => "Armagi", 'tag' => "We are without the lack of creativity",
            'imgCnt' => 8,
            'des' => "Weapon use is commonplace before Myst manipulations began to sprung, and when it did, manipulations are still increadibly raw and uncontrolled. Mystics who found themselves refining their art in Myst manipulation in those times soon applied their art along with their weapon mastery, bringing birth to the school of Armagi.
                <br>
                <br>Armagus, people who practice the art of mixing manipulations along with their weapons are still the most common type of Mystics to this day. This is mostly due to the minimal use of Myst and better physique, thus allowing them to engage in combat without the need to rest every three minutes because of the lack of stamina or overuse of Myst connections.
                <br>
                <br>Any type of material affinity and weapon type is respected within the Armagi. As long as one can use their weapon on par with their ability to manipulate their medium, they are good to go. This leads to the common practice of mixing Armagi with the other types of Myst manipulations."),

        array('name' => "Exnihille", 'tag' => "From the void, bring it forth",
            'imgCnt' => 7,
            'des' => "Is the practice of creating material out of Myst itself, often practiced by those who have raw Myst as their material affinity.
                <br>
                <br>Exnihille is a style that mostly consist of Myst crystallization; creating weapons, objects, armors with Myst itself and fight off opponents with extreme versatility and unpredictableness. Its practice began from Frederick Lemaitre who first discovered that raw Myst itself is manipulable without a medium. This lead him to find other Mystics who can sense to presence of Myst without relating it to a certain medium; having raw Myst as a affinity, and train them of his ways. 
                <br>
                <br>Another practice of Exnihille is an uncommon one, called 'Voiding'. Voiding is the process of removing Myst from a particular area, preventing all Mystics from using it to their advantage or being 'Myst Locked' in Mystics' terms. Voiding is a recent discovery by an unknown Mystic or Mystics. The first record of it's usage is within Aeros, thought the possibly of it being used even earlier is possible."),

        array('name' => "Maximo", 'tag' => "To connect to the source of everything",
            'imgCnt' => 8,
            'des' => "Maximo is the use of one's material affinity with minimal use of other sources but Myst. It's the most basic practice yet, it is the hardest to master. This is due to Myst can easily be tapped once a Mystic knows about it's existence, but Myst can be used up for most of Maximo conjurations and connecting to more sources of Myst can be really difficult.
                <br>
                <br>The grand practice of Maximo is called Sigilios, which is the creation of the so called \"Sigils\" to connect the user to the ultimate source of Myst, the Myst Core, which grants them unimaginable power for a short period of time or as long as they can hold to massive surge of Myst flowing through the window they just created. The main process behind Sigilios, outside of the creation of sigils themselves, is still unknown, and tapping to such great power is considered reckless and irresponsible by most.
                <br>
                <br>Maximo is often practiced by those whose material affinity can be generated from Myst itself such as fire, lightning, light, etc. And though, it is common for Maxims to manipulate already existing material, the conjuration of things are much easier and more reliable than recycling. This makes control another part of their practice, and makes the creation of sigils require extreme precision."),

        array('name' => "Cirkunesi", 'tag' => "The very city is your ally",
            'imgCnt' => 7,
            'des' => "The rarest practice of all, is the Cirkunesi, which is the bringing of the city itself into one's own hands. It is often practiced by those whose material affinity are abstract or cannot be generated from Myst and requires an actual object to be manipulated in the first place such as; earth, time, speed, etc.
                <br>
                <br>Why they're so rare are unknown, but Mystics who practice Cirkunesi are valued by almost everyone, especially the Dominion who wants to change the city in drastic ways to whatever they seem fit. This makes being classified as a Cirkunesi the same as winning the superpower lottery and people will instantly throw all their credits on you.
                <br>
                <br>There are Cirkunesi whose material affinity allows them to easily create sigils, but without an allied Exnihille or Maximo, the window will remain dormant until tapped on and allow the surge of Myst to go through."),
        );
?>

<ul class="mp-cont">
    <li>
        <b class="mp-title">Material Affinity</b>
        <br>Myst Manipulation is what separates a Mystic to a Mydow. Everyone in Mirrorplane is connected to the source, to Myst, but it's only Mystics who can manipulate Myst, either by itself or through a medium that's called material affinity.
        <br>
        <br>Material Affinity can be very general like fire, frost, air, etc. which are the common ones, or extremely specific and abstract like, time, speed, plants, etc, which is the rarer type, or even raw Myst itself.
        <br>
        <br>A person's material affinity can be directly related to their parents, may even be passed down as a whole, or a mixed concept of both. 
    </li>
    @foreach($mirMyma as $myma)
        <li>
        <b class="mp-title">{{ $myma['name'] }}</b> | "{{ $myma['tag'] }}"
            <br><?php echo $myma['des'] ?>
            <div class="mp-ref" id="scroll-divi{{ $myma['name'] }}">
                <div class="mp-scroll-div">
                    @for($i=1; $i<=$myma['imgCnt']; $i++)
                        <img src="{{ url('img/myma/myma'.$myma['name'].' ('.$i.').jpg') }}">
                    @endfor
                </div>
                <div class="mp-scroll-prog"></div>
                <i class="mp-scroll max left fa fa-caret-left"></i>
                <i class="mp-scroll right fa fa-caret-right"></i>
            </div>
        </li>
    @endforeach
</ul>

<!-- ================================================== -->
<!-- <li>
    <b class="mp-title">Armagus</b> | "We are without the lack of creativity"
    <br>
    <img class="mp-ref" src="{{ url('img/ref-arm.png') }}" width="100%">
</li>
<li>
    <b class="mp-title">Exnihille</b> | "From the void, bring it forth"
    <br>Is the practice of creating material out of Myst itself, often practiced by those who have raw Myst as their material affinity.
    <br>
    <br>Exnihille is a style that mostly consist of Myst crystallization; creating weapons, objects, armors with Myst itself and fight off opponents with extreme versatility and unpredictableness.
    <br>
    <br>Another practice of Exnihille is an uncommon one, called 'Voiding'. Voiding is the process of removing Myst from a particular area, preventing all Mystics from using it to their advantage or being 'Myst Locked' in Mystics' terms. Technology and the city itself can be affected by Voiding, and the fact that it's effects are harsh makes it a taboo among Mystics.
    <br>
    <br>The first Voiding was demonstrated by Frederick Lemaitre, in moment of his departure from the Dominion.  
    <br>
    <br>Practiced by the Institute's Aeros division.
    <img class="mp-ref" src="{{ url('img/ref-exn.png') }}" width="100%">
</li>
<li>
    <b class="mp-title">Maximo</b> | "To connect from the source of everything"
    <br>The most basic practice is Maximo, yet, it is also the hardest to master. Maximo is the use of one's material affinity, without or with minimal use of other sources but Myst. It is often practiced by those whose material affinity can be generated or translated from Myst itself such as fire, lightning, frost, air, combustions, light, etc.
    <br>
    <br>The grand practice of Maximo is called 'Sigilios', which is the creation of the so called 'Celestial Sigils' to connect the user to the ultimate source of Myst, the Myst Core, which grants them unimaginable power for a short period of time.
    <br>
    <br>The main process behind Sigilios, outside of the creation of sigils themselves, is still unknown, and tapping to such great power is considered reckless and irresponsible by most.
    <br>
    <br>Practiced by the Institute's Mystos division.
    <img class="mp-ref" src="{{ url('img/ref-max.png') }}" width="100%">
</li>
<li>
    <b class="mp-title">Cirkunesi</b> | "The very city is your ally"
    <br>The rarest practice of all, is the Cirkunesi, which is the bringing of the city itself into one's own hands. It is often practiced by those whose material affinity are abstract, or cannot be generated or translated from Myst, and requires an actual object to be manipulated in the first place such as; earth, time, speed, etc.
    <br>
    <br>Why they're so rare are unknown, but Mystics who practice Cirkunesi are valued by almost everyone, especially the Dominion who wants to change the city, in drastic ways, to whatever they seem fit.
    <br>
    <br>Those who can practice Cirkunesi effectively also often add Armagi to their arsenal, as manipulating the environment as well as having a weapon of your own is just badass!
    <br>
    <br>Practiced by the Institute's Geios division.
    <img class="mp-ref" src="{{ url('img/ref-cir.png') }}" width="100%">
</li> -->