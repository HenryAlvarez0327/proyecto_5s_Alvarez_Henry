<?php
            require_once('modelo.php');
            $obj= new clase_representantes();
            $result=$obj->_consultartodo('');
            
            $datos = $result->fetchAll();
            $arrayDatos = [];
            // Barrido sobre los resultados de fetchAll()
            foreach ($datos as $row) {
                $arrayDatos[] = [
                    "codigo_ok" => $row["REP_CODIGO"],
                    "cedula_ok" => $row["REP_CEDULA"],
                    "apenom_ok" => $row["REP_APENOM"]
                ];
            }
                // Salida en formato JSON , JSON_UNESCAPED_UNICODE
                echo json_encode($arrayDatos, JSON_UNESCAPED_UNICODE);
            
?>