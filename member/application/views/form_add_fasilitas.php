<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Fasilitas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin: 20px auto;
            width: 50%;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input, textarea {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            padding: 10px;
            font-size: 16px;
            color: white;
            background-color: green;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: darkgreen;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Fasilitas</h2>
        <?php if (!empty($error)) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="<?php echo base_url('fasilitas/save'); ?>" method="POST" enctype="multipart/form-data">
            <label for="nama_fasilitas">Nama Fasilitas</label>
            <input type="text" name="nama_fasilitas" id="nama_fasilitas" required>

            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="5" required></textarea>

            <label for="foto_fasilitas">Foto Fasilitas</label>
            <input type="file" name="foto_fasilitas" id="foto_fasilitas" required>

            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
