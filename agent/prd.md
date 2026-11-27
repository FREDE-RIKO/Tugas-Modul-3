# PRODUCT REQUIREMENTS DOCUMENT (PRD)
## BK - Bengkel Ku
**Sistem Pendaftaran dan Antrean Servis Bengkel Motor**

| Informasi | Keterangan |
|---|---|
| Nama produk | BK - Bengkel Ku |
| Objek studi | Cahaya Motoshop Service |
| Lokasi | Jl. Pemuda No. 56, Ngabang |
| Versi dokumen | 1.0 (draf) |
| Tanggal acuan SRS | 14–26 Oktober 2026 |
| Penyusun pada SRS | Rexsi, Frederiko |
| Mata kuliah | Rekayasa Web |
| Status | Draf untuk ditinjau |

> Dokumen ini disusun dari SRS yang diunggah. Kebutuhan di dalam SRS masih berstatus **Diusulkan** dan perlu divalidasi oleh pemilik/petugas bengkel. PRD ini tidak menganggap fitur sudah diimplementasikan.

---

## 1. Ringkasan Produk

BK - Bengkel Ku adalah aplikasi web internal untuk membantu petugas Cahaya Motoshop Service mencatat pendaftaran pelanggan dan kendaraan, menghasilkan nomor antrean servis secara otomatis, serta mengelola status antrean. Pemilik bengkel dapat memantau antrean melalui dashboard dengan hak akses baca-saja.

Pelanggan datang langsung ke bengkel. Pelanggan tidak membuat akun dan tidak mengisi formulir secara mandiri. Petugas yang sudah login memasukkan data pelanggan melalui komputer atau laptop bengkel.

## 2. Latar Belakang dan Masalah

Berdasarkan SRS, proses pelayanan yang diamati memiliki variasi alur: pelanggan dapat berinteraksi dengan mekanik lalu kasir, atau datang ke kasir terlebih dahulu sebelum menuju mekanik. Beban kerja pelaksana dinilai tinggi pada kondisi tertentu. Waktu tunggu, durasi proses, alat bantu, dan data pendaftaran belum terdokumentasi secara rinci.

Sistem yang diusulkan mengganti pencatatan pendaftaran menjadi formulir digital, menyimpan data secara terpusat, membuat nomor antrean, dan menampilkan status antrean.

**Catatan sumber:** SRS menyebutkan bahwa kondisi aktual masih perlu dikonfirmasi melalui observasi dan wawancara. Karena itu, uraian masalah tersebut diperlakukan sebagai temuan awal, bukan kesimpulan final.

## 3. Tujuan Produk dan Indikator Keberhasilan

| ID | Tujuan bisnis | Indikator keberhasilan |
|---|---|---|
| KB-01 | Pencatatan pendaftaran servis tersimpan secara digital. | Minimal 95% pendaftaran uji tersimpan lengkap tanpa pencatatan ulang. |
| KB-02 | Nomor antrean tercatat dan tidak duplikat pada tanggal yang sama. | Dalam pengujian 30 pendaftaran pada tanggal yang sama, tidak ada nomor antrean ganda. |
| KB-03 | Petugas dapat mengetahui status antrean dengan mudah. | Petugas dapat menemukan dan memperbarui satu pendaftaran maksimal 1 menit saat uji coba. |

## 4. Pengguna dan Stakeholder

| Stakeholder / peran | Kebutuhan dan kepentingan | Hak akses |
|---|---|---|
| Pemilik bengkel | Memantau antrean dan memeriksa data operasional. | Login, melihat dashboard, mencari data, melihat detail, logout. Baca-saja. |
| Petugas/Admin bengkel | Memasukkan pendaftaran dan mengelola antrean harian. | Login, tambah/edit/hapus pendaftaran, membuat nomor antrean melalui sistem, mengubah status, mencari data, melihat dashboard, logout. |
| Pelanggan | Memberikan data yang diperlukan saat datang untuk servis. | Tidak memiliki akun dan tidak mengakses aplikasi secara langsung; data dimasukkan petugas. |

### Persona pengguna utama (berdasarkan SRS)

