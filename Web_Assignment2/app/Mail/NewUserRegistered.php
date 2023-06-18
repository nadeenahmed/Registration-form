<?php

namespace App\Mail;

use App\Models\Person;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $person;

    public function __construct(Person $person)
    {
        $this->person = $person;
    }

    public function build()
    {
        return $this->subject('New registered user')
                    ->view('email');
    }
}
