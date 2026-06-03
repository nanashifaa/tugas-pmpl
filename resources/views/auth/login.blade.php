<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Lab TEL</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial,sans-serif;
        }

        body{
            min-height:100vh;
            display:flex;
            background:#9f2235;
        }

        .left{
            flex:1;
            color:white;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:60px;
            position:relative;
        }

        .left::before{
            content:"";
            position:absolute;
            inset:0;
            opacity:.08;
            background-image:
            radial-gradient(circle at 20% 20%, white 2px, transparent 2px),
            radial-gradient(circle at 70% 30%, white 2px, transparent 2px),
            radial-gradient(circle at 40% 70%, white 2px, transparent 2px),
            radial-gradient(circle at 80% 80%, white 2px, transparent 2px);
        }

        .branding{
            position:relative;
            z-index:2;
            max-width:450px;
        }

        .branding h1{
            font-size:42px;
            line-height:1.2;
            margin-bottom:15px;
        }

        .branding p{
            font-size:18px;
            opacity:.9;
        }

        .right{
            width:480px;
            background:white;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:40px;
        }

        .card{
            width:100%;
        }

        .logo{
            width:70px;
            height:70px;
            background:#9f2235;
            color:white;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            margin:auto;
            font-weight:bold;
        }

        .title{
            text-align:center;
            margin:20px 0 30px;
        }

        .title h2{
            margin-bottom:8px;
        }

        .form-group{
            margin-bottom:18px;
        }

        label{
            display:block;
            margin-bottom:8px;
            font-weight:bold;
        }

        input{
            width:100%;
            padding:12px;
            border:1px solid #ddd;
            border-radius:8px;
        }

        button{
            width:100%;
            padding:13px;
            border:none;
            border-radius:8px;
            background:#9f2235;
            color:white;
            font-weight:bold;
            cursor:pointer;
        }

        .error-box{
            background:#ffe4e6;
            color:#be123c;
            padding:12px;
            border-radius:8px;
            margin-bottom:15px;
        }
    </style>
</head>
<body>

<div class="left">
    <div class="branding">
        <h1>Manajemen Data Penelitian</h1>
        <p>Laboratorium TEL</p>
    </div>
</div>

<div class="right">

    <div class="card">

        <div class="logo">
            TEL
        </div>

        <div class="title">
            <h2>Selamat Datang</h2>
            <p>Silakan login untuk melanjutkan</p>
        </div>

        @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label>Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input
                    type="password"
                    name="password"
                    required>
            </div>

            <button type="submit">
                Masuk
            </button>

        </form>

    </div>

</div>

</body>
</html>