- **Peran:** Petugas bengkel.
- **Perangkat:** Komputer atau laptop bengkel.
- **Tujuan:** Mendaftarkan pelanggan dan mengatur antrean.
- **Kendala yang dicatat:** Waktu tunggu pelanggan tidak konsisten saat bengkel ramai.
- **Data usia dan literasi digital:** Belum diisi pada SRS.

## 5. Ruang Lingkup Produk

### 5.1 Termasuk dalam versi awal

1. Login untuk akun Petugas dan Pemilik Bengkel.
2. Pengelolaan hak akses berdasarkan role.
3. Formulir pendaftaran pelanggan oleh petugas.
4. Pencatatan jenis/merek kendaraan dan nomor polisi.
5. Pencatatan layanan/keluhan yang diminta pelanggan.
6. Pembuatan nomor antrean otomatis dan waktu pendaftaran.
7. Dashboard antrean harian.
8. Pembaruan status antrean.
9. Pencarian berdasarkan nomor antrean, nama pelanggan, atau nomor polisi.
10. Validasi data dan pesan kesalahan.
11. Logout dan pengakhiran sesi.
12. Ringkasan jumlah antrean pada dashboard.

### 5.2 Tidak termasuk dalam versi awal

- Pendaftaran mandiri pelanggan dari rumah.
- Akun atau login pelanggan.
- Pembayaran online.
- Inventaris suku cadang.
- Penggajian.
- Akuntansi bengkel.
- Notifikasi otomatis WhatsApp/email.
- Aplikasi Android native.
- SEO publik.

## 6. Alur Bisnis Utama

### 6.1 Login
1. Pengguna membuka halaman login.
2. Pengguna memasukkan username/email dan password.
3. Sistem memvalidasi kredensial dan membaca role dari akun.
4. Sistem mengarahkan Petugas atau Pemilik ke dashboard sesuai role.
5. Jika gagal, sistem menampilkan pesan umum: **“Username/email atau password salah”**.

### 6.2 Pendaftaran pelanggan
1. Pelanggan datang ke bengkel.
2. Petugas yang sudah login membuka formulir pendaftaran.
3. Petugas mengisi nama pelanggan, nomor telepon, jenis/merek kendaraan, nomor polisi, serta layanan/keluhan.
4. Sistem memvalidasi data.
5. Jika valid, sistem menyimpan pendaftaran dan menetapkan nomor antrean serta waktu pendaftaran.
6. Sistem menampilkan hasil pendaftaran.

### 6.3 Pengelolaan antrean
1. Petugas melihat antrean harian pada dashboard.
2. Petugas dapat mencari, mengedit, atau menghapus data sesuai kebutuhan.
3. Petugas memilih status antrean: Menunggu, Diproses, Selesai, atau Dibatalkan.
4. Sistem menyimpan perubahan status dan waktu pembaruan.
5. Pemilik hanya melihat dan mencari data, tanpa melakukan perubahan.

### 6.4 Logout
1. Pengguna memilih Logout.
2. Sistem mengakhiri sesi.
3. Sistem mengarahkan pengguna ke halaman login.
4. Halaman privat harus meminta login kembali jika tidak ada sesi valid.

## 7. Kebutuhan Fungsional

Seluruh kebutuhan berikut mengikuti daftar KF pada SRS. Prioritas: M = Must, S = Should.

| ID | Fitur | Kebutuhan produk | Prioritas |
|---|---|---|---|
| KF-01 | Login dan role | Sistem hanya mengizinkan akun Petugas dan Pemilik terdaftar masuk, lalu menerapkan hak akses sesuai role. | M |
| KF-02 | Form pendaftaran | Petugas dapat mengisi nama pelanggan dan nomor telepon melalui formulir digital. | M |
| KF-03 | Data kendaraan | Petugas mencatat jenis/merek kendaraan dan nomor polisi. | M |
| KF-04 | Layanan/keluhan | Petugas mencatat kolom layanan atau keluhan yang diminta pelanggan. | M |
| KF-05 | Nomor antrean | Sistem membuat nomor antrean unik otomatis, contoh A-001, dan mengulang urutan setiap tanggal layanan. | M |
| KF-06 | Dashboard harian | Sistem menampilkan daftar pendaftaran harian, nomor antrean, waktu, dan status. Petugas memiliki akses kelola; Pemilik baca-saja. | M |
| KF-07 | Status antrean | Hanya Petugas dapat mengubah status menjadi Menunggu, Diproses, Selesai, atau Dibatalkan. | M |
| KF-08 | Pencarian | Pengguna dapat mencari berdasarkan nomor antrean, nama pelanggan, atau nomor polisi. Pemilik hanya dapat melihat hasil. | S |
| KF-09 | Validasi | Sistem menolak data wajib yang kosong atau format telepon/nomor polisi yang tidak valid dan menampilkan pesan yang jelas. | M |
| KF-10 | Logout | Sistem mengakhiri sesi Petugas maupun Pemilik. | M |
| KF-11 | RBAC | Sistem menolak permintaan tambah, edit, hapus, dan ubah status oleh Pemilik, termasuk akses melalui URL langsung. | M |
| KF-12 | Ringkasan dashboard | Dashboard menampilkan jumlah antrean harian Menunggu, Diproses, dan Selesai. | S |

