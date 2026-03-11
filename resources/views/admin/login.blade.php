<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Vikash Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=JetBrains+Mono:wght@400;500&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root{--bg:#0A0A0B;--bg3:#161619;--cyan:#00F5FF;--gold:#FFD700;--text:#E8E8EE;--text-muted:#8888A0;--border:rgba(255,255,255,0.06)}
        *{box-sizing:border-box;margin:0;padding:0}
        body{background:var(--bg);color:var(--text);font-family:'DM Sans',sans-serif;min-height:100vh;display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden}
        body::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 20% 50%,rgba(0,245,255,.04) 0%,transparent 60%),radial-gradient(ellipse at 80% 50%,rgba(255,215,0,.03) 0%,transparent 60%)}
        .login-card{background:rgba(22,22,25,.9);border:1px solid var(--border);padding:3rem;width:100%;max-width:420px;position:relative;backdrop-filter:blur(20px)}
        .login-card::before{content:'';position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--cyan),var(--gold))}
        .logo{font-family:'Syne',sans-serif;font-size:2.5rem;font-weight:800;color:var(--cyan);text-align:center;margin-bottom:.5rem}
        .logo span{color:var(--gold)}
        .subtitle{font-family:'JetBrains Mono',monospace;font-size:.75rem;color:var(--text-muted);text-align:center;letter-spacing:2px;margin-bottom:2.5rem}
        .form-group{margin-bottom:1.5rem}
        .form-group label{display:block;font-family:'JetBrains Mono',monospace;font-size:.75rem;color:var(--cyan);letter-spacing:1px;margin-bottom:.5rem}
        .form-group input{width:100%;background:rgba(10,10,11,.8);border:1px solid var(--border);color:var(--text);padding:.9rem 1rem;font-family:'DM Sans',sans-serif;font-size:.95rem;outline:none;transition:border-color .3s}
        .form-group input:focus{border-color:var(--cyan)}
        .remember{display:flex;align-items:center;gap:.6rem;margin-bottom:1.5rem;font-size:.85rem;color:var(--text-muted)}
        .remember input{width:auto}
        .btn-login{width:100%;background:var(--cyan);color:var(--bg);padding:1rem;font-family:'Syne',sans-serif;font-weight:700;font-size:.95rem;border:none;cursor:pointer;transition:all .3s;letter-spacing:1px}
        .btn-login:hover{background:var(--gold)}
        .error{background:rgba(255,50,50,.1);border:1px solid rgba(255,50,50,.3);color:#ff6666;padding:.8rem 1rem;font-size:.85rem;margin-bottom:1.5rem;font-family:'JetBrains Mono',monospace}
        .back-link{display:block;text-align:center;margin-top:1.5rem;font-family:'JetBrains Mono',monospace;font-size:.75rem;color:var(--text-muted);text-decoration:none;transition:color .3s}
        .back-link:hover{color:var(--cyan)}
    </style>
</head>
<body>
<div class="login-card">
    <div class="logo">VK<span>.</span></div>
    <div class="subtitle">ADMIN PANEL ACCESS</div>

    @if($errors->any())
        <div class="error"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login.post') }}">
        @csrf
        <div class="form-group">
            <label for="email">EMAIL ADDRESS</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@example.com">
        </div>
        <div class="form-group">
            <label for="password">PASSWORD</label>
            <input type="password" id="password" name="password" required placeholder="••••••••">
        </div>
        <div class="remember">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember me</label>
        </div>
        <button type="submit" class="btn-login"><i class="fas fa-sign-in-alt"></i> Login to Admin</button>
    </form>
    <a href="{{ route('home') }}" class="back-link"><i class="fas fa-arrow-left"></i> Back to Portfolio</a>
</div>
</body>
</html>
