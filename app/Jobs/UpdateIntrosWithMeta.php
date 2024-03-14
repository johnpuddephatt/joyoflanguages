<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateIntrosWithMeta implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $wp_postmeta = [
            [
                "meta_id" => "6456",
                "post_id" => "3663",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Want to learn some handy Italian travel phrases to buy food? Bene! In this tutorial, you\'ll learn how to speak Italian in supermarkets, delis and markets.',
            ],
            [
                "meta_id" => "6511",
                "post_id" => "3684",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Thinking about taking the French DALF C1? Don\'t panic! Get ready for the exam by stealing these 14 smart study techniques.',
            ],
            [
                "meta_id" => "6547",
                "post_id" => "3369",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Does speaking a foreign language make you nervous? Read on for some unconventional advice on how to deal with your fears and start speaking.",
            ],
            [
                "meta_id" => "6581",
                "post_id" => "3391",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'So you’re thinking about learning Italian? Molto bene! If you\'re looking for some guidance on how to get started, you\'re in the right place.',
            ],
            [
                "meta_id" => "6628",
                "post_id" => "3712",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Want to learn a language but feeling lazy? No worries! In this post, you\'ll learn 7 lazy (but highly effective) ways to learn a language at home.',
            ],
            [
                "meta_id" => "6725",
                "post_id" => "3734",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Dreaming of speaking a foreign language fluently? Setting a big, exciting goal can speed up your progress (even if you don\'t reach it).',
            ],
            [
                "meta_id" => "6801",
                "post_id" => "3757",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Want to learn Spanish, but can\'t go abroad to do it? No hay problema! Read on to find out how to become fluent in 1 year without leaving the house.',
            ],
            [
                "meta_id" => "6873",
                "post_id" => "3787",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Thinking about learning a minority language? Learn about my experience with Sicilian and get tips on how to learn a language when there are no books!",
            ],
            [
                "meta_id" => "6894",
                "post_id" => "217",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "No time to learn a language over the Christmas holidays? Find out how to improve your language skills without studying, by using this sneaky trick.",
            ],
            [
                "meta_id" => "6958",
                "post_id" => "3811",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Learn a language better and faster this year: use this 3-step process that will help you set winning language learning goals - and actually stick to them.",
            ],
            [
                "meta_id" => "6999",
                "post_id" => "3822",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Want to learn a language but finding it hard to get started? No worries - it\'s easy with tiny language learning habits. No superhuman motivation required!',
            ],
            [
                "meta_id" => "7112",
                "post_id" => "3862",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Last summer, I set myself the goal of preparing for the advanced French DALF exam in 5 months. Find out how I did it - the good, the bad and the ugly!",
            ],
            [
                "meta_id" => "7162",
                "post_id" => "3884",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Which language should I learn? If you\'re thinking about learning a new language, but not sure which one, this quiz just might help you find the right one!',
            ],
            [
                "meta_id" => "7192",
                "post_id" => "3900",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "How do you type that upside-down question mark thing? Read on for a quick and easy guide to typing Spanish accents on your computer and your phone.",
            ],
            [
                "meta_id" => "7230",
                "post_id" => "3926",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Bored of grammar and textbooks? There\'s a fun way to improve your speaking and listening skills! Find out how to learn a language by watching TV and films.',
            ],
            [
                "meta_id" => "7279",
                "post_id" => "3958",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Read about my quest to get past intermediate and become fluent in Spanish in 6 months. This month, I learnt that baby steps help me get better results.",
            ],
            [
                "meta_id" => "8638",
                "post_id" => "4141",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Need motivation to learn a language? Get inspired by these 50 incredible women who are making invaluable contributions to the world of language learning.",
            ],
            [
                "meta_id" => "8760",
                "post_id" => "4215",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'I used to think it was almost impossible to learn a second language as an adult. But then I realised I\'d been doing it wrong.',
            ],
            [
                "meta_id" => "8791",
                "post_id" => "4244",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Ever feel overwhelmed by the choice of language learning tools? Or like you don\'t know what to concentrate on first? Azren helps you get focused.',
            ],
            [
                "meta_id" => "8924",
                "post_id" => "4286",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Looking for resources that will help you speak and understand Italian fast? These 38 tools will help you do exactly that, from beginner to advanced.",
            ],
            [
                "meta_id" => "8965",
                "post_id" => "4317",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Did you know that around 30% of English words are similar to Italian words? All you have to do is put on an accent and you\'re speaking Italian!',
            ],
            [
                "meta_id" => "9043",
                "post_id" => "4348",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Do you know what a panini is? It might not be exactly what you think it is. In this week\'s episode, learn how to avoid typical tourist mistakes in Italian.',
            ],
            [
                "meta_id" => "9117",
                "post_id" => "4356",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Learn the verb "parlare" which means "speak" so you can say all kinds of useful phrases like "do you speak English?" and "I speak a bit of Italian".',
            ],
            [
                "meta_id" => "9164",
                "post_id" => "4358",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Learn more about the verb "parlare" which means "speak". By the end, you\'ll be able to say all kinds of useful phrases like "do you speak English?"',
            ],
            [
                "meta_id" => "9208",
                "post_id" => "4364",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Problems with Italian pronunciation? Learn how to make the "gli" sound in Italian, so you can correctly pronounce words like "famiglia" and "bottiglia".',
            ],
            [
                "meta_id" => "9286",
                "post_id" => "4369",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Problems with Italian pronunciation? Learn how to say the "gn" sound in Italian, so you can correctly pronounce words like "lasagne" and "Spagna" (Spain).',
            ],
            [
                "meta_id" => "9342",
                "post_id" => "4381",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'What shall we eat today? This is a very important question in Italy! In today\'s episode, you\'ll learn how to make suggestions and ask questions in Italian.',
            ],
            [
                "meta_id" => "9385",
                "post_id" => "4386",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Did you know that there\'s more than one way to say "OK" in Italian? In today\'s lesson, you\'ll learn some handy little words that Italians say all the time.',
            ],
            [
                "meta_id" => "9430",
                "post_id" => "4390",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Do you know how to ask polite questions in Italian? Whether it\'s a coffee, directions or a date, it\'s one of the most important skills to master in Italian.',
            ],
            [
                "meta_id" => "9474",
                "post_id" => "4394",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'To speak Italian, you\'ll need to combine what you already know - no matter how little - to say new things. In today\'s lesson, we\'ll show you how.',
            ],
            [
                "meta_id" => "9519",
                "post_id" => "4398",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Can you pronounce fettuccine, gnocchi, and bruschetta? The letter C can be tricky in Italian! Learn how to pronounce Italian food names with C and CH.",
            ],
            [
                "meta_id" => "9567",
                "post_id" => "4402",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Why does the "g" in marGherita sound different to the "g" in "quattro formaGGi"? In this episode, you\'ll learn how to say Italian food names correctly.',
            ],
            [
                "meta_id" => "9620",
                "post_id" => "4409",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Do you know how to get from the airport to your hotel, using only Italian? After today\'s episode you will! Listen to learn some handy Italian travel phrases.',
            ],
            [
                "meta_id" => "9669",
                "post_id" => "4413",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Learn to count to 20 in Italian and avoid common mistakes beginners make. Also, how to use these numbers for important stuff, like buying beer and paying.",
            ],
            [
                "meta_id" => "9719",
                "post_id" => "4417",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "How do you count to 100 in Italian? And how can you use these numbers to make your fiancé do the dishes? Find out how in 5 minute Italian, episode 15.",
            ],
            [
                "meta_id" => "9770",
                "post_id" => "4421",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Can\'t roll your Rs? With the right techniques, you can probably learn. Learn how + a trick that\'ll instantly help you pronounce R more like an Italian.',
            ],
            [
                "meta_id" => "9822",
                "post_id" => "4425",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'You already know buongiorno and ciao. But do you know how Italians really greet each other? It\'s a bit different to how they teach it in textbooks.',
            ],
            [
                "meta_id" => "9873",
                "post_id" => "4427",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Learn the most popular conversation starter of all time - an essential topic to master if you want to make small talk with Italians.",
            ],
            [
                "meta_id" => "9927",
                "post_id" => "4431",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Summer’s coming, and that can only mean one thing. Gelato time! Find out how to order an ice-cream in this week’s episode of 5 minute Italian.",
            ],
            [
                "meta_id" => "9980",
                "post_id" => "4433",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'What’s the difference between “buono” and “bene”? And what about bello and bravo? If you’ve ever felt confused about these words, today\'s lesson is for you.',
            ],
            [
                "meta_id" => "10046",
                "post_id" => "4442",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Contrary to popular belief, Italians talk about the weather just as much as English people do. Master this essential skill in this week\'s episode.',
            ],
            [
                "meta_id" => "10103",
                "post_id" => "4446",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Where\'s the train station? Which bus should I take? When does the train leave? How long does it take? Get around Italy with these travel questions.',
            ],
            [
                "meta_id" => "10161",
                "post_id" => "4450",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "One of the nicest things to do in Italy is sit out in a piazza with a nice glass of vino (or two!) Learn how to order wine like an Italian in this episode.",
            ],
            [
                "meta_id" => "10193",
                "post_id" => "4451",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'A few months ago, I had a plan: to try and get fluent in Spanish by this summer. But as tends to happen with plans, things didn\'t go as expected.',
            ],
            [
                "meta_id" => "10280",
                "post_id" => "4474",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Imagine going into a restaurant in Italy and doing everything in Italian - from greeting the waiter to asking for the bill. Read on to find out how!",
            ],
            [
                "meta_id" => "10340",
                "post_id" => "4476",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Did you know that Italians don\'t have starter + main course + dessert? They have a different system, which you’ll need to know before ordering food in Italy.',
            ],
            [
                "meta_id" => "10400",
                "post_id" => "4479",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "You’re at the supermarket in Italy, but you don’t know where anything is! Find out how to ask for things and learn some important shopping vocabulary.",
            ],
            [
                "meta_id" => "10460",
                "post_id" => "4481",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'You’re at a gorgeous deli counter in Italy, but the server only speaks Italian! In this week\'s episode, learn how to order from food counters in Italian.',
            ],
            [
                "meta_id" => "10523",
                "post_id" => "4485",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "You know that feeling when you get to the till but you don’t know the language, so you just point and pray that they don’t ask you anything? Not anymore!",
            ],
            [
                "meta_id" => "10585",
                "post_id" => "4487",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'No trip to Italy would be complete without a wander around the food market! In today’s lesson, learn how to buy food "al mercato" in Italian',
            ],
            [
                "meta_id" => "10650",
                "post_id" => "4491",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "When you visit Italy, you’ll probably need to buy train and bus tickets, whether it’s to get to your accommodation or explore the town and surrounding areas.",
            ],
            [
                "meta_id" => "10780",
                "post_id" => "4495",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "What time is it? A simple question in your native language can feel difficult in a new language! But with a bit of practice, you’ll pick it up no problems.",
            ],
            [
                "meta_id" => "10850",
                "post_id" => "4500",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "When does the train leave? How long does it take? How much does it cost? Learn these essential questions so you can get around Italy on public transport.",
            ],
            [
                "meta_id" => "10917",
                "post_id" => "4504",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "How much does a ticket cost? When does the last one leave? Learn essential travel phrases so you can get around Italy on trains, trams, buses and... boats!",
            ],
            [
                "meta_id" => "10983",
                "post_id" => "4506",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "How do Italians celebrate Christmas? Find out, and learn useful words and phrases for talking about the festive period in this episode of 5 minute Italian.",
            ],
            [
                "meta_id" => "11050",
                "post_id" => "4508",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "What are your New Year’s resolutions? Find out ours and learn some useful words for talking about the New Year in episode 35 of 5 Minute Italian.",
            ],
            [
                "meta_id" => "11118",
                "post_id" => "4510",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Do you know what a box is in Italian? Might not be what you think. Italian has borrowed many words from English, but they don\'t always mean the same thing!',
            ],
            [
                "meta_id" => "11187",
                "post_id" => "4512",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'The Italian verb "fare" (do) is used absolutely everywhere. Once you\'ve learnt it, you’ll be able to say tons of handy sentences in Italian.',
            ],
            [
                "meta_id" => "11263",
                "post_id" => "4517",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'How much can you remember from the 5 minute Italian episodes? Review the magic verb "fare" (do) together with other words and grammar from previous lessons.',
            ],
            [
                "meta_id" => "11334",
                "post_id" => "4519",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Italian verbs. There are lots of them, and they can pain to remember! But they’re not as hard as you think. Find out the easy way to learn Italian verbs.",
            ],
            [
                "meta_id" => "11409",
                "post_id" => "4523",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'What\'s the point in learning Italian verbs the hard way? In today\'s episode, you\'ll learn more sneaky shortcuts to help you remember Italian verbs.',
            ],
            [
                "meta_id" => "11484",
                "post_id" => "4525",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Did you know that Italian has 3 different ways to say you? The "normal you", the "formal you" and the "plural you". Learn an easy way to remember them all!',
            ],
            [
                "meta_id" => "11560",
                "post_id" => "4527",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "How do Italians celebrate Easter? Do they eat lots of chocolate? Find out and learn a special “gossip” form of Italian verbs to talk about other people.",
            ],
            [
                "meta_id" => "11683",
                "post_id" => "4538",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'You know "capeesh?!" from gangster movies? Turns out it\'s not Italian! Learn how Italians really use the verb "capire" (understand) + other -ire verbs.',
            ],
            [
                "meta_id" => "11741",
                "post_id" => "4545",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Reading is a smart and fun way to learn a foreign language. But how can you start reading when there are so many unfamiliar words? This tool will help.",
            ],
            [
                "meta_id" => "11774",
                "post_id" => "4553",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Carrie Anne James shares her advice on how to fall in love with a language so you can stop stressing, stay motivated and enjoy the process.",
            ],
            [
                "meta_id" => "11882",
                "post_id" => "4572",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Everything you need to know about using the Italian present tense! And bonus materials including a quiz and flashcards, so you can remember what you learn.",
            ],
            [
                "meta_id" => "12007",
                "post_id" => "4607",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Did you know that Italians have two ways to say “I love you”? If you use the wrong one with the wrong person, it could get embarrassing!",
            ],
            [
                "meta_id" => "12047",
                "post_id" => "4605",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Sound more French and impress native speakers by using idioms. Voilà 10 common and useful French idioms you can start using straight away!",
            ],
            [
                "meta_id" => "12130",
                "post_id" => "4639",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Ever felt confused about how to say “I like…” in Italian? It’s completely different to English. But once you learn how to think like an Italian, it\'s easy!',
            ],
            [
                "meta_id" => "12168",
                "post_id" => "4643",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'You\'ve been learning Spanish for a while but when you hear native speakers, no entiendes! Learn how to understand spoken Spanish with Juan from Easy Spanish.',
            ],
            [
                "meta_id" => "12258",
                "post_id" => "4669",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Do you know how to say "I miss you" in Italian? It\'s a bit backwards! But once you get into the Italian frame of mind, it\'s easy to learn.',
            ],
            [
                "meta_id" => "12340",
                "post_id" => "4673",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'If you\'re traveling in Italy and you want to be polite, you\'ll need to know how to say sorry! Learn how to apologise like an Italian in this week\'s episode.',
            ],
            [
                "meta_id" => "12423",
                "post_id" => "4679",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Scusa! Mi dispiace! Learn the difference between these expressions (and which one to use if you accidentally burp) in this episode of 5 Minute Italian.",
            ],
            [
                "meta_id" => "12639",
                "post_id" => "4729",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'The expressions "I like it" and "I miss you" can be a bit confusing in Italian, because they\'re backwards compared to in English. Let\'s practice using them!',
            ],
            [
                "meta_id" => "12663",
                "post_id" => "4708",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Become fluent in Mandarin Chinese without living in China? Let\'s do it! Read on for a step-by-step guide to learning Chinese from home.',
            ],
            [
                "meta_id" => "12763",
                "post_id" => "4769",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Italian pronouns - there are lots of them and they\'re tricky to use! Learn how to use them correctly in this mini-series. Today\'s lesson: subject pronouns.',
            ],
            [
                "meta_id" => "12847",
                "post_id" => "4775",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'What are direct object pronouns and when should you use them? Get a super simple explanation in this week\'s episode of 5 Minute Italian.',
            ],
            [
                "meta_id" => "12937",
                "post_id" => "4778",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Looking for a fun way to learn Italian with music? You\'re in the right place! Read on for the 9 best songs to learn Italian. Get ready for some karaoke!',
            ],
            [
                "meta_id" => "13020",
                "post_id" => "4805",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'What are direct object pronouns and when should you use them? Get a super simple explanation in this week\'s episode of 5 Minute Italian.',
            ],
            [
                "meta_id" => "13106",
                "post_id" => "4808",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "What are direct object pronouns in Italian? Get a super simple explanation + examples of how to use them in conversation.",
            ],
            [
                "meta_id" => "13193",
                "post_id" => "4811",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "What are direct object pronouns? Get a super simple explanation of direct object pronouns in Italian + examples of how to use them in conversation.",
            ],
            [
                "meta_id" => "13287",
                "post_id" => "4820",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'You want to practice speaking Italian but... what if you forget a word? Or you don\'t understand? Here are 6 Italian phrases to keep the conversation going.',
            ],
            [
                "meta_id" => "13353",
                "post_id" => "4838",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Looking for resources to help you speak and understand Russian fast? These 15 tools will help you do exactly that, from beginner to advanced.",
            ],
            [
                "meta_id" => "13416",
                "post_id" => "4862",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Everything you need for your first conversation in Italian: from introductions and small talk, to how to deal with nerves and find speaking partners.",
            ],
            [
                "meta_id" => "13546",
                "post_id" => "4899",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'You\'ve got a weekend in Milan, what can you do? Learn to talk about famous Italian monuments and traditions in this episode of 5 Minute Italian.',
            ],
            [
                "meta_id" => "13621",
                "post_id" => "4910",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Most of the advice on "how to get over your fear of speaking a foreign language" didn\'t work for me. Luckily, I found a very simple way that did!',
            ],
            [
                "meta_id" => "13663",
                "post_id" => "4963",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Do you ever get stuck when speaking French? These 6 French conversation phrases will help you keep talking. Au revoir awkward silences!",
            ],
            [
                "meta_id" => "13770",
                "post_id" => "4985",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                '"Gli" can feel tricky at first because it\'s very different to English. This lesson will show you a simple way to use "gli" in Italian (+ lots of examples).',
            ],
            [
                "meta_id" => "13860",
                "post_id" => "4998",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "In this in-depth guide, I’ll show you how to tune your ears into the language you’re learning so you can follow what native speakers are saying.",
            ],
            [
                "meta_id" => "13963",
                "post_id" => "5023",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Learn how to use "gli" to talk about groups of people in this episode of 5 minute Italian. Includes lots of example sentences.',
            ],
            [
                "meta_id" => "14011",
                "post_id" => "5028",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Do you ever feel stilted when you speak Spanish? Or get worried about long pauses while you think about what to say? Spanish "filler words" to the rescue!',
            ],
            [
                "meta_id" => "14155",
                "post_id" => "5054",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Learn how to use the Italian pronoun "le", which means "to her" or "for her". Includes: example sentences, a quiz and flashcards to help you remember.',
            ],
            [
                "meta_id" => "14204",
                "post_id" => "5051",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Can you speak a foreign language better after a drink or two? Find out what the science says + get tips on how to boost your confidence without the booze.",
            ],
            [
                "meta_id" => "14234",
                "post_id" => "5084",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "These little French filler words are easy to remember and instantly help you sound more French. Includes an audio class with Carrie from French is Beautiful.",
            ],
            [
                "meta_id" => "14356",
                "post_id" => "5107",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Listen me! Sounds funny in English, doesn\'t it? But that’s how they say it in Italian. Learn more Italian expressions like this and how to use them.',
            ],
            [
                "meta_id" => "14399",
                "post_id" => "5113",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "This innocent little word could be sabotaging your efforts to learn a language. Stop saying it and make this the year you learn a language!",
            ],
            [
                "meta_id" => "14487",
                "post_id" => "5133",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "An interview with Italian teacher and language expert Stefano - get tips on how to learn grammar, make consistent progress and stay motivated all year.",
            ],
            [
                "meta_id" => "14576",
                "post_id" => "5138",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Tired of textbooks? Binge watch your way to Italian fluency with these 14 brilliant Italian YouTube channels. Including subtitles to help you follow along.",
            ],
            [
                "meta_id" => "14605",
                "post_id" => "5174",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Speaking Spanish can feel scary at first - so many things could go wrong! These 13 Spanish phrases will help you manage the conversation smoothly.",
            ],
            [
                "meta_id" => "14824",
                "post_id" => "5211",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Gli, le, mi, ti... Those little words are everywhere in Italian! This lesson will help you understand what they mean and when to use them in conversation.",
            ],
            [
                "meta_id" => "14893",
                "post_id" => "5218",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Terrible at languages at school? Don\'t write yourself off just yet. Find out how to learn a foreign language as an adult - and enjoy the experience!',
            ],
            [
                "meta_id" => "14974",
                "post_id" => "5227",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Give it to me. I\'ll buy it for you. To say these sentences in Italian, you\'ll need a "double object pronoun". Learn what they are and how to use them.',
            ],
            [
                "meta_id" => "15260",
                "post_id" => "5338",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Tempo and volta - they both mean "time" in Italian. But be careful, they\'re not interchangeable - learn when to use them in this episode of 5 Minute Italian.',
            ],
            [
                "meta_id" => "15391",
                "post_id" => "5358",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Today we\'re talking about two important words that people tend to forget in Italian - lo and gli. Learn how to use them in this episode of 5 Minute Italian.',
            ],
            [
                "meta_id" => "15587",
                "post_id" => "5369",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'L\', le, gli... there are many different ways to say "the" in Italian! Learn how to say it before vowels in this episode of 5 Minute Italian.',
            ],
            [
                "meta_id" => "15609",
                "post_id" => "5344",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Why are some people good at foreign languages? Or not so good? Professor Tim Keeley shares how certain personality traits can help you learn a language.",
            ],
            [
                "meta_id" => "15687",
                "post_id" => "5392",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Want to speak a foreign language? Without putting on pants? In this post, I\'ll show you how to learn any language with online tutors on italki.',
            ],
            [
                "meta_id" => "15881",
                "post_id" => "5459",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Asking and answering questions with "how long" in Italian. It\'s easy when you know how! All you need is a little word "da".',
            ],
            [
                "meta_id" => "16023",
                "post_id" => "5473",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'What\'s the difference between "da" and "per"? In English, they can both translate as "for", but they\'re not interchangeable in Italian.',
            ],
            [
                "meta_id" => "16222",
                "post_id" => "5510",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'What does casino mean in Italian? It\'s a fun slang word that Italians use all the time. And the meaning is quite different compared to in English!',
            ],
            [
                "meta_id" => "16260",
                "post_id" => "5512",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "A list of the best Spanish TV shows on Netflix and a step-by-step guide on how to use them to learn Spanish. Pjs and popcorn optional.",
            ],
            [
                "meta_id" => "16393",
                "post_id" => "5544",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Molto, molti, molta, molte... what\'s the difference? And when should you use them? It\'s actually quite simple. Find out more in this episode.',
            ],
            [
                "meta_id" => "16686",
                "post_id" => "5566",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'This is for you. Whether you\'re multilingual or learning your first few words. We see you. And we need more people like you in the world.',
            ],
            [
                "meta_id" => "16818",
                "post_id" => "5579",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Did you know that there are two different ways to say "jealous" in Italian? But watch out, because they\'re not interchangeable. Learn how to use them in this episode.',
            ],
            [
                "meta_id" => "16994",
                "post_id" => "5607",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Do you know the difference between eggs and grapes in Italian? It\'s easy to get them mixed up. Learn how to differentiate them in this episode.',
            ],
            [
                "meta_id" => "17132",
                "post_id" => "5616",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'I agree. It\'s one of those useful little phrases that you\'ll find yourself saying all the time. Find out how in this episode of 5 minute Italian.',
            ],
            [
                "meta_id" => "17251",
                "post_id" => "5622",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Do you have hunger? Learn how Italians say this important (and slighly odd) phrase to make sure you never have to go without pizza, pasta or gelato in Italy.",
            ],
            [
                "meta_id" => "17374",
                "post_id" => "5630",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "You’re right! I’m always right. Learn how to tell someone that they’re right (or not right) in this episode of 5 minute Italian.",
            ],
            [
                "meta_id" => "17492",
                "post_id" => "5637",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Learn how to say “it makes sense” in Italian and avoid an easily made (but kind of embarrassing!) mistake. Find out more in this episode of 5 minute Italian.",
            ],
            [
                "meta_id" => "17894",
                "post_id" => "5715",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "If you want to speak Italian, you have to practice! But it’s not always easy to find people or know what to say. Learn 3 smart ways to practice speaking Italian.",
            ],
            [
                "meta_id" => "18006",
                "post_id" => "5720",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "If you want to speak Italian, you have to practice! But it’s not always easy to find people or know what to say. Learn 3 smart ways to practice speaking Italian. Ever heard “magari” in Italian and wondered what it meant? It actually has 2 very different meanings. Once you know them, it’s easy!",
            ],
            [
                "meta_id" => "18077",
                "post_id" => "5726",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Had a long break from language learning and you’re not sure how to get back into it? Here are 9 gentle steps that will help you pick up where you left off.",
            ],
            [
                "meta_id" => "18207",
                "post_id" => "5742",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Ever heard the sound “boh” in Italian and wondered what it meant? Find out what it means and how to use it like a real Italian.",
            ],
            [
                "meta_id" => "18321",
                "post_id" => "5751",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "In English, you can “have” a coffee or “have” lunch. But Italians don’t say it that way. Find out how to talk about having food and drink in episode #80 of five minute Italian.",
            ],
            [
                "meta_id" => "18408",
                "post_id" => "5764",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Tired of trying to be a good student? Give these 7 “bad” habits a try:‌ they’ll help you stay motivated and speak the language faster.",
            ],
            [
                "meta_id" => "18714",
                "post_id" => "5783",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "How to prepare for your first conversations, find people to practice with and manage nerves and mistakes: everything you need to start speaking a foreign language!",
            ],
            [
                "meta_id" => "18856",
                "post_id" => "5807",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "In English we can “have lunch” and “have dinner”, but not in Italian! Find out how to talk about having lunch and having dinner in this mini lesson.",
            ],
            [
                "meta_id" => "18972",
                "post_id" => "5810",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Did you know that “piace” doesn’t really mean like in Italian? Once you learn the true meaning, it becomes a lot easier to understand and use correctly. Learn how in this mini lesson.",
            ],
            [
                "meta_id" => "19233",
                "post_id" => "5867",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Check out these Italian TV shows and get tips on how to use them - the ultimate guide to learning Italian from your sofa!",
            ],
            [
                "meta_id" => "19493",
                "post_id" => "5953",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Check out these Italian TV shows and get tips on how to use them - the ultimate guide to learning Italian from your sofa!",
            ],
            [
                "meta_id" => "19736",
                "post_id" => "5966",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Check out these French TV shows and get tips on how to use them - the ultimate guide to learning French from your sofa!",
            ],
            [
                "meta_id" => "20131",
                "post_id" => "6038",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "I like it = mi piace. It’s simple enough in the present, but in the past, things get a little tricky! Learn how to talk about things you liked in this episode.",
            ],
            [
                "meta_id" => "20249",
                "post_id" => "6042",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "I liked the pasta, I liked that bread… learn how to talk about things you liked in the past in this episode of 5 minute Italian.",
            ],
            [
                "meta_id" => "20490",
                "post_id" => "6121",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Piacere in Italian: Learn how to talk about things you liked (or didn’t like) when they lasted for a while in the past.",
            ],
            [
                "meta_id" => "20611",
                "post_id" => "6125",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Learn how to use PIACERE in Italian: everything you need to know to use this verb like a native.",
            ],
            [
                "meta_id" => "20998",
                "post_id" => "6142",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Joy of Languages probably isn’t an ideal platform to talk politics, but this isn’t about politics. It’s about people. In the United States, the UK and globally.",
            ],
            [
                "meta_id" => "21067",
                "post_id" => "6168",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Whether you want to learn Twi to connect with Ghana, or Yoruba to understand Nollywood movies, learning a West African language will change your life.",
            ],
            [
                "meta_id" => "21405",
                "post_id" => "6186",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Whether you want to learn Twi to connect with Ghana, or Yoruba to understand Nollywood movies, learning a West African language will change your life.",
            ],
            [
                "meta_id" => "21834",
                "post_id" => "6265",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Check out these Spanish movies and get tips on how to understand them - the ultimate guide to learning Spanish from your sofa!",
            ],
            [
                "meta_id" => "22393",
                "post_id" => "6377",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Want to sound more authentic when speaking Italian? Read on to discover the secrets of having an Italian accent!",
            ],
            [
                "meta_id" => "22654",
                "post_id" => "6390",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "In Italian, there are two verbs that mean “to be”: essere and stare. When should you use each one? Find out in this simple guide!",
            ],
            [
                "meta_id" => "22786",
                "post_id" => "6411",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "How should you reply when someone asks “Ciao, come stai?”. Learn how to avoid simple mistakes when answering this classic Italian conversation opener.",
            ],
            [
                "meta_id" => "22911",
                "post_id" => "6421",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Careful when saying “I’m hot” in Italian! Why? Find out how to avoid embarrassing mistakes by learning these expressions with AVERE (have) in Italian.",
            ],
            [
                "meta_id" => "23066",
                "post_id" => "6445",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Think you know “essere” in Italian? Usually it means “to be” and is similar to English. But there’s a handful of phrases where it behaves differently!",
            ],
            [
                "meta_id" => "23197",
                "post_id" => "6465",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Curious to know when you use Italian subject pronouns, like io and tu? Most of the time, you don’t! But read on to find out how to use them like an Italian.",
            ],
            [
                "meta_id" => "23446",
                "post_id" => "6524",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "The mistake you might not realise you’re making! Is _grazie_ the word Italian learners mispronounce the most?",
            ],
            [
                "meta_id" => "23719",
                "post_id" => "6590",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Grazie! Hmm... now what do you say? Learn 7 Italian phrases you can use in response to grazie.",
            ],
            [
                "meta_id" => "23846",
                "post_id" => "6604",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Didn’t understand? Lost for words? Just keep getting stuck when you start speaking Italian? These 8 basic phrases will help you keep the conversation flowing.",
            ],
            [
                "meta_id" => "24321",
                "post_id" => "6713",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Want to make a good impression when you meet Italians? Learn the do’s and don\'ts when it comes to greeting and being polite in Italian.',
            ],
            [
                "meta_id" => "24451",
                "post_id" => "6724",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Wouldn’t it be great to walk into an Italian restaurant and place your order in perfect Italian? Here you’ll learn how to do that and more!",
            ],
            [
                "meta_id" => "24717",
                "post_id" => "6757",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Planning on buying some lovely things in Italy? How about doing your shopping in Italian! Learn some useful phrases and tips so you can shop like a local.",
            ],
            [
                "meta_id" => "24856",
                "post_id" => "6762",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Ever wondered what to say in Italian for “bon voyage”? Learn exactly how to wish someone a good trip in Italian, as well as other useful phrases for travelling.",
            ],
            [
                "meta_id" => "25000",
                "post_id" => "6777",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Do you know how to get around in Italian, or what to say when you get to your hotel? No more awkward English - read on and learn how to do it all in Italian!",
            ],
            [
                "meta_id" => "25137",
                "post_id" => "6784",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Are you struggling with the pronunciation of "euro" in Italian? Look no further! Get tips and tricks to say it like a native.',
            ],
            [
                "meta_id" => "25267",
                "post_id" => "6790",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Wondering how to say “hotel” in Italian? Read on to find out, and learn 10 more essential Italian travel words while you’re at it!",
            ],
            [
                "meta_id" => "25399",
                "post_id" => "6803",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Dive into the best of Italian TV with this must-watch list of five shows. And binge-watch your way to better Italian!",
            ],
            [
                "meta_id" => "25538",
                "post_id" => "6814",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Can you say August in Italian? You might be making a mistake without realising it! Learn how to pronounce it like an Italian.",
            ],
            [
                "meta_id" => "25667",
                "post_id" => "6826",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Ready to learn Italian? These 3 tips will help you learn quickly and start speaking the language asap. Let’s get started!",
            ],
            [
                "meta_id" => "25811",
                "post_id" => "6844",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "If you’re nervous to speak Italian don’t worry: you’re not alone! Here you’ll learn how to overcome these nerves and start speaking Italian with confidence.",
            ],
            [
                "meta_id" => "25953",
                "post_id" => "6860",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Learn how to order food in Italian and avoid the common mistakes most people make in Italian restaurants. You’ll be ordering like a local in no time!",
            ],
            [
                "meta_id" => "26083",
                "post_id" => "6871",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Knowing your Italian numbers is an essential skill for beginners. Learn and remember them easily with this guide.",
            ],
            [
                "meta_id" => "26217",
                "post_id" => "6884",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "What do you do every day? Here you’ll learn those routine Italian words and phrases you absolutely have to know!",
            ],
            [
                "meta_id" => "26351",
                "post_id" => "6890",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Feel like Italians say allora all the time, but not exactly sure what it means? Read on to learn the 4 situations when you should be using it - and when you shouldn’t!",
            ],
            [
                "meta_id" => "26490",
                "post_id" => "6902",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Learn these common Italian sayings with numbers and impress everyone with your knowledge of colloquial Italian!",
            ],
            [
                "meta_id" => "26624",
                "post_id" => "6906",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Do Italians say please? Learn the 3 most authentic ways to be polite in Italian.",
            ],
            [
                "meta_id" => "26761",
                "post_id" => "6912",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                'Confused by Italian prepositions? Don\'t worry! Here you’ll learn them in a simple way, so you can feel confident using them in conversation with Italians.',
            ],
            [
                "meta_id" => "26894",
                "post_id" => "6918",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Not sure how to respond in Italian? Use ‘altrettanto’ to have an instant reply in these everyday situations!",
            ],
            [
                "meta_id" => "27031",
                "post_id" => "6929",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Yes, in Italian is “sì”. But did you know that Italians have other ways to say yes? These 5 everyday expressions will help you fit in with the locals!",
            ],
            [
                "meta_id" => "27170",
                "post_id" => "6938",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Want to learn the months of the year in Italian fast? We’ll help you remember these important Italian words and avoid the most common learner mistakes.",
            ],
            [
                "meta_id" => "27306",
                "post_id" => "6952",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Find yourself fumbling over dates in Italian? Learn how to say and write them with confidence, and avoid the common mistakes that trip up most learners.",
            ],
            [
                "meta_id" => "27449",
                "post_id" => "6962",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Not sure how to use those little words like “al”, “del” and “sul” in Italian? Learn how in this simple guide!",
            ],
            [
                "meta_id" => "27603",
                "post_id" => "6973",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "How do you say “cheers” in Italian? Learn the two main ways, plus a few important rules so you can toast like a local!",
            ],
            [
                "meta_id" => "27739",
                "post_id" => "6978",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Get practical tips on how to start speaking Italian. In this friendly guide, you’ll learn from real people who’ve done it, despite the jitters!",
            ],
            [
                "meta_id" => "27879",
                "post_id" => "6987",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "“Prego” in Italian often means “you’re welcome”. But did you know that it has 7 other meanings that are really useful for travel? Learn them here!",
            ],
            [
                "meta_id" => "28019",
                "post_id" => "6995",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Where do Italians vacation? Avoid the typical tourist traps and experience the real Italy with tips from our Italian teachers.",
            ],
            [
                "meta_id" => "28167",
                "post_id" => "7010",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Gnocchi, bruschetta, tagliatelle… Italian dishes are easier to eat than pronounce! Impress your friends by learning to pronounce these Italian menu favourites.",
            ],
            [
                "meta_id" => "28483",
                "post_id" => "7124",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Avere is one of the most important verbs in Italian. Learn to use it in conversation, and avoid these common mistakes!",
            ],
            [
                "meta_id" => "28645",
                "post_id" => "7163",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "These Italian movies are so good, you’ll forget you’re studying! Choose your favourites from dramas, classics and comedies, with tips on how to watch.",
            ],
            [
                "meta_id" => "28789",
                "post_id" => "7198",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "How do you say “so” in Italian? Most of the time, you can say “così”, a handy word for lots of different situations. Learn how to use it in this lesson.",
            ],
            [
                "meta_id" => "28952",
                "post_id" => "7218",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Learn how to greet Italians at night and in the evening and avoid these common learner mistakes!",
            ],
            [
                "meta_id" => "29091",
                "post_id" => "7225",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "Gnocchi, bruschetta, tagliatelle… Italian dishes are easier to eat than pronounce! Impress your friends by learning to pronounce these Italian menu favourites.",
            ],
            [
                "meta_id" => "29245",
                "post_id" => "7229",
                "meta_key" => "_yoast_wpseo_metadesc",
                "meta_value" =>
                "When should you use the verb stare? It can feel confusing at first – let’s clear things up so you can use it with confidence in conversation!",
            ],
        ];

        foreach ($wp_postmeta as $source) {
            $target = \App\Models\Post::withoutGlobalScopes()
                ->firstWhere("wp_id", $source["post_id"]);
            if (!$target) {
                $target = \App\Models\Podcast::withoutGlobalScopes()
                    ->firstWhere("wp_id", $source["post_id"]);
            }
            if ($target) {
                $target->introduction = $source["meta_value"];
                $target->save();
                echo "Updated: " . $target->id . PHP_EOL;
            } else {
                echo "Post not found: " . $source["post_id"] . PHP_EOL;
            }
        }
    }
}
