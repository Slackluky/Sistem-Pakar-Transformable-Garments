<?php

namespace App\Http\Controllers;

use App\Models\Rules;
use App\Models\Symptoms;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class DiagnoseController extends Controller
{
    public function index () {
        $symptoms = Symptoms::get();
        return Inertia::render('Diagnose/index', [
            'symptoms' => $symptoms
        ]);
    }

    public function run (Request $request) {

    $daftarGejala = [
        'list' => Rules::with('symptoms')->with('drugs')->whereIn('symptom_id', $request->selected)->get()->toArray(),
        'sum' => DB::table('rules')->select(DB::raw('sum(probability) as sum, drug_id'))->whereIn('symptom_id', $request->selected)->groupBy('drug_id')->get()->toArray(),
    ];
    $newList = [];

        // dd($daftarGejala);
    foreach ($daftarGejala['list'] as $key => $value) {
      $findSum = array_search($value['drug_id'], array_column($daftarGejala['sum'], 'drug_id'));
      $findNewValue = array_search($value['drug_id'], array_column($newList, 'drug_id'));
      $p = $value['probability'];
      $n =  $p / $daftarGejala['sum'][$findSum]->sum;
      $h = floatval($p) * ($n);
      if (gettype($findNewValue) == 'integer') {
        $newList[$findNewValue]['gejala'] += [$value['code'] => [ 'n' => $n, 'h' => $h, 'p' => $p]];
        $newList[$findNewValue]['h'] += $h;
      }else {
        array_push($newList, ['gejala' => [ $value['code'] => [ 'n' => $n, 'h' => $h, 'p' => $p]], 'drug_id' => $value['drug_id'], 'nama' => $value['drugs']['drug'], 'saran' => $value['drugs']['advice'], 'informasi' => $value['drugs']['information'], 'h' => $h, 'sum' => $daftarGejala['sum'][$findSum]->sum ]);
      }
    }

    $final = [];
    foreach ($newList as $key => $value) {
      foreach ($value['gejala'] as $k => $g) {
        // var_dump([$g['p'], $g['h'], $value['h']]);
        $hasil = ($g['p'] * $g['h']) / $value['h'];
        if (array_key_exists($value['nama'], $final)) {
          $final[$value['nama']]['gejala'] += [$k => $hasil];
          $final[$value['nama']]['sum'] += $hasil;
        } else {
          $final[$value['nama']]['gejala'] = [$k => $hasil];
          $final[$value['nama']]['sum'] = $hasil;
          $final[$value['nama']]['id'] = $value['drug_id'];
          $final[$value['nama']]['saran'] = $value['saran'];
          $final[$value['nama']]['informasi'] = $value['informasi'];
        }
      }
    }
    // echo(json_encode($newList) . '<br/>');
    // echo(json_encode($final));

    $max = ['nama_penyakit' => '', 'drug_id' => '', 'val' => 0];
    foreach ($final as $key => $value) {
      if ($max['val'] < $value['sum']) {
        $max['nama_penyakit'] = $key;
        $max['drug_id'] = $value['id'];
        $max['val'] = $value['sum'];
        $max['saran'] = $value['saran'];
        $max['informasi'] = $value['informasi'];
      }
    }
    return Inertia::render('Diagnose/result', [
        'max' => $max,
        'final' => $final
    ]);
    }
}
