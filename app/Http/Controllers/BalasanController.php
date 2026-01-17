<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Report;
use App\Models\Balasan;


class BalasanController extends Controller
{
    public function kirimBalasan(Request $request, $id)
    {
        $laporan = Report::findOrFail($id);

        if (!$laporan->email) {
            return back()->with('error', 'Pelapor tidak mencantumkan email.');
        }

        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        try {
    Mail::send('emails.balasan', ['isi_pesan' => $request->message], function ($mail) use ($laporan) {
        $mail->to($laporan->email)
             ->subject('Balasan atas laporan Anda');
    });

            // Simpan ke tabel 'balasans'
    Balasan::create([
        'report_id' => $laporan->id,
        'message' => $request->message,
    ]);

            // Update status laporan jadi selesai
            $laporan->status = 'selesai';
            $laporan->save();

            return redirect('/dashboard')->with('success', 'Balasan berhasil dikirim ke ' . $laporan->email);
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengirim email: ' . $e->getMessage());
        }
    }
}
