<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Dashboard') | Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=JetBrains+Mono:wght@400;500&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root{--bg:#0A0A0B;--bg2:#111114;--bg3:#161619;--cyan:#00F5FF;--gold:#FFD700;--text:#E8E8EE;--text-muted:#8888A0;--border:rgba(255,255,255,0.06);--sidebar:200px}
        *{box-sizing:border-box;margin:0;padding:0}
        body{background:var(--bg);color:var(--text);font-family:'DM Sans',sans-serif;display:flex;min-height:100vh}
        /* Sidebar */
        .sidebar{width:var(--sidebar);background:var(--bg2);border-right:1px solid var(--border);display:flex;flex-direction:column;position:fixed;top:0;bottom:0;left:0;z-index:50;transition:transform .3s}
        .sidebar-logo{padding:1.5rem 1.2rem;border-bottom:1px solid var(--border)}
        .sidebar-logo a{font-family:'Syne',sans-serif;font-size:1.5rem;font-weight:800;color:var(--cyan);text-decoration:none}
        .sidebar-logo span{color:var(--gold)}
        .sidebar-label{font-family:'JetBrains Mono',monospace;font-size:.65rem;color:var(--text-muted);letter-spacing:2px;padding:.8rem 1.2rem .3rem;text-transform:uppercase}
        .sidebar-nav{flex:1;overflow-y:auto;padding:.5rem 0}
        .sidebar-nav a{display:flex;align-items:center;gap:.8rem;padding:.7rem 1.2rem;color:var(--text-muted);text-decoration:none;font-size:.88rem;transition:all .3s;border-left:2px solid transparent}
        .sidebar-nav a:hover,.sidebar-nav a.active{color:var(--cyan);background:rgba(0,245,255,.04);border-left-color:var(--cyan)}
        .sidebar-nav a i{width:16px;font-size:.85rem}
        .sidebar-bottom{padding:1rem 1.2rem;border-top:1px solid var(--border)}
        .sidebar-user{display:flex;align-items:center;gap:.8rem;margin-bottom:1rem}
        .sidebar-avatar{width:36px;height:36px;background:var(--cyan-dim);border:1px solid var(--cyan);border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--cyan);font-size:.9rem;overflow:hidden;flex-shrink:0}
        .sidebar-avatar img{width:100%;height:100%;object-fit:cover}
        .sidebar-name{font-size:.85rem;font-weight:600;color:var(--text)}
        .sidebar-role{font-family:'JetBrains Mono',monospace;font-size:.65rem;color:var(--cyan)}
        .btn-logout{display:flex;align-items:center;gap:.5rem;color:var(--text-muted);font-size:.8rem;background:none;border:1px solid var(--border);padding:.5rem 1rem;cursor:pointer;width:100%;transition:all .3s;font-family:'DM Sans',sans-serif}
        .btn-logout:hover{color:#ff6666;border-color:#ff6666}
        /* Main */
        .main{margin-left:var(--sidebar);flex:1;display:flex;flex-direction:column}
        .topbar{background:var(--bg2);border-bottom:1px solid var(--border);padding:.9rem 2rem;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:40}
        .topbar-title{font-family:'Syne',sans-serif;font-size:1.1rem;font-weight:700}
        .topbar-right{display:flex;align-items:center;gap:1rem}
        .badge-unread{background:var(--cyan);color:var(--bg);font-size:.65rem;padding:.2rem .4rem;font-family:'JetBrains Mono',monospace;border-radius:2px}
        .content{padding:2rem;flex:1}
        /* Cards */
        .alert{padding:.9rem 1.2rem;margin-bottom:1.5rem;font-size:.9rem;border-left:3px solid}
        .alert-success{background:rgba(0,245,255,.05);border-color:var(--cyan);color:var(--cyan)}
        .alert-error{background:rgba(255,80,80,.05);border-color:#ff5050;color:#ff8080}
        .card{background:var(--bg3);border:1px solid var(--border);padding:1.5rem;margin-bottom:1.5rem}
        .card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem;padding-bottom:1rem;border-bottom:1px solid var(--border)}
        .card-title{font-family:'Syne',sans-serif;font-size:1rem;font-weight:700}
        .btn{display:inline-flex;align-items:center;gap:.5rem;padding:.6rem 1.2rem;font-family:'DM Sans',sans-serif;font-size:.85rem;font-weight:600;cursor:pointer;border:none;text-decoration:none;transition:all .3s}
        .btn-cyan{background:var(--cyan);color:var(--bg)}
        .btn-cyan:hover{background:var(--gold)}
        .btn-outline{background:transparent;border:1px solid var(--border);color:var(--text-muted)}
        .btn-outline:hover{border-color:var(--cyan);color:var(--cyan)}
        .btn-danger{background:rgba(255,80,80,.1);border:1px solid rgba(255,80,80,.3);color:#ff8080}
        .btn-danger:hover{background:rgba(255,80,80,.2)}
        .btn-sm{padding:.4rem .8rem;font-size:.78rem}
        /* Table */
        table{width:100%;border-collapse:collapse}
        th{text-align:left;font-family:'JetBrains Mono',monospace;font-size:.7rem;color:var(--text-muted);letter-spacing:1px;padding:.8rem 1rem;border-bottom:1px solid var(--border)}
        td{padding:.8rem 1rem;border-bottom:1px solid rgba(255,255,255,.03);font-size:.88rem;color:var(--text-muted);vertical-align:middle}
        tr:hover td{background:rgba(255,255,255,.02)}
        /* Form */
        .form-label{display:block;font-family:'JetBrains Mono',monospace;font-size:.72rem;color:var(--cyan);letter-spacing:1px;margin-bottom:.4rem}
        .form-control{width:100%;background:var(--bg2);border:1px solid var(--border);color:var(--text);padding:.8rem 1rem;font-family:'DM Sans',sans-serif;font-size:.9rem;outline:none;transition:border-color .3s;margin-bottom:1.2rem}
        .form-control:focus{border-color:var(--cyan)}
        textarea.form-control{min-height:100px;resize:vertical}
        .form-check{display:flex;align-items:center;gap:.6rem;margin-bottom:1.2rem;font-size:.88rem;color:var(--text-muted)}
        .form-check input{accent-color:var(--cyan)}
        .form-row{display:grid;grid-template-columns:1fr 1fr;gap:1rem}
        @media(max-width:768px){.sidebar{transform:translateX(-100%)}.main{margin-left:0}.form-row{grid-template-columns:1fr}}
    </style>
</head>
<body>
<aside class="sidebar">
    <div class="sidebar-logo"><a href="{{ route('admin.dashboard') }}">VK<span>.</span></a></div>
    <div class="sidebar-label">Navigation</div>
    <nav class="sidebar-nav">
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects*') ? 'active' : '' }}"><i class="fas fa-folder"></i> Projects</a>
        <a href="{{ route('admin.certifications.index') }}" class="{{ request()->routeIs('admin.certifications*') ? 'active' : '' }}"><i class="fas fa-certificate"></i> Certifications</a>
        <a href="{{ route('admin.experience.index') }}" class="{{ request()->routeIs('admin.experience*') ? 'active' : '' }}"><i class="fas fa-briefcase"></i> Experience</a>
        <a href="{{ route('admin.messages.index') }}" class="{{ request()->routeIs('admin.messages*') ? 'active' : '' }}"><i class="fas fa-envelope"></i> Messages</a>
        <a href="{{ route('admin.profile') }}" class="{{ request()->routeIs('admin.profile*') ? 'active' : '' }}"><i class="fas fa-user"></i> Profile</a>
    </nav>
    <div class="sidebar-bottom">
        <div class="sidebar-user">
            <div class="sidebar-avatar">
                @if(auth('admin')->user()->photo)
                    <img src="{{ Storage::url(auth('admin')->user()->photo) }}" alt="">
                @else
                    <i class="fas fa-user"></i>
                @endif
            </div>
            <div>
                <div class="sidebar-name">{{ auth('admin')->user()->name }}</div>
                <div class="sidebar-role">ADMIN</div>
            </div>
        </div>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </form>
    </div>
</aside>

<div class="main">
    <div class="topbar">
        <div class="topbar-title">@yield('page-title','Dashboard')</div>
        <div class="topbar-right">
            <a href="{{ route('home') }}" target="_blank" style="color:var(--text-muted);font-size:.8rem;text-decoration:none"><i class="fas fa-external-link-alt"></i> View Site</a>
        </div>
    </div>
    <div class="content">
        @if(session('success'))
            <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error"><i class="fas fa-exclamation-circle"></i> {{ session('error') }}</div>
        @endif
        @yield('content')
    </div>
</div>
</body>
</html>
