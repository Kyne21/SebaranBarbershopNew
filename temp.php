<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STYLESPOT</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            color: #333;
            scroll-behavior: smooth;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 80%;
            height: 80px;
            z-index: 10;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 20px;
        }
        .header img {
            width: 200px;
        }
        .nav {
            display: flex;
            gap: 15px;
            margin-right: 20px;
        }
        .nav a {
            text-decoration: none;
            color: black;
            font-weight: 500;
        }
        .nav a:hover {
            text-decoration: underline;
        }
        .section {
            height: 100vh;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            padding-top: 100px;
            background-image: url("Gambar/Home.png");
            background-size: cover;
            background-position: center;
            color: black; 
        }
        .text-container {
            max-width: 600px;
            text-align: left;
            margin-left: 20px;
            color: white;
        }
        .text-container h2 {
            margin: 0;
            padding: 10px;
        }
        .text-container h3 {
            margin: 0;
            padding: 10px;
        }
        .text-container p {
            margin: 0;
            padding: 10px;
        }
        .animation-container {
            margin-left: 20px;
        }
        .map-section {
            position: relative;
            padding-top: 40px;
        }
        #map {
            height: 60vh;
            width: 70%;
            margin: 20px auto;
            z-index: 1;
        }
        .map-title {
            text-align: center;
            font-weight: bold;
            font-size: 24px;
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
            color: white;
        }
        .white-section {
            background-color: white;
            color: black;
            padding: 20px;
        }
        .Background-Section{
            background-image: url("Gambar/Peta.jpeg");
            color: black;
            padding: 20px;

        }
        h2, h3, p {
            text-align: left; 
            margin: 1ch; 
        }
        h3 {
            text-align: left;
            font-size: 50px;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .filter-container {
            text-align: center;
            margin: 20px;
        }
        .filter-container select {
            padding: 10px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .search-container {
            text-align: center;
            margin: 20px;
        }
        .search-container input {
            padding: 10px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .search-container button {
            padding: 10px 15px;
            margin-left: 10px;
            border: none;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .search-container button:hover {
            background-color: #0056b3;
        }
        .pagination {
            text-align: center;
            margin: 20px;
        }
        .pagination button {
            padding: 10px;
            margin: 0 5px;
            border: 1px solid #007BFF;
            background-color: white;
            color: #007BFF;
            border-radius: 5px;
            cursor: pointer;
        }
        .pagination button:hover {
            background-color: #007BFF;
            color: white;
        }
        .chart-section {
            text-align: center;
            margin-top: 40px;
        }
        .chart-container {
            width: 70%;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .about-section {
            background-color: #f1f1f1;
            padding: 20px;
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        .about-section .team-member {
            text-align: center;
            margin: 10px;
            font-size: 14px;
        }
        .about-section .social-links {
            display: flex;
            gap: 10px;
        }
        .social-links img {
            width: 30px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="Gambar/logo.png" alt="Logo">
        <div class="nav">
            <a href="#homeSection">Home</a>
            <a href="#mapSection">Peta Lokasi</a>
            <a href="#dataSection">Data Barbershop dan Salon</a>
            <a href="http://localhost/SebaranBarbershop/login.php#dataSection">Login Admin</a>
        </div>
    </div>

    <div class="section" id="homeSection">
        <div class="text-container">
            <h2>PEMETAAN BARBERSHOP DAN SALON</h2>
            <h3>BANDUNG RAYA</h3>
            <p>STYLESPOT adalah platform yang dirancang khusus untuk memudahkan Anda menemukan barbershop dan salon terbaik di Bandung Raya. Kami memahami bahwa penampilan adalah bagian penting dari kepercayaan diri, dan kami ingin membantu Anda menemukan tempat yang tepat untuk merawat diri.</p>
        </div>
    </div>

    <div class="white-section" id="dataSection">
        <h2 style="text-align: center;">DATA BARBERSHOP DAN SALON</h2>
        <div class="filter-container">
            <label for="genderFilter">Filter berdasarkan Gender:</label>
            <select id="genderFilter" onchange="filterData()">
                <option value="">Semua</option>
                <option value="0">Pria</option>
                <option value="1">Wanita</option>
            </select>
        </div>
        <table id="dataTable" style="margin: 0 auto;">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jam Buka</th>
                    <th>Jam Tutup</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody id="barbershopData">
                <!-- Data akan dimuat di sini -->
            </tbody>
        </table>
        <div class="pagination">
            <button id="prevBtn" onclick="changePage(-1)">&#10094; Prev</button>
            <span id="pageInfo">1 dari 1</span>
            <button id="nextBtn" onclick="changePage(1)">Next &#10095;</button>
        </div>
    </div>

    <div class="Background-Section" id="mapSection">
        <div class="map-section">
            <div class="map-title">PETA LOKASI</div>
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Cari Barbershop...">
                <button onclick="searchBarbershop()">Cari</button>
            </div>
            <div id="map"></div>
        </div>
    </div>
    <div class="chart-section">
        <div class="chart-container">
            <h3>KATEGORI BARBERSHOP DAN SALON</h3>
            <label for="chartType">Pilih Tipe Chart:</label>
            <select id="chartType" onchange="updateChart()">
                <option value="gender">Gender</option>
                <option value="harga">Harga</option>
            </select>
            <canvas id="dataChart"></canvas>
        </div>
        </div>
        <div class="about-section">
            <div class="team-member">
                <p>Kinanti Raihan Az-Zahra<br>1103210052<br>Frontend</p>
            </div>
            <div class="team-member">
                <p>Muhammad Farrel Ahadi Tama<br>1103210177<br>UI/UX Design</p>
            </div>
            <div class="team-member">
                <p>Ryan Darell Adyatma<br>1103223007<br>Backend</p>
            </div>
            <div class="social-links">
                <img src="Gambar/Logo Instagram.png" alt="Instagram">
                <img src="Gambar/Logo X.png" alt="Twitter">
            </div>
        </div>
    </div>
    
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const dataPerPage = 5; // Mengubah menjadi 10 data per halaman
        let currentPage = 1;
        let barbershops = []; // Simpan data barbershop di sini
        let filteredBarbershops = []; // Simpan data yang sudah difilter

        // Fungsi untuk memuat data barbershop
        function loadBarbershops() {
            fetch('getBarbershops.php')
                .then(response => response.json())
                .then(data => {
                    barbershops = data;
                    filteredBarbershops = data; // Awalnya, data yang difilter sama dengan data asli
                    renderTable();
                });
        }

        // Fungsi untuk merender tabel
        function renderTable() {
            const start = (currentPage - 1) * dataPerPage;
            const end = start + dataPerPage;
            const paginatedData = filteredBarbershops.slice(start, end);
            const tableBody = document.getElementById('barbershopData');
            tableBody.innerHTML = '';

            paginatedData.forEach(barbershop => {
                const hargaText = barbershop.Harga == 1 ? "< 50.000" :
                                  barbershop.Harga == 2 ? "50.000 - 100.000" :
                                  barbershop.Harga == 3 ? "> 100.000" : "Harga tidak diketahui";

                const row = `<tr class="gender-${barbershop.Gender}"> <!-- Menambahkan kelas gender -->
                                <td>${barbershop.Nama}</td>
                                <td>${barbershop.Alamat}</td>
                                <td>${barbershop.Buka}</td>
                                <td>${barbershop.Tutup}</td>
                                <td>${hargaText}</td>
                             </tr>`;
                tableBody.innerHTML += row;
            });

            updatePagination();
        }

        // Fungsi untuk mengubah halaman
        function changePage(direction) {
            const totalPages = Math.ceil(filteredBarbershops.length / dataPerPage);
            currentPage += direction;

            if (currentPage < 1) currentPage = 1;
            if (currentPage > totalPages) currentPage = totalPages;

            renderTable();
        }

        // Fungsi untuk memperbarui informasi pagination
        function updatePagination() {
            const totalPages = Math.ceil(filteredBarbershops.length / dataPerPage);
            document.getElementById('pageInfo').innerText = `${currentPage} dari ${totalPages}`;
            document.getElementById('prevBtn').disabled = currentPage === 1;
            document.getElementById('nextBtn').disabled = currentPage === totalPages;
        }

        // Memuat data saat halaman dimuat
        loadBarbershops();

        var map = L.map('map').setView([-6.9176, 107.6191], 12);
        var markers = [];

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        fetch('getBarbershops.php')
            .then(response => response.json())
            .then(barbershops => {
                barbershops.forEach(function(barbershop) {
                    var hargaText = '';
                    if (barbershop.Harga == 1) {
                        hargaText = "< 50.000";
                    } else if (barbershop.Harga == 2) {
                        hargaText = "50.000 - 100.000";
                    } else if (barbershop.Harga == 3) {
                        hargaText = "> 100.000";
                    } else {
                        hargaText = "Harga tidak diketahui";
                    }

                    var instagramText = barbershop.Instagram ? "<a href='" + barbershop.Instagram + "' target='_blank'>Instagram</a>" : "Instagram belum tersedia";

                    var marker = L.marker([barbershop.Latitude, barbershop.Longitude]).addTo(map)
                        .bindPopup("<strong>" + barbershop.Nama + "</strong><br>" +
                                    "Alamat: " + barbershop.Alamat + "<br>" +
                                    "Buka: " + barbershop.Buka + "<br>" +
                                    "Tutup: " + barbershop.Tutup + "<br>" +
                                    "Harga: " + hargaText + "<br>" +
                                    "Instagram: " + instagramText);

                    markers.push({ name: barbershop.Nama, marker: marker });
                });
            });

        function searchBarbershop() {
            var input = document.getElementById("searchInput").value.toLowerCase();
            var found = false;

            markers.forEach(function(item) {
                if (item.name.toLowerCase().includes(input)) {
                    map.setView(item.marker.getLatLng(), 15);
                    item.marker.openPopup();
                    found = true;
                }
            });

            if (!found) {
                alert("Kalau Kata Farrel Gaada Ya Gaada!! Paham?!");
            }
        }

        function filterData() {
            var selectedGender = document.getElementById("genderFilter").value;
            if (selectedGender) {
                filteredBarbershops = barbershops.filter(barbershop => barbershop.Gender == selectedGender);
            } else {
                filteredBarbershops = barbershops; // Tampilkan semua jika tidak ada filter
            }
            currentPage = 1; // Reset ke halaman pertama
            renderTable();
        }
    </script>
</body>
</html>