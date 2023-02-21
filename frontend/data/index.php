<?php
    require_once '../core/init.php';

    $role = $lgoin = false;
    if(isset($_SESSION['user'])){
        $login = true ;
        if(role($_SESSION['user']) == 'admin'){
            $role = true;
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
    <title>Table</title>
</head>
<body>
    <h1 style="text-align: center; font-family: sans-serif; ">Data Barang</h1>
    <h4 style=" font-family: sans-serif; padding-left: 10%;">Halo, nama</h4>
    <br><br>
    <?php if($role == true){ ?>
    <a class="inpo" href="buat.php"><button>Tambah</button></a>
    <?php } ?>
    <a class="sec" href=""><button>Barang Masuk</button></a>
    <a class="" href=""><button>Barang Keluar</button></a> <br>
    <br></br>
    <table border="2">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Kategori</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="a">
                <?php while($row = mysqli_fetch_assoc($data)) {?>
                <tr>
                    <th></th>
                    <th><? echo $row['nama'] ?></th>
                    <th><? echo $row['jumlah'] ?></th>
                    <th><? echo $row['nama_kategori'] ?></th>
                    <th><? echo $row['keterangan'] ?></th>
                    <th><a href="ubah.php?id=<? echo $row['id'] ?>"><button class="edit">Edit</button></a>
                    <?php if($role == true){ ?>
                    <a href="hapus.php?id=<? echo $row['id'] ?>"><button class="hapus">Hapus</button></a>
                    <?php } ?>
                    </th>
                <?php } ?>
                </tr>
            </tbody>
    </table>
</body>
</html>

<style>
    table {
        width: 80%;
        margin: auto;
    }
    thead {
        background-color:gray ;
        color: white;
    }
    .hapus {
        background-color: red;
        color: white;
        border-radius: 0%;
        border: none;
    }
    .edit {
        margin: 0em 1em 0em 0em ;
        background-color: orange;
        color: white;
        border: none;
    }
    .a {
        background-color: white;
    }
    .inpo {
        padding-left: 79%;
    }
    .sec {
        padding-left: 15%;
        padding-right: 8px;
    }
</style>