// script.js
var map = L.map('map').setView([-6.9176, 107.6191], 12); // Koordinat Bandung

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
}).addTo(map);

// Data barbershop dari PHP
var barbershops = <?php echo json_encode($barbershops); ?>;

barbershops.forEach(function(sebaran) {
    L.marker([sebaran.latitude, sebaran.longitude]).addTo(map)
        .bindPopup(sebaran.Nama); // Ganti dengan nama kolom yang sesuai
});
