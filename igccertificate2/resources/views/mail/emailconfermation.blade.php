
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #efefef;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            border: 1px solid #003580;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #003580;
            color:white;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Final Step: Submit Your Application</h1>
    <p>Dear Applicant,</p>
    <p>You're almost there! Your application is just one step away from submission. To complete the process, click the button below.</p>
    <a href="{{ $confirmationUrl }}" class="button">Confirm Application</a>
    <p>If you have any questions or need further assistance, our support team is here to help.</p>
    <p>Thank youenter.</p>
    <p><strong>{{ config('app.name') }}</strong></p>
</div>

</body>
</html>



