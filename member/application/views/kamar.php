<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Kamar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 40px 80px 50px 80px;
        }

        .header-container h2 {
            margin: 0;
            color: #333;
        }

        .header-container a {
            background-color: #93d56b;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .header-container a:hover {
            background-color: #218838;
        }

        .kamar-container {
            display: flex;
            justify-content: center; /* Memastikan card berada di tengah */
            flex-wrap: wrap; /* Agar card rapi jika baris penuh */
            gap: 16px; /* Jarak antar card */
            margin: 0 auto; /* Memberi margin otomatis di kiri dan kanan */
            max-width: 1200px; /* Membatasi lebar maksimum kontainer */
            padding: 0 16px; /* Memberi sedikit ruang di dalam kontainer */
        }

        .kamar-container {
            display: grid; /* Menggunakan grid layout */
            grid-template-columns: repeat(4, 1fr); /* Maksimum 4 card per baris */
            gap: 16px; /* Jarak antar card */
            margin: 0 auto; /* Memusatkan kontainer */
            max-width: 1200px; /* Membatasi lebar maksimum */
            padding: 0 16px; /* Ruang di kiri dan kanan */
        }

        .kamar-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            background-color: #fff;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .kamar-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .kamar-card img {
            width: 100%;
            height: auto;
            border-radius: 4px;
        }

        .status-digunakan {
            background-color: #28a745;
            color: white;
            padding: 8px;
            border-radius: 4px;
        }

        .status-siap-huni {
            background-color: #ffc107;
            color: black;
            padding: 8px;
            border-radius: 4px;
        }

        .status-tidak-aktif {
            background-color: #dc3545;
            color: white;
            padding: 8px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="header-container">
        <h2>Daftar Kamar</h2>
        <a href="<?php echo base_url('kamar/tambah'); ?>">+ Tambah Kamar</a>
    </div>
    <div class="kamar-container">
        <?php foreach ($kamar as $item): ?>
            <div class="kamar-card">
                <img src="<?php echo base_url('uploads/' . $item->foto_kamar); ?>" alt="Foto Kamar">
                <h3>Kamar - <?php echo $item->nomor_kamar; ?></h3>
                <p>Harga: Rp <?php echo number_format($item->harga_kamar, 0, ',', '.'); ?></p>
                <p>Status: 
                    <span class="<?php 
                        echo ($item->status_kamar == 'digunakan') ? 'status-digunakan' : 
                             ($item->status_kamar == 'siap_huni' ? 'status-siap-huni' : 
                             'status-tidak-aktif'); ?>">
                        <?php echo ucfirst($item->status_kamar); ?>
                    </span>
                </p>
                <p>ID Fasilitas: <?php echo $item->id_fasilitas; ?></p>
                <p>ID Member: <?php echo $item->id_member ?? '-'; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
