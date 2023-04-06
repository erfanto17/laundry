# WEB LAUNDRY
*WEB LAUNDRY*, merupakan sebuah suatu aplikasi berbasis web yang berfungsi sebagai media yang memudahkan pemilik usaha dalam pekerjaan. Aplikasi ini merupakan apikasi laundey sederhana yang bersifat online sehingga dibuat untuk memudahkan para penggunanya.Aplikasi ini dapat melakukan tambah paket, member, user, outlet serta dapat melakukan input transaksi dan cetak laporan. Setiap user juga memiliki tampilan dan fitur masing-masing. tidak hanya user tapi juga terdapat kasir yang bisa melakukan transaksi dan melihat laporan transaksi .
# FITUR YANG DISAJIKAN
- Beranda
yaitu halaman website yang digunakan untuk pengecekkan barang laundry apakah sudah selesai atau belum.
- Login
yaitu fitur yang digunakan untuk memasuki halaman admin/owner/kasir dengan memasukan email dan password 
- Transaksi.
yaitu fitur yang digunakan untuk melakukan transaksi dengan memilih outlet terlebih dahulu dan memilih paket yang sesuai dengan yang ingin dilaundrykan lalu akan ada fitur tambah biaya ataupun diskon lalu ketika transaksi selesai akan membuat nota transaksi secara otomatis yang digunakan untuk mengambil barang laundry kembali.
- CRUD Outlet
yaitu fitur untuk memasukan data outlet berupa nama, alamat, dan nomer telepon.
- CRUD Member
yaitu fitur yang digunakan untuk menambahkan data member, mengedit, dan menghapus.
- CRUD User
- yaitu fitur yang digunakan untuk menambahkan data user, mengedit, dan menghapus.
- CRUD Paket laundry
-  yaitu fitur yang digunakan untuk menambahkan data paket, mengedit, dan menghapus .
- Riwayat Transaksi
-  yaitu fitur yang digunakan untuk melihat history atau transaksi yang telah lampau dan bisa dicetak untuk sebagai laporan transaksi.
- Dashboard untuk  cetak laporan
yaitu fitur yang digunakan untuk cetak laporan dan terdapat jumlah member, outlet, user, dan transaksi juga terdapat trigger untuk mengetahui apa saja yang dilakukan admin dan kasir.
# CARA INSTALASI
- Menginstal visual studio code  https://code.visualstudio.com/download
- Menginstal laravel versi 9
- Menginstal Composer https://getcomposer.org/download/
- Menginstal  PHP >= 8.0.2 https://www.apachefriends.org/download.html
- Melakuakan git clone https://github.com/erfanto17/laundry.git
- Membuat .env pada folder yang sudah di download.
- Membuat database sesuai yang ada di .env.
- Melakukan php artisan key:generate.
- Melakukan php artisan optimize.
- Melakukan php migrate:fresh –seed.
- Melakukan php artisan serve.
