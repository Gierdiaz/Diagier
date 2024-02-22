<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TwoFactorCodeNotification extends Mailable
{
    use Queueable;
    use SerializesModels;

    protected $twoFactorCode;

    /**
     * Create a new notification instance.
     *
     * @param string $code
     */
    public function __construct($twoFactorCode)
    {
        $this->twoFactorCode = $twoFactorCode;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.two-factor-code')->with([
            'twoFactorCode' => $this->twoFactorCode,
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
