<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class MyTestConv extends Conversation
{
    protected $firstname;

    protected $email;

    public function askFirstname()
    {
        $this->ask('Привет, как твое имя?', function(Answer $answer) {
            // Save result
            $this->firstname = $answer->getText();

            $this->say('Рад знакомству,'.$this->firstname);
            $this->askEmail();
        });
    }

    public function askEmail()
    {
        $this->ask('Подскажи свой email', function(Answer $answer) {
            // Save result
            $this->email = $answer->getText();

            $this->say('Спасибо это то, что нужно!'.$this->firstname);
        });
    }

    public function run()
    {
        // This will be called immediately
        $this->askFirstname();
    }
}

