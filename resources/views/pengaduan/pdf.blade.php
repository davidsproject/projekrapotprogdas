<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Laporan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  </head>
  <body>
    <div class="title text-center mb-5">
      <h2>Laporan Layanan Pengaduan Masyarakat</h2>
      <h5>Jakarta Barat</h5>
    </div>

    <table class = "table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>NIK</th>
          <th>Pelapor</th>
          <th>Isi Laporan</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pengaduans as $key=>$pengaduan)
          <tr>
            <th scope = "row">{{$key+1}}</th>
            <td>{{$pengaduan->tanggalkejadian}}</td>
            <td>{{$pengaduan->user->nik}}</td>
            <td>{{$pengaduan->user->name}}</td>
            <td>{{$pengaduan->isilaporan}}</td>
            <td>
              {{$pengaduan->status}}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>
