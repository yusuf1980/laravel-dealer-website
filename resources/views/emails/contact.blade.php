<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesan Kontak Form</title>
</head>
<body>
<p>
  Anda mendapat sebuah pesan dari {{ $name }}.
</p>
<p>
  Detail informasi:
</p>
<ul>
  <li>Nama         : <strong>{{ $name }}</strong></li>
  <li>Email / Balas: Klik <strong>{{ $email }}</strong></li>
  <li>Nomor Telepon: <strong>{{ $telepon }}</strong></li>
  <li>Pesan        : </li>
</ul>
<hr>
<p>
  @foreach ($messageLines as $messageLine)
     {{ $messageLine }}<br>
  @endforeach
</p>
<hr>
<h5>Pesan ini dikirim dari formulir kontak <a href="https://www.hondaamartha.com">https://www.hondaamartha.com</a></h5>
</body>
</html>