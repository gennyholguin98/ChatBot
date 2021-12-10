
<?php


include "Bot.php";
$bot = new Bot;
$questions = [
    //Solicitar cita
    
    "1"=>"Crea tu usuario",
    "2"=>"Ingresa codigo",
   
       
    //nombre
    "como te llamas?" =>"Soy Max y estoy para servirte. Selecciona 1. Solicitud de cita 2. Ver tramite",
    "cual es tu nombre?" =>"Soy Max y estoy para servirte. Selecciona 1. Solicitud de cita 2. Ver tramite",
    "tienes nombre?" =>"Soy Max y estoy para servirte.  Selecciona 1. Solicitud de cita 2. Ver tramite",


    //saludo
    "hola" =>"Hola que tal!",
    "un saludo" =>"como te va",
    "hello" =>"un gusto de verte",
 
    //despedida
    "adios" =>"cuidate",
    "hasta la proxima" =>"nos vemos pronto",
    "nos vemos" =>"te estare esperando",
    "hasta pronto" =>"Adios ♥",

    "tu nombre es?" => "Mi nombre es " . $bot->getName(),
    "tu eres?" => "Yo soy una " . $bot->getGender()
    
];

if (isset($_GET['msg'])) {
   
    $msg = strtolower($_GET['msg']);
    $bot->hears($msg, function (Bot $botty) {
        global $msg;
        global $questions;
        global $booleano;

        if($msg =='1'){
            $botty->metodo();
        }

        if ($msg == 'hi' || $msg == "hello") {
            $botty->reply('Hola');
        } elseif ($botty->ask($msg, $questions) == "") {
            $botty->reply("Lo siento, Las preguntas deben estar relacionadas con coronavirus.");
        } else {
            $botty->reply($botty->ask($msg,$questions));
        }

        
    });
}
