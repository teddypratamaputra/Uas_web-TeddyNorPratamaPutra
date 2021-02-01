<?php 
    include_once('connection.php');
?>

<?php
    $id = $_GET['npm'];
    $ambildata = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE npm='$id'");
    $data = mysqli_fetch_array($ambildata);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Mahasiswa</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
    
    <div class="container col-md-6">
        <div class="card">
            <div class="card header bg-dark text-white">
                <center>Edit Data Mahasiswa</center>
            </div>
            <div class="card-body">
                <form action="" method="POST" class="form-item">
                    <div class="form-group">
                        <label for="npm">NPM</label>
                        <input type="text" name="npm" value="<?php echo $data['npm']?>" class="form-control col-md-9" placeholder="Masukkan Npm">
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" value="<?php echo $data['nama']?>" class="form-control col-md-9" placeholder="Masukkan Nama">
                    </div>

                    <div class="form-group">
                        <label for="tempatlahir">Tempat Lahir</label>
                        <input type="text" name="tempatlahir" value="<?php echo $data['tempatlahir']?>" class="form-control col-md-9" placeholder="Masukkan Tempat Lahir">
                    </div>
                    
                    <div class="form-group">
                        <label for="tangggallahir">Tanggal Lahir</label>
                        <input type="date" name="tanggallahir" value="<?php echo $data['tanggallahir']?>" class="form-control col-md-9" placeholder="Masukkan Tanggal Lahir">
                    </div>

                    <div class="form-group">
                        <label for="jeniskelamin">Jenis Kelamain</label><br>
                        <input type="radio" name="jeniskelamin" value="L">Laki - laki
                        <input type="radio" name="jeniskelamin" value="P">Perempuan
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" value="<?php echo $data['alamat']?>" class="form-control col-md-9" placeholder="Masukkan Alamat">
                    </div>

                    <div class="form-group">
                        <label for="kodepos">Kode Pos</label>
                        <input type="number" name="kodepos" value="<?php echo $data['kodepos']?>" class="form-control col-md-9" placeholder="Masukkan Kode Pos">
                    </div>


                    <button type="submit" class="btn btn-primary" name="simpan">SIMPAN</button>
                    <button type="reset" class="btn btn-danger" name="reset">BATAL</button>
                </form>
        
            </div>
        </div>
    </div>
</body>
</html>

<?php

    if(isset($_POST['simpan']))
    {
        $npm           = $_POST['npm'];
        $nama          = $_POST['nama'];
        $tempatlahir   = $_POST['tempatlahir'];
        $tanggallahir  = $_POST['tanggallahir'];
        $jeniskelamin  = $_POST['jeniskelamin'];
        $alamat        = $_POST['alamat'];
        $kodepos       = $_POST['kodepos'];

        mysqli_query($koneksi, "UPDATE mahasiswa 
        SET npm='$npm', nama='$nama', tempatlahir='$tempatlahir', tanggallahir='$tanggallahir', jeniskelamin='$jeniskelamin', alamat='$alamat', kodepos='$kodepos'
        WHERE npm='$id'") or die(mysqli_error($koneksi));

        echo "<div align='center'><h5> Tolong Hadangi Lagi Meupdate Sayang Ai...... </h5></div>";
        echo "<meta http-equiv='refresh' content='2;url=http://localhost/uas/index.php'>";
}

?>