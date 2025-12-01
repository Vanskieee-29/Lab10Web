# Lab10Web

# TUGAS
Proyek ini merupakan aplikasi web sederhana yang dibangun menggunakan pendekatan OOP (Object-Oriented Programming) dan modularisasi. Seluruh bagian aplikasi dipisahkan ke dalam struktur folder yang jelas—seperti config, modules, dan views—agar kode lebih rapi, mudah dipelihara, dan mudah dikembangkan.

Aplikasi ini menggunakan class Database sebagai pusat pengelolaan koneksi dan query ke database. Dengan kelas ini, setiap bagian aplikasi dapat melakukan operasi seperti input data, update, delete, dan menampilkan data tanpa perlu menulis ulang konfigurasi database.
Selain itu terdapat juga class Form, yang berfungsi membantu pembuatan form secara lebih terstruktur, meskipun pada modul CRUD barang form masih dibuat manual.

Fitur utama proyek ini adalah sistem login dan CRUD data barang. Setelah pengguna berhasil login, aplikasi menampilkan halaman dashboard lalu memberikan akses ke menu pengelolaan barang. Pada menu ini, pengguna dapat melihat daftar barang, menambah data baru, mengubah data, dan menghapus data. Semua proses CRUD tersebut dilakukan menggunakan metode-metode OOP seperti insert(), update(), delete(), dan query() dari class Database. Secara keseluruhan, alur aplikasi berjalan seperti berikut:

Pengguna membuka halaman login.
1. Username dan password diverifikasi menggunakan class Database.
2. Jika valid, pengguna diarahkan ke dashboard.
3. Pengguna dapat masuk ke menu data barang.
4. Sistem menampilkan data barang dari database.
5. Pengguna dapat melakukan tambah, edit, atau hapus data.
6. Semua operasi CRUD dilakukan melalui fungsi-fungsi OOP yang sudah di-abstract di dalam class.
7. Dengan pendekatan ini, aplikasi menjadi lebih tersusun, fleksibel, dan mudah dikembangkan ke fitur-fitur berikutnya.

<img width="1920" height="1200" alt="login" src="https://github.com/user-attachments/assets/ab8fd546-38f1-4ba6-8225-5f5875c9f85b" />
<img width="1920" height="1200" alt="dashboard" src="https://github.com/user-attachments/assets/63d7c57a-dcb9-4ceb-860a-d6ed280ff069" />
<img width="1920" height="1200" alt="data barang" src="https://github.com/user-attachments/assets/1da32220-d72b-49a0-a474-a23f56e319cb" />
<img width="1920" height="1200" alt="tambah barang" src="https://github.com/user-attachments/assets/e4b85202-c54a-43d1-816c-38d3a5c5ad33" />
