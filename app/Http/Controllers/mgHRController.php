<?php

namespace App\Http\Controllers;

use App\Mail\MailingLister;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

class mgHRController extends Controller
{
    //
    public function send(Request $request) {
        $information = (array)$request['mail_data'];
        $information = (object)$information;
        foreach($information->mailingList as $recepient):
            Mail::to($recepient)->send(new MailingLister($information));
        endforeach;
        return 200;
    }
}