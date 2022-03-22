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
    
    /*Variables para antes de insertar en la tabla*/
    protected $beforeInsert = ['agregarRol'];

    protected $asignarRol;
    protected $asignarCambiarRol;

    protected $asignarVistaRol;
    protected $asignarVistaDosRol;


    protected function agregarRol($data){
        $data['data']['idRol'] = $this->asignarRol;
        $data['data']['idRol2'] = $this->asignarRol;
        return $data;
    }

    public function agregarUnRol(string $rol){
        $row = $this->db()->table('tbl_roles')->where('rol',$rol)->get()->getFirstRow();
        if($row !== null){
            $this->asignarRol = $row->idRol;
        }
    }

    public function agregarCambiarRol(string $rol){
        $row = $this->db()->table('tbl_roles')->where('rol',$rol)->get()->getFirstRow();
        if($row !== null){
            $this->asignarCambiarRol = $row->idRol;
        }
    }

    public function buscarUsuario(string $email, string $value){
        return $this->where($email,$value)->first();
    }

    public function buscarRol(string $value){
        $row = $this->db()->table('tbl_roles')->where('idRol',$value)->get()->getFirstRow();
        if($row !== null){
            $this->asignarVistaRol = $row->rol;
        }
    }
    public function buscarRolDos(string $value){
        $row = $this->db()->table('tbl_roles')->where('idRol',$value)->get()->getFirstRow();
        if($row !== null){
            $this->asignarVistaDosRol = $row->rol;
        }
    }
}