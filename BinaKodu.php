<?php
namespace App;

use App\Database;

class BinaKodu {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function listBuildings()
    {
        // var_dump($this->db->customSelect("SELECT * FROM buildings "));
    }

    public function buildings()
    {
        return $this->db->customSelect("SELECT * FROM buildings ");
    }

    public function print($id)
    {
        return $this->db->findById('buildings',$id);
    }

    public function save($params)
    {
        $reportDate = isset($params['report_date']) && !empty($params['report_date']) ? date_create_from_format('d/m/Y', $params['report_date']) : '';

        return $this->db->insert('buildings', [
            'city' => $params['city']??'',
            'town' => $params['town']??'',
            'neighbourhood' => $params['neighbourhood']??'',
            'street' => $params['street']??'',
            'address' => $params['address']??'',
            'building_no' => $params['building_no']??0,
            'report_date' => ($reportDate instanceof \DateTime) ? $reportDate->format('Y-m-d') : '',
            'health_status' => $params['health_status']??0,
            'dask_status' => $params['dask_status']??0,
        ]);
    }

    public function render()
    {
        include "pages/$file.php";
    }

    public function dateFormat($dateString)
    {
        if (!empty($dateString) && $date = date_create_from_format('Y-m-d', $dateString)) {
            return $date->format('d/m/Y');
        }

        return null;
    }
}

