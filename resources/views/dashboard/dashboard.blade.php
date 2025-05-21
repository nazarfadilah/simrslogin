<?php
# dashboard.blade.php
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/style/style.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <img src="{{ asset('css/image/logo.svg') }}" alt="Logo RS">
            <span class="logo_name">
                <h5>RUMAH SAKIT ISLAM<br>BANJARMASIN</h5>
            </span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('css/image/beranda.svg') }}" alt="Beranda">
                    <span class="link_name">Beranda</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a href="{{ url('dashboard') }}" class="link_name">Beranda</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="{{ route('pendaftaran') }}">
                        <img src="{{ asset('css/image/kunjungan.svg') }}" alt="Kunjungan">
                        <span class="link_name">Pendaftaran</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="#" class="link_name">Pendaftaran</a></li>
                    <li><a href="{{ url('pendaftaran') }}">Pendaftaran Hari Ini</a></li>
                    <li><a href="{{ url('riwayat_pendaftaran') }}">Riwayat Pendaftaran</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ url('pasien') }}">
                    <img src="{{ asset('css/image/pasien.svg') }}" alt="Pasien">
                    <span class="link_name">Pasien</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a href="{{ url('pasien') }}" class="link_name">Pasien</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="{{ url('poli') }}">
                        <img src="{{ asset('css/image/kunjungan.svg') }}" alt="Layanan">
                        <span class="link_name">Layanan</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="#" class="link_name">Layanan</a></li>
                    <li><a href="{{ url('poli') }}">Poli</a></li>
                    <li><a href="{{ url('dokter') }}">Dokter</a></li>
                </ul>
            </li>

            <li class="logout">
                <form action="{{ route('logout') }}" method="POST" class="keluar" style="display: inline;">
                    @csrf
                    <button type="submit" style="all: unset; cursor: pointer;">
                        <img src="{{ asset('css/image/keluar.svg') }}" alt="Keluar">
                        <span class="link_name">Keluar</span>
                    </button>
                </form>
                <ul class="sub-menu blank">
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" style="all: unset; cursor: pointer;">Keluar</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <!-- Trigger (gambar 1) -->
            <div class="profile-trigger" onclick="toggleProfilePopup()">
                <img src="{{ asset('css/image/admin.svg') }}" alt="User" class="profile-icon">
            </div>

            <!-- Popup (gambar 2) -->
            <div id="profile-popup" class="profile-popup hidden">
                <div class="popup-content">
                    <img src="{{ asset('css/image/admin.svg') }}" alt="User" class="popup-icon">
                    <div>
                        <div class="popup-name">
                            <?php
                                $user = auth()->user();
                                echo $user ? htmlspecialchars($user->name) : '';
                            ?>
                        </div>
                        <div class="popup-role">Admin Pendaftaran</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main>
        <div class="main-content">
            <h3>Beranda</h3>
            <h4>Selamat Datang, Admin!</h4>
        </div>
        <div class="cards">
            <div class="card">
                <div class="box">
                    <h4>Data Hari Ini : <span id="current-date"></span></h4>
                    <script>
                        const currentDate = new Date();
                        const options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
                        document.getElementById('current-date').textContent = currentDate.toLocaleDateString('id-ID', options);
                    </script>
                </div>
            </div>
        </div>
        <div class="cards-2">
            <div class="card-2">
                <div class="icon-case">
                    <img src="{{ asset('css/image/icon-total-kunjungan.png') }}" alt="icon-total-kunjungan">
                </div>
                <div class="box-2">
                    <h4>Pendaftaran</h4>
<h4 class="jumlah">{{ $count }}</h4>
</div>
<div class="arrow">
    <a href="{{ url('pendaftaran') }}"><img src="{{ asset('css/image/arrow-right.svg') }}" alt=""></a>
</div>
</div>
<div class="card-2">
    <div class="icon-case">
        <img src="{{ asset('css/image/icon-pasien.png') }}" alt="icon-pasien">
    </div>
    <div class="box-2">
        <h4>Pasien</h4>
        <h4 class="jumlah">{{ $countPasien }}</h4>
</div>

                <div class="arrow">
                    <a href="{{ url('pasien') }}"><img src="{{ asset('css/image/arrow-right.svg') }}" alt=""></a>
                </div>
            </div>
            <div class="card-2">
                <div class="icon-case">
                    <img src="{{ asset('css/image/icon_poli.png') }}" alt="icon_poli">
                </div>
                <div class="box-2">
                    <h4>Poli</h4>
                    <h4 class="jumlah">{{ $countPoli }}</h4>
                </div>
                <div class="arrow">
                    <a href="{{ url('poli') }}"><img src="{{ asset('css/image/arrow-right.svg') }}" alt=""></a>
                </div>
            </div>
            <div class="card-2">
                <div class="icon-case">
                    <img src="{{ asset('css/image/icon_dokter.png') }}" alt="icon_dokter">
                </div>
                <div class="box-2">
                    <h4>Dokter</h4>
                    <h4 class="jumlah">{{ $countDokter }}</h4>
                </div>
                <div class="arrow">
                    <a href="{{ url('dokter') }}"><img src="{{ asset('css/image/arrow-right.svg') }}" alt=""></a>
                </div>
            </div>
        </div>
    </main>


    <script>

        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement;
                console.log(arrowParent);
                arrowParent.classList.toggle("showMenu");
            });
        }

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });

        function toggleProfilePopup() {
            const popup = document.getElementById("profile-popup");
            popup.classList.toggle("hidden");
        }

        // Optional: klik di luar popup untuk menutup
        document.addEventListener("click", function (e) {
            const trigger = document.querySelector(".profile-trigger");
            const popup = document.getElementById("profile-popup");

            if (!trigger.contains(e.target) && !popup.contains(e.target)) {
                popup.classList.add("hidden");
            }
        });

    </script>
</body>

</html>