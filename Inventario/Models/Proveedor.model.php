<?php
require_once('../Config/cls_conexion.model.php');
class Clase_Proveedor
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `proveedores`";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($ProveedorId)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `proveedores` WHERE ProveedorId=$ProveedorId";

            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($Nombre, $telefono, $correo)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `proveedores`( `Nombres`, `Telefono`, `Correo`) VALUES ('$Nombre','$telefono','$correo')";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($ProveedorId, $Nombre, $Telefono, $Correo)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `proveedores` SET `Nombres`='$Nombre',`Telefono`='$Telefono',`Correo`='$Correo' WHERE `ProveedorId`=$ProveedorId";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($ProveedorId)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "delete from proveedores where ProveedorId=$ProveedorId";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
/*

"SELECT * FROM `Proveedor` WHERE ProveedorId=4<br />
<b>Fatal error</b>:  Uncaught TypeError: mysqli_fetch_assoc(): Argument #1 ($result) must be of type mysqli_result, string given in /Applications/MAMP/htdocs/Sexto_PHP_ANGULAR/Inventario/Controllers/Proveedor.Controller.php:27
Stack trace:
#0 /Applications/MAMP/htdocs/Sexto_PHP_ANGULAR/Inventario/Controllers/Proveedor.Controller.php(27): mysqli_fetch_assoc('Table 'inventar...')
#1 {main}
  thrown in <b>/Applications/MAMP/htdocs/Sexto_PHP_ANGULAR/Inventario/Controllers/Proveedor.Controller.php</b> on line <b>27</b><br />
"
*/