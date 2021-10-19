# Cara Penggunaan
Buat yang ingin menggunakan source code chat app ini ada beberapa hal yang perlu dilakukan terlebih dahulu ya, yuk disimak baik-baik.

# setting rest server

Pastikan command prompt/terminal kalian berada di posisi didalam folder rest-server ya. Kemudian lakukan composer install:

    composer install

Salin/copy file .env.example yang berada di dalam folder rest-server dan ubah nama filenya menjadi .env lalu setting nama database nya, contoh:

    DB_DATABASE=chat

langkah selanjutnya melakukan database migrate

    php artisan migrate
generate encryption key aplikasi web kamu

    php artisan key:generate

jalankan rest-servernya

    php artisan serve
maka secara default akan dijalankan di alamat http://127.0.0.1:8000 yang nantinya akan kita gunakan untuk membuat email dan password untuk mensetting oauth rest client nya

## setting rest client

pastikan command prompt/terminal kalian berada di posisi didalam folder rest-client ya lalu lakukan composer install

    composer install
buat akun user baru dahulu di rest-server nya dengan cara signup/create account di rest-server yang akan menggunakan laravel jetstream untuk sistem login dan create akunnya, nah nantinya akan mendapatkan email dan password yang akan kita gunakan untuk setting oauth rest clientnya.

Salin/copy file .env.example yang berada di dalam folder rest-client lalu setting oauthnya, contoh:

    OAUTH_SERVER_ID=isi dengan client id password grant client contoh: 2
    OAUTH_SERVER_SECRET=isi dengan client secret password grant client contoh: 63g3h42h2h3h324h24h24j2jj2h3h5k5b
    OAUTH_SERVER_URI=isi dengan url rest-server nya ya contoh: http://127.0.0.1:8000
    OAUTH_SERVER_USERNAME=isi dengan email yang kalian buat di halaman registrasi user rest-server contoh: sesuatu@gmail.com
    OAUTH_SERVER_PASSWORD=isi dengan password yang kalian buat di halaman registrasi user rest-server contoh: sebuahapelyangjatuh
generate encryption key aplikasi web kamu

    php artisan key:generate
sekarang tinggal dirunning aja deh

    php artisan serve --port=8001
ya maka rest-client akan dijalankan di alamat http://127.0.0.1:8001 dan akan langsung muncul chat appnya