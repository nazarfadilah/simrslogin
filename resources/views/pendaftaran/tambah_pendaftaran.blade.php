<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/style/style-pendaftaran_tambah.css') }}">
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
                    <li><a href="{{ route('dashboard') }}" class="link_name">Beranda</a></li>
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
                    <li><a href="{{ route('pendaftaran') }}">Pendaftaran Hari Ini</a></li>
                    <li><a href="{{ route('riwayat_pendaftaran') }}">Riwayat Pendaftaran</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('pasien') }}">
                    <img src="{{ asset('css/image/pasien.svg') }}" alt="Pasien">
                    <span class="link_name">Pasien</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a href="{{ route('pasien') }}" class="link_name">Pasien</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="index-layanan.html">
                        <img src="{{ asset('css/image/kunjungan.svg') }}" alt="Layanan">
                        <span class="link_name">Layanan</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="#" class="link_name">Layanan</a></li>
                    <li><a href="{{ route ('poli') }}">Poli</a></li>
                    <li><a href="{{ route ('dokter') }}">Dokter</a></li>
                </ul>
            </li>
            <li class="logout">
                <a href="{{ route ('logout') }}" class="keluar">
                    <img src="{{  asset ('css/image/keluar.svg') }}" alt="Keluar">
                    <span class="link_name">Keluar</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a href="#" class="link_name">Keluar</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <!-- Trigger (gambar 1) -->
            <div class="profile-trigger" onclick="toggleProfilePopup()">
                <img src="{{ asset ('css/image/admin.svg') }}" alt="User" class="profile-icon">
            </div>

            <!-- Popup (gambar 2) -->
            <div id="profile-popup" class="profile-popup hidden">
                <div class="popup-content">
                    <img src="{{ asset ('css/image/admin.svg') }}" alt="User" class="popup-icon">
                    <div>
                        <div class="popup-name">Indira Kalista</div>
                        <div class="popup-role">Admin Pendaftaran</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main>
        <div class="main-content">
            <a href="{{ route ('pendaftaran') }}" class="sub">Pendaftaran Hari Ini</a>
            <i class='bx bx-chevron-right'></i>
            <a href="{{ route ('tambah_pendaftaran') }}" class="sub-link">Tambah Pendaftaran</a>
        </div>
        <div class="card">
            <form action="#" id="kunjunganForm">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="rekam_medis">Rekam Medis</label>
                        <input type="text" id="rekam_medis" placeholder="Cari">
                    </div>
                    <div class="form-group">
                        <label for="poli">Poli Tujuan</label>
                        <select id="poli">
                            <option>-- Pilih Poli --</option>
                            <option value="mata">Mata</option>
                            <option value="gigi">Gigi</option>
                            <option value="umum">Umum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaPasien">Nama Pasien</label>
                        <input type="text" id="namaPasien">
                    </div>
                    <div class="form-group">
                        <label for="dokter">Dokter</label>
                        <select id="dokter">
                            <option>-- Pilih Dokter --</option>
                            <option value="mata">dr. Indah Permata, Sp.PD</option>
                            <option value="gigi">dr. Andi Wijaya, Sp.PD</option>
                            <option value="umum">dr. Bella Sp.PD</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" id="nik">
                    </div>
                    <div class="form-group">
                        <label for="waktu">Waktu Praktek</label>
                        <input type="time" id="waktu">
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" id="tanggal">
                    </div>

                    <div class="form-actions full-width">
                        <button type="reset" class="btn btn-secondary">Hapus</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>

        <div id="popup" class="popup">
            <div class="popup-tambah">
                <div class="checkmark"><img src="{{ asset ('css/image/centang.svg')}}" alt=""></div>
                <h3>Sukses</h3>
                <p>Pendaftaran berhasil ditambahkan</p>
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

        // Popup untuk tambah
        document.getElementById('kunjunganForm').addEventListener('submit', function (e) {
            e.preventDefault();

            // Simulasikan penyimpanan data sukses
            showPopup();

            // Reset form setelah submit
            this.reset();
        });

        function showPopup() {
            const popup = document.getElementById('popup');
            popup.style.display = 'flex';

            // Tutup popup otomatis setelah 3 detik
            setTimeout(() => {
                popup.style.display = 'none';
            }, 3000);
        }


    </script>
</body>

</html>