<?php

use Illuminate\Database\Seeder;
use TTBand\Song;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $song = Song::firstOrCreate(['title' => 'Send Me On My Way', 'artist' => 'Rusted Root']);
        $song->body = <<<SEND
INTRO:  C  C  F  F
C              C               F               F
  (On my way)     (On my way)     (On my way)     (On my way)

VERSE:
C               C                   C            C
I would like to reach out my hand.  Om-be se-yo, om-be tell you to run,
F              F                                    C    C
  (on my way)    (on my way) and nobody-see, nobody-run.
     C               C            C               C
Well pick me up with golden hand. Om-be se-yo, om-be tell you to run,
F              F                                    C    C
  (on my way)    (on my way) and nobody-see, nobody-run.

CHORUS A:
      Am              G    F               Am                           G             F
Well, I would like to hold my little hand,    and we will run, we will,   and we will crawl, we will.
Am                  G    F               Am                           G                     G
    I would like to hold my little hand.    And we will run, we will,   and we will crawl…

CHORUS B:
              C                              C
Send me on my way (on my way), send me on my way (on my way)
              F                              F
Send me on my way (on my way), send me on my way (on my way)
              C                              C
Send me on my way (on my way), send me on my way (on my way)
              F                    F
Send me on my way (on my way), mmm-hmm (on my way)

INSTRUMENTAL:  C  C  F  F  C  C  F  F

(REPEAT VERSE THEN CHORUS A THEN CHORUS B)

TIN WHISTLE SOLO: C  C  F  F  C  C  F  F

(REPEAT CHORUS A)

CHORUS C:
              Am                 Fmaj7              C            G
Send me on my way, send me on my way, send me on my way-ay-ay-ay-hey ay
      Am                 Fmaj7              C            G
on my way. Send me on my way, send me on my way-ay-ay-ay-hey.
    Am    Fmaj7    C            G
Ay, ooo,  ooo,     way-ay-ay-ay-hey.
      Am      Fmaj7  C            G
On my way. Ooohoo.   Way-ay-ay-ay-hey, on my way

INSTRUMENTAL:  C  C  F  F  C  C  F  F

OUTRO: {quiet: light drums, guitar, vocals only}
C               C                   C            C
I would like to reach out my hand.  Om-be se-yo, om-be tell you to run,
F              F                                    C    C
  (on my way)    (on my way) and nobody-see, nobody-run.
SEND;
        $song->save();

        $song = Song::firstOrNew(['title' => 'Africa', 'artist' => 'Toto']);
        $song->body = <<<SEND
{verse:verse}
[B] I hear the drums [D#m]echoing to[G#m]night
[B]she has only [A]whispers of some [C#m]quiet conver[G#m]sa - [A]tion  [C#m]
[B] She's coming [D#m]in twelve thirty [G#m]flight
the [B]moolight winds re[A]flect the stars that [C#m7]guide me toward sal[G#m]va - [A]tion  [C#m]
[B] I stopped an [D#m]old man along the [G#m]way
[B]hoping to find some [A]old forgotten [C#m]words of ancient [G#m]mel - o[A]dies  [C#m]
[B] He turned to [D#7]me as if to [G#m]say hurry boy it's [A]waiting there for you [C#m]
{endverse}

{chorus:chorus}
[F#m] Gonna take a [D]lot to drag me a[A]way from [E]you
[F#m] There's nothing that a [D]hundred men or [A]more could ever [E]do
[F#m] I bless the [D]rains down in [A]Afri[E]ca
[F#m] Gonna take some [D]time to do the [A]things we never [C#m]ha - [E] - [F#m]d
{endchorus}

{repeat:intro}

{verse:verse 2}
[B] The wild dogs [D#m]cry out in the [G#m]night {comment:softly}
as [B]they grow restless [A]longing for some [C#m]solitary [G#m]compa - [A]ny  [C#m]
[B] I know that [D#m]I must do what's [G#m]right
sure as [B]Kilimanjaro [A]rises like [C#m]Olympus above the [G#m]Serenge - [A]ti  [C#m]
[B] I seek to [D#7]cure what's deep in[G#m]side, frightened of this [A]thing that I've become  [C#m]
{endverse}

{repeat:chorus}

{repeat:intro:2}

{verse:solo}
[B]  [D#m]  [G#m]  [B]  [A]  [C#m]  [G#m] [A] [C#m]
[B]  [D#7]  [G#m] hurry boy it's [A]waiting there for you [C#m]
{endverse}

{verse:final chorus}
[F#m] Gonna take a [D]lot to drag me a[A]way from [E]you
[F#m] There's nothing that a [D]hundred men or [A]more could ever [E]do
{soh}Next line is played 5x:{eoh}
[F#m] I bless the [D]rains down in [A]Afri[E]ca
[F#m] Gonna take some [D]time to do the [A]things we never [C#m]ha - [E] - [F#m]d
{endverse}

{repeat:intro:4}
SEND;
        $song->save();

        $song = Song::firstOrNew(['title' => 'Africa CB', 'artist' => 'Toto']);
        $song->body = <<<SEND

SEND;

    }
}