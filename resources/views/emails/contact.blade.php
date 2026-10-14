<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Baru - PT Roda Dunia Abadi</title>
    <style>
        body {
            background-color: #f4f6f8;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .email-wrapper {
            width: 100%;
            background-color: #f4f6f8;
            padding: 30px 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
        }
        .email-header {
            background-color: #ffffff;
            padding: 24px;
            text-align: center;
            border-bottom: 2px solid #f3f4f6;
        }
        .email-header h1 {
            color: #111827;
            font-size: 18px;
            margin: 0;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .email-body {
            padding: 30px;
            color: #374151;
        }
        .email-body h2 {
            font-size: 16px;
            color: #111827;
            margin-top: 0;
            margin-bottom: 8px;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 20px;
        }
        .info-table td {
            padding: 10px 0;
            border-bottom: 1px solid #f3f4f6;
            font-size: 14px;
            vertical-align: top;
        }
        .info-label {
            font-weight: bold;
            color: #4b5563;
            width: 35%;
        }
        .info-value {
            color: #1f2937;
            width: 65%;
        }
        .message-box {
            background-color: #f9fafb;
            border-left: 4px solid #ef4444; /* Aksen warna merah / primary */
            padding: 15px;
            border-radius: 4px;
            margin-top: 10px;
            font-size: 14px;
            color: #4b5563;
            line-height: 1.6;
            white-space: pre-line;
        }
        .email-footer {
            background-color: #f9fafb;
            padding: 16px;
            text-align: center;
            font-size: 12px;
            color: #9ca3af;
            border-top: 1px solid #e5e7eb;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <table class="email-container" width="100%" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
                <td>
                    <!-- Header dengan Title di Tengah -->
                    <div class="email-header">
                        <h1>PT Roda Dunia Abadi</h1>
                    </div>
                    
                    <!-- Isi Email / Body -->
                    <div class="email-body">
                        <h2>Pesan Baru dari Formulir Kontak</h2>
                        <p style="font-size: 13px; color: #6b7280; margin-bottom: 20px;">Berikut adalah detail pesan yang dikirimkan oleh pengunjung website:</p>
                        
                        <table class="info-table">
                            <tr>
                                <td class="info-label">Nama Lengkap</td>
                                <td class="info-value">: {{ $contactData['name'] }}</td>
                            </tr>
                            <tr>
                                <td class="info-label">Email</td>
                                <td class="info-value">: {{ $contactData['email'] }}</td>
                            </tr>
                            <tr>
                                <td class="info-label">Nomor Telepon</td>
                                <td class="info-value">: {{ $contactData['phone'] ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="info-label">Perusahaan</td>
                                <td class="info-value">: {{ $contactData['company'] ?? '-' }}</td>
                            </tr>
                        </table>

                        <p style="font-weight: bold; font-size: 14px; margin-bottom: 5px; color: #374151;">Isi Pesan:</p>
                        <div class="message-box">
                            {{ $contactData['message'] }}
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="email-footer">
                        &copy; {{ date('Y') }} PT Roda Dunia Abadi. All rights reserved.
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>