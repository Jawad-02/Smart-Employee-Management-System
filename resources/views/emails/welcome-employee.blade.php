<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to SEMS</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 0; background: #f3f4f6; }
        .container { max-width: 560px; margin: 40px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        .header { background: #1D4ED8; padding: 32px 40px; text-align: center; }
        .header img { width: 64px; height: 64px; margin-bottom: 12px; }
        .header h1 { color: #ffffff; font-size: 22px; margin: 0; font-weight: 700; }
        .header p { color: #bfdbfe; font-size: 13px; margin: 4px 0 0; }
        .body { padding: 32px 40px; color: #374151; font-size: 15px; line-height: 1.7; }
        .body h2 { font-size: 18px; color: #111827; margin: 0 0 16px; }
        .credentials { background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; padding: 20px; margin: 20px 0; }
        .credentials dt { font-size: 12px; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 2px; }
        .credentials dd { font-size: 15px; color: #111827; font-weight: 600; margin: 0 0 14px; }
        .credentials dd:last-child { margin-bottom: 0; }
        .alert { background: #fffbeb; border: 1px solid #fde68a; border-radius: 8px; padding: 16px 20px; margin: 20px 0; font-size: 14px; color: #92400e; }
        .alert strong { color: #78350f; }
        .button { display: inline-block; background: #1D4ED8; color: #ffffff !important; text-decoration: none; padding: 12px 28px; border-radius: 8px; font-weight: 600; font-size: 15px; margin: 8px 0; }
        .footer { padding: 24px 40px; border-top: 1px solid #e5e7eb; text-align: center; font-size: 12px; color: #9ca3af; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAYAAAA5ZDbSAAAACXBIWXMAAA7EAAAOxAGVKw4bAAADQklEQVR4nO3dvW3jQBAF4NHh0gPUgHJ14kzpFeEiDBdxRThV5k6UqwEDLkAXLUDYlEzuz8ybx/dFBiyIs/M4lCVxYTMREREREREREREREenqcLrcomuQAQ6ny62EO/1ZknsUpoJObE14CjmR2qnUNIPrFZCCBjQiEAUNwCMEhRzAe7o0zU6iGx19fFpojUWqJTW0YKeQa0shS/MU9EpZG5a1bjcsDWJYQ1cswU4xrmm1LTQBYY27iIMeTpfb9Xx0Pfb+/fVboz+eXlxqiFhv4XrQcjZ7LnYu2K88go5Yu5lTwKjBfsUY9NCDRJ21NeEWnpdts/G9GfLkUcGatYVbeIVsNv71+XfPJ4sMNqvr+bgb2bduTxj5l2LRY3oLzykuRgT9q9cTSbvr+bibTnQPNAH3nN4RzxeFJmCZp4DJKWByCpgcTcC939ZEvE0agSZgmUcVcK+pY5leM7KA5Tu6gFunj2l6zQgDNqsPiS1cM9KAzcz+/Pu7OLA1j82m69eFiEpwj+7J+rAXiG/DRqAMeC4s1gn9Ce0leq3eX9PRQWlOax0I69D3wXewvo62oAq4B7ZLNU3Amt55NAH3xDTFFAFreh1EnfEjj8uwJooJHoXhUg39SdZPWz63tg21BmTAj+5JLr/zamqZ4s/nt7uP8a5pDaiA19xsvn9/vX3am9l5ZEWT4yx8rBlW0DCvwbU7CUbuQECsaS2IgFsbMqKhiDXVgAhYxgkPuNeZ3nNiEGuqFR6wjBUaMOKWT8SaWmiCyUG9D+6h9aPFpe95s6ALuPWjy/1z/B9GPekSTS40YMQtn4g1tdAEkwsPGHHLJ2JNtcIDlrEgAkbc8olYUw2IgM0wt3wi1rQW1PvgRzsB7z12NMSa1oAKuFiy5dMbYk2ust99iES3zcpiCpicApblEP4RVGZp+pemUBBp+5W2cEcU/aFYRGd0Jz/dgirR94F+gXdsbt1bWvBW1jmLefFbOokfYmsE23q6YWhM9vpdZAw6Y83hMjRMwTZCbSBqXWkhNRSlDkqRQSOdZPQ8G61gg3g0XsECGBG0phZQj1AUbAI1ASnYZNYEpmATexS0ppbINEwFS0zBioiIiIiIiIiIiLj7DwZ+exCspbh8AAAAAElFTkSuQmCC" alt="SEMS">
            <h1>Welcome to SEMS</h1>
            <p>Smart Employee Management System</p>
        </div>

        <div class="body">
            <h2>Hello {{ $user->name }},</h2>

            <p>Your account has been created at <strong>SEMS (Smart Employee Management System)</strong>. You can now log in using the credentials below.</p>

            <div class="credentials">
                <dl>
                    <dt>Email Address</dt>
                    <dd>{{ $user->email }}</dd>
                    <dt>Temporary Password</dt>
                    <dd>{{ $password }}</dd>
                </dl>
            </div>

            <div style="text-align: center;">
                <a href="{{ route('login') }}" class="button">Log In to SEMS</a>
            </div>

            <div class="alert">
                <strong>Security Notice:</strong> For your safety, please change your password after your first login. Go to your <strong>Profile</strong> page once logged in to update your password.
            </div>

            <p style="margin-top: 24px;">If you did not expect this email, please disregard it.</p>

            <p>Best regards,<br><strong>The SEMS Team</strong></p>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} SEMS &mdash; Smart Employee Management System. All rights reserved.
        </div>
    </div>
</body>
</html>
