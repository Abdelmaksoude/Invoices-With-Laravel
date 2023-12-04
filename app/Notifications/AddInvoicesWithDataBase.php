<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\Invoices;


class AddInvoicesWithDataBase extends Notification
{
    use Queueable;
    private $Invoices;

    /**
     * Create a new notification instance.
     */
    public function __construct($Invoices)
    {
        $this->Invoices = $Invoices;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'id'=>$this->Invoices->id,
            'title'=>'تم اضافة فاتوره جديده بواسطة : ',
            'user'=>Auth::user()->name
        ];
    }
}
