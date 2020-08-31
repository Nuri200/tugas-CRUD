<?php
     //Koneksi Database
     $server="localhost";
     $user="root";
     $pass="";
     $database="nuri_astutik";

     $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));
     
     //jika tombol simpan di klik
     if (isset($_POST['bsimpan']))
     {
         $simpan * mysqli_query($koneksi, "INSERT INTO latihan_crud (nis, nama, alamat, prokel)
                                           VALUES ('$_POST[tnis]',
                                                  '$_POST[tnama]',
                                                  '$_POST[talamat]',
                                                  '$_POST[tprokel]')
                                          ");
        if(simpan) //jika simpan sukses
        {
            echo"<script>
                     alert('simpan data sukses!');
                     document.loation='index.php';
                 </script>";
        }
        else
        {
            echo"<script>
                    alert('simpan data gagal!');
                    document.loation='index.php';
                 </script>";
        }
     }



?>

<!DOCTYPE html>
<html>
<head>
     <title> CRUD PHP & MySQL + Bootstrap 4</title>
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <h1 class="text-center"> TUGAS CRUD PHP & MySQL + Bootstrap</h1>
    <h2 class="text-center">NURI ASTUTIK XI-RPL 1</h2>

    <!--- Awal Card Form --->
    <div class="card mt-3 ">
    <div class="card-header bg-primary text-white">
        Form Input Data Siswa 
    </div>
    <div class="card-body">
       <form  method="post" action="">
            <div class="form-group">
             <label>NIS</label>
             <Input type="text" name="tnis" class="form-control" placeholder="Input NIS anda disini..." required="">
            </div>
            <div class="form-group">
             <label>Nama</label>
             <Input type="text" name="tnama" class="form-control" placeholder="Input nama anda disini..." required="">
            </div>
            <div class="form-group">
             <label>Alamat</label>
             <textarea class="form-control" name="talamat" placeholder="Input alamat anda disini..." required=""></textarea>
            </div>
            <div class="form-group">
             <label>Program Keahlian</label>
            <select class="form-control" name="tprodi">
                <option></option>
                <option value="TIK-RPL">TIK-RPL</option>
                <option value="TIK-TKJ">TIK-TKJ</option>
                <option value="TIK-MM">TIK-MM</option>
                <option value="ELEKTRO-MKT">ELEKTRO-MKT</option>
            </select>
            </div>

            <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
            <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>
       </form>
    </div>
    </div>
    <!--- Akhir Card Form --->

    <!--- Awal Card Tabel --->
    <div class="card mt-3 ">
    <div class="card-header bg-success text-white">
        Daftar  Siswa Siswi
    </div>
    <div class="card-body">
      
      <table class="table table-bordered table-striped">
          <tr>
              <th>No.</th>
              <th>NIS</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Program Keahlian</th>
              <th>Aksi</th>
          </tr>
        <?php
             $no = 1;
             $tampil= mysqli_query($koneksi, "SELECT * from latihan_crud order by id_latihan desc");
             while($data= mysqli_fetch_array($tampil)) : 
        
        ?>
          <tr>
              <td><?=$no++?></td>
              <td><?=$data['nis']?></td>
              <td><?=$data['nama']?></td>
              <td><?=$data['alamat']?></td>
              <td><?=$data['prokel']?></td>
              <td>
                  <a href="#" class="btn btn-warning">Edit</a>
                  <a href="#" class="btn btn-danger">Hapus</a>
              </td>
          </tr>
             <?php endwhile; //penutup perulangan while ?>
          <tr>
              <td>2.</td>
              <td>004123789</td>
              <td>Arinda Putri Aleira</td>
              <td>Perum Greenland, Kemantren</td>
              <td>TIK-TKJ</td>
          </tr>
          <tr>
              <td>3.</td>
              <td>004123123</td>
              <td>Indiani Margaretha Suciani</td>
              <td>Purwosari, Kab.Pasuruan</td>
              <td>TIK-MM</td>
          </tr><td>2.</td>
              <td>004123234</td>
              <td>Lailul Maslukha</td>
              <td>Pertukangan Barat, Purwosari</td>
              <td>ELEKTRO-MKT</td>
          <tr>
              
          </tr>
      </table>
    </div>
    </div>
    <!--- Akhir Card Tabel --->

</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>