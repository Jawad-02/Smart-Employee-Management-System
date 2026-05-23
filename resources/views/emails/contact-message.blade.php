<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contact Form Message</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 0; background: #f3f4f6; }
        .container { max-width: 560px; margin: 40px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        .header { background: #1D4ED8; padding: 24px 40px; }
        .header h1 { color: #ffffff; font-size: 20px; margin: 0; }
        .body { padding: 32px 40px; color: #374151; font-size: 15px; line-height: 1.7; }
        .body p { margin: 0 0 8px; }
        .label { font-size: 12px; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 2px; }
        .value { font-size: 15px; color: #111827; margin-bottom: 16px; }
        .message-box { background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px 20px; margin-top: 8px; white-space: pre-wrap; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Contact Message</h1>
        </div>
        <div class="body">
            <div class="label">From</div>
            <div class="value">{{ $name }} &lt;{{ $senderEmail }}&gt;</div>

            <div class="label">Subject</div>
            <div class="value">{{ $subjectLine }}</div>

            <div class="label">Message</div>
            <div class="message-box">{{ $messageBody }}</div>
        </div>
    </div>
</body>
</html>
