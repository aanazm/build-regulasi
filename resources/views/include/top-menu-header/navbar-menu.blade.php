<nav class="main-navbar">
    <div class="container">
        <ul>
            <li class="menu-item  ">
                <a href="{{ route('home') }}" class='menu-link' active>
                    <span><i class="bi bi-grid-fill"></i> Dashboard</span>
                </a>
            </li>
            <li class="menu-item  has-sub">
                <a href="#" class='menu-link'>
                    <span><i class="bi bi-stack"></i> Peraturan Direktur</span>
                </a>
                <div class="submenu ">
                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                    <div class="submenu-group-wrapper">
                        <ul class="submenu-group">
                            <li class="submenu-item  ">
                                <a href="{{ route('pedoman-pelayanan.index') }}" class='submenu-link'>Pedoman Pelayanan</a>
                            </li>
                            <li class="submenu-item  ">
                                <a href="#" class='submenu-link'>Pedoman Pengorganisasian</a>
                            </li>
                            <li class="submenu-item  ">
                                <a href="{{ route('program-kerja.index') }}" class='submenu-link'>Program Kerja</a>
                            </li>
                            <li class="submenu-item  ">
                                <a href="#" class='submenu-link'>Panduan</a>
                            </li>
                            <li class="submenu-item  ">
                                <a href="#" class='submenu-link'>Pedoman</a>
                            </li>
                            <li class="submenu-item  ">
                                <a href="#" class='submenu-link'>Peraturan Lainya</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="menu-item  ">
                <a href="{{ route('keputusan-direktur.index') }}" class='menu-link'>
                    <span><i class="bi bi-grid-fill"></i> Keputusan diektur</span>
                </a>
            </li>
            <li class="menu-item  ">
                <a href="#" class='menu-link'>
                    <span><i class="bi bi-grid-fill"></i> Surat Edaran</span>
                </a>
            </li>
            <li class="menu-item  ">
                <a href="{{ route('home') }}" class='menu-link'>
                    <span><i class="bi bi-grid-fill"></i> Instruksi Direktur</span>
                </a>
            </li>
            <li class="menu-item  ">
                <a href="#" class='menu-link'>
                    <span><i class="bi bi-grid-fill"></i> SPO</span>
                </a>
            </li>

            <li class="menu-item  has-sub">
                <a href="#" class='menu-link'>
                    <span><i class="bi bi-stack"></i> Settings</span>
                </a>
                <div class="submenu ">
                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                    <div class="submenu-group-wrapper">
                        <ul class="submenu-group">
                            <li class="submenu-item  ">

                            </li>
                            <li class="submenu-item  ">
                                <a href="{{ route('settings-regs.index') }}" class='submenu-link'>Item Regulasi</a>
                            </li>
                            <li class="submenu-item  ">
                                <a href="#" class='submenu-link'>User Management</a>
                            </li>
                            <li class="submenu-item  has-sub">
                                <a href="#" class='submenu-link'>Permission</a>
                                <!-- 3 Level Submenu -->
                                <ul class="subsubmenu">
                                    <li class="subsubmenu-item ">
                                        <a href="{{ route('permission-setting.index') }}" class='subsubmenu-link'>Permission</a>
                                    </li>
                                    <li class="subsubmenu-item ">
                                        <a href="{{ route('role-setting.index') }}" class='subsubmenu-link'>Roles</a>
                                    </li>
                                    <li class="subsubmenu-item ">
                                        <a href="#" class="subsubmenu-link">Jabatan</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>