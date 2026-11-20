<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<header class="navbar navbar-dark bg-dark px-4 py-3 shadow-sm">
        <span class="navbar-brand mb-0 h1">Selamat Datang di Dashboard</span>

        <div class="d-flex align-items-center gap-3">
            <span class="text-light small">
                Login sebagai: <strong>{{ $user->user_nm ?? '' }}</strong>
            </span>
            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row min-vh-100">
            <!-- Sidebar Menu Kiri -->
            <aside class="col-md-3 col-lg-2 bg-white border-end p-3">
                <ul class="nav flex-column gap-1">
                    <li class="nav-item">
                        <a class="nav-link active fw-semibold text-primary" href="#konten-dashboard" onclick="tampilInfo('dashboard')">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link fw-semibold text-dark pb-1">Menu</span>
                        <ul class="nav flex-column ms-3 gap-1">
                            <li class="nav-item">
                                <a class="nav-link py-1 text-secondary" href="#gudeg" onclick="tampilInfo('gudeg')">
                                    Gudeg
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-1 text-secondary" href="#mangut" onclick="tampilInfo('mangut')">
                                    Mangut
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-1 text-secondary" href="#wedang-uwu" onclick="tampilInfo('wedang-uwu')">
                                    Wedang Uwu
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>

            <!-- Area Konten Utama -->
            <main class="col-md-9 col-lg-10 p-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 id="judul-konten" class="card-title mb-2">Ringkasan Dashboard</h4>
                        <p id="deskripsi-konten" class="text-muted mb-0">
                            Selamat datang! Silakan pilih item <strong>Gudeg</strong>, <strong>Mangut</strong>, atau <strong>Wedang Uwu</strong> di menu sebelah kiri untuk melihat detailnya.
                        </p>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        const dataKonten = {
            'dashboard': {
                judul: 'Ringkasan Dashboard',
                deskripsi: 'Selamat datang! Silakan pilih item Gudeg, Mangut, atau Wedang Uwu di menu sebelah kiri untuk melihat detailnya.'
            },
            'gudeg': {
                judul: 'Gudeg',
                deskripsi: 'Kuliner khas Yogyakarta berbahan dasar nangka muda yang dimasak lama dengan santan dan gula aren.'
            },
            'mangut': {
                judul: 'Mangut',
                deskripsi: 'Masakan tradisional berkuah santan pedas gurih, umumnya menggunakan ikan asap seperti lele atau pari.'
            },
            'wedang-uwu': {
                judul: 'Wedang Uwu',
                deskripsi: 'Minuman rempah hangat khas Imogiri dengan warna merah alami dari secang, jahe, kayu manis, dan gula batu.'
            }
        };

        function tampilInfo(key) {
            const item = dataKonten[key];
            if (!item) return;
            document.getElementById('judul-konten').textContent = item.judul;
            document.getElementById('deskripsi-konten').textContent = item.deskripsi;
        }
    </script>
</body>
</html>