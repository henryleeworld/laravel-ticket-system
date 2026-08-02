<?php

namespace App\Notifications;

use Coderflex\LaravelTicket\Models\Message;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentEmailNotification extends Notification
{
    public function __construct(protected Message $message)
    {}

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
            ->subject(__('New comment on ticket :title', ['title' => $this->message->ticket->title]))
            ->line(__('New comment on ticket :title:', ['title' => $this->message->ticket->title]))
            ->line($this->message->message)
            ->action(__('View full ticket'), route('tickets.show', $this->message->ticket))
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
