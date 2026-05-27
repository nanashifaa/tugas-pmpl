<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Manajemen Data Penelitian Lab TEL</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #ffffff;
            color: #222;
        }

        .container {
            width: 85%;
            max-width: 950px;
            margin: 40px auto;
        }

        .header {
            background: #f43f5e;
            color: white;
            padding: 22px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 25px;
        }

        .header h2 {
            margin: 0 0 8px 0;
        }

        .header p {
            margin: 0;
        }

        .card {
            border: 1px solid #d1d5db;
            border-radius: 10px;
            padding: 18px;
            margin-bottom: 15px;
            background: white;
        }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-primary {
            background: #f43f5e;
            color: white;
        }

        .btn-secondary {
            background: white;
            color: #f43f5e;
            border: 1px solid #f43f5e;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #bbb;
            border-radius: 6px;
            box-sizing: border-box;
        }

        .error {
            color: #dc2626;
            font-size: 14px;
            margin-top: 5px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            background: #ffe4e6;
            color: #e11d48;
            font-weight: bold;
            font-size: 13px;
        }

        .top-action {
            margin-bottom: 20px;
        }

        .data-title {
            margin-top: 0;
            color: #111827;
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>