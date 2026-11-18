NAMA:NAUFAL FIKRI
NIM:312510350
MATKUL:PEMROGRAMAN WEB

# Lab8Web - PHP dan Database MySQL

Penjelasan Praktikum 8 – PHP dan MySQL
1. Membuat Database dan Tabel
Penjelasan:

Pada tahap pertama, saya membuat database dengan nama latihan1 melalui phpMyAdmin. Setelah database berhasil dibuat, saya membuat tabel data_barang untuk menyimpan informasi barang.

Tabel data_barang memiliki beberapa kolom, yaitu id_barang, kategori, nama, gambar, harga_beli, harga_jual, dan stok.

Setiap kolom memiliki tipe data sesuai dengan informasi yang akan disimpan. Kolom id_barang digunakan sebagai Primary Key dan memiliki fitur Auto Increment sehingga setiap barang mendapatkan ID secara otomatis.
2. Menambahkan Data Awal
Penjelasan:

Setelah database dan tabel berhasil dibuat, saya menambahkan tiga data barang awal menggunakan perintah SQL INSERT.

Perintah INSERT digunakan untuk memasukkan data baru ke dalam tabel database. Data yang dimasukkan meliputi kategori barang, nama barang, gambar, harga beli, harga jual, dan jumlah stok.

Penambahan data awal ini bertujuan untuk memastikan bahwa tabel database sudah dapat menyimpan data dengan benar.
3. koneksi.php
Penjelasan:

File koneksi.php digunakan untuk menghubungkan aplikasi PHP dengan database MySQL.

Proses koneksi dilakukan menggunakan fungsi mysqli_connect() dengan beberapa parameter, yaitu nama host, username, password, dan nama database.

Dalam praktikum ini, host yang digunakan adalah localhost, username root, password dikosongkan, dan database yang digunakan adalah latihan1.

File koneksi ini kemudian dipanggil oleh file PHP lainnya agar aplikasi dapat melakukan proses pengolahan data ke database.
4. index.php (Read)
Penjelasan:

File index.php digunakan untuk menampilkan seluruh data barang yang tersimpan di dalam tabel data_barang.

Proses menampilkan data menggunakan perintah SQL SELECT. Hasil query kemudian ditampilkan menggunakan perulangan while untuk membaca setiap baris data dari database.

Informasi yang ditampilkan meliputi gambar barang, nama barang, kategori, harga beli, harga jual, stok, serta tombol aksi untuk mengubah dan menghapus data.

Screenshot tampilan halaman index.php:
5. tambah.php (Create)
Penjelasan:

File tambah.php digunakan untuk menambahkan data barang baru ke dalam database.

Pada halaman ini terdapat formulir input yang digunakan untuk memasukkan informasi barang, seperti nama barang, kategori, harga beli, harga jual, stok, dan gambar barang.

Setelah formulir diisi dan dikirim, PHP akan memproses data tersebut menggunakan perintah SQL INSERT agar data baru tersimpan ke dalam tabel data_barang.

Fitur upload gambar digunakan agar setiap barang dapat memiliki gambar sebagai identitas visual.
6. ubah.php (Update)
Penjelasan:

File ubah.php digunakan untuk mengubah atau memperbarui data barang yang sudah tersimpan di dalam database.

Ketika tombol Ubah dipilih, sistem akan mengambil data barang berdasarkan id_barang yang dipilih. Data lama kemudian ditampilkan kembali pada formulir sehingga pengguna dapat mengedit informasi barang.

Setelah perubahan disimpan, sistem menggunakan perintah SQL UPDATE untuk memperbarui data di dalam tabel data_barang.
7. hapus.php (Delete)
Penjelasan:

File hapus.php digunakan untuk menghapus data barang dari database berdasarkan id_barang.

Ketika pengguna menekan tombol Hapus, sistem akan menampilkan konfirmasi penghapusan. Jika pengguna menyetujui, PHP akan menjalankan perintah SQL DELETE untuk menghapus data barang yang dipilih.

Setelah proses penghapusan berhasil, pengguna akan diarahkan kembali ke halaman index.php sehingga daftar barang diperbarui dan data yang dihapus tidak lagi ditampilkan.
