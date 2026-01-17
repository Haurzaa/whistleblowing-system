<?php

namespace App\Mail;

use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BalasanLaporanMail extends Mailable
{
    use Queueable, SerializesModels;

    public $laporan;
    public $messageContent;

    public function __construct(Report $laporan, $messageContent)
    {
        $this->laporan = $laporan;
        $this->messageContent = $messageContent;
    }

    public function build()
    {
        return $this->subject('Balasan atas laporan Anda')
                    ->view('emails.balasan')
                    ->with([
                        'laporan' => $this->laporan,
                        'messageContent' => $this->messageContent,
                    ]);
    }
}