## 8. Kebutuhan Non-Fungsional

| ID | Kategori | Target / kriteria |
|---|---|---|
| KNF-01 | Kinerja | Dashboard tampil maksimal 3 detik pada jaringan lokal dengan hingga 100 data antrean. |
| KNF-02 | Keamanan | Password disimpan dalam bentuk hash; halaman pengelolaan hanya dapat diakses setelah login. |
| KNF-03 | Kegunaan | Petugas dapat menyimpan pendaftaran valid maksimal 8 langkah setelah login. |
| KNF-04 | Aksesibilitas | Label input dan pesan validasi terbaca serta dapat digunakan dengan keyboard. |
| KNF-05 | Kompatibilitas | Dapat digunakan pada Chrome dan Edge modern serta viewport minimal 360 px. |
| KNF-06 | Ketersediaan | Sistem dapat digunakan selama sesi demo/pengujian 2 jam tanpa crash aplikasi. |
| KNF-07 | Skalabilitas | Sistem dapat menampilkan hingga 500 pendaftaran tanpa kehilangan data. |
| KNF-08 | Keterpeliharaan | Source code disimpan pada version control dan modul utama menggunakan penamaan konsisten. |
| KNF-09 | Privasi | Akses data pelanggan dibatasi untuk petugas berwenang; data hanya digunakan untuk pendaftaran servis. |
| KNF-10 | SEO | Halaman login/dashboard internal tidak ditujukan untuk indeks mesin pencari. |

## 9. Aturan Bisnis

1. Hanya akun internal terdaftar yang dapat login.
2. Role ditentukan dari akun yang tersimpan; tidak ada pemilih role publik pada halaman login.
3. Petugas memiliki hak operasional untuk mengelola pendaftaran dan antrean.
4. Pemilik Bengkel hanya memiliki hak baca-saja.
5. Pembatasan Pemilik wajib diterapkan pada setiap route/proses tambah, edit, hapus, dan ubah status; menyembunyikan tombol saja tidak cukup.
6. Nomor antrean menggunakan pola seperti A-001 dan unik pada tanggal yang sama.
7. Nomor antrean dan waktu pendaftaran ditetapkan sistem hanya setelah penyimpanan berhasil; keduanya bukan input manual.
8. Status yang tersedia: Menunggu, Diproses, Selesai, dan Dibatalkan.
9. Data berstatus Dibatalkan tetap dapat ditampilkan dan difilter.
10. Pada rancangan wireframe, ringkasan utama Menunggu, Diproses, dan Selesai tidak menghitung status Dibatalkan.
11. Password harus disimpan dalam bentuk hash bcrypt.
12. Tanpa sesi valid, halaman privat mengarahkan pengguna ke login.

## 10. Data Produk

| Entitas | Atribut utama | Hubungan / keterangan |
|---|---|---|
| Petugas | id_petugas (PK), nama, username (UNIQUE), password_hash, role, created_at | Akun internal. Role membedakan Petugas dan Pemilik. |
| Pelanggan | id_pelanggan (PK), nama, no_telepon | Tidak memiliki akun login. |
| Kendaraan | id_kendaraan (PK), id_pelanggan (FK), jenis_motor, merek_model, nomor_polisi | Satu pelanggan dapat memiliki beberapa kendaraan. |
| Pendaftaran | id_pendaftaran (PK), id_pelanggan (FK), id_kendaraan (FK), id_petugas (FK), tanggal, keluhan, layanan | Satu pendaftaran terkait satu kendaraan dan dicatat satu petugas. |
| Antrean | id_antrean (PK), id_pendaftaran (FK, UNIQUE), nomor_antrean, status, waktu_daftar, waktu_update | Satu pendaftaran memiliki satu antrean; nomor unik per tanggal. |

