<?php
// Mengambil nama pengguna dari session
// $userName = session('user_name', 'Admin Pendaftaran');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/style/style-pendaftaran.css') }}">
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
                    <a href="{{ route('poli') }}">
                        <img src="{{ asset('css/image/kunjungan.svg') }}" alt="Layanan">
                        <span class="link_name">Layanan</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="#" class="link_name">Layanan</a></li>
                    <li><a href="{{ route('poli') }}">Poli</a></li>
                    <li><a href="{{ route('dokter') }}">Dokter</a></li>
                </ul>
            </li>
            <li class="logout">
                <a href="#" class="keluar">
                    <img src="{{ asset('css/image/keluar.svg') }}" alt="Keluar">
                    <span class="link_name">Keluar</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a href="{{ route('logout') }}" class="link_name">Keluar</a></li>
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
                        <div class="popup-name">Indira Kalista</div>
                        <div class="popup-role">Admin Pendaftaran</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main>
        <div class="main-content">
            <h3>Pendaftaran Hari Ini</h3>
            <a href="{{ route('tambah_pendaftaran') }}" class="add-btn">
                Tambah <i class='bx bxs-plus-circle'></i>
            </a>

        </div>
        <div class="card">
            <div class="top-bar">
                <div class="search-group">
                    <input type="text" placeholder="Cari berdasarkan No.Regis" />
                    <button class="search-btn"><i class='bx bx-search'></i></button>
                </div>
                <button class="filter-btn"><img src="{{ asset('css/image/Input.svg') }}" alt=""></button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Regis</th>
                        <th>Nama Pasien</th>
                        <th>Poli</th>
                        <th>Dokter</th>
                        <th>No. Antrian</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($pendaftarans as $pendaftaran)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $pendaftaran->no_registrasi }}</td>
                        <td>{{ $pendaftaran->pasien->nama ?? '-' }}</td>
                        <td>{{ $pendaftaran->poli->nama_poli ?? '-' }}</td>
                        <td>{{ $pendaftaran->dokter->nama_dokter ?? '-' }}</td>
                        <td>{{ $pendaftaran->no_antrian }}</td>
                        <td class="status-{{ strtolower($pendaftaran->status) }}">
                            {{ ucfirst($pendaftaran->status) }}
                        </td>
                        <td class="aksi">
                            <img src="{{ asset('css/image/eye.svg') }}" alt="Lihat Detail"
                                 onclick="openDetailModal('{{ $pendaftaran->no_registrasi }}')">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Modal Detail (gunakan 1 modal, isi dengan JS sesuai baris yang diklik) -->
            <div class="modal-overlay" id="modalDetail" style="display:none;">
                <div class="modal-box">
                    <div class="modal-header">
                        <h3>Detail Pendaftaran</h3>
                        <span class="close-btn" onclick="closeDetailModal()">&times;</span>
                    </div>
                    <div class="modal-body" id="modalDetailBody">
                        <!-- Isi detail akan diisi oleh JS -->
                    </div>
                    <div class="modal-footer">
                        <button class="btn-cancel">Batalkan</button>
                        <button class="btn-print">
                            <img src="{{ asset('css/image/printer.svg') }}" alt="">Cetak
                        </button>
                    </div>
                </div>
            </div>

            <script>
                // Data pendaftaran untuk modal detail
                const pendaftaranData = @json($pendaftarans);

                function openDetailModal(no_registrasi) {
                    const data = pendaftaranData.find(item => item.no_registrasi === no_registrasi);
                    if (!data) return;

                    // Relasi: pasien, poli, dokter
                    let pasien = data.pasien ? data.pasien.nama : '-';
                    let rekam_medis = data.rekam_medis || '-';
                    let nik = data.pasien ? data.pasien.nik : '-';
                    let tanggal = data.tgl_kunjungan ? new Date(data.tgl_kunjungan).toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' }) : '-';
                    let poli = data.poli ? data.poli.nama_poli : '-';
                    let dokter = data.dokter ? data.dokter.nama_dokter : '-';
                    let waktu = data.dokter ? (data.dokter.jam_praktek ?? '-') : '-';
                    let status = data.status ? data.status.charAt(0).toUpperCase() + data.status.slice(1) : '-';
                    let no_antrian = data.no_antrian || '-';

                    document.getElementById('modalDetailBody').innerHTML = `
                        <div class="form-group">
                            <label for="no_regis">No. Regis</label>
                            <input type="text" id="no_regis" value="${data.no_registrasi}" disabled style="font-weight: 600;">
                        </div>
                        <div class="form-group">
                            <label for="rekam_medis">Rekam Medis</label>
                            <input type="text" id="rekam_medis" value="${rekam_medis}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="no_antrian">No Antrian</label>
                            <input type="text" id="no_antrian" value="${no_antrian}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="namaPasien">Nama Pasien</label>
                            <input type="text" id="namaPasien" value="${pasien}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" id="nik" value="${nik}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="text" id="tanggal" value="${tanggal}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="poli">Poli Tujuan</label>
                            <input type="text" id="poli" value="${poli}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="dokter">Dokter</label>
                            <input type="text" id="dokter" value="${dokter}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="waktu">Waktu Praktek</label>
                            <input type="text" id="waktu" value="${waktu}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" id="status" value="${status}" disabled>
                        </div>
                    `;
                    document.getElementById('modalDetail').style.display = "flex";
                }
                function closeDetailModal() {
                    document.getElementById('modalDetail').style.display = "none";
                }
            </script>
            <div class="pagination-wrapper">
                <div class="pagination-center">Halaman 1/1</div>
                <a href="#" class="pagination-next"><img src="{{ asset('css/image/hal-lanjut.svg') }}" alt=""></a>
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

        // Popup untuk lihat detail
        function openDetailModal() {
            document.getElementById("modalDetail").style.display = "flex";
        }
        function closeDetailModal() {
            document.getElementById("modalDetail").style.display = "none";
        }



    </script>
</body>

</html>