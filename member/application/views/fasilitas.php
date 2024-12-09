<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Fasilitas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin: 20px auto;
            width: 80%;
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
        .facility-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            background: #f9f9f9;
        }
        .facility-card img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 10px;
        }
        .add-btn {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            background-color: green;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="header-container">
        <h2>Daftar Fasilitas</h2>
        <a href="<?php echo base_url('fasilitas/add'); ?>">+ Tambah Fasilitas</a>
        </div>
        <?php if (!empty($fasilitas)) : ?>
            <?php foreach ($fasilitas as $item) : ?>
                <div class="facility-card">
                    <img src="<?php echo base_url('uploads/fasilitas/' . $item['foto_fasilitas']); ?>" alt="<?php echo $item['nama_fasilitas']; ?>">
                    <div>
                        <strong><?php echo $item['nama_fasilitas']; ?></strong>
                        <p><?php echo $item['deskripsi']; ?></p>
                    </div>
                </div>
    </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Tidak ada fasilitas yang tersedia.</p>
        <?php endif; ?>
    </div>
</body>
</html>
