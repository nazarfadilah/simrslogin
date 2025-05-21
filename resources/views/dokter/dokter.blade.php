<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/style/style-layanan.css') }}">
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
                <a href="{{ route('dashboard') }}">
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
            <h3>Daftar Dokter</h3>
        </div>
        <div class="card">
            <div class="top-bar">
                <!-- Input tanggal -->
                <div class="left-group">
                    <!-- Tanggal & Search -->
                    <div class="date-input-wrapper">
                        <i class='bx bx-calendar'></i>
                        <input type="text" id="dateRange" readonly class="date-range-input" />
                    </div>

                    <div class="search-group">
                        <input type="text" placeholder="Cari berdasarkan ID Dokter / Nama" />
                        <button class="search-btn"><i class='bx bx-search'></i></button>
                    </div>
                </div>

                <!-- Tombol filter -->
                <button class="filter-btn"><img src="{{ asset('css/image/Input.svg') }}" alt=""></button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Dokter</th>
                        <th>Nama Dokter</th>
                        <th>Spesialisasi</th>
                        <th>No HP</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody id="dokter-table-body">
                    @foreach($dokters->forPage(1, 5) as $index => $dokter)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $dokter->id_dokter }}</td>
                            <td>{{ $dokter->nama_dokter }}</td>
                            <td>{{ $dokter->spesialisasi ?? '-' }}</td>
                            <td>{{ $dokter->no_hp_dokter ?? '-' }}</td>
                            <td>{{ $dokter->email_dokter ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper">
                <div class="pagination-center">
                    Halaman <span id="current-page">1</span>/<span id="total-page">{{ ceil($dokters->count() / 5) }}</span>
                </div>
                <a href="" class="pagination-next" id="pagination-next"><img src="{{ asset('css/image/hal-lanjut.svg') }}" alt=""></a>
            </div>
            <script>
                const dokters = @json($dokters->values());
                const perPage = 5;
                let currentPage = 1;
                const totalPage = Math.ceil(dokters.length / perPage);

                function renderTable(page) {
                    const tbody = document.getElementById('dokter-table-body');
                    tbody.innerHTML = '';
                    const start = (page - 1) * perPage;
                    const end = start + perPage;
                    dokters.slice(start, end).forEach((dokter, idx) => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${start + idx + 1}</td>
                            <td>${dokter.id_dokter}</td>
                            <td>${dokter.nama_dokter}</td>
                            <td>${dokter.spesialisasi ?? '-'}</td>
                            <td>${dokter.no_hp_dokter ?? '-'}</td>
                            <td>${dokter.email_dokter ?? '-'}</td>
                        `;
                        tbody.appendChild(tr);
                    });
                    document.getElementById('current-page').textContent = page;
                }

                document.getElementById('pagination-next').addEventListener('click', function(e) {
                    e.preventDefault();
                    if (currentPage < totalPage) {
                        currentPage++;
                        renderTable(currentPage);
                    }
                });

                // Optional: handle previous page if needed

                // Initial render
                renderTable(currentPage);
            </script>            
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
                opens: 'right',
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
    </script>
</body>

</html>