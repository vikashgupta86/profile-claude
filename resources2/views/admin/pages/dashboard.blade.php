@extends('admin.layouts.app')
@section('title','Dashboard')
@section('page-title','Dashboard')

@section('content')
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:1.5rem;margin-bottom:2rem">
    @php
    $cards=[
        ['label'=>'Total Projects','val'=>$stats['projects'],'icon'=>'folder','color'=>'#00F5FF'],
        ['label'=>'Certifications','val'=>$stats['certifications'],'icon'=>'certificate','color'=>'#FFD700'],
        ['label'=>'Total Messages','val'=>$stats['messages'],'icon'=>'envelope','color'=>'#00F5FF'],
        ['label'=>'Unread Messages','val'=>$stats['unread_messages'],'icon'=>'envelope-open','color'=>'#ff8080'],
        ['label'=>'Profile Views','val'=>$stats['profile_views'],'icon'=>'eye','color'=>'#FFD700'],
        ['label'=>'Experiences','val'=>$stats['experiences'],'icon'=>'briefcase','color'=>'#00F5FF'],
    ];
    @endphp
    @foreach($cards as $c)
    <div style="background:var(--bg3);border:1px solid var(--border);padding:1.5rem;border-top:2px solid {{ $c['color'] }}">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:.5rem">
            <i class="fas fa-{{ $c['icon'] }}" style="color:{{ $c['color'] }};font-size:1.3rem"></i>
        </div>
        <div style="font-family:'Syne',sans-serif;font-size:2rem;font-weight:800;color:{{ $c['color'] }}">{{ $c['val'] }}</div>
        <div style="font-family:'JetBrains Mono',monospace;font-size:.7rem;color:var(--text-muted);letter-spacing:1px">{{ $c['label'] }}</div>
    </div>
    @endforeach
</div>

<div class="card">
    <div class="card-header">
        <span class="card-title">Recent Messages</span>
        <a href="{{ route('admin.messages.index') }}" class="btn btn-outline btn-sm">View All</a>
    </div>
    <table>
        <thead><tr><th>NAME</th><th>EMAIL</th><th>SUBJECT</th><th>DATE</th><th>STATUS</th><th></th></tr></thead>
        <tbody>
        @forelse($recentMessages as $msg)
        <tr>
            <td style="color:var(--text)">{{ $msg->name }}</td>
            <td>{{ $msg->email }}</td>
            <td>{{ Str::limit($msg->subject,40) }}</td>
            <td style="font-family:'JetBrains Mono',monospace;font-size:.75rem">{{ $msg->created_at->diffForHumans() }}</td>
            <td>
                @if($msg->is_read)
                    <span style="font-family:'JetBrains Mono',monospace;font-size:.65rem;color:var(--text-muted)">READ</span>
                @else
                    <span style="font-family:'JetBrains Mono',monospace;font-size:.65rem;color:var(--cyan)">NEW</span>
                @endif
            </td>
            <td><a href="{{ route('admin.messages.show',$msg) }}" class="btn btn-outline btn-sm">View</a></td>
        </tr>
        @empty
        <tr><td colspan="6" style="text-align:center;padding:2rem;color:var(--text-muted)">No messages yet</td></tr>
        @endforelse
        </tbody>
    </table>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem">
    <div class="card">
        <div class="card-header"><span class="card-title">Quick Actions</span></div>
        <div style="display:flex;flex-direction:column;gap:.8rem">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-cyan"><i class="fas fa-plus"></i> Add New Project</a>
            <a href="{{ route('admin.certifications.create') }}" class="btn btn-outline"><i class="fas fa-plus"></i> Add Certification</a>
            <a href="{{ route('admin.experience.create') }}" class="btn btn-outline"><i class="fas fa-plus"></i> Add Experience</a>
            <a href="{{ route('admin.profile') }}" class="btn btn-outline"><i class="fas fa-user-edit"></i> Edit Profile</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header"><span class="card-title">Portfolio Info</span></div>
        <div style="font-family:'JetBrains Mono',monospace;font-size:.78rem;color:var(--text-muted);line-height:2">
            <div>Admin Email: <span style="color:var(--cyan)">{{ auth('admin')->user()->email }}</span></div>
            <div>Last Login: <span style="color:var(--text)">{{ now()->format('d M Y, H:i') }}</span></div>
            <div>Site URL: <a href="{{ url('/') }}" target="_blank" style="color:var(--gold)">{{ url('/') }}</a></div>
            <div>Laravel: <span style="color:var(--text)">v{{ app()->version() }}</span></div>
            <div>PHP: <span style="color:var(--text)">v{{ PHP_VERSION }}</span></div>
        </div>
    </div>
</div>
@endsection
