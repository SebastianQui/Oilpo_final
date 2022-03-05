<?php

namespace App\Http\Controllers;
use App\Models\Compras;
use Illuminate\Http\Request;
use App\Models\Proveedore;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()

    {
        $compra = Compras::paginate();
        // Proveedore::all();
        $nombre = DB:: select("SELECT DISTINCT Numero_factura, p.Nombre_proveedor, Fecha_compra FROM compras  as c JOIN proveedores as p  WHERE c.Nombre_proveedor=p.id");
        // SELECT`Producto`, `Precio`, `Cantidad` FROM `compras` WHERE `Numero_factura` =12345

        return view('compras.index', compact('compra', 'nombre'))
            ->with('i', (request()->input('page', 1) - 1) * $compra->perPage());

    }


    public function show()

    {

        $proveedores = Proveedore::all();
        $compra = Compras::paginate();
        $productos = Producto::all();
        return view('compras.Agregar_compra', compact('compra', 'proveedores', 'productos'))
            ->with('i', (request()->input('page', 1) - 1) * $compra->perPage());
    }


    public function Agregar_producto_compra(){

        return redirect('compras/Agregar_compra')
            ->with('success', ' ');

    }

    public function destroy($id)
    {
        $compra = Compras::find($id)->delete();

        return redirect('compras/Agregar_compra')
            ->with('borrado', 'Proveedore deleted successfully');
    }

    public function Agregar_compra(Request  $request){

        $proveedor = $_POST['Nombre_proveedor'];
        $numero_factura = $_POST['Numero_factura'];
        $foto=(isset($_FILES['Foto']['name']))?$_FILES['Foto']['name']:"";
        $fecha_compra = $_POST['Fecha_compra'];
        // //IMAGEN
        if($request->hasFile('Foto')){
            $foto=$request->file('Foto')->store('uploads', 'public');

        }



          // //END IMAGEN

        $Producto = $_POST['Producto'];
        $Precio = $_POST['Precio'];
        $Cantidad = $_POST['Cantidad'];

        $cadena= "INSERT INTO compras (Nombre_proveedor, Numero_factura, Fecha_compra, Foto,  Producto, Precio, Cantidad) VALUES ";
        for ($i = 0; $i <count($Producto); $i++){
            $cadena.="('".$proveedor."',  '".$numero_factura."',  '".$fecha_compra."', '".$foto."', '".$Producto[$i]."', '".$Precio[$i]."', '".$Cantidad[$i]."'),";

        }
        $cadena_final = substr($cadena, 0, -1);
        $cadena_final.=";";
        DB::insert($cadena_final);

        return redirect('compras/')
            ->with('success', ' ');


    }


}
