# DOKUMEN DESAIN UI/UX
## BK - Bengkel Ku
**Sistem Pendaftaran dan Antrean Servis Bengkel Motor**

| Informasi | Keterangan |
|---|---|
| Nama sistem | BK - Bengkel Ku |
| Bengkel | Cahaya Motoshop Service |
| Lokasi | Jl. Pemuda No. 56, Ngabang |
| Dokumen acuan | PDF “Dokumentasi wireframe & peta alur” (15 halaman) dan SRS |
| Versi | 1.0 (draf desain) |
| Framework CSS | Bootstrap 5 |
| Status | Spesifikasi desain; bukan implementasi fungsional |

> Wireframe sumber merupakan **low-fidelity statis** untuk evaluasi. Tombol, tautan, dialog, dan jalur pada PDF belum membuktikan bahwa fitur atau pembatasan akses sudah berjalan. Dokumen ini menerjemahkan rancangan tersebut menjadi pedoman implementasi UI menggunakan Bootstrap 5.

---

## 1. Tujuan Desain

Menyediakan antarmuka web desktop yang sederhana, konsisten, responsif, dan mudah digunakan petugas untuk mengelola antrean. Pemilik bengkel menggunakan dashboard yang sama dalam mode baca-saja.

Prinsip desain:
- Utamakan keterbacaan data antrean.
- Formulir ringkas dengan label yang jelas.
- Tampilkan validasi dekat dengan field terkait.
- Berikan konfirmasi untuk aksi penting seperti hapus dan perubahan status.
- Bedakan kemampuan Petugas dan Pemilik melalui role.
- Pertahankan pola navigasi dan komponen yang konsisten.

## 2. Batasan dan Asumsi

1. Pelanggan datang langsung ke bengkel; tidak ada halaman login pelanggan.
2. Petugas mengisi formulir dari komputer/laptop bengkel.
3. Pemilik hanya melihat, mencari, memfilter, dan membuka detail.
4. Seluruh data pelanggan pada wireframe adalah data contoh.
5. Contoh tanggal pada PDF adalah 28 Oktober 2026.
6. Wireframe tidak menyatakan backend, database, atau kontrol akses telah diterapkan.
7. Desain mengacu pada field SRS: nama, telepon, jenis/merek kendaraan, nomor polisi, dan layanan/keluhan.

## 3. Identitas dan Gaya Visual

### 3.1 Identitas tetap

- Nama aplikasi: **BK - Bengkel Ku**
- Nama bengkel: **Cahaya Motoshop Service**
- Lokasi: **Jl. Pemuda No. 56, Ngabang**
- Identitas pengguna pada contoh: Dina sebagai Petugas dan User sebagai Pemilik Bengkel.

### 3.2 Arahan visual

Gunakan tampilan dashboard administratif yang bersih:
- Latar halaman netral dan permukaan kartu putih.
- Navigasi utama sederhana.
- Judul halaman jelas dan hierarki teks konsisten.
- Tabel menggunakan header kontras dan baris yang mudah dipindai.
- Badge status memiliki warna konsisten dan tetap disertai teks agar tidak bergantung pada warna saja.
- Hindari dekorasi yang mengganggu pembacaan data.

Warna yang disarankan untuk implementasi Bootstrap:
- Primary: `#0d6efd` (aksi utama dan tautan).
- Success: `#198754` (status Selesai).
- Warning: `#ffc107` (status Menunggu).
- Info: `#0dcaf0` atau warna netral yang tetap terbaca (status Diproses).
- Danger: `#dc3545` (aksi hapus dan status Dibatalkan).
- Background: `#f8f9fa`.
- Text: `#212529`.

Warna di atas adalah rekomendasi implementasi visual, bukan nilai warna yang diwajibkan oleh PDF sumber.

## 4. Struktur Navigasi

### 4.1 Petugas
- Dashboard Antrean
- Pendaftaran Pelanggan
- Akses pengelolaan (tautan/area sesuai rancangan)
- Identitas pengguna dan tombol Logout

