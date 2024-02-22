<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\sendEmail;

class MailController extends Controller
{
public function sendEmail()
{
    $data = 'This is my test email data. Let\'s check how it\'s working!';
    dispatch(new sendEmail($data));
    return 'Email sent successfully!';
}
}
