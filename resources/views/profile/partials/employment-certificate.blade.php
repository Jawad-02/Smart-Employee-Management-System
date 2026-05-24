<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Employment Certificate - {{ $user->name }}</title>
    <style>
        @page { margin: 40px 45px; }
        body { font-family: 'DejaVu Sans', sans-serif; color: #333; font-size: 11pt; line-height: 1.5; }
        .header { margin-bottom: 20px; }
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
        <div style="text-align: center; margin-bottom: 5px;">
            <h1 style="font-size: 24pt; color: #1D4ED8; margin: 0 0 2px 0; letter-spacing: 3px;">SEMS</h1>
            <div style="font-size: 10pt; color: #6B7280;">Smart Employee Management System</div>
        </div>
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
