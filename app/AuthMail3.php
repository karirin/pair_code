<?php

namespace App;

use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AuthMail3 extends Mailable
{
    use Queueable, SerializesModels;

    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    //メール送信で使うビュー、タイトル、ビューに渡す認証用URLを設定
    public function build()
    {
        return $this->view('mail.match')
            ->subject('【Pair Code】いいねが届いています！')
            ->with(['url' => $this->url]);
    }
}
