<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Balasan;
use Illuminate\Support\Facades\Mail;
use App\Mail\BalasanLaporanMail;
use Rap2hpoutre\FastExcel\FastExcel;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class ReportController extends Controller
{
    // ================== FORM PENUH ==================
    public function create()
{
    return view('formpenuh');
}

  /**
 * Simpan laporan dari form.
 */
public function store(Request $request)
{
    // Validasi data form
    $validated = $request->validate([
        'nama' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
        'email' => 'nullable|email',
        'jenis_laporan' => 'required|string',
        'tempat_kejadian' => 'required|string',
        'tanggal_kejadian' => 'required|date',
        'isi_laporan' => 'required|string',
        'dokumen_pendukung' => 'nullable|file||mimes:pdf,jpg,png,xlsx,mp3,mp4|max:5120',
    ]);

    // Simpan dokumen kalau ada
    if ($request->hasFile('dokumen_pendukung')) {
        $validated['dokumen_pendukung'] = $request->file('dokumen_pendukung')->store('dokumen_pendukung', 'public');
    }

    // handle upload file
        $filePath = null;
        if ($request->hasFile('dokumen_pendukung')) {
            $filePath = $request->file('dokumen_pendukung')->store('documents', 'public');
        }

        // simpan ke DB
        Report::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'jenis_laporan' => $validated['jenis_laporan'],
            'tempat_kejadian' => $validated['tempat_kejadian'],
            'tanggal_kejadian' => $validated['tanggal_kejadian'],
            'isi_laporan' => $validated['isi_laporan'],
            'dokumen_pendukung' => $filePath,
            'status' => 'pending',
        ]);

    // Redirect ke halaman selesai
return redirect()->route('form.selesai')->with('success', 'Laporan berhasil dikirim!');
}

    // ================== FORM ANONIM ==================
    public function createAnonim()
    {
        return view('formanonim'); // view form anonim
    }

    public function storeAnonim(Request $request)
    {
        $validated = $request->validate([
            'jenis_laporan'     => 'required|string',
            'tempat_kejadian'   => 'required|string',
            'tanggal_kejadian'  => 'required|date',
            'isi_laporan'       => 'required|string',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,jpg,png,xlsx,mp3,mp4|max:5120',
        ]);

        // Simpan dokumen kalau ada
    if ($request->hasFile('dokumen_pendukung')) {
        $validated['dokumen_pendukung'] = $request->file('dokumen_pendukung')->store('documents', 'public');
    }

    // handle upload file
        $filePath = null;
        if ($request->hasFile('dokumen_pendukung')) {
            $filePath = $request->file('dokumen_pendukung')->store('documents', 'public');
        }

        // simpan ke DB
        Report::create([
            'nama'              => null,
            'email'             => null,
            'jenis_laporan'     => $validated['jenis_laporan'],
            'tempat_kejadian'   => $validated['tempat_kejadian'],
            'tanggal_kejadian'  => $validated['tanggal_kejadian'],
            'isi_laporan'       => $validated['isi_laporan'],
            'dokumen_pendukung' => $filePath,
            'status'            => 'pending',
        ]);

        // Redirect ke halaman selesai
return redirect()->route('form.selesai')->with('success', 'Laporan anonim berhasil dikirim!');
}

    // ================== ADMIN DASHBOARD ==================
    public function index()
    {
        $reports = Report::latest()->get();
        return view('dashboard', compact('reports'));
    }

    public function show($id)
{
    $laporan = Report::findOrFail($id);
    return view('laporanDetail', compact('laporan'));
}

    // public function respond(Request $request, $id)
    // {
    //     $report = Report::findOrFail($id);

    //     if ($report->email) {
    //         \Mail::raw($request->message, function ($message) use ($report) {
    //             $message->to($report->email)
    //                     ->subject('Respon Laporan Anda');
    //         });

    //         $report->status = 'Direspon';
    //         $report->save();

    //         return redirect()->route('dashboard')->with('success', 'Respon terkirim ke email pelapor.');
    //     }

    //     return redirect()->back()->with('error', 'Laporan anonim tidak bisa direspon via email.');
    // }

// BIAR MUNCUL DI CARD DASHBOARD
public function dashboard()
{
    // Data untuk card
    $laporanMasuk = Report::count();
    $laporanPending = Report::where('status', 'pending')->count();
    $laporanSelesai = Report::where('status', 'selesai')->count();

    // Data untuk tabel di dashboard
    $reports = Report::latest()->get();

    // Kirim semuanya ke view
    return view('dashboard', compact(
        'laporanMasuk',
        'laporanPending',
        'laporanSelesai',
        'reports'
    ));
}

// nampilin menu laporan masuk
public function laporanMasuk()
{
    $laporanMasuk = Report::count();
    $laporanPending = Report::where('status', 'pending')->count();
    $laporanSelesai = Report::where('status', 'selesai')->count();

    $reports = Report::where('status', 'pending')
        ->orderBy('created_at', 'desc')
        ->get();

    return view('laporanMasuk', compact(
        'reports',
        'laporanMasuk',
        'laporanPending',
        'laporanSelesai'
    ));
}

