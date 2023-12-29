<?php


class Product 
{
    protected $id;
    protected $name;
    protected $price;
    protected $image;

    public function __construct($id, $name, $price, $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function displayInfo()
    {
        return "ID: {$this->id}, Name: {$this->name}, Price: {$this->price}, Image: {$this->image}";
    }
}

class Productpria extends Product
{
    protected $size; // Contoh properti tambahan khusus untuk produk pria

    public function __construct($id, $name, $price, $image, $size)
    {
        parent::__construct($id, $name, $price, $image);
        $this->size = $size;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function displayInfo()
    {
        return parent::displayInfo() . ", Size: {$this->size}";
    }
}

// Contoh penggunaan
$product = new Productpria(1, 'Men Shirt', 50, 'shirt.jpg', 'XL');
echo $product->displayInfo();

?>


