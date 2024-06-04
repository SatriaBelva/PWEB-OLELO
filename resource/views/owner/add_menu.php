<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Data Menu OLELO</title>
    <link rel="stylesheet" href="resource/views/css/style-karyawan.css" />
    
  </head>
  <body>
    <div class="modal">
      <div class="modal-content">
        <button class="close-btn" onclick="goBack()">&times;</button>
        <h1>Tambah Data Menu OLELO</h1>
        <form id="formMenu" action="<?= urlpath('tambahmenu-owner') ?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
              <label for="nama-menu">Nama Menu</label>
              <input type="text" id="nama" name="nama" required />
          </div>
          <div class="form-group half-width">
              <label for="kategori">Kategori</label>
              <select id="kategori" name="kategori" required>
                  <option value="">Pilih Kategori</option>
                  <option value="Jajanan Basah">Jajanan Basah</option>
                  <option value="Jajanan Kering">Jajanan Kering</option>
                  <option value="Manisan">Manisan</option>
              </select>
          </div>
          <div class="form-group half-width">
              <label for="harga">Harga</label>
              <input type="number" id="harga" name="harga" required />
          </div>
          <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <textarea id="deskripsi" name="deskripsi" rows="4" required></textarea>
          </div>
          <!-- <div class="form-group half-width">
              <label for="gambar-produk">Gambar Produk</label>
              <input type="file" id="gambar-produk" name="gambar-produk" required />
          </div> -->
          <div class="form-group half-width">
              <label for="Jumlah_stok">Stok</label>
              <input type="number" id="Jumlah_stok" name="Jumlah_stok" required />
          </div>
          <button type="submit" id="simpanButton">Simpan</button>
      </form>
      </div>
    </div>

  </body>
</html>
