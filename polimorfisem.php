<?php
class deskripsi extends Productpria // Polymorphism dengan menambahkan deskripsi
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    public function getdesc()
    {
        $query = "SELECT * FROM tb_produk_pria WHERE id = " . $this->getId();
        $hasil = mysqli_query($this->koneksi, $query);
        $data = mysqli_fetch_array($hasil);

        return $data['detail_singkat'];
    }
}

?>

//contoh polimorfisme karena class deskripsi meng-extend class Productpria. Dengan kata lain, objek yang dibuat dari 
class deskripsi dapat dianggap sebagai objek dari class Productpria. Ini menunjukkan hubungan "is-a" antara deskripsi 
dan Productpria, yang merupakan salah satu bentuk polimorfisme.

//Pada baris tersebut, class deskripsi diwarisi (extends) dari class Productpria. Dengan cara ini, 
dapat menggunakan objek dari class deskripsi sebagai objek dari class Productpria. Misalnya,
jika memiliki objek $deskripsiObjek, dapat memperlakukannya sebagai objek $ProductpriaObjek.