// Halaman Laporan Selesai
public function laporanSelesai()
{
    $laporanMasuk = Report::count();
    $laporanPending = Report::where('status', 'pending')->count();
    $laporanSelesai = Report::where('status', 'selesai')->count();

    $reports = Report::where('status', 'selesai')->latest()->get();

    return view('laporanSelesai', compact(
        'reports',
        'laporanMasuk',
        'laporanPending',
        'laporanSelesai'
    ));
}

// balasan laporan
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
        // kirim email pakai template blade
        Mail::send('emails.balasan', ['message' => $request->message], function ($mail) use ($laporan) {
            $mail->to($laporan->email)
                 ->subject('Balasan atas laporan Anda');
        });

        // Simpan ke tabel balasan
        \App\Models\Balasan::create([
            'report_id' => $laporan->id,
            'message'   => $request->message,
        ]);

        // Ubah status laporan jadi "selesai"
        $laporan->status = 'selesai';
        $laporan->save();

        // Setelah sukses kirim & ubah status → langsung pindah ke menu laporan selesai
        return redirect()->route('laporan.selesai')->with('success', 'Balasan berhasil dikirim dan laporan dipindahkan ke Laporan Selesai.');
    } catch (\Exception $e) {
        return back()->with('error', 'Gagal mengirim email: ' . $e->getMessage());
    }
}

// halaman selesai untuk laporan anonim
public function selesai(Request $request)
{
    $laporan = Report::findOrFail($request->id);

    // cek anonim
    if ($laporan->email === null) {

        // update status jadi Selesai (konsisten)
        $laporan->status = 'selesai';
        $laporan->save();

        // redirect ke halaman daftar selesai
        return redirect()->route('laporan.selesai')
            ->with('success', 'Laporan anonim telah dipindahkan ke Laporan Selesai.');
    }

    return back()->with('error', 'Laporan ini bukan anonim, gunakan fitur kirim balasan.');
}


// export laporan selesai ke excel
public function exportExcel(Request $request)
{
    $bulan = $request->bulan;

    if (!$bulan) {
        return back()->with('error', 'Silakan pilih bulan terlebih dahulu.');
    }

    // Pisahkan tahun dan bulan
    [$tahun, $bln] = explode('-', $bulan);

    // Daftar nama bulan
    $namaBulan = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
        '04' => 'April', '05' => 'Mei', '06' => 'Juni',
        '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
        '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
    ];

    // Ambil data laporan selesai sesuai bulan dan tahun
    $laporan = \App\Models\Report::whereYear('tanggal_kejadian', $tahun)
        ->whereMonth('tanggal_kejadian', $bln)
        ->where('status', 'selesai')
        ->get(['nama', 'email', 'jenis_laporan', 'tempat_kejadian', 'tanggal_kejadian']);

    if ($laporan->isEmpty()) {
        return back()->with('error', 'Tidak ada laporan selesai di bulan yang dipilih.');
    }

    // Buat spreadsheet baru
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // ====== Judul ======
    $judul = "Rekap Laporan Pelanggaran Bulan " . $namaBulan[$bln] . " " . $tahun;
    $sheet->mergeCells('A1:E1');
    $sheet->setCellValue('A1', $judul);
    $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
    $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    // ====== Header tabel ======
    $headers = ['Nama', 'Email', 'Jenis Laporan', 'Tempat Kejadian', 'Tanggal Kejadian'];
    $sheet->fromArray($headers, null, 'A3');

    // ====== Isi data ======
    $row = 4;
    foreach ($laporan as $item) {
        $sheet->setCellValue("A{$row}", $item->nama ?? '-');
        $sheet->setCellValue("B{$row}", $item->email ?? '-');
        $sheet->setCellValue("C{$row}", $item->jenis_laporan);
        $sheet->setCellValue("D{$row}", $item->tempat_kejadian);
        $sheet->setCellValue("E{$row}", Carbon::parse($item->tanggal_kejadian)->format('d-m-Y'));
        $row++;
    }

    // ====== Styling header ======
    $sheet->getStyle('A3:E3')->applyFromArray([
        'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
        'fill' => [
            'fillType' => Fill::FILL_SOLID,
            'color' => ['rgb' => '0033AB']
        ],
        'alignment' => [
            'horizontal' => Alignment::HORIZONTAL_CENTER,
            'vertical' => Alignment::VERTICAL_CENTER,
        ],
        'borders' => [
            'allBorders' => ['borderStyle' => Border::BORDER_THIN],
        ],
    ]);

    // ====== Border seluruh tabel ======
    $sheet->getStyle("A3:E" . ($row - 1))->applyFromArray([
        'borders' => [
            'allBorders' => ['borderStyle' => Border::BORDER_THIN],
        ],
    ]);

    // Lebar kolom otomatis
    foreach (range('A', 'E') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    // ====== Nama file ======
    $namaFile = "Rekap_Laporan_Selesai_{$namaBulan[$bln]}_{$tahun}.xlsx";

    // Export file Excel
    $writer = new Xlsx($spreadsheet);
    $tempPath = storage_path("app/public/{$namaFile}");
    $writer->save($tempPath);

    return response()->download($tempPath)->deleteFileAfterSend(true);
}


}
