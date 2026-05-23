<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Employment Certificate - {{ $user->name }}</title>
    <style>
        @page { margin: 40px 45px; }
        body { font-family: 'DejaVu Sans', sans-serif; color: #333; font-size: 11pt; line-height: 1.5; }
        .header { margin-bottom: 20px; }
        .header table { width: 100%; }
        .header .logo-col { width: 70px; vertical-align: middle; }
        .header .text-col { vertical-align: middle; }
        .header h1 { font-size: 20pt; color: #1D4ED8; margin: 0 0 2px 0; }
        .header .subtitle { font-size: 10pt; color: #6B7280; }
        hr { border: none; border-top: 2px solid #1D4ED8; margin: 15px 0; }
        .title { text-align: center; font-size: 14pt; font-weight: bold; color: #1D4ED8; margin: 20px 0; text-transform: uppercase; letter-spacing: 2px; }
        .date-line { text-align: right; margin-bottom: 15px; font-size: 10pt; }
        .salutation { margin-bottom: 8px; }
        .body-text { text-align: justify; margin-bottom: 15px; }
        .body-text p { margin-bottom: 8px; }
        .details-table { width: 100%; margin: 12px 0 15px; }
        .details-table td { padding: 6px 10px; border-bottom: 1px solid #E5E7EB; font-size: 11pt; }
        .details-table .label { font-weight: bold; color: #6B7280; width: 30%; }
        .details-table .value { font-weight: bold; color: #111827; }
        .closing { margin-top: 25px; }
        .closing .signature-line { margin-top: 40px; }
        .closing .signature-name { font-weight: bold; font-size: 11pt; }
        .closing .signature-title { font-size: 10pt; color: #6B7280; }
        .footer { position: fixed; bottom: 0; left: 0; right: 0; text-align: center; font-size: 8pt; color: #9CA3AF; border-top: 1px solid #E5E7EB; padding-top: 8px; }
    </style>
</head>
<body>
    <div class="header">
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td class="logo-col" width="70">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAYAAAA5ZDbSAAAACXBIWXMAAA7EAAAOxAGVKw4bAAADQklEQVR4nO3dvW3jQBAF4NHh0gPUgHJ14kzpFeEiDBdxRThV5k6UqwEDLkAXLUDYlEzuz8ybx/dFBiyIs/M4lCVxYTMREREREREREREREenqcLrcomuQAQ6ny62EO/1ZknsUpoJObE14CjmR2qnUNIPrFZCCBjQiEAUNwCMEhRzAe7o0zU6iGx19fFpojUWqJTW0YKeQa0shS/MU9EpZG5a1bjcsDWJYQ1cswU4xrmm1LTQBYY27iIMeTpfb9Xx0Pfb+/fVboz+eXlxqiFhv4XrQcjZ7LnYu2K88go5Yu5lTwKjBfsUY9NCDRJ21NeEWnpdts/G9GfLkUcGatYVbeIVsNv71+XfPJ4sMNqvr+bgb2bduTxj5l2LRY3oLzykuRgT9q9cTSbvr+bibTnQPNAH3nN4RzxeFJmCZp4DJKWByCpgcTcC939ZEvE0agSZgmUcVcK+pY5leM7KA5Tu6gFunj2l6zQgDNqsPiS1cM9KAzcz+/Pu7OLA1j82m69eFiEpwj+7J+rAXiG/DRqAMeC4s1gn9Ce0leq3eX9PRQWlOax0I69D3wXewvo62oAq4B7ZLNU3Amt55NAH3xDTFFAFreh1EnfEjj8uwJooJHoXhUg39SdZPWz63tg21BmTAj+5JLr/zamqZ4s/nt7uP8a5pDaiA19xsvn9/vX3am9l5ZEWT4yx8rBlW0DCvwbU7CUbuQECsaS2IgFsbMqKhiDXVgAhYxgkPuNeZ3nNiEGuqFR6wjBUaMOKWT8SaWmiCyUG9D+6h9aPFpe95s6ALuPWjy/1z/B9GPekSTS40YMQtn4g1tdAEkwsPGHHLJ2JNtcIDlrEgAkbc8olYUw2IgM0wt3wi1rQW1PvgRzsB7z12NMSa1oAKuFiy5dMbYk2ust99iES3zcpiCpicApblEP4RVGZp+pemUBBp+5W2cEcU/aFYRGd0Jz/dgirR94F+gXdsbt1bWvBW1jmLefFbOokfYmsE23q6YWhM9vpdZAw6Y83hMjRMwTZCbSBqXWkhNRSlDkqRQSOdZPQ8G61gg3g0XsECGBG0phZQj1AUbAI1ASnYZNYEpmATexS0ppbINEwFS0zBioiIiIiIiIiIiLj7DwZ+exCspbh8AAAAAElFTkSuQmCC" alt="SEMS" width="60" height="60" style="display: block;">
                </td>
                <td class="text-col">
                    <h1>SEMS</h1>
                    <div class="subtitle">Smart Employee Management System</div>
                </td>
            </tr>
        </table>
    </div>

    <hr>

    <div class="title">Certificate of Employment</div>

    <div class="date-line">Date: {{ now()->format('F d, Y') }}</div>

    <div class="salutation">To Whom It May Concern,</div>

    <div class="body-text">
        <p>This is to certify that <strong>{{ $user->name }}</strong> is a valued employee of <strong>SEMS (Smart Employee Management System)</strong>, having joined our organization on <strong>{{ $user->employee->hire_date->format('F d, Y') }}</strong>.</p>

        <table class="details-table" cellspacing="0" cellpadding="0">
            <tr>
                <td class="label">Employee ID</td>
                <td class="value">{{ $user->employee->id }}</td>
            </tr>
            <tr>
                <td class="label">Full Name</td>
                <td class="value">{{ $user->name }}</td>
            </tr>
            <tr>
                <td class="label">Position</td>
                <td class="value">{{ $user->employee->position }}</td>
            </tr>
            <tr>
                <td class="label">Department</td>
                <td class="value">{{ $user->employee->department }}</td>
            </tr>
            <tr>
                <td class="label">Annual Salary</td>
                <td class="value">${{ number_format($user->employee->salary, 2) }}</td>
            </tr>
            <tr>
                <td class="label">Employment Status</td>
                <td class="value">{{ ucfirst($user->employee->status) }}</td>
            </tr>
        </table>

        <p>Throughout their tenure, {{ $user->name }} has demonstrated professionalism, dedication, and commitment to their role. We appreciate their valuable contributions to our organization.</p>

        <p>This certificate is issued upon request for employment verification purposes.</p>
    </div>

    <div class="closing">
        <p>Sincerely,</p>
        <div class="signature-line">
            <p class="signature-name">HR Department</p>
            <p class="signature-title">SEMS — Smart Employee Management System</p>
        </div>
    </div>

    <div class="footer">
        SEMS &bull; Smart Employee Management System &bull; This is a computer-generated document
    </div>
</body>
</html>
