<?php

namespace App\Controllers;
use App\Models\Race;
use App\Models\RaceYear;
use App\Models\Stage;

class Kontroler extends BaseController
{
    var $Race;
    var $RaceYear;
    var $Stage;

    public function __construct(){
        $this->Race = new Race();
        $this->RaceYear = new RaceYear();
        $this->Stage = new Stage();
    }
    
    public function loadRaces(){
        $data['race'] = $this->Race->paginate(20);
        $data['pager'] = $this->Race->pager;
        return view ('Races', $data);
    }

    public function loadRaceYears($race_id){
        $data['raceYear'] = $this->RaceYear
        ->select('real_name, year, start_date, end_date, logo, name, sum(distance) as distance, count(*) as count, id_race_year')
        ->join('uci_tour_type', 'uci_tour_type.id = race_year.uci_tour', 'inner')
        ->join('stage', 'stage.id_race_year = race_year.id', 'inner')
        ->where('id_race', $race_id)
        ->groupBy('id_race_year')
        ->find();
        return view('RaceYears', $data);
    }


    public function loadStages($id_race_year){
        $data['stage'] = $this->Stage->join('parcour_type', 'parcour_type.id = stage.parcour_type', 'inner')->where('id_race_year', $id_race_year)->findAll();
        return view('Stages', $data);
    }
}