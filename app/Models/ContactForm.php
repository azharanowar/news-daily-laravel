<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;
    private static $contact;

    public static function saveContactFormData($request) {
        self::$contact = new ContactForm();

        self::$contact->name    = $request->name;
        self::$contact->email   = $request->email;
        self::$contact->subject = $request->subject;
        self::$contact->message = $request->message;

        self::$contact->save();
    }
}
