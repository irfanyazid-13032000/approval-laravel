<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="60">
            <span class="menu-text fw-bolder fs-4 ms-2">Lokpro Media</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
       

        <!-- Layouts -->
        @if (Auth::user()->role === 'Admin' || Auth::user()->role === 'HRD')
            <li
                class="menu-item {{ Route::is('users.*') || Route::is('divisi.*') || Route::is('rekap.*') || Route::is('intern.*') || Route::is('role.*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-user-check"></i>
                    <div>Management </div>
                </a>

                <ul class="menu-sub">
                    @if (Auth::user()->role === 'Admin')
                        <li class="menu-item {{ Route::is('users.*') ? 'active' : '' }}">
                            <a href="{{ route('users.index') }}" class="menu-link active">
                                <div>User Management</div>
                            </a>
                        </li>
                    
                      
                        <li class="menu-item {{ Route::is('approval.*') ? 'active' : '' }}">
                            <a href="{{ route('approval.index') }}" class="menu-link">
                                <div>Approval</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Route::is('responsibility.*') ? 'active' : '' }}">
                            <a href="{{ route('responsibility.index') }}" class="menu-link">
                                <div>Tanggung jawabmu</div>
                            </a>
                        </li>
                    @elseif (Auth::user()->role === 'HRD')
                       
                        <li class="menu-item {{ Route::is('divisi.*') ? 'active' : '' }}">
                            <a href="{{ route('divisi.index') }}" class="menu-link">
                                <div>Master Divisi</div>
                            </a>
                        </li>
                       
                        <li class="menu-item {{ Route::is('approval.*') ? 'active' : '' }}">
                            <a href="{{ route('approval.index') }}" class="menu-link">
                                <div>Approval</div>
                            </a>
                        </li>
                        <li class="menu-item {{ Route::is('responsibility.*') ? 'active' : '' }}">
                            <a href="{{ route('responsibility.index') }}" class="menu-link">
                                <div>Tanggung jawabmu</div>
                            </a>
                        </li>
                    @else
                        <li class="menu-item">
                            <a href="{{ route('absensi.show', Auth::user()->email) }}" class="menu-link">
                                <div>Absensi</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
       

    </ul>
</aside>
<!-- / Menu -->
