<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Document Expiry Reminder</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f6f8;font-family:Arial,Helvetica,sans-serif;color:#1f2937;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f4f6f8;padding:40px 15px;">
        <tr>
            <td align="center">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:600px;background-color:#ffffff;border-radius:12px;overflow:hidden;box-shadow:0 4px 15px rgba(0,0,0,0.06);">
        <tr>
            <td style="background-color:#111827;padding:28px 30px;text-align:center;">
                <div style="display:inline-block;width:48px;height:48px;line-height:48px;background-color:#f59e0b;border-radius:50%;font-size:24px;margin-bottom:10px;">⚠</div>
                    <h1 style="margin:0;color:#ffffff;font-size:22px;font-weight:600;">Vehicle Document Reminder</h1>
                    <p style="margin:8px 0 0;color:#d1d5db;font-size:14px;">Document expiry notification</p>
            </td>
        </tr>
        <tr>
            <td style="padding:35px 30px;">
                <h2 style="margin:0 0 15px;font-size:20px;color:#111827;">Action Required</h2>
                <p style="margin:0 0 20px;font-size:15px;line-height:1.7;color:#4b5563;">One or more vehicle documents are approaching their expiry date or have expired.</p>
                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="background-color:#fffbeb;border-left:4px solid #f59e0b;border-radius:6px;padding:18px 20px;">
                    <p style="margin:0;font-size:15px;line-height:1.7;color:#374151;">{!! nl2br(e($msg)) !!}</p>
                    </td>
                </tr>
                </table>
                <p style="margin:25px 0 0;font-size:14px;line-height:1.7;color:#4b5563;">Please ensure the required document(s) are renewed before the expiry date to keep the vehicle records up to date.</p>
            </td>
        </tr>
        <tr>
            <td style="background-color:#f9fafb;border-top:1px solid #e5e7eb;padding:20px 30px;text-align:center;">
                <p style="margin:0;font-size:12px;color:#9ca3af;">This is an automated notification from the Vehicle Management System.</p>
                <p style="margin:8px 0 0;font-size:12px;color:#9ca3af;">Please do not reply to this email.</p>
            </td>
        </tr>
    </table>
    </td>
</tr>
</table>
</body>
</html>