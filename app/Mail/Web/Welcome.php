<?php

namespace App\Mail\Web;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Welcome extends Mailable
{
  use Queueable, SerializesModels;

  public $user;
  public $mail_name;
  public $mail_address;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($user)
  {
    $this->user = $user;
    $this->mail_name = env('MAIL_FROM_NAME');
    $this->mail_address = env('MAIL_FROM_ADDRESS');
  }

  /**
   * Build the message.
   *
   * @return $this
   */
 public function build()
{
    return $this->from('support@cuktech.onlineacademicexperts.com', 'copatechclub')
                ->markdown('modules.mail.emails.web.welcome');
}
}
