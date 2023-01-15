<?php

namespace App\Http\Controllers;

use App\Models\Drugs;
use App\Models\Rules;
use App\Models\Symptoms;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KnowledgeController extends Controller
{
    public function index () {
        $rules = Rules::with('drugs')->with('symptoms')->get();

        $drugs = Drugs::get();
        $symptoms = Symptoms::get();
        return Inertia::render('Knowledges', [
            'rules' => $rules,
            'drugs' => $drugs,
            'symptoms' => $symptoms
        ]);
    }
}