### 4.2 Pemilik Bengkel
- Dashboard Antrean
- Penanda “Hanya melihat”
- Identitas pengguna dan tombol Logout

Pemilik tidak boleh melihat tombol Tambah, Edit, Hapus, atau Ubah Status. Pembatasan harus dilakukan di backend/route, bukan hanya dengan menyembunyikan komponen.

## 5. Daftar Halaman dan Spesifikasi

### 5.1 Login

**Tujuan:** Autentikasi Petugas dan Pemilik Bengkel.

**Komponen:**
- Identitas BK - Bengkel Ku dan Cahaya Motoshop Service.
- Panel/form login.
- Input Username/email.
- Input Password.
- Tombol Masuk.
- Keterangan bahwa role ditentukan dari akun setelah autentikasi.

**Perilaku:**
- Kredensial valid: arahkan ke dashboard sesuai role akun.
- Kredensial salah: tampilkan “Username/email atau password salah”.
- Isian kosong: tampilkan pesan wajib diisi di dekat field.
- Pertahankan username/email dan kosongkan password saat login gagal.
- Jangan menampilkan pemilih role publik.

**Rujukan:** PDF halaman 2; KF-01.

### 5.2 Dashboard Antrean — Petugas

**Tujuan:** Memantau dan mengelola antrean harian.

**Komponen:**
- Header identitas bengkel, pengguna Petugas, dan Logout.
- Navigasi Dashboard Antrean dan Pendaftaran Pelanggan.
- Kartu ringkasan Menunggu, Diproses, Selesai.
- Judul “Antrean harian” dan tombol “Tambah pendaftaran”.
- Filter tanggal.
- Kolom pencarian nomor antrean/nama/nomor polisi.
- Tombol Cari dan Reset.
- Filter status: Semua, Menunggu, Diproses, Selesai, Dibatalkan.
- Tabel antrean.

**Kolom tabel:**
1. No. antrean
2. Waktu daftar
3. Nama pelanggan
4. No. telepon
5. Jenis/merek kendaraan
6. No. polisi
7. Layanan/keluhan
8. Status
9. Aksi

**Aksi Petugas:**
- Edit
- Hapus
- Ubah status

**Perilaku:**
- Data ditampilkan berdasarkan tanggal terpilih.
- Pencarian mencocokkan nomor antrean, nama pelanggan, atau nomor polisi.
- Filter status memperbarui daftar.
- Hapus memerlukan konfirmasi.
- Ubah status memerlukan pemilihan status dan konfirmasi.
- Ringkasan dashboard menghitung Menunggu, Diproses, dan Selesai; status Dibatalkan tetap terlihat di tabel/filter sesuai catatan PDF.

**Rujukan:** PDF halaman 3; KF-03, KF-06, KF-07, KF-08, KF-12.

### 5.3 Dashboard Antrean — Pemilik Bengkel

**Tujuan:** Memantau antrean tanpa mengubah data.

**Komponen:**
- Header identitas bengkel, pengguna Pemilik, dan Logout.
- Penanda “Hanya melihat”.
- Kartu ringkasan Menunggu, Diproses, Selesai.
- Filter tanggal dan pencarian.
- Filter status.
- Tabel antrean dengan kolom data yang sama.
- Aksi “Lihat detail” saja.

**Perilaku:**
- Pemilik dapat mencari dan memfilter.
- Pemilik dapat membuka detail baca-saja.
- Tidak ada aksi Tambah, Edit, Hapus, atau Ubah Status.
- Jika Pemilik mencoba URL perubahan secara langsung, sistem menolak dan menampilkan halaman Akses Ditolak.

**Rujukan:** PDF halaman 4; KF-06, KF-08, KF-11, KF-12.

### 5.4 Formulir Pendaftaran Pelanggan

**Tujuan:** Memasukkan data pelanggan, kendaraan, dan layanan/keluhan.

**Informasi sistem (read-only):**
- Nomor antrean: ditetapkan saat penyimpanan berhasil.
- Waktu pendaftaran: ditetapkan sistem saat penyimpanan berhasil.
- Status awal: Menunggu.

