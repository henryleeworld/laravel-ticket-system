<?php

namespace App\Notifications;

use Coderflex\LaravelTicket\Models\Ticket;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AssignedTicketNotification extends Notification
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
            ->subject(__('You have been assigned a new ticket'))
            ->line(__('You have been assigned a new ticket: ') . $this->ticket->title)
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
