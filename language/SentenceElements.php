<?php
//namespace Sentence\language\SentenceElements;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SentenceElements
 *
 * @author ggonjon
 */
class SentenceElements {
    //put your code here
    public $binded_elements;
    public $paragraph;
    
    function __toString() {
        /**
         * @getElements method
         * @elements 
         * @return Array 
         */
        
        $this->getElements();
    }
    
    function replacePuntuation($paragraph)
    {       
                $mysentence = str_replace(", "," , ",$paragraph);
                $sentence = str_replace("! "," ! ",$mysentence);
                $mysentence = str_replace("? "," ? ",$sentence);
                $sentence = str_replace("."," . ",$mysentence);
                $mysentence = str_replace(": "," : ",$sentence);
                $sentence = str_replace("' "," ' ",$mysentence);
                
                $paragraph = $this->brakeParagraph($sentence);

            //$counter++;
            
            return $paragraph;
  
    }
   
    function getElements()
    {  
        return $this->elements;
    }
    
/*    function bindElements($sentence)
    {
        /**
         * Bind user sentence with master sentence elements
         * If user sentence element found, it binds with sentence master elements as
         * a bigger array
         * @binded_sentence
         * @element Array Index
         * return Array
         */
    	function brakeParagraph($paragraph,$braker = "\n")
	{
                //$this->paragraph = $this->replacePuntuation($paragraph);
		$paragraph = str_replace("  ", "", $paragraph);
		$broken_paragraph = str_replace(".",".$braker",$paragraph);
		$new_paragraph = str_replace("?","?$braker",$broken_paragraph);
		$broken_paragraph = str_replace("!","!$braker",$new_paragraph);
		
		$this->paragraph = explode($braker,$broken_paragraph);
		
		$counter = count($this->paragraph);
		unset($this->paragraph[$counter-1]);
		
		
		return $this->paragraph;
	}
 
        function parsePunctuation($sentence)
        {
            $new_sent = '';
            /*$punctuation = array(",",":","!","?",",","'");
            foreach($punctuation as $point){
            $new_sent = str_replace($point, "&nbsp;$point&nbsp;", $sentence);
            $new_sent = str_replace($point, " $point ", $new_sent);*/
            $this->paragraph = $this->replacePuntuation($sentence);
            $sentence2 = str_replace(", ", " , ", $sentence);
            $sentence = str_replace("?", " ? ", $sentence2);
            $sentence2 = str_replace("!", " ! ", $sentence);
            $sentence = str_replace(". ", " . ", $sentence2);
            $sentence2 = str_replace("'", " ' ", $sentence);
            $new_sent = str_replace(".", " . ", $sentence2);

            return $new_sent;

        }
        
        function sentenceBinder($sentence)
        {
            $sentence1 = strtolower($this->parsePunctuation(trim($sentence)));
            $sentence2 = explode(" ", $sentence1);
            
            $indice =array("key"=>"");
            $counter = 0;
        /**
         * Converting sentence string elements into array elements
         */
            foreach($this->elements as $key=>$value)
            {
                $indice[$key] = explode(", ", strtolower($value));
            
            foreach($sentence2 as $index=>$var)
            {
                
                if(array_search(strtolower($var), $indice[$key]))
                {
                    
                    $indece [$key.":".$index] = $var;
               
                    
                }else{}
                
                $counter++;
               
            }
            
        }
        return $indece;

    }
    
