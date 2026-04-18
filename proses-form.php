<!DOCTYPE html>
<html>
<head>
    <title>Hasil Pendaftaran</title>
    <style>
        body {
            font-family: Arial;
        }
        .container {
            width: 700px;
            margin: auto;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
        }
        td {
            padding: 8px;
        }
    </style>
</head>

<body onload="window.print()">

<div class="container">
    <div style="text-align: center;">
    <img src="https://mahasiswa.pancabudi.ac.id/dapur/images/logo_pancabudi.gif"
         alt="Contoh Gambar"
         style="width: 100px; height: auto;">
    </div>
    <h2>FORMULIR PENDAFTARAN MAHASISWA BARU</h2>
    <hr>

<?php
// Ambil data (pakai isset biar aman di PHP 5.6)
$nama    = isset($_POST['nama']) ? $_POST['nama'] : '';
$tempat  = isset($_POST['tempatLahir']) ? $_POST['tempatLahir'] : '';
$tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
$agama   = isset($_POST['agama']) ? $_POST['agama'] : '';
$alamat  = isset($_POST['komentar']) ? $_POST['komentar'] : '';
$telp    = isset($_POST['number']) ? $_POST['number'] : '';
$prodi   = isset($_POST['prodi']) ? $_POST['prodi'] : '';

// Jenis kelamin
if(isset($_POST['jenisKelamin'])){
    $jk = $_POST['jenisKelamin'];
} else {
    $jk = '-';
}

// Hobi
if(isset($_POST['hobi'])){
    $hobi = implode(", ", $_POST['hobi']);
} else {
    $hobi = '-';
}

// Upload foto
$foto = "";
if(isset($_FILES['foto']['name'])){
    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];

    if($foto != ""){
        move_uploaded_file($tmp, "upload/".$foto);
    }
}
?>

<table border="1" cellspacing="0">
    <tr>
        <td>Nama</td>
        <td><?php echo $nama; ?></td>
    </tr>
    <tr>
        <td>Tempat, Tanggal Lahir</td>
        <td><?php echo $tempat . ", " . $tanggal; ?></td>
    </tr>
    <tr>
        <td>Agama</td>
        <td><?php echo $agama; ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><?php echo $alamat; ?></td>
    </tr>
    <tr>
        <td>No HP</td>
        <td><?php echo $telp; ?></td>
    </tr>
    <tr>
        <td>Program Studi</td>
        <td><?php echo $prodi; ?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td><?php echo $jk; ?></td>
    </tr>
    <tr>
        <td>Hobi</td>
        <td><?php echo $hobi; ?></td>
    </tr>
    <tr>
        <td>Foto</td>
        <td>
            <?php 
            if($foto != ""){
                echo "<img src='upload/$foto' width='100'>";
            } else {
                echo "Tidak ada foto";
            }
            ?>
        </td>
    </tr>
</table>

<br><br>

<p <p style="text-align:right;">
    _________, <?php echo date("d-m-Y"); ?><br><br><br><br>

    <?php echo $nama; ?> <br>

    
</p>
</p>

</div>

</body>
</html>