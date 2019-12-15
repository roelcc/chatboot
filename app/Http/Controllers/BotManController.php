<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function($botman, $message) {

            if ($message == 'Hola') {
                $this->askName($botman);
            }else{
                $botman->reply("¡Genial! Siguiente paso, necesito que me indiques en que sede te encuentras."."<br>".
                    "1.- Jirón Juan Antonio Ribeyro 142, Jesús María 15072"."<br>".
                    "2.- Jr, Cervantes 344, Cercado de Lima 15046");


            }

        });

        $botman->listen();
    }

    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Hola! Cual es tu nombre?', function(Answer $answer) {
            $name = $answer->getText();

            $this->say('Genial!'.$name. 'Siguiente paso, necesito que me indiques en que sede te encuentras.'."<br>".
                "1.- Jirón Juan Antonio Ribeyro 142, Jesús María 15072"."<br>".
                "2.- Jr, Cervantes 344, Cercado de Lima 15046");
        });
    }

    public function sede()
    {
        $botman = app('botman');

        $botman->hears('{message2}', function($botman, $message) {

            if ($message == '1') {
                $botman->reply("Gracias puede comunicarse al telefono 1"  );
            }else if($message == '2'){
                $botman->reply("Gracias puede comunicarse al telefono 2"  );


            }else{
                $botman->reply("Marque un # 1 o # 2"  );
            }

        });

        $botman->listen();
    }
}