**Input wajib:**
- Nama pelanggan.
- Nomor telepon.
- Jenis/merek kendaraan.
- Nomor polisi.
- Layanan/keluhan.

**Petunjuk format dari PDF:**
- Nomor telepon berawalan 08 atau +62; spasi dan tanda hubung boleh digunakan.
- Telepon dinormalisasi tanpa spasi/tanda hubung; total 10–13 digit sesuai aturan pada wireframe.
- Nomor polisi menerima huruf kecil dan dinormalisasi menjadi huruf besar.
- Contoh nomor polisi: KB 4567 GH, B 1, AB1234XYZ.
- Nomor antrean bukan input manual.

**Tombol:** Batal dan Simpan pendaftaran.

**Perilaku:**
- Validasi dilakukan sebelum data disimpan.
- Jika valid, simpan pendaftaran, buat nomor antrean, tetapkan waktu, dan tampilkan halaman sukses.
- Jika tidak valid, jangan menyimpan atau membuat nomor/waktu baru; pertahankan nilai input dan tampilkan pesan per field.
- Batal kembali ke dashboard tanpa menyimpan.

**Rujukan:** PDF halaman 5; KF-02, KF-03, KF-04, KF-05, KF-09.

### 5.5 State Validasi Gagal

**Komponen:**
- Ringkasan bahwa pendaftaran belum tersimpan.
- Jumlah/daftar isian yang perlu diperbaiki.
- Pesan kesalahan di dekat setiap field.
- Nilai input sebelumnya tetap terlihat.
- Tombol Batal dan Simpan pendaftaran.

**Perilaku:** Tidak membuat nomor antrean atau waktu pendaftaran sampai validasi berhasil.

**Rujukan:** PDF halaman 6; KF-09.

### 5.6 State Pendaftaran Berhasil

**Komponen:**
- Pesan bahwa data berhasil tersimpan.
- Nomor antrean yang dibuat sistem.
- Status awal Menunggu.
- Tanggal dan waktu pendaftaran.
- Ringkasan data pelanggan, kendaraan, dan layanan/keluhan.
- Tombol “Tambah pelanggan lain” dan “Kembali ke dashboard”.

**Rujukan:** PDF halaman 7; KF-02 s.d. KF-05.

### 5.7 Detail Antrean — Pemilik

**Tujuan:** Menampilkan informasi satu antrean tanpa kemampuan mengubahnya.

**Komponen:**
- Nomor antrean.
- Waktu pendaftaran.
- Status.
- Nama pelanggan dan nomor telepon.
- Jenis/merek kendaraan dan nomor polisi.
- Layanan/keluhan.
- Tombol Kembali ke dashboard.

**Perilaku:** Semua informasi bersifat baca-saja; tidak ada tombol simpan atau edit.

**Rujukan:** PDF halaman 8; KF-06, KF-07, KF-11.

### 5.8 Edit Antrean — Petugas

**Tujuan:** Memperbarui data pendaftaran yang sudah ada.

**Komponen:** Formulir dengan field yang sama seperti pendaftaran, menampilkan nilai yang sudah tersimpan.

**Perilaku:**
- Nomor antrean dan waktu awal tidak diedit.
- Validasi field wajib, telepon, dan nomor polisi tetap berlaku.
- Simpan perubahan menampilkan pesan sukses.
- Batal kembali tanpa mengubah data.
- Perubahan status dilakukan melalui alur konfirmasi terpisah.

**Rujukan:** PDF halaman 9; KF-06, KF-07, KF-09.

### 5.9 Konfirmasi Hapus Antrean

**Tujuan:** Mencegah penghapusan yang tidak disengaja.

**Komponen:**
- Dialog konfirmasi.
- Nomor antrean dan ringkasan data yang akan dihapus.
- Tombol Batal.
- Tombol “Ya, hapus antrean”.

**Catatan:** Wireframe menyarankan menggunakan status Dibatalkan jika pelanggan hanya membatalkan kunjungan agar antrean tetap dapat dilihat.

