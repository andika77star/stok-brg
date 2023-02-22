<?php
require_once '../core/init.php';

    $eror = '';

    if( isset($_POST['submit'])) {
        $nama  = $_POST['name'];
        $jumlah  = $_POST['jumlah'];
        $kategori  = $_POST['kategori'];
        $keterangan = $_POST['keterangan'];

            if(!empty($nama) && !empty($jumlah) && !empty($keterangan)) {
                if(tambah_data($nama, $jumlah, $kategori, $keterangan)) {
                    header('Location: index.php');
            }else{
                $eror = 'ada masalah saat tambah data';
            }
        }else{
            $eror = 'nama, jumah, dan keterangan wajib di isi';
        }
    }

    $data = data();

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Barang</title>
</head>
<body>
<fieldset class="input">
    <h2 style="text-align: center; font-family: sans-serif;">Silahkan isi Form di bawah</h2>
        <form method="post">
            <div class="eror"><?= $eror ?></div><br>
            <label for="name">Nama</label>
            <br>
            <input type="text" id="name" name="name" placeholder="Nama anda" autofocus>
            <br><br>
            <label for="jumlah">jumlah</label>
            <br>
            <input type="number" id="jumlah" value="1" name="jumlah" min="1">
            <br><br>
            <label for="kategori">Pilih Kategori</label> <br>
            <select name="kategori" id="kategori">
                <option disabled>Silahkan Pilih</option>
                <?php while($row = mysqli_fetch_assoc($data)) {?>
                <option value="<?php echo $row['id_jkategori'] ?>"><?php echo $row['nama_kategori'] ?></option>
                <?php } ?>
            </select> <br><br>
            <label for="keterangan">Keterangan</label>
            <br>
            <textarea class="keterangan" id="keterangan" name="keterangan" placeholder="masukan keterangan barang"></textarea>
            <br><br>
            <input class="res" type="reset" value="Reset">
            <input class="sub" type="submit" name="submit" value="Simpan">
        </form>
</fieldset>
</body>
</html>

<style>

    input {
        width: 100%;
        margin: auto;
        display: inline-block;
        box-sizing: border-box;
    }

    .keterangan {
        resize: none;
        width: 99%;
    }
    .input {
        border-radius: 15px;
        background-color: #f2f2f2;
        padding: 20px;
        width: 25%;
        margin: auto;
        margin-top: 15%;
    }
    .sub {
        background-color: green;
        width: 20%;
        color: white;
    }
    .res {
        background-color: orange;
        width: 20%;
        color: white;
    }
    .eror {
            color : red;
            font-size: 14px;
        }
</style>