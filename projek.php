<?php
    $koneksi = mysqli_connect("localhost", "root", "", "data_pelanggan");

    if($koneksi){
        //echo "Alhamdulillah sudah terkoneksi";
    }else{
        echo "Aduh, gagal nih gan";
    }
?>
<center>
<div style="background-color:red; border: 1px solid black; padding: 200px; width: auto; "><font color="red">
<font color="grent"><h1>Input Data pelanggan</h1></font>

<form action="" method="post">
<table border="2">
    <tr>
        <td>nama  </td>
        <td><input type="text" name="nama"></td>
    </tr>
    <tr>
        <td>alamat  </td>
        <td><input type="text" name="alamat"></td>
    </tr>
    <tr>
        <td>no_telepon  </td>
        <td><input type="text" name="no_telepon"></td>
    </tr>
    <tr>
        <td>jenis_kelamin  </td>
        <td><input type="text" name="jenis_kelamin"></td>
    </tr>
</table>
    <input type="submit" name="registrasi" value="Registrasi">
</form>
<font color="grent"><h1>Hasil input data pelanggan</h1></font>
<table border="2">
    <thead>
        <th>no</th>
        <th>nama</th>
        <th>alamat</th>
        <th>no_telepon</th>
        <th>jenis_kelamin</th>
        <th>aksi</th>
</center>
    </thead>
    <tbody>

        <?php
            $sqlView = "SELECT * FROM `pelanggan`";
            $cekView = mysqli_query($koneksi, $sqlView);

            $nomor = 1;
            while($data = mysqli_fetch_array($cekView)){
        ?>
        <tr>
            <td><?=$nomor ?></td>
            <td><?=$data[1] ?></td>
            <td><?=$data[2] ?></td>
            <td><?=$data[3] ?></td>
            <td><?=$data[4] ?></td>
            <td>
                <a href="projek.php?id=<?=$data[0]?>">Delete</a>
            </td>
        </tr>
        <?php
            $nomor++; // ++ = nomor+1; 
            }
        ?>
    <!-- /end -->
    </tbody>
</table>

<?php
    if(isset($_POST['registrasi'])){
        $sqlInput = "INSERT INTO `pelanggan` (`nama`,`alamat`,`no_telepon`,`jenis_kelamin`)
                VALUES ('$_POST[nama]', '$_POST[alamat]', '$_POST[no_telepon]', '$_POST[jenis_kelamin]')";
        $cekInput = mysqli_query($koneksi, $sqlInput);
        if($cekInput){
            // echo "Datanya udah masuk gan";
            echo "<script> window.location = 'projek.php' </script>";
        }else{
            echo "Aduh.. Gagal masuk datanya gan";
        }
    }

    if(isset($_GET['id'])){
        $sqlDelete = "DELETE FROM `pelanggan` WHERE
        `pelanggan`.`id` = '$_GET[id]'";
        $cekDelete = mysqli_query($koneksi, $sqlDelete);

        if($cekDelete){
            // echo "Datanya udah masuk gan";
            echo "<script> window.location = 'projek.php' </script>";
        }else{
            echo "Aduh.. Gagal ngehapus datanya gan";
        }
    }
?>