**Rujukan:** PDF halaman 10; KF-06, KF-07.

### 5.10 Konfirmasi Perubahan Status

**Tujuan:** Memastikan Petugas menyetujui perubahan status.

**Pilihan status:**
- Menunggu
- Diproses
- Selesai
- Dibatalkan

**Komponen:**
- Data ringkas antrean.
- Status saat ini.
- Pilihan status tujuan.
- Kalimat konfirmasi perubahan.
- Tombol Batal dan Konfirmasi perubahan.

**Perilaku:** Batal mempertahankan status lama. Konfirmasi menyimpan status baru dan memperbarui waktu update.

**Rujukan:** PDF halaman 11; KF-06, KF-07.

### 5.11 Hasil Pencarian Kosong

**Tujuan:** Memberi umpan balik saat data tidak ditemukan.

**Komponen:**
- Kata kunci pencarian.
- Filter tanggal dan status aktif.
- Pesan “Tidak ada antrean ditemukan”.
- Penjelasan singkat.
- Tombol Reset pencarian.

**Perilaku:** Reset menampilkan kembali daftar sesuai tanggal terpilih tanpa mengubah data. Ringkasan tetap menunjukkan jumlah harian, bukan jumlah hasil pencarian.

**Rujukan:** PDF halaman 12; KF-08, KF-09.

### 5.12 Akses Ditolak

**Tujuan:** Menolak Pemilik yang mencoba melakukan perubahan data.

**Pesan utama:** “Akses ditolak: hanya melihat”.

**Komponen:**
- Penjelasan bahwa akun Pemilik hanya dapat melihat dan mencari antrean.
- Tombol Kembali ke dashboard.

**Perilaku:** Semua proses/route tambah, edit, hapus, dan ubah status harus memeriksa role, termasuk jika URL dibuka langsung.

**Rujukan:** PDF halaman 13; KF-11.

### 5.13 Sesi Berakhir dan Login Diperlukan

**Sesi berakhir:**
- Tampilkan informasi bahwa pengguna telah logout.
- Sediakan form login kembali.

**Login diperlukan:**
- Tampilkan informasi bahwa pengguna belum login atau sesi telah berakhir.
- Jangan tampilkan data antrean.
- Sediakan tombol ke halaman login.

**Perilaku:** Tombol Back browser atau akses URL privat setelah logout tidak boleh menampilkan kembali data privat.

**Rujukan:** PDF halaman 14–15; KF-01, KF-10.

## 6. Alur Navigasi

```text
Login
 ├── Autentikasi gagal → Login + pesan kesalahan
 ├── Role Petugas → Dashboard Petugas
 │    ├── Tambah pendaftaran → Form → Validasi
 │    │    ├── Gagal → Form dengan pesan error
 │    │    └── Berhasil → Nomor antrean + waktu → Sukses
 │    ├── Edit → Form edit → Validasi → Dashboard
 │    ├── Hapus → Konfirmasi → Dashboard
 │    ├── Ubah status → Pilih status → Konfirmasi → Dashboard
 │    ├── Cari/filter → Hasil atau hasil kosong
 │    └── Logout → Login / sesi berakhir
 └── Role Pemilik → Dashboard Pemilik (read-only)
      ├── Cari/filter → Hasil atau hasil kosong
      ├── Lihat detail → Detail baca-saja → Kembali
      ├── URL perubahan → Akses ditolak
      └── Logout → Login / sesi berakhir
```

## 7. Penerapan Bootstrap 5

### 7.1 Instalasi CDN

Tambahkan Bootstrap 5 CSS di bagian `<head>` dan JavaScript bundle sebelum penutup `</body>`. Untuk proyek Laravel, asset dapat ditempatkan pada layout Blade utama.

```html
<!-- resources/views/layouts/app.blade.php -->
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BK - Bengkel Ku</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container-fluid py-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```

> Versi CDN di atas merupakan contoh konfigurasi Bootstrap 5. Jika proyek memakai versi Bootstrap 5 lain atau Vite/npm, samakan versi dan cara pemuatan asset pada seluruh halaman.

