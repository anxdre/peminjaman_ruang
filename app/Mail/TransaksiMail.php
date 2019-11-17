<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Transaksi;
use App\Fasilitastransaksi;

class TransaksiMail extends Mailable
{
    use Queueable, SerializesModels;
    private $id_trans;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id_trans = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $transaksi = Transaksi::find($this->id_trans);
        $item = Fasilitastransaksi::where('id_transaksi', $this->id_trans)->get();
        return $this->from('peminjaman.ruang.ofc@gmail.com')
            ->subject("Pemberitahuan Persetujuan Peminjaman")
            ->view('mail.transaksiMail')
            ->with([
                'transaksi' => $transaksi,
                'item' => $item
            ]);
    }
}
