<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesan Kontak Form dari PopUp</title>
</head>
<body>
<p>
  Anda mendapat sebuah pesan dari kontak form Pop up.
</p>
<p>
  Detail informasi:
</p>
<ul>
  <li>Nama         : <strong>{{ $nama }}</strong></li>
  <li>Nomor Telepon: <strong>{{ $telepon }}</strong></li>
  <li>Mobil yang dikunjungi :  <strong>{{$mobil}}</strong></li>
</ul>
<p>Silahkan hubungi kembali nomor telepon tersebut.</p>
<hr>
<h5>Pesan ini dikirim dari formulir popup <a href="http://hondaamartha.com">http://hondaamartha.com</a></h5>
</body>
</html>