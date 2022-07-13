<li class="nav-item">
    <a href="{{ route('pemeriksaans.index') }}"
       class="nav-link {{ Request::is('pemeriksaans*') ? 'active' : '' }}">
        <p><i class="fa fa-stethoscope mr-2"></i>Pemeriksaan</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('jadwalCheckups.index') }}"
       class="nav-link {{ Request::is('jadwalCheckups*') ? 'active' : '' }}">
        <p><i class="fa fa-calendar-alt mr-2"></i>Jadwal Checkup</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('polaMakans.index') }}"
       class="nav-link {{ Request::is('polaMakans*') ? 'active' : '' }}">
        <p><i class="fa fa-cookie-bite mr-2"></i>Pola Makan</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('polaObats.index') }}"
       class="nav-link {{ Request::is('polaObats*') ? 'active' : '' }}">
        <p><i class="fa fa-capsules mr-2"></i>Pola Obat</p>
    </a>
</li>

@hasrole("Admin")
<li class="dropdown-divider" style="border-top-color:#696969;"></li>
<li class="nav-item">
    <a href="{{ route('motivasis.index') }}"
       class="nav-link {{ Request::is('motivasis*') ? 'active' : '' }}">
        <p><i class="fa fa-grin-stars mr-2"></i>Kata Motivasi</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('settings.reminder') }}"
       class="nav-link {{ Request::is('reminder*') ? 'active' : '' }}">
        <p><i class="fa fa-cog mr-2"></i>Pengaturan</p>
    </a>
</li>
<li class="dropdown-divider" style="border-top-color:#696969;"></li>
<li class="nav-item">
    <a href="{{ route('roles.index') }}"
       class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
        <p><i class="fa fa-user-tag mr-2"></i>Roles</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <p><i class="fa fa-user mr-2"></i>Users</p>
    </a>
</li>
@endhasrole
