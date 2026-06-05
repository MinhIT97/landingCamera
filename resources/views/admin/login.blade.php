<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin | Pre Camera</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-dark: #070708;
            --bg-card: #121214;
            --primary-gold: #e8a815;
            --primary-gold-hover: #f7bd33;
            --text-white: #ffffff;
            --text-gray: #9ba1a6;
            --border-color: #222226;
            --font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            background-color: var(--bg-dark);
            color: var(--text-white);
            font-family: var(--font-family);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-card {
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            text-align: center;
        }
        .logo {
            font-size: 28px;
            font-weight: 800;
            color: var(--primary-gold);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .logo i {
            font-size: 30px;
        }
        .subtitle {
            font-size: 13px;
            color: var(--text-gray);
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-white);
        }
        .form-control {
            width: 100%;
            background-color: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 12px 16px;
            color: var(--text-white);
            font-size: 14px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            outline: none;
            border-color: var(--primary-gold);
            background-color: rgba(255, 255, 255, 0.05);
        }
        .btn-submit {
            width: 100%;
            background-color: var(--primary-gold);
            color: #000000;
            font-weight: 700;
            font-size: 14px;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-submit:hover {
            background-color: var(--primary-gold-hover);
        }
        .error-message {
            background-color: rgba(255, 51, 68, 0.08);
            border: 1px solid rgba(255, 51, 68, 0.2);
            color: #ff3344;
            padding: 10px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 20px;
            text-align: left;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="logo">
            <i class="fa-solid fa-camera-retro"></i>
            <span>PRE CAMERA</span>
        </div>
        <p class="subtitle">ĐĂNG NHẬP HỆ THỐNG QUẢN LÝ ĐẶT MÁY</p>

        @if($errors->has('password'))
            <div class="error-message">
                <i class="fa-solid fa-circle-exclamation"></i> {{ $errors->first('password') }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu quản trị</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Nhập mật khẩu..." required autofocus>
            </div>
            
            <button type="submit" class="btn-submit">ĐĂNG NHẬP</button>
        </form>
    </div>

</body>
</html>
