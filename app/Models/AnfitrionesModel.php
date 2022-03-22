<?php
namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Anfitrion;
use App\Entities\Usuario;

class AnfitrionesModel extends Model{
    protected $table      = 'tbl_anfitriones';
    protected $primaryKey = 'idAnfitrion';

    protected $returnType     = Anfitrion::class;
    protected $allowedFields = ['descripcion','puntuacion','cuentaBanco','banco','totalPuntuacion','idUsuario','idIdiomaAnfitrion'];

    protected $useTimestamps = true;
    protected $createdField  = 'date_create';
    protected $updatedField  = 'date_update';

    protected $beforeInsert = ['agregarUsuario','addPuntaje','addTotalPuntaje','addIdiomaPrimario','addIdiomaSecundario','addIdiomaExtra'];
    //protected $afterInsert =['addTotalPuntaje','agregarIdiomaPrimario','agregarIdiomaSecundario','agregarIdiomaExtra'];

    protected $agregarUnUsuario;
    protected $addPuntajeInicial;
    protected $asignarIdiomaPrimario;
    protected $asignarIdiomaSecundario;
    protected $asignarIdiomaExtra;

    protected function agregarUsuario($data){
        $data['data']['idUsuario'] = $this->agregarUnUsuario;
        return $data;
    }

    public function agregarElUsuario(string $email){
        $row = $this->db()->table('tbl_usuarios')->where('email',$email)->get()->getFirstRow();
        if($row !== null){
            $this->agregarUnUsuario = $row->idUsuario;
        }
    }

    public function addPuntaje($data){
        $data['data']['puntuacion'] = 0;
        return $data;
    }
    public function addTotalPuntaje($data){
        $data['data']['totalPuntuacion'] = 0;
        return $data;
    }

    protected function addIdiomaPrimario($data){
        $data['data']['idiomaPrimario'] = $this->asignarIdiomaPrimario;
        return $data;
    }

    public function agregarIdiomaPrimario(string $idioma){
        $row = $this->db()->table('tbl_idiomas')->where('idioma',$idioma)->get()->getFirstRow();
        if($row !== null){
            $this->asignarIdiomaPrimario = $row->idIdioma;
        }
    }

    protected function addIdiomaSecundario($data){
        $data['data']['idiomaSecundario'] = $this->asignarIdiomaSecundario;
        return $data;
    }

    public function agregarIdiomaSecundario(string $idioma){
        $row = $this->db()->table('tbl_idiomas')->where('idioma',$idioma)->get()->getFirstRow();
        if($row !== null){
            $this->asignarIdiomaSecundario = $row->idIdioma;
        }
    }

    protected function addIdiomaExtra($data){
        $data['data']['idiomaExtra'] = $this->asignarIdiomaExtra;
        return $data;
    }

    public function agregarIdiomaExtra(string $idioma){
        $row = $this->db()->table('tbl_idiomas')->where('idioma',$idioma)->get()->getFirstRow();
        if($row !== null){
            $this->asignarIdiomaExtra = $row->idIdioma;
        }
    }


    /*public function agregarPuntaje(Anfitrion $value){
        $this->addPuntajeInicial = $value;
    }*/


    /*protected function agregarIdiomaPrimario($data){
        $data['data']['idiomaPrimario'] = $this->agregarIdiomasAnfitrion;
        return $data;
    }
    protected function agregarIdiomaSecundario($data){
        $data['data']['idiomaSecundario'] = $this->agregarIdiomasAnfitrion;
        return $data;
    }
    protected function agregarIdiomaExtra($data){
        $data['data']['idiomaExtra'] = $this->agregarIdiomasAnfitrion;
        return $data;
    }*/
    /*protected function agregarIdiomaPrimario($data){
        $this->infoAnfitrion->idIdiomaAnfitrion = $data['idIdioma'];
        $model = model('IdiomaAnfitrionModel');
        $model->save($this->infoAnfitrion);
    }

    /*public function agregarIdiomas(string $idioma){
        $language = $this->db()->table('tbl_idiomas')->where('idIdioma',$idioma)->get()->getFirstRow();
        if($language !== null){
            $this->agregarIdiomasAnfitrion = $language->idIdioma;
        }
    }*/
    /*public function agregarIdiomas(IdiomaAnfitrion $value){
        $this->infoAnfitrion = $value;
    }*/

    
}