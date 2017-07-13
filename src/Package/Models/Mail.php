<?php

namespace Hocza\MailTrans\Models;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected $table = "mailtrans_mails";

    protected $fillable = [
        'name',
        'sender_name',
        'sender_email',
        'subject',
        'subject_trans',
        'body',
        'body_trans',
        'template_path',
    ];

    protected $casts = [
        'subject_trans' => 'array',
        'body_trans' => 'array',
    ];

    public function getSubjectAttribute($value)
    {
        $currentLocale = \App::getLocale();
        if(config('mailtrans.default_lang') != $currentLocale)
            if(is_array($this->subject_trans) && key_exists($currentLocale,$this->subject_trans))
                return $this->subject_trans[$currentLocale];
        return $value;
    }

    public function getBodyAttribute($value)
    {
        $currentLocale = \App::getLocale();
        if(config('mailtrans.default_lang') != $currentLocale)
            if(is_array($this->body_trans) && key_exists($currentLocale,$this->body_trans))
                return $this->body_trans[$currentLocale];
        return $value;
    }

    public function compileSubject(array $data)
    {
        return $this->fillPlaceholders($this->subject, $data);
    }

    public function compileBody(array $data)
    {
        return $this->fillPlaceholders($this->body, $data);
    }

    protected function fillPlaceholders($string, $variables)
    {
        foreach($variables as $key => $value){
            $string = str_replace('{'.strtoupper($key).'}', $value, $string);
        }

        return $string;
    }
}
