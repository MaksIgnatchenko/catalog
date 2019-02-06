<!DOCTYPE html>
<html>
<head>
    <title>Verify Email</title>
</head>

<body>
<table align="center" width="100%" cellpadding="0" cellspacing="0">
    <td align="center">
        <table class="action" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>
                                <img src="http://localhost/assets/images/logo.svg">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h2>Welcome to the <a href="{{ route('mainPage') }}">{{ env('APP_NAME') }}</a></h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Your name is {{ $user->name }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Your registered email is {{ $user->email }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Please click on the button below to verify your email account</p>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box">
                                <a href="{{ $verificationUrl }}"><input type="button" value="Verify email"></a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </td>
</table>

</body>

</html>