    private $elements = array(
        "article"=>" , a, an, the, this, that, these, those",
        "adjective"=>" , pretty, gracious, lovely, delicate, serious, ugly, unatractive, attractive, lazy, old, young, handsome",
        "noun"=>" , abyss, abysses, alumnus, alumnianalysis, analyses, aquarium, aquaria, arch, arches, atlas, atlases, axe, axes, baby, babies, bacterium, bacteria, batch, batches, beach, beaches, brush, brushes, bus, book, buses, calf, calves, chateau, chateaux, cherry, cherries, child, children, church, churches, circus, circuses, city, cities, cod, cod, copy, copies, crisis, crises, curriculum, curricula, deer, deer, dictionary, dictionaries, domino, dominoes, dwarf, dwarves, echo, echoes, elf,elves, emphasis, emphases, family, families, fax, faxes, fish, fish, flush, flushes, fly, flies, foot, feetfungus, fungihalf, halves, hero, heroes, hippopotamus, hippopotami, hoax, hoaxes, hoof, hooves, index, indexes, iris,irises, kiss, kisses, knife, knives, lady, ladies, leaf, leaves, life, lives, loaf, loaves, maravilla, minerba, man, men, mango, mangoes, memorandum, memoranda, mess, messes, moose, moose, motto, mottoes, mouse, mice, nanny, nannies, neurosis, neuroses, nucleus, nuclei, oasis, oases, octopus, octopi, party, parties, pass, passes, penny, pennies, person, people, plateau, plateaux, poppy, poppies, potato, potatoes, quiz, quizzes, reflex, reflexes, runner-up, runners-up, scarf, scarves, scratch, scratches, series, series, sheaf, sheaves, sheep, sheep, shelf, shelves, son-in-law, sons-in-law, species, species, splash, splashes, spy,spies, stitch, stitches, story, stories, syllabus, syllabi, tax,taxes, thesis, theses, thief, thieves, tomato, tomatoes, tooth, teeth, tornado, tornadoes, try, tries, volcano, volcanoes, waltz, waltzes, wash, washes, watch, watches, wharf, wharves, wife, wives, woman, women",
        "preposition"=>" , aboard, about, above, absent, across, after, against, along, alongside, amid, amidst, among, anti, around, as, at, atop, bar, barring, before, behind, below, beneath, beside, besides, between, beyond, but, by, circa, counting, concerning, considering, despite, down, during, except, excepting, excluding, following, for, from, given, gone, in, in front of, inside, instead of, into, less, like, mid, minus, near, next, of, off, on, on top of, onto, opposite, out of, outside, over, past, pending, per, plus, pro, regarding, regardless of, round, save, saving, since, than, through, throughout, till, times, to, toward, towards, under, underneath, unlike, until, up, upon, versus, via, with, within, without, worth",
        "verb"=>" , abash, abate, abide, absorb, accept, accompany, ache, achieve, acquire, act, add, address, adjust, admire, admit, advise, afford, agree, alight, allow, animate, announce, answer, apologize, appear, applaud, apply, approach, approve, argue, arise, arrange, arrest, ask, assert, assort, astonish, attack, attend, attract, audit, avoid, awake, bang, banish, bash, bat, be (am,are), bear, bear, beat, beautify, become, befall, beg, begin, behave, behold, believe, belong, bend, bereave, beseech, bet, betray, bid, bid, bind, bite, bleed, bless, blossom, blow, blur, blush, board, boast, boil, bow, box, bray, break, breathe, breed, bring, broadcast, brush, build, burn, burst, bury, bust, buy, buzz, calculate, call, canvass, capture, caress, carry, carve, cash, cast, catch, cause, cease, celebrate, challenge, change, charge, chase, chat, check, cheer, chew, chide, chip, choke, choose, classify, clean, cleave, click, climb, cling, close, clothe, clutch, collapse, collect, colour, come, comment, compare, compel, compete, complain, complete, conclude, conduct, confess, confine, confiscate, confuse, congratulate, connect, connote, conquer, consecrate, consent, conserve, consider, consign, consist, console, consort, conspire, constitute, constrain, construct, construe, consult, contain, contemn, contend, contest, continue, contract, contradict, contrast, contribute, contrive, control, convene, converge, converse, convert, convey, convict, convince, coo, cook, cool, co-operate, cope, copy, correct, correspond, corrode, corrupt, cost, cough, counsel, count, course, cover, cower, crack, crackle, crash, crave, create, creep, crib, cross, crowd, crush, cry, curb, cure, curve, cut, cycle, damage, damp, dance, dare, dash, dazzle, deal, decay, decide, declare, decorate, decrease, dedicate, delay, delete, deny, depend, deprive, derive, describe, desire, destroy, detach, detect, determine, develop, die, differ, dig, digest, dim, diminish, dine, dip, direct, disappear, discover, discuss, disobey, display, dispose, distribute, disturb, disuse, dive, divide, do, donate, download, drag, draw, dream, dress, drill, drink, drive, drop, dry, dump, dwell, dye, earn, eat, educate, empower, empty, encircle, encourage, encroach, endanger, endorse, endure, engrave, enjoy, enlarge, enlighten, enter, envy, erase, escape, evaporate, exchange, exclaim, exclude, exist, expand, expect, explain, explore, express, extend, eye, face, fail, faint, fall, fan, fancy, favour, fax, feed, feel, ferry, fetch, fight, fill, find, finish, fish, fit, fix, fizz, flap, flash, flee, fling, float, flop, fly, fold, follow, forbid, force, forecast, foretell, forget, forgive, forlese, form, forsake, found, frame, free, freeze, frighten, fry, fulfil, gag, gain, gainsay, gash, gaze, get, give, glance, glitter, glow, go, google, govern, grab, grade, grant, greet, grind, grip, grow, guard, guess, guide, handle, hang, happen, harm, hatch, hate, have, heal, hear, heave, help, hew, hide, hinder, hiss, hit, hoax, hold, hop, hope, horrify, hug, hum, humiliate, hunt, hurl, hurry, hurt, hush, hustle, hypnotize, idealize, identify, idolize, ignite, ignore, ill-treat, illuminate, illumine, illustrate, imagine, imbibe, imitate, immerse, immolate, immure, impair, impart, impeach, impede, impel, impend, imperil, impinge, implant, implicate, implode, implore, imply, import, impose, impress, imprint, imprison, improve, inaugurate, incise, include, increase, inculcate, indent, indicate, induce, indulge, infect, infest, inflame, inflate, inflect, inform, infringe, infuse, ingest, inhabit, inhale, inherit, initiate, inject, injure, inlay, innovate, input, inquire, inscribe, insert, inspect, inspire, install, insult, insure, integrate, introduce, invent, invite, join, jump, justify, keep, kick, kid, kill, kiss, kneel, knit, knock, know, lade, land, last, latch, laugh, lay, lead, leak, lean, leap, learn, leave, leer, lend, let, lick, lie, lie, lift, light, like, limp, listen, live, look, lose, love, magnify, maintain, make, manage, march, mark, marry, mash, match, matter, mean, measure, meet, melt, merge, mew, migrate, milk, mind, mislead, miss, mistake, misuse, mix, moan, modify, moo, motivate, mould, moult, move, mow, multiply, murmur, nail, nap, need, neglect, nip, nod, note, notice, notify, nourish, nurse, obey, oblige, observe, obstruct, obtain, occupy, occur, offer, offset, omit, ooze, open, operate, opine, oppress, opt, optimize, order, organize, originate, output, overflow, overtake, owe, own, pacify, paint, pardon, part, partake, participate, pass, paste, pat, patch, pause, pay, peep, perish, permit, persuade, phone, place, plan, play, plead, please, plod, plot, pluck, ply, point, polish, pollute, ponder, pour, pout, practise, praise, pray, preach, prefer, prepare, prescribe, present, preserve, preset, preside, press, pretend, prevent, print, proceed, produce, progress, prohibit, promise, propose, prosecute, protect, prove, provide, pull, punish, purify, push, put, qualify, quarrel, question, quit, race, rain, rattle, reach, read, realize, rebuild, recall, recast, receive, recite, recognize, recollect, recur, redo, reduce, refer, reflect, refuse, regard, regret, relate, relax, rely, remain, remake, remove, rend, renew, renounce, repair, repeat, replace, reply, report, request, resell, resemble, reset, resist, resolve, respect, rest, restrain, retain, retch, retire, return, reuse, review, rewind, rid, ride, ring, rise, roar, rob, roll, rot, rub, rule, run, rush, sabotage, sack, sacrifice, sadden, saddle, sag, sail, sally, salute, salvage, salve, sample, sanctify, sanction, sap, saponify, sash, sashay, sass, sate, satiate, satirise, satisfy, saturate, saunter, save, savor, savvy, saw, say, scab, scabble, scald, scale, scam, scan, scant, scar, scare, scarify, scarp, scat, scatter, scold, scorch, scowl, scrawl, scream, screw, scrub, search, seat, secure, see, seek, seem, seize, select, sell, send, sentence, separate, set, sever, sew, shake, shape, share, shatter, shave, shear, shed, shine, shirk, shit, shiver, shock, shoe, shoot, shorten, shout, show, shrink, shun, shut, sight, signal, signify, sing, sink, sip, sit, ski, skid, slam, slay, sleep, slide, slim, sling, slink, slip, slit, smash, smell, smile, smite, smooth, smother, snap, snatch, sneak, sneeze, sniff, soar, sob, solicit, solve, soothe, sort, sow, sparkle, speak, speed, spell, spend, spill, spin, spit, split, spoil, spray, spread, spring, sprout, squeeze, stand, stare, start, state,  , stay, steal, steep, stem, step, sterilize, stick, stimulate, sting, stink, stir, stitch, stoop, stop, store, strain, stray, stress, stretch, strew, stride, strike, string, strive, study, submit, subscribe, subtract, succeed, suck, suffer, suggest, summon, supply, support, suppose, surge, surmise, surpass, surround, survey, survive, swallow, sway, swear, sweat, sweep, swell, swim, swing, swot, take, talk, tap, taste, tax, teach, tear, tee, tell, tempt, tend, terminate, terrify, test, thank, think, thrive, throw, thrust, thump, tie, tire, toss, touch, train, trample, transfer, transform, translate, trap, travel, tread, treasure, treat, tree, tremble, triumph, trust, try, turn, type, typeset, understand, undo, uproot, upset, urge, use, utter, value, vanish, vary, verify, vex, vie, view, violate, vomit, wake, walk, wander, want, warn, waste, watch, water, wave, wax, waylay, wear, weave, wed, weep, weigh, welcome, wend, wet, whip, whisper, win, wind, wish, withdraw, work, worry, worship, wring, write, yawn, yell, yield, zinc, zoom",
        "supporting_verb"=>" , do, does, did, have, has, had, is, are, was, were, will, won't, should, shouldn't, shall, can, may, could, get, got, gotten",
        "pronoun"=>" , all, another, any, anybody, anyone, anything, as, both, each, either, everybody, everyone, everything, few, he, her, hers, herself, him, himself, his, I, it, itself, many, me, mine, most, my, myself, neither, no one, nobody, none, nothing, one, other, others, our, ours, ourselves, several, she, some, somebody, someone, something, such, thee, their, theirs, them, themselves, these, they, thine, thou, thy, us, we, what, whatever, which, whichever, who, whoever, whom, whomever, whose, you, your, yours, yourself, yourselves",
        "adverb"=>" , abnormally, absentmindedly, accidentally, acidly, actually, adventurously, afterwards,almost, always, angrily, annually, anxiously, arrogantly, awkwardly, badly, bashfully, beautifully, bitterly, bleakly, blindly, blissfully, boastfully, boldly, bravely, briefly, brightly, briskly, broadly, busily, calmly, carefully, carelessly, cautiously, certainly, cheerfully, clearly, cleverly, closely, coaxingly, colorfully, commonly, continually, coolly, correctly, courageously, crossly, cruelly, curiously, daily, daintily, dearly, deceivingly, delightfully, deeply, defiantly, deliberately, delightfully, diligently, dimly, doubtfully, dreamily, easily, elegantly, energetically, enormously, enthusiastically, equally, especially, even, evenly, eventually, exactly, excitedly, extremely, fairly, faithfully, famously, far, fast, fatally, ferociously, fervently, fiercely, fondly, foolishly, fortunately, frankly, frantically, freely, frenetically, frightfully, fully, furiously, generally, generously, gently, gladly, gleefully, gracefully, gratefully, greatly, greedily, happily, hastily, healthily, heavily, helpfully, helplessly, highly, honestly, hopelessly, hourly, hungrily, immediately, innocently, inquisitively, instantly, intensely, intently, interestingly, inwardly, irritably, jaggedly, jealously, joshingly, joyfully, joyously, jovially, jubilantly, judgementally, justly, keenly, kiddingly, kindheartedly, kindly, kissingly, knavishly, knottily, knowingly, knowledgeably, kookily, lazily, less, lightly, likely, limply, lively, loftily, longingly, loosely, lovingly, loudly, loyally, madly, majestically, meaningfully, mechanically, merrily, miserably, mockingly, monthly, more, mortally, mostly, mysteriously, naturally, nearly, neatly, needily, nervously, never, nicely, noisily, not, obediently, obnoxiously, oddly, offensively, officially, often, only, openly, optimistically, overconfidently, owlishly, painfully, partially, patiently, perfectly, physically, playfully, politely, poorly, positively, potentially, powerfully, promptly, properly, punctually, quaintly, quarrelsomely, queasily, queerly, questionably, questioningly, quicker, quickly, quietly, quirkily, quizzically, rapidly, rarely, readily, really, reassuringly, recklessly, regularly, reluctantly, repeatedly, reproachfully, restfully, righteously, rightfully, rigidly, roughly, rudely, sadly, safely, scarcely, scarily, searchingly, sedately, seemingly, seldom, selfishly, separately, seriously, shakily, sharply, sheepishly, shrilly, shyly, silently, sleepily, slowly, smoothly, softly, solemnly, solidly, sometimes, soon, speedily, stealthily, sternly, strictly, successfully, suddenly, surprisingly, suspiciously, sweetly, swiftly, sympathetically, tenderly, tensely, terribly, thankfully, thoroughly, thoughtfully, tightly, tomorrow, too, tremendously, triumphantly, truly, truthfully, ultimately, unabashedly, unaccountably, unbearably, unethically, unexpectedly, unfortunately, unimpressively, unnaturally, unnecessarily, utterly, upbeat, upliftingly, upright, upside-down, upward, upwardly, urgently, usefully, uselessly, usually, utterly, vacantly, vaguely, vainly, valiantly, vastly, verbally, very, viciously, victoriously, violently, vivaciously, voluntarily, warmly, weakly, wearily, well, wetly, wholly, wildly, willfully, wisely, woefully, wonderfully, worriedly, wrongly, yawningly, yearly, yearningly, yesterday, yieldingly, youthfully, zealously ,zestfully, zestily",
        "conjunction"=>" , and, then, however, thus, further more, but, in the mean time, by the way, besides",
        "interjection"=>" , absolutely, achoo, ack, ahh, aha, ahem, ahoy, agreed, alas, alright, alrighty, alack, amen, anytime, argh, anyhoo, anyhow, as if, attaboy, attagirl, aww, awful, bam, bah humbug, behold, bingo, blah, bless you, boo, bravo, cheers, crud, darn, dang, doh, drat, duh, eek, eh, gee, geepers, gee whiz, golly, goodness, goodness, gracious, gosh, ha, hallelujah, hey, hi, hmmm, huh, indeed, jeez, my gosh, no, now, nah, oops, ouch, phew, please, rats, shoot, shucks, there, tut, uggh, waa, what, woah, woops, wow, yay, yes, yikes, Que",
        "plural"=>" , s",
        "negation"=>" , no, not, t",
        "puntuation"=>" , ., ?, !, :, ;, ', "."\,".", \."

        );
    
    private $punctuation = array("period"=>".","coma"=>",","colon"=>":","semicolon"=>";","question_mark"=>"?","exclamation_mark"=>"!","dash"=>"-");
    /**
     * @this->punctuation
     * @return array()
     */
    function getPunctuation(){ return $this->punctuation;}
}
