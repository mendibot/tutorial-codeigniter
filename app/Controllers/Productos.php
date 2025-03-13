<?php 
namespace App\Controllers; 

use App\Models\ProductosModel;

class Productos extends BaseController
{
    private $productoModel;
    public function __construct()
    {
        $this->productoModel= new ProductosModel();
    }
    public function index()
    {
        $db = \Config\Database::connect();

        $condicion = "estatus = 1 OR stock > 5";

        // $query = $db->table('productos')
        // ->select('id, codigo, nombre, stock')
        // ->where($condicion)
        // ->orderBy('nombre', 'asc')
        // ->limit(1)
        // ->get();

        $sql = $db->table('productos');
        $sql->select('productos.id, productos.codigo, productos.nombre, productos.stock, almacen.nombre AS almacen');
        $sql->join('almacen', 'productos.id_almacen =almacen.id', 'left');
        $query = $sql->get();
        $resultado = $query->getResultArray();
        echo $db->getLastQuery();

        // $productModel = new ProductosModel();
        // $resultado =  $productModel->where('estatus', 1)->findAll();

        $data = ['titulo' => 'Catalogo de productos', 'productos' => $resultado];
        return view('productos/index', $data);

    }

    public function show($id)
    {
        $productModel = new ProductosModel();
        $producto = $productModel->find($id);
        $data = [
            'titulo' => 'Catalogo de productos',
            'producto' => $producto
        ];
        // $data = ['titulo' => 'Catalogo de productos',
        //         'id' => $id];
        // // return view('productos/index', $data);
        // return view('plantilla/header', $data)
        //     .view('productos/show', $data)
        //     .view('plantilla/footer', ['copy' => "2023"]);
        return view("productos/show", $data);
    }

    public function transaccion()
    {
        $data = [
            'codigo' => "1234",
            'nombre' => "Hola",
            'stock' => 8,
            'id_almacen' => 1,
            'estatus' => 1
        ];


       echo  $this->productoModel->insert($data);
       echo $this->productoModel->getInsertID();
       /////////////////////////////////////////
       echo $this->productoModel->update(2, $data);
    }


    public function edit()
    {
        return "<h2>Editar producto</h2>";
    }

    public function cat($categoria, $id)
    {
        return "<h2>Categoria: $categoria <br>$id producto</h2>";
    }
}