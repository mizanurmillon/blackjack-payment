<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title>Contact Message</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #f2f5f9;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .email-wrapper {
      max-width: 600px;
      margin: 40px auto;
      background: #ffffff;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
      overflow: hidden;
    }

    .header {
      background: linear-gradient(135deg, #007bff, #6610f2);
      color: #ffffff;
      text-align: center;
      padding: 24px;
    }

    .header h1 {
      margin: 0;
      font-size: 24px;
      letter-spacing: 1px;
    }

    .content {
      padding: 24px 28px;
      color: #333333;
      line-height: 1.7;
    }

    .content h2 {
      font-size: 20px;
      color: #222;
      margin-bottom: 10px;
    }

    .content p {
      margin: 8px 0;
      font-size: 15px;
    }

    .message-box {
      background: #f9f9f9;
      border-left: 4px solid #007bff;
      padding: 15px 18px;
      margin: 20px 0;
      border-radius: 6px;
      font-style: italic;
    }

    .footer {
      background-color: #fafafa;
      border-top: 1px solid #eee;
      padding: 16px 20px;
      text-align: center;
      font-size: 14px;
      color: #777;
    }

    .footer a {
      color: #007bff;
      text-decoration: none;
      font-weight: 500;
    }

    @media only screen and (max-width:600px) {
      .email-wrapper {
        margin: 20px;
        font-size: 14px;
      }

      .header h1 {
        font-size: 20px;
      }
    }
  </style>
</head>

<body>
  <div class="email-wrapper">
    <div class="header">
      <h1>📩 New Contact Message</h1>
    </div>

    <div class="content">
      <h2>Hello {{ $data['name'] }},</h2>
      <p>You’ve received a new message from <strong>{{ $data['email'] }}</strong>.</p>

      <div class="message-box">
        {{ $data['message'] }}
      </div>

      <p>We’ll get back to you as soon as possible.</p>
    </div>

    <div class="footer">
      <p>Best regards,<br><strong>Blackjack Payment</strong></p>
      {{--  <p><a href="https://blackjackpayment.com">Visit Website</a></p>  --}}
    </div>
  </div>
</body>

</html>
