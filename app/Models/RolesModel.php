<?php
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Usuario;

class RolesModel extends Model{
    protected $table      = 'tbl_roles';
    protected $primaryKey = 'idRol';

    protected $returnType     = 'object';
    protected $allowedFields = ['rol'];

    protected $useTimestamps =true;
}