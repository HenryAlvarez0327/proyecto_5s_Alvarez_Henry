<?php
require_once("../../../conexion/conexion.php");
class clase_representantes
{   private $db;
    public $vl_codigo;
    public $vl_cedula;
    public $vl_apenom;
    public $vl_fecnac;
    public $vl_sexo;
    public $vl_estciv;
               

    public function __construct()
    {   $this->vl_codigo=0;
        $this->vl_cedula="";
        $this->vl_apenom="";
        $this->vl_fecnac="";
        $this->vl_sexo=0;
        $this->vl_estciv=0;

        $this->db = (new Conexion())->getConexion();
    }
                
    public function _insertar(
    $vl_apenom, $vl_cedula, $vl_fecnac, $vl_sexo, $vl_estciv, $vl_domici, $vl_teldom, $vl_trabaj,
    $vl_dirtra, $vl_teltra, $vl_profes, $vl_fecing, $vl_suspen, $vl_nacion, $vl_correo, $vl_movilw,
    $vl_contac, $vl_telcon, $vl_observ
) {
    try {
        $sql = "INSERT INTO spn_repr (
            REP_APENOM, REP_CEDULA, REP_FECNAC, REP_SEXO, REP_ESTCIV, REP_DOMICI, 
            REP_TELDOM, REP_TRABAJ, REP_DIRTRA, REP_TELTRA, REP_PROFES, REP_FECING, 
            REP_SUSPEN, REP_NACION, REP_CORREO, REP_MOVILW, REP_CONTAC, REP_TELCON, REP_OBSERV
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $vl_apenom, $vl_cedula, $vl_fecnac, $vl_sexo, $vl_estciv, $vl_domici, 
            $vl_teldom, $vl_trabaj, $vl_dirtra, $vl_teltra, $vl_profes, $vl_fecing, 
            $vl_suspen, $vl_nacion, $vl_correo, $vl_movilw, $vl_contac, $vl_telcon, $vl_observ
        ]);
    } catch (PDOException $e) {
        return false;
    }
}

                
    public function _consultartodo($valor)
    {
        if($valor=='')
        {
                $dmlsentencia="select * from spn_repr";
        }
        else
        {
                $dmlsentencia="select * from spn_repr where REP_APENOM like '%".$valor."%' OR REP_CEDULA like '%".$valor."%'" ;
        }
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
     public function _consultarcodigo($valor)
    {
        $dmlsentencia="select * from spn_repr where REP_CODIGO = " . $valor ;
        $registros = $this->db->query($dmlsentencia);
        return $registros;
    }
public function _eliminar($codigo) {
    if (empty($codigo)) {
        return false;
    }

    try {
        $sql = "DELETE FROM spn_repr WHERE REP_CODIGO = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$codigo]);
    } catch (PDOException $e) {
        return false;
    }
}

    public function _actualizar(
    $cedula, $apenom, $fecnac, $sexo, $estciv, $domici, $teldom,
    $trabaj, $dirtra, $teltra, $profes, $fecing, $suspen, $nacion,
    $correo, $movilw, $contac, $telcon, $observ, $codigo
) {
    $sql = "UPDATE spn_repr SET
        REP_CEDULA = :cedula,
        REP_APENOM = :apenom,
        REP_FECNAC = :fecnac,
        REP_SEXO = :sexo,
        REP_ESTCIV = :estciv,
        REP_DOMICI = :domici,
        REP_TELDOM = :teldom,
        REP_TRABAJ = :trabaj,
        REP_DIRTRA = :dirtra,
        REP_TELTRA = :teltra,
        REP_PROFES = :profes,
        REP_FECING = :fecing,
        REP_SUSPEN = :suspen,
        REP_NACION = :nacion,
        REP_CORREO = :correo,
        REP_MOVILW = :movilw,
        REP_CONTAC = :contac,
        REP_TELCON = :telcon,
        REP_OBSERV = :observ
    WHERE REP_CODIGO = :codigo";

    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':cedula', $cedula);
    $stmt->bindParam(':apenom', $apenom);
    $stmt->bindParam(':fecnac', $fecnac);
    $stmt->bindParam(':sexo', $sexo);
    $stmt->bindParam(':estciv', $estciv);
    $stmt->bindParam(':domici', $domici);
    $stmt->bindParam(':teldom', $teldom);
    $stmt->bindParam(':trabaj', $trabaj);
    $stmt->bindParam(':dirtra', $dirtra);
    $stmt->bindParam(':teltra', $teltra);
    $stmt->bindParam(':profes', $profes);
    $stmt->bindParam(':fecing', $fecing);
    $stmt->bindParam(':suspen', $suspen);
    $stmt->bindParam(':nacion', $nacion);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':movilw', $movilw);
    $stmt->bindParam(':contac', $contac);
    $stmt->bindParam(':telcon', $telcon);
    $stmt->bindParam(':observ', $observ);
    $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);

    return $stmt->execute();
}

}
?>