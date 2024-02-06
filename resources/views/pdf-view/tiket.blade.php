<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.tailwindcss.com"></script> 
        <title>Tiket Anda</title>
    </head>
    <body>
        <h1>Pemilik : {{ $pemilik }}</h1>
        <h1>Destinasi : {{ $destinasi }}</h1>
        <h1>Jumlah Tiket : {{ $jumlah_tiket }}</h1>
        <h1>Total : {{ $total_harga }}</h1>
    </body>
</html>