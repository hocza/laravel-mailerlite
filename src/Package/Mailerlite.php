<?php

namespace Hocza\MailTrans;

use Hocza\MailTrans\Models\Mail;

class MailTrans
{
    protected $default_lang;

    public function __construct(array $config)
    {
        $this->default_lang = $config['default_lang'];
    }

    public function sendMail(Mail $mail, $data, $recipient_email, $recipient_name = "")
    {
        $subject = $mail->compileSubject($data);
        $body = $mail->compileBody($data);
        \Mail::send($mail->view_name, ['body' => $body], function ($message) use($subject, $recipient_email, $recipient_name) {

            $message->from($mail->sender_email, $mail->sender_name);

            $message->subject($subject);

            $message->to($recipient_email,$recipient_name);
        });
    }
}
