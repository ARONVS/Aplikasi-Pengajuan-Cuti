<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
	
		<link id="style" href="{{url('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

		<style>
		 .line-title{
			 border: 0;
			 border-style: unset;
			 border-top: 1px solid #000;
		 }
		</style>			
		
</head>
<body>
	<img src="{{url('assets/images/logoccuti.png')}}" style="position: absolute; width: 60px; height: auto;">
	<table style="width: 100%;">
		<tr>
			<td align="center">
				<span style="line-height: 1.6; font-weight: bold;">
					Dinas Kominfo Tomohon<br> Kolongan Satu, Kec. Tomohon Tengah, Kota Tomohon, Sulawesi Utara
				</span>
			</td>
		</tr>
	</table>
	<hr class="line-title">

Tomohon, <?php  $date = date('Y-m-d'); echo $date?>
<br>
<br>
Perihal : {{ $cuti->foreign_jeniscuti->jenis_cuti }}
<br>
<br>Dengan Hormat, <br>yang bertanda tangan dibawah ini 
<br>
<br>
<table class="table table-borderless">
  <tbody>	
    <tr>
      <td width="20%">Nama</td>
      <td>:</td>
      <td width="75%">{{ $cuti->foreign_users->name }}</td>
    </tr>
    <tr>
      <td>Email</td>
      <td>:</td>
      <td> {{ $cuti->foreign_users->email }}</td>
    </tr>
    <tr>
      <td>Tanggal Lahir</td>
      <td>:</td>
      <td>{{ $cuti->foreign_users->tgl_lahir }}</td>
    </tr> 
	<tr>
      <td>Tempat Lahir</td>
      <td>:</td>
      <td>{{ $cuti->foreign_users->tempat_lahir }}</td>
    </tr>    <tr>
      <td>Gendr</td>
      <td>:</td>
      <td>{{ $cuti->foreign_users->gender }}</td>
    </tr>    
	<tr>
      <td>Telp</td>
      <td>:</td>
      <td>{{ $cuti->foreign_users->telp }}</td>
    </tr>   
	<tr>
      <td>Jabatan</td>
      <td>:</td>
      <td> {{ $cuti->foreign_jabatan->nama_jabatan }}</td>
    </tr>    
	<tr>
      <td>Status Karyawan</td>
      <td>:</td>
      <td> {{ $cuti->foreign_users->status_karyawan }}</td>
    </tr>

  </tbody>
</table>	
		
                          <?php 
						  
							echo $cuti->keterangan;
							
						  ?>
						  
						  <br>
						  <br>
						  <br>
							Demikian surat cuti ini dengan status sudah di terima oleh sekretaris dan pimpinan. 
							<br>
							<br>
							<br>
							<br>
							<b>Hormat Saya,
							<br>
							<br>
							<br>
	{{ $cuti->foreign_users->name }}
</body>
</html>
