<?php
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Usuario;

class UsuarioModel extends Model{
    protected $table      = 'tbl_usuarios';
    protected $primaryKey = 'idUsuario';

    protected $useAutoIncrement = true;

    protected $returnType     = Usuario::class;
    protected $useSoftDeletes = true;

    protected $allowedFields = ['username','password','nombre', 'apellido','foto','email','cuentaBanco','banco','numeroTelefono','idRol','idRol2'];

    protected $useTimestamps = true;
    protected $createdField  = 'date_create';
    protected $updatedField  = 'date_update';
    protected $deletedField  = 'date_delete';

    protected $beforeInsert = ['agregarRol'];
    //protected $afterUpdate = ['cambiarRol'];

    protected $asignarRol;
    protected $asignarCambiarRol;

    protected $asignarVistaRol;
    protected $asignarVistaDosRol;

    /*protected $updateVistaRol;
    protected $updateVistaDosRol;*/

    protected function agregarRol($data){
        $data['data']['idRol'] = $this->asignarRol;
        $data['data']['idRol2'] = $this->asignarRol;
        return $data;
    }
   /* protected function agregarRolDos($data){
        $data['data']['idRol2'] = $this->asignarRol;
        return $data;
    }*/

    public function agregarUnRol(string $rol){
        $row = $this->db()->table('tbl_roles')->where('rol',$rol)->get()->getFirstRow();
        if($row !== null){
            $this->asignarRol = $row->idRol;
        }
    }

    /*public function agregarUnDosRol(string $rol){
        $row = $this->db()->table('tbl_roles')->where('rol',$rol)->get()->getFirstRow();
        if($row !== null){
            $this->asignarDosRol = $row->idRol;
        }
    }*/

    public function agregarCambiarRol(string $rol){
        $row = $this->db()->table('tbl_roles')->where('rol',$rol)->get()->getFirstRow();
        if($row !== null){
            $this->asignarCambiarRol = $row->idRol;
        }
    }

    /*//Cambiar rol
    protected function cambiarRol($data){
        $this->asignarCambiarRol->idUsuario =  
    }

    public function agregarCambiarRol(Usuario $user){
        $this->asignarCambiarRol = $user;
    }*/



    public function buscarUsuario(string $email, string $value){
        return $this->where($email,$value)->first();
    }

    public function buscarRol(string $value){
        $row = $this->db()->table('tbl_roles')->where('idRol',$value)->get()->getFirstRow();
        if($row !== null){
            $this->asignarVistaRol = $row->rol;
            $this->asignarVistaDosRol = $row->rol;
        }
    }

    /*public function buscarUpdateRol(string $value){
        $row = $this->db()->table('tbl_roles')->where('idRol',$value)->get()->getFirstRow();
        if($row !== null){
            $this->updateVistaRol = $row->rol;
            $this->updateVistaDosRol = $row->rol;
        }
    }*/

    /*public function buscarDosRol(string $value){
        $row = $this->db()->table('tbl_roles')->where('idRol',$value)->get()->getFirstRow();
        if($row !== null){
            $this->asignarVistaDosRol = $row->rol;
        }
    }*/
}