### 7.2 Pemetaan komponen Bootstrap

| Bagian UI | Komponen/utility Bootstrap 5 |
|---|---|
| Layout halaman | `container-fluid`, `row`, `col`, `g-*`, `py-*` |
| Header dan navigasi | `navbar`, `navbar-expand-lg`, `nav`, `nav-link` |
| Kartu ringkasan | `card`, `card-body`, `row`, `col-md-4` |
| Form login | `form-label`, `form-control`, `input-group`, `btn` |
| Form pendaftaran | `form-control`, `form-text`, `invalid-feedback`, `is-invalid` |
| Tabel antrean | `table-responsive`, `table`, `table-hover`, `table-striped` |
| Status antrean | `badge` |
| Pesan sukses/error | `alert`, `alert-success`, `alert-danger`, `alert-warning` |
| Konfirmasi hapus/status | `modal`, `modal-dialog`, `modal-content` |
| Tombol aksi | `btn`, `btn-primary`, `btn-outline-secondary`, `btn-danger` |
| Breadcrumb | `breadcrumb` |
| Ruang dan alignment | `d-flex`, `justify-content-between`, `align-items-center`, `gap-*` |

### 7.3 Contoh struktur dashboard

```html
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="h3 mb-1">Dashboard Antrean</h1>
            <p class="text-secondary mb-0">Pantau dan kelola antrean harian.</p>
        </div>
        <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary">
            + Tambah pendaftaran
        </a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-12 col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-secondary">Menunggu</div>
                    <div class="display-6">2</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-secondary">Diproses</div>
                    <div class="display-6">1</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="text-secondary">Selesai</div>
                    <div class="display-6">2</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No. antrean</th>
                            <th>Nama pelanggan</th>
                            <th>Kendaraan</th>
                            <th>No. polisi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data antrean dirender dari database -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
```

Contoh di atas hanya menunjukkan susunan komponen dan bukan implementasi lengkap. Data angka dan baris tabel harus diambil dari database, bukan dibiarkan sebagai data tetap.

### 7.4 Contoh badge status

```html
<span class="badge text-bg-warning">Menunggu</span>
<span class="badge text-bg-info">Diproses</span>
<span class="badge text-bg-success">Selesai</span>
<span class="badge text-bg-danger">Dibatalkan</span>
```

### 7.5 Contoh validasi formulir Blade

```html
<div class="mb-3">
    <label for="nama" class="form-label">Nama pelanggan *</label>
    <input
        id="nama"
        name="nama"
        type="text"
        value="{{ old('nama') }}"
        class="form-control @error('nama') is-invalid @enderror"
        required>

    @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
```

Validasi tetap harus dilakukan di server Laravel. Validasi HTML/Bootstrap hanya membantu pengalaman pengguna dan bukan pengganti validasi backend.

## 8. Responsivitas

Walaupun wireframe berorientasi desktop, SRS meminta dukungan viewport minimal 360 px. Gunakan:
- Grid Bootstrap seperti `col-12`, `col-md-*`, dan `col-lg-*`.
- `table-responsive` untuk tabel lebar.
- `flex-wrap` pada area judul, filter, dan tombol.
- Form satu kolom pada layar kecil dan dua kolom pada layar lebih lebar.
- Tombol dengan teks yang jelas dan area sentuh yang cukup.
- Hindari memaksa tabel tampil penuh pada layar kecil; izinkan scroll horizontal.

## 9. Aksesibilitas dan Validasi UI

1. Setiap input memiliki label yang terhubung melalui atribut `for` dan `id`.
2. Field wajib diberi tanda dan keterangan yang jelas.
3. Pesan error ditampilkan dekat field dan tidak hanya menggunakan warna.
4. Semua aksi dapat diakses melalui keyboard.
5. Modal memiliki judul yang jelas dan tombol Batal.
6. Status ditampilkan sebagai teks di dalam badge.
7. Kontras teks dan latar harus cukup terbaca.
8. Setelah validasi gagal, nilai input tetap dipertahankan.
9. Pesan login gagal tidak mengungkap apakah username atau akun tertentu terdaftar.

