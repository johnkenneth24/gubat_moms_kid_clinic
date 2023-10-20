<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use App\Models\BookAppointment;

class CancelledEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(protected BookAppointment $book_app,)
    {
        //
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
          from: new Address('gubatmomsandkidsclinic@gmail.com', 'GUBAT MOMS AND KID CLINIC'),
          subject: 'Appointment Cancelled',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
      return (new Content)
      ->view('mail.cancelled')
      ->with([
          'date' => $this->book_app->date_appointment->format('F d, Y'),
          'time' => date('h:i A', strtotime($this->book_app->time_appointment)),
          'type' => $this->book_app->category,
      ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
