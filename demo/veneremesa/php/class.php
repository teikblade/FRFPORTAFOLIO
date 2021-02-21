<?php 

	/**
	 * summary
	 */
	class Conexion
	{
	    private $server = "localhost";
	    private $root = "id11641103_root";
	    private $pass = "hL5C\gtJ(n>[xWvY";
	    private $db = "id11641103_demo";
	  
	    public function connect()
	    {
	   
	        $conexion = mysqli_connect($this->server,$this->root,$this->pass,$this->db);
	        return $conexion;
	    }
	}

class Message
{

    function LoginSucess()
    {
   		echo '<h5 style="color:white; background-color: green; padding-top: 1.5%; padding-bottom: 1.5%; text-align: center">Se ingreso con exito </h5>';
    }
    function LoginFailure(){
    	echo '<h5 style="color:white; background-color: red; padding-top: 1.5%; padding-bottom: 1.5%; text-align: center">No se puedo ingresar o loguear con exito </h5>';
    }
    function ActionCrudSuccess()
    {
   		echo '<h5 style="color:white; background-color: green; padding-top: 1.5%; padding-bottom: 1.5%; text-align: center">Se realizo con exito </h5>';
    }
    function ActionCrudFailure(){
    	echo '<h5 style="color:white; background-color: red; padding-top: 1.5%; padding-bottom: 1.5%; text-align: center">No se puedo realizar con exito </h5>';
    }
    function DbFailure(){
    	echo '<h5 style="color:white; background-color: red; padding-top: 1.5%; padding-bottom: 1.5%; text-align: center">Error de conexion de base de datos </h5>';
    }
    function DbSuccess()
    {
        echo '<h5 style="color:white; background-color: green; padding-top: 1.5%; padding-bottom: 1.5%; text-align: center">Se ha procesado con exito la conexion a la base de datos </h5>';
    }
    function FieldsFailure(){
    	echo '<h5 style="color:white; background-color: red; padding-top: 1.5%; padding-bottom: 1.5%; text-align: center">Complete los campos faltantes </h5>';
    }
    function FieldsSuccess()
    {
        echo '<h5 style="color:white; background-color: green; padding-top: 1.5%; padding-bottom: 1.5%; text-align: center">Todos los campos estan competados </h5>';
    }
}

/**
 * summary
 */
class Exchange
{
    /**
     * summary
     */
    public function ExchangeRates($connect,$sql)
    {
        $QueryTaza = mysqli_query($connect,$sql);
        $fila = mysqli_fetch_row($QueryTaza);
        $valor = $fila['2'];
        return $valor;
    }
}

/**
 * summary
 */
class CRUD
{
    /**
     * summary
     */
    public function InsertQuery($connect,$target,$date)
    {
        $sql = "INSERT INTO `tazas` (`n_taza`, `fecha_taza`, `valor_taza`) VALUES (NULL, '$date', '$target')";
        if($result = mysqli_query($connect,$sql)){
            return true;
        }else{
            return false;
        }
    }
    public function Update()
    {
        
    }
    public function Read()
    {
        
    }
    public function DeleteWhereQuery($connect,$date)
    {
        $sql = "DELETE FROM tazas WHERE fecha_taza = '$date'";
       if($result = mysqli_query($connect,$sql)){
            return true;
        }else{
            return false;
        }
    }
    public function DeleteAllQuery($connect,$date)
    {
        $sql = "DELETE FROM tazas";
        if($result = mysqli_query($connect,$sql)){
            return true;
        }else{
            return false;
        }
    }
}
class Table
    {
        
        function RateHistory($connect)
        {   
            $sql = "SELECT * from tazas ORDER BY n_taza ASC";
            $QueryRateHistory = mysqli_query($connect,$sql);
            if(mysqli_num_rows($QueryRateHistory) <= 0){
            echo "<h4 style='text-align:center;'>NO HAY TAZAS AGREGADAS</h4>";
            }else{
            echo "
            <table class='table'>
                    <thead class='thead-dark'>
                        <tr>
                            <th scope='col'>Numero</th>
                            <th scope='col'>Tazas</th>
                            <th scope='col'>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
            ";
        while ($row = mysqli_fetch_array($QueryRateHistory)) {
        echo "
                        <tr>
                            <td>$row[n_taza]</th>
                            <td>$row[valor_taza]</th>
                            <td>$row[fecha_taza]</td>
                        </tr>
            ";
        }
        echo "
                    </tbody>
            </table>
        ";
        }
        }
    }
 ?>