## 10. Aturan Hak Akses pada Antarmuka

| Aksi | Petugas | Pemilik |
|---|---:|---:|
| Login | Ya | Ya |
| Lihat dashboard | Ya | Ya |
| Lihat ringkasan | Ya | Ya |
| Cari/filter antrean | Ya | Ya |
| Lihat detail | Ya | Ya |
| Tambah pendaftaran | Ya | Tidak |
| Edit pendaftaran | Ya | Tidak |
| Hapus antrean | Ya | Tidak |
| Ubah status | Ya | Tidak |
| Logout | Ya | Ya |

**Penting:** Pengaturan tampilan tombol bukan kontrol keamanan. Laravel harus memeriksa autentikasi dan otorisasi pada route, controller, policy, atau middleware untuk setiap aksi perubahan.

## 11. Pemetaan Desain ke Kebutuhan

| Halaman / state | Kebutuhan terkait |
|---|---|
| Login | KF-01, KF-10 |
| Dashboard Petugas | KF-03, KF-06, KF-07, KF-08, KF-12 |
| Dashboard Pemilik | KF-06, KF-08, KF-11, KF-12 |
| Form pendaftaran | KF-02, KF-03, KF-04, KF-05, KF-09 |
| Validasi gagal | KF-09 |
| Pendaftaran berhasil | KF-02, KF-03, KF-04, KF-05 |
| Detail baca-saja | KF-06, KF-07, KF-11 |
| Edit antrean | KF-06, KF-07, KF-09 |
| Konfirmasi hapus | KF-06, KF-07 |
| Konfirmasi status | KF-06, KF-07 |
| Hasil pencarian kosong | KF-08, KF-09 |
| Akses ditolak | KF-11 |
| Sesi berakhir / Login diperlukan | KF-01, KF-10 |

## 12. Daftar Layar pada PDF Sumber

PDF memuat dokumentasi alur dan beberapa state layar. Pemetaan halaman yang dapat dikenali:
- Halaman 1: peta alur, matriks hak akses, aturan sistem dan keamanan.
- Halaman 2: Login.
- Halaman 3: Dashboard Petugas.
- Halaman 4: Dashboard Pemilik.
- Halaman 5: Form pendaftaran.
- Halaman 6: Validasi gagal.
- Halaman 7: Pendaftaran berhasil.
- Halaman 8: Detail antrean baca-saja.
- Halaman 9: Edit antrean.
- Halaman 10: Konfirmasi hapus.
- Halaman 11: Konfirmasi perubahan status.
- Halaman 12: Hasil pencarian kosong.
- Halaman 13: Akses ditolak.
- Halaman 14: Sesi berakhir.
- Halaman 15: Login diperlukan.

## 13. Catatan Implementasi

- Gunakan Blade layout bersama agar header, navigasi, dan pemuatan Bootstrap konsisten.
- Pisahkan halaman berdasarkan tanggung jawab: login, dashboard, pendaftaran, detail, dan state konfirmasi.
- Gunakan Laravel validation untuk validasi server.
- Gunakan middleware/policy untuk role Petugas dan Pemilik.
- Gunakan transaksi database atau mekanisme aman saat menghasilkan nomor antrean agar tidak terjadi nomor ganda pada pendaftaran bersamaan.
- Terapkan indeks pencarian yang sesuai untuk nomor antrean, nama pelanggan, dan nomor polisi jika diperlukan.
- Jangan gunakan data contoh wireframe sebagai data produksi.
- HTTPS wajib saat aplikasi dipublikasikan di internet.

## 14. Referensi

1. PDF “BK - Bengkel Ku — Dokumentasi wireframe & peta alur”, 15 halaman, acuan 28 Oktober 2026.
2. SRS “BK - Bengkel Ku”, versi draf.
3. Dokumentasi Bootstrap 5: https://getbootstrap.com/docs/5.3/
