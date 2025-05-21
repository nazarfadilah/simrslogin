<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/style/style-pendaftaran-riwayat.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- jQuery dan Date Range Picker -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

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
                <a href="{{ route('logout') }}" class="keluar">
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
            <h3>Riwayat Pendaftaran</h3>
        </div>
        <div class="card">
            <div class="top-bar">
                <div class="search-group">
                    <input type="text" placeholder="Cari berdasarkan Kode Daftar" />
                    <button class="search-btn"><i class='bx bx-search'></i></button>
                </div>
                <!-- Input tanggal -->
                <div class="date-input-wrapper">
                    <i class='bx bx-calendar'></i>
                    <input type="text" id="dateRange" readonly class="date-range-input" />
                </div>

                <!-- Tombol filter -->
                <button class="filter-btn"><img src="{{ asset('css/image/Input.svg') }}" alt=""></button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
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
                    @foreach ($riwayatPendaftaran as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->tgl_kunjungan)->format('d-m-Y') }}</td>
                        <td>{{ $data->no_pendaftaran }}</td>
                        <td>{{ $data->pasien->nama ?? '-' }}</td>
                        <td>{{ $data->jadwal->poli->nama_poli ?? '-' }}</td>
                        <td>{{ $data->jadwal->dokter->nama ?? '-' }}</td>
                        <td>{{ $data->no_antrian }}</td>
                        <td class="status">{{ ucfirst($data->status) }}</td>
                        <td>
                            <img src="{{ asset('css/image/eye.svg') }}" alt="" class="aksi" onclick="openDetailModal({{ $data->no_pendaftaran }})">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal Detail -->
            <div class="modal-overlay" id="modalDetail" style="display:none;">
                <div class="modal-box">
                    <div class="modal-header">
                        <h3>Detail Pendaftaran</h3>
                        <span class="close-btn" onclick="closeDetailModal()">&times;</span>
                    </div>
                    <div class="modal-body" id="modalDetailBody">
                        <!-- Data detail akan diisi via JS -->
                    </div>
                    <div class="modal-footer">
                        <button class="btn-print"><img src="{{ asset('css/image/printer.svg') }}" alt="">Cetak</button>
                    </div>
                </div>
            </div>

            <script>
                // Data pendaftaran dalam bentuk JS (untuk demo, sebaiknya generate dari backend)
                const pendaftarans = @json($riwayatPendaftaran);

                function openDetailModal(no_pendaftaran) {
                    const data = pendaftarans.find(item => item.no_pendaftaran == no_pendaftaran);
                    if (!data) return;

                    let pasien = data.pasien || {};
                    let jadwal = data.jadwal || {};
                    let poli = jadwal.poli || {};
                    let dokter = jadwal.dokter || {};

                    let html = `
                        <div class="form-group">
                            <label>No. Regis</label>
                            <input type="text" value="${data.no_pendaftaran}" disabled style="font-weight: 600;">
                        </div>
                        <div class="form-group">
                            <label>Rekam Medis</label>
                            <input type="text" value="${pasien.no_rm ?? '-'}" disabled>
                        </div>
                        <div class="form-group">
                            <label>No Antrian</label>
                            <input type="text" value="${data.no_antrian}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Nama Pasien</label>
                            <input type="text" value="${pasien.nama ?? '-'}" disabled>
                        </div>
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" value="${pasien.nik ?? '-'}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="text" value="${moment(data.tgl_kunjungan).format('DD MMMM YYYY')}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Poli Tujuan</label>
                            <input type="text" value="${poli.nama_poli ?? '-'}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Dokter</label>
                            <input type="text" value="${dokter.nama ?? '-'}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Waktu Praktek</label>
                            <input type="text" value="${jadwal.jam_mulai && jadwal.jam_selesai ? jadwal.jam_mulai + ' - ' + jadwal.jam_selesai : '-'}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" value="${data.status ? data.status.charAt(0).toUpperCase() + data.status.slice(1) : '-'}" disabled>
                        </div>
                    `;
                    document.getElementById('modalDetailBody').innerHTML = html;
                    document.getElementById('modalDetail').style.display = 'flex';
                }

                function closeDetailModal() {
                    document.getElementById('modalDetail').style.display = 'none';
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

        $(function () {
            $('#dateRange').daterangepicker({
                opens: 'left',
                locale: {
                    format: 'DD MMM YYYY'
                }
            }, function (start, end) {
                console.log("Dari:", start.format('YYYY-MM-DD'), "Sampai:", end.format('YYYY-MM-DD'));
                // Kamu bisa trigger filter di sini
            });
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

        function openDetailModal() {
            document.getElementById("modalDetail").style.display = "flex";
        }
        function closeDetailModal() {
            document.getElementById("modalDetail").style.display = "none";
        }
    </script>
</body>

</html>