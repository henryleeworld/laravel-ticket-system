<?php

namespace App\Notifications;

use App\Models\Ticket;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewTicketCreatedNotification extends Notification
{
    public function __construct(protected Ticket $ticket) {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable): array
    {
        if (config('app.enable_notifications')) {
            return ['mail'];
        }

        return [];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(__('New ticket'))
            ->line(__('New ticket have been created: ') . $this->ticket->title)
            ->action(__('View ticket'), route('tickets.show', $this->ticket))
            ->line(__('Thank you!'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable): array
    {
        return [];
    }
}
