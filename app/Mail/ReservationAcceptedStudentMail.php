<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationAcceptedStudentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reservation, $coach, $student)
    {
        $this->reservation = $reservation;
        $this->coach = $coach;
        $this->student = $student;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $assign_data = [
            'reservation' => $this->reservation,
            'coach' => $this->coach,
            'name' => $this->student['name'],
        ];
        return $this
            ->subject('予約確定のお知らせ')
            ->view('mail.reservation_accepted_student')
            ->with($assign_data);
    }
}
