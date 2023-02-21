<?php

function secape($data) {
    global $link;
    return mysqli_escape_string($link,$data);
}

function login($nama, $pass){
    $nama = secape($nama);
    $pass = secape($pass);
     
// $pass = md5($pass);

$query ="SELECT * FROM user WHERE username='$nama' AND password='$pass'";
global $link;

    if($result= mysqli_query($link, $query)){
        
        if(mysqli_num_rows($result) != 0)
        return true;
        else 
        return false; 
    }

}

function cek_username($username) {
    global $link;
    $query = "SELECT * FROM user WHERE username='$username'";

    if($result= mysqli_query($link, $query)){
     
        if(mysqli_num_rows($result) == 0)
        return true;
        else
        return false; 
    }
}

function role($username){
    $nama = secape($username);

$query ="SELECT status FROM users WHERE username='$nama'";
global $link;

    if($result= mysqli_query($link, $query)){
        while($row = mysqli_fetch_assoc($result)){
            $status = $row['role'];
        }
        return $status;
    }
}

function run($query){
    global $link;

    if(mysqli_query($link, $query))
    return true;
    else return false;
}

function hapus_data($id){
    $query = "DELETE FROM barang WHERE id=$id";
    return run($query);
}

function hapus_user($id){
    $query = "DELETE FROM user WHERE id=$id";
    return run($query);
}

function register($nama, $username, $pass, $role){
    $nama = secape($nama);
    $username = secape($username);
    $pass = secape($pass);

$pass = md5($pass);


    $query = "INSERT INTO user (nama, username, password, role) VALUES ('$nama','$username', '$pass',$role)";
    return run($query);
}


function data() {
    global $link;

    $query = "SELECT * FROM barang INNER JOIN kategori ON barang.id_jkategori = kategori.id";
    $result = mysqli_query($link,$query);

    return $result;
}
?>