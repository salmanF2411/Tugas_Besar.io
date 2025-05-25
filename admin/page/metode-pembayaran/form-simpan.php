<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Form Tambah Produk Furniture</title>
  <style>
    body {
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
      color: rgb(131, 131, 131);
      background-color: #111;
      margin: 0;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
    }

    .card {
      background-color: #1e1e1e;
      border-radius: 12px;
      box-shadow: 0 1px 3px rgba(255, 255, 255, 0.3);
      padding: 10px;
      box-sizing: border-box;
    }

    .form-title {
      font-size: 18px;
      font-weight: 600;
      color: #f9fafb;
      margin-bottom: 20px;
      text-align: center;
    }

    .form-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 16px;
      margin-bottom: 20px;
    }

    @media (min-width: 640px) {
      .form-grid {
        grid-template-columns: 1fr 3fr;
        gap: 24px;
      }
    }

    .form-label {
      font-size: 14px;
      font-weight: 500;
      color: #9ca3af;
      margin-top: 10px;
    }

    .form-input, .form-textarea, .file-input {
      width: 100%;
      padding: 10px 12px;
      font-size: 14px;
      border: 1px solid #333;
      border-radius: 6px;
      background-color: #252525;
      color: #f9fafb;
      box-sizing: border-box;
    }

    .form-textarea {
      min-height: 100px;
      resize: vertical;
    }

    .form-input:focus, .form-textarea:focus {
      border-color: #3b82f6;
      outline: none;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .file-input::-webkit-file-upload-button {
      background-color: #333;
      color: #f9fafb;
      border: none;
      padding: 8px 16px;
      border-radius: 4px;
      margin-right: 16px;
      cursor: pointer;
    }

    .submit-btn {
      width: 100%;
      padding: 12px 16px;
      background-color: #2563eb;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 14px;
      font-weight: 500;
      cursor: pointer;
      margin-top: 10px;
      transition: background-color 0.2s;
    }

    .submit-btn:hover {
      background-color: #1d4ed8;
    }

    .photo-preview-container {
      margin-top: 10px;
      display: flex;
      gap: 15px;
      align-items: center;
    }

    .current-photo {
      max-width: 150px;
      max-height: 100px;
      border-radius: 4px;
      object-fit: cover;
      display: none;
    }

    .photo-info {
      display: flex;
      flex-direction: column;
      gap: 5px;
    }

    .change-photo-btn {
      color: #3b82f6;
      cursor: pointer;
      font-size: 14px;
      text-decoration: underline;
    }

    .filename {
      font-size: 13px;
      color: #9ca3af;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <form action="page/metode-pembayaran/simpan.php" method="post" enctype="multipart/form-data" id="formSimpan">
        <h2 class="form-title">Tambah Metode pembayaran</h2>

        <div class="form-grid">
          <label for="nama_pembayaran" class="form-label">Nama pembayaran</label>
          <input type="text" id="nama_pembayaran" name="nama_pembayaran" class="form-input" required />
        </div>

        <div class="form-grid">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea id="deskripsi" name="deskripsi" class="form-textarea" required></textarea>
        </div>

        <div class="form-grid">
          <label class="form-label">Cover Produk</label>
          <div>
            <div class="photo-preview-container">
              <img src="" alt="Preview" class="current-photo" id="photoPreview">
              <div class="photo-info">
                <span class="change-photo-btn" onclick="document.getElementById('coverInput').click()">Pilih Foto</span>
                <span class="filename" id="filename">Belum ada foto dipilih</span>
              </div>
            </div>
            <input type="file" id="coverInput" name="cover" accept="image/*" style="display: none;" onchange="previewPhoto(this)" required>
          </div>
        </div>

        <button type="submit" name="simpan" class="submit-btn">Simpan Produk</button>
      </form>
    </div>
  </div>

  <script>
    function previewPhoto(input) {
      const preview = document.getElementById('photoPreview');
      const filename = document.getElementById('filename');
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
          filename.textContent = input.files[0].name;
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
</body>
</html>
