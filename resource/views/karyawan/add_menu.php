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
        <form id="formMenu" action="<?= urlpath('tambahmenu-karyawan') ?>" method="POST" enctype="multipart/form-data">
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

    <!-- Modal -->
    <!-- <div id="myModal" class="modal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0, 0, 0, 0.4);">
      <div class="modal-content" style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 80%; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); animation: animatezoom 0.6s;">
          <a href="" class="close" style="color: #aaa; float: right; font-size: 28px; font-weight: bold;">&times;</a>
          <p>Produk berhasil ditambahkan.</p>
          <a href="" id="okButton">OK</a>
      </div>
    </div>



    <script>
      function goBack() {
        window.history.back();
      }

      // Get the modal
      var modal = document.getElementById("myModal");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // Get the OK button
      var okButton = document.getElementById("okButton");

      // When the user clicks the button, open the modal
      document.getElementById("simpanButton").onclick = function(event) {
        event.preventDefault(); // Stop the default form submission
        modal.style.display = "block";
        // Submit the form manually
        document.getElementById("formMenu").submit();
      }

      // When the user clicks on <span> (x) or OK button, close the modal and redirect back to menu.php
      span.onclick = function() {
        modal.style.display = "none";
        window.location.href = "menu.php";
      }

      okButton.onclick = function() {
        modal.style.display = "none";
        window.location.href = "menu.php";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
          window.location.href = "menu.php";
        }
      }
    </script> -->

  </body>
</html>
