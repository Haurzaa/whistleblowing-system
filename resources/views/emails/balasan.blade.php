{{-- resources/views/emails/balasan.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balasan Laporan Anda</title>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #f6f8fb;
            padding: 30px;
            color: #333;
        }
        .container {
            max-width: 600px;
            background: #fff;
            margin: auto;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #0033ab;
        }
        .message {
            background: #f0f4ff;
            border-left: 4px solid #0033ab;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
        }
        .footer {
            font-size: 13px;
            color: #666;
            margin-top: 20px;
            border-top: 1px solid #eee;
            padding-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Balasan atas Laporan Anda</h2>
        <p>Halo,</p>
        <p>Terima kasih telah mengirimkan laporan melalui sistem Whistleblowing kami. Berikut balasan dari tim kami:</p>

        <div class="message">
            <p>{!! nl2br(e($isi_pesan)) !!}</p>
        </div>

        <p>Jika ada pertanyaan lebih lanjut, silakan hubungi kami kembali melalui email ini.</p>

        <div class="footer">
            <p>Salam hormat,<br>
            <strong>Tim WBS BPR Majalengka</strong></p>
        </div>
    </div>
</body>
</html>