## 11. Kriteria Penerimaan Produk

- Login berhasil mengarahkan pengguna ke dashboard sesuai role.
- Login gagal menampilkan pesan umum dan tidak membuat sesi.
- Petugas dapat menyimpan pendaftaran yang valid.
- Data wajib yang tidak valid ditolak; nilai yang sudah diisi tetap ditampilkan agar dapat diperbaiki.
- Nomor antrean otomatis dibuat setelah penyimpanan berhasil dan tidak duplikat pada tanggal yang sama.
- Dashboard menampilkan antrean berdasarkan tanggal, beserta data dan status.
- Pencarian mendukung nomor antrean, nama, dan nomor polisi.
- Jika tidak ada hasil, sistem menampilkan pesan **“Data tidak ditemukan”**.
- Petugas dapat mengubah status antrean.
- Pemilik dapat melihat dan mencari data, tetapi tidak dapat mengubahnya, termasuk melalui URL langsung.
- Logout mengakhiri sesi; halaman privat tanpa sesi meminta login kembali.

## 12. Prioritas MoSCoW

| Prioritas | Kebutuhan |
|---|---|
| Must have | KF-01 s.d. KF-07, KF-09, KF-10, KF-11, KNF-02, KNF-09 |
| Should have | KF-08, KF-12, KNF-01, KNF-03, KNF-05, KNF-06, KNF-08 |
| Could have | KNF-04, KNF-07 |
| Won't have saat ini | Pendaftaran mandiri pelanggan, akun pelanggan, pembayaran online, inventaris, notifikasi otomatis, SEO publik |

## 13. Teknologi dan Batasan Implementasi

Berdasarkan SRS:
- **Backend:** Laravel.
- **Frontend:** HTML, CSS, JavaScript dengan **Bootstrap 5** sebagai framework CSS/UI.
- **Database:** MySQL.
- **Lingkungan pengembangan:** XAMPP atau Laragon.
- **Akses:** Browser modern pada komputer/laptop bengkel.
- **Komunikasi:** HTTP untuk server lokal; HTTPS wajib jika dipublikasikan ke internet.
- Tidak memerlukan API eksternal pada versi awal.
- Printer tiket opsional dan bukan kebutuhan wajib.

## 14. Risiko dan Hal yang Perlu Divalidasi

SRS belum mengisi tabel risiko, konflik/ambiguitas, umpan balik tinjauan, dan persetujuan. Hal berikut perlu dipastikan sebelum baseline:
1. Konfirmasi alur operasional aktual dengan pemilik/petugas.
2. Pastikan format dan aturan reset nomor antrean sesuai proses bengkel.
3. Pastikan apakah layanan dan keluhan dicatat sebagai satu kolom atau dua informasi.
4. Pastikan aturan penghapusan data dan penggunaan status Dibatalkan.
5. Pastikan kebutuhan ringkasan dashboard, termasuk apakah status Dibatalkan hanya ditampilkan pada filter/tabel.
6. Validasi kebutuhan non-fungsional melalui pengujian.
7. Lengkapi persetujuan pemilik, ketua tim, dan dosen.

## 15. Referensi

1. SRS “BK - Bengkel Ku”, versi draf, disusun Rexsi dan Frederiko.
2. “BK - Bengkel Ku — Dokumentasi wireframe & peta alur”, PDF 15 halaman, acuan 28 Oktober 2026.
3. ISO/IEC/IEEE 29148:2018, *Systems and software engineering — Life cycle processes — Requirements engineering* (sebagaimana dicantumkan pada SRS).
4. Undang-Undang Republik Indonesia No. 27 Tahun 2022 tentang Pelindungan Data Pribadi (sebagaimana dicantumkan pada SRS).
