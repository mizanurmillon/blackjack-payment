<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Application Notification</title>
    <style>
        /* Some clients ignore head styles; keep critical styles inline.
       Small responsive tweak for mobile-capable clients */
        @media only screen and (max-width:600px) {
            .container {
                width: 100% !important;
                padding: 16px !important;
            }

            .content {
                padding: 18px !important;
            }

            .two-column {
                display: block !important;
                width: 100% !important;
            }

            .column {
                width: 100% !important;
                display: block !important;
            }

            .h1 {
                font-size: 20px !important;
            }
        }
    </style>
</head>

<body style="margin:0; padding:0; background:#f4f6f8; font-family: Arial, Helvetica, sans-serif; color:#333;">
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center" style="padding:28px 16px;">
                <!-- Outer container -->
                <table class="container" width="600" cellpadding="0" cellspacing="0" role="presentation"
                    style="width:600px; max-width:600px; background:#ffffff; border-radius:10px; box-shadow:0 4px 18px rgba(0,0,0,0.06); overflow:hidden; border:1px solid #e6e9ee;">
                    <!-- Header -->
                    <tr>
                        <td style="background: #000000; padding:22px 28px; text-align:left; color:#ffffff;">
                            <table width="100%" role="presentation">
                                <tr>
                                    <td style="vertical-align:middle;">
                                        <h1 class="h1"
                                            style="margin:0; font-size:22px; font-weight:700; letter-spacing:0.2px;">
                                            New Application Received
                                        </h1>
                                        <p style="margin:6px 0 0; font-size:13px; opacity:0.95;">A new vendor
                                            application has been submitted</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Body / Content -->
                    <tr>
                        <td class="content" style="padding:24px 28px; background:#ffffff;">
                            <table width="100%" role="presentation" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding-bottom:12px;">
                                        <p style="margin:0; font-size:15px;">
                                            Hello <strong>{{ $data['first_name'] }} {{ $data['last_name'] }}</strong>,
                                        </p>
                                        <p style="margin:8px 0 0; color:#556170; font-size:14px;">
                                            We received the following information from the applicant. Please review and
                                            follow up as needed.
                                        </p>
                                    </td>
                                </tr>

                                <!-- Card with details -->
                                <tr>
                                    <td style="padding-top:12px;">
                                        <table width="100%" role="presentation" cellpadding="0" cellspacing="0"
                                            style="border-radius:8px; background:#fafbfd; border:1px solid #eef1f6;">
                                            <tr>
                                                <td style="padding:16px;">
                                                    <table width="100%" role="presentation" cellpadding="0"
                                                        cellspacing="0">
                                                        <!-- Row: Email + Phone -->
                                                        <tr>
                                                            <td
                                                                style="padding:6px 0; vertical-align:top; font-size:14px;">
                                                                <strong
                                                                    style="display:block; color:#22324a;">Email</strong>
                                                                <span style="color:#546176;">{{ $data['email'] }}</span>
                                                            </td>
                                                            <td
                                                                style="padding:6px 0; vertical-align:top; font-size:14px; text-align:right;">
                                                                <strong
                                                                    style="display:block; color:#22324a;">Phone</strong>
                                                                <span
                                                                    style="color:#546176;">{{ $data['code'] }}{{ $data['phone'] }}</span>
                                                            </td>
                                                        </tr>

                                                        <!-- Row: Business -->
                                                        <tr>
                                                            <td colspan="2"
                                                                style="padding:8px 0; vertical-align:top; font-size:14px;">
                                                                <strong style="display:block; color:#22324a;">Business
                                                                    Name</strong>
                                                                <span
                                                                    style="color:#546176;">{{ $data['business_name'] }}</span>
                                                            </td>
                                                        </tr>

                                                        <!-- Row: Industry, Country -->
                                                        <tr>
                                                            <td
                                                                style="padding:6px 0; vertical-align:top; font-size:14px;">
                                                                <strong
                                                                    style="display:block; color:#22324a;">Industry</strong>
                                                                <span
                                                                    style="color:#546176;">{{ $data['industry'] }}</span>
                                                            </td>
                                                            <td
                                                                style="padding:6px 0; vertical-align:top; font-size:14px; text-align:right;">
                                                                <strong
                                                                    style="display:block; color:#22324a;">Country</strong>
                                                                <span
                                                                    style="color:#546176;">{{ $data['country'] }}</span>
                                                            </td>
                                                        </tr>

                                                        <!-- Row: Payment method and accept cards -->
                                                        <tr>
                                                            <td
                                                                style="padding:6px 0; vertical-align:top; font-size:14px;">
                                                                <strong style="display:block; color:#22324a;">Payment
                                                                    Method</strong>
                                                                <span
                                                                    style="color:#546176;">{{ $data['payment_method'] }}</span>
                                                            </td>
                                                            <td
                                                                style="padding:6px 0; vertical-align:top; font-size:14px; text-align:right;">
                                                                <strong style="display:block; color:#22324a;">Accept
                                                                    Credit Cards</strong>
                                                                <span
                                                                    style="color:#546176;">{{ $data['accept_credit_cards'] }}</span>
                                                            </td>
                                                        </tr>

                                                        <!-- Row: Website, Have website -->
                                                        <tr>
                                                            <td colspan="2"
                                                                style="padding:6px 0; vertical-align:top; font-size:14px;">
                                                                <strong
                                                                    style="display:block; color:#22324a;">Website</strong>
                                                                <span
                                                                    style="color:#546176;">{{ $data['website'] ?? 'N/A' }}</span>
                                                                <br>
                                                                <small style="color:#8a95a6;">Have website:
                                                                    {{ $data['have_website'] }}</small>
                                                            </td>
                                                        </tr>

                                                        <!-- Row: Receive call -->
                                                        <tr>
                                                            <td colspan="2"
                                                                style="padding-top:10px; font-size:14px;">
                                                                <strong style="display:block; color:#22324a;">Receive a
                                                                    call?</strong>
                                                                <span
                                                                    style="color:#546176;">{{ $data['receive_call'] }}</span>
                                                            </td>
                                                        </tr>

                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <!-- CTA Row -->
                                <tr>
                                    <td style="padding-top:18px; text-align:center;">
                                        <img src="{{ asset( $setting-logo ?? 'backend/assets/images/colored-logo.png') }}" alt="{{ config('app.name') }} Logo"
                                            style="display:block; max-width:150px; width:100%; height:auto; margin:0 auto;">
                                    </td>
                                </tr>

                                <!-- Note -->
                                <tr>
                                    <td style="padding-top:14px; color:#7a8696; font-size:13px;">
                                        <p style="margin:0;">If any information looks incorrect, please update the
                                            applicant's profile or contact them for clarification.</p>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td
                            style="background:#f7f9fb; padding:18px 28px; text-align:center; font-size:13px; color:#748199;">
                            <div style="max-width:520px; margin:0 auto;">
                                <p style="margin:0 0 8px;">Best regards,<br>
                                    <strong
                                        style="color:#22324a;">{{ $data['first_name'] . ' ' . $data['last_name'] }}</strong>
                                </p>
                                <p style="margin:0;">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights
                                    reserved.</p>
                            </div>
                        </td>
                    </tr>

                </table>
                <!-- End outer container -->
            </td>
        </tr>
    </table>
</body>

</html>
