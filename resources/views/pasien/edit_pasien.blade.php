<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="{{ asset ('css/style/style-pasien_tambah.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <img src="{{ asset ('css/image/logo.svg') }}" alt="Logo RS">
            <span class="logo_name">
                <h5>RUMAH SAKIT ISLAM<br>BANJARMASIN</h5>
            </span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="{{ route ('dashboard') }}">
                    <img src="{{ asset ('css/image/beranda.svg') }}" alt="Beranda">
                    <span class="link_name">Beranda</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a href="{{ route ('dashboard') }}" class="link_name">Beranda</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="{{ route ('pendaftaran') }}">
                        <img src="{{ asset ('css/image/kunjungan.svg') }}" alt="Kunjungan">
                        <span class="link_name">Pendaftaran</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="#" class="link_name">Pendaftaran</a></li>
                    <li><a href="{{ route ('pendaftaran') }}">Pendaftaran Hari Ini</a></li>
                    <li><a href="{{ route ('riwayat_pendaftaran') }}">Riwayat Pendaftaran</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route ('pasien') }}">
                    <img src="{{ asset ('css/image/pasien.svg') }}" alt="Pasien">
                    <span class="link_name">Pasien</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a href="{{ route ('pasien') }}" class="link_name">Pasien</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="{{ route ('poli') }}">
                        <img src="{{ asset ('css/image/kunjungan.svg') }}" alt="Layanan">
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
                    <img src="{{ asset('css/image/keluar.svg') }}" alt="Keluar">
                    <span class="link_name">Keluar</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a href="{{ route ('logout') }}" class="link_name">Keluar</a></li>
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
            <a href="{{ route ('pasien') }}" class="sub">Data Pasien</a>
            <i class='sub-1 bx bx-chevron-right'></i>
            <a href="{{ route ('pasien') }}" class="sub">Detail</a>
            <i class='bx bx-chevron-right'></i>
            <a href="{{ route ('edit_pasien') }}" class="sub-link">Edit</a>
        </div>
        <div class="card">
            <form action="#" id="editPasienForm">
                <div class="form-grid">
                    <div class="form-group">
                        <label>Rekam Medis</label>
                        <input type="text" name="rekam_medis" id="rekam_medis" readonly style="background-color: #f0f0f0; cursor: not-allowed;" tabindex="-1" />
                    </div>
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" id="nik" maxlength="16" />
                    </div>
                    <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" name="nama_pasien" id="nama_pasien" />
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="radio-group">
                            <label><input type="radio" name="jk" value="L" id="jk_l"> Laki-laki</label>
                            <label><input type="radio" name="jk" value="P" id="jk_p"> Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" />
                    </div>
                    <div class="form-group">
                        <label>Nomor Hp</label>
                        <input type="text" name="no_hp" id="no_hp" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" />
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" id="alamat"></textarea>
                    </div>
                    <div class="form-actions full-width">
                        <a href="{{ route('pasien') }}" class="btn-1 btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>

            <script>
                // Ganti dengan rekam_medis pasien yang diedit, misal dari route atau variabel blade
                const rekamMedisId = "{{ $pasien->rekam_medis ?? '' }}";

                // Fetch data pasien
                fetch(`/api/pasiens/${rekamMedisId}`)
                    .then(res => res.json())
                    .then(data => {
                        document.getElementById('rekam_medis').value = data.rekam_medis || '';
                        document.getElementById('nik').value = data.nik || '';
                        document.getElementById('nama_pasien').value = data.nama_pasien || '';
                        document.getElementById('tgl_lahir').value = data.tgl_lahir || '';
                        document.getElementById('alamat').value = data.alamat || '';
                        document.getElementById('no_hp').value = data.no_hp || '';
                        document.getElementById('email').value = data.email || '';
                        document.getElementById('tempat_lahir').value = data.tempat_lahir || '';
                        if (data.jk === 'L') {
                            document.getElementById('jk_l').checked = true;
                        } else if (data.jk === 'P') {
                            document.getElementById('jk_p').checked = true;
                        }
                    });

                // Submit update
                document.getElementById('editPasienForm').addEventListener('submit', function (e) {
                    e.preventDefault();

                    const formData = {
                        rekam_medis: document.getElementById('rekam_medis').value,
                        nik: document.getElementById('nik').value,
                        nama_pasien: document.getElementById('nama_pasien').value,
                        tgl_lahir: document.getElementById('tgl_lahir').value,
                        alamat: document.getElementById('alamat').value,
                        no_hp: document.getElementById('no_hp').value,
                        email: document.getElementById('email').value,
                        jk: document.querySelector('input[name="jk"]:checked')?.value || '',
                        tempat_lahir: document.getElementById('tempat_lahir').value,
                    };

                    fetch(`/api/pasiens/${rekamMedisId}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(formData)
                    })
                    .then(res => {
                        if (res.ok) {
                            showPopup();
                        } else {
                            alert('Gagal menyimpan data');
                        }
                    });
                });
            </script>
        </div>

        <div id="popup" class="popup">
            <div class="popup-tambah">
                <div class="checkmark"><img src="{{ asset('css/image/centang.svg') }}" alt=""></div>
                <h3>Sukses</h3>
                <p>Data pasien berhasil diperbarui</p>
            </div>
        </div>
    </main>


    <script>
    function showPopup() {
        const popup = document.getElementById('popup');
        popup.style.display = 'flex'; // atau 'block' sesuai styling popup

        setTimeout(() => {
            popup.style.display = 'none';
            window.location.href = "{{ route('pasien') }}"; // redirect ke halaman pasien
        }, 2000); // 2 detik delay sebelum kembali
    }
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