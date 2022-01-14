<?php

namespace App\Http\Controllers;

use App\Models\Terrain;
use Illuminate\Http\Request;

class TerrainController extends Controller
{
    public function list(Request $request) {
        $method = 'desc';
        
        if ($request->query('sort') != null) {
            $method = $request->query('sort');
        }

        return Terrain::orderBy('ettari', $method)->get();
    }

    public function view($id) {
        return Terrain::where('id', $id)->first();
    }

    public function create(Request $request) {
        $data = json_decode($request -> getContent());
        $terrain = new Terrain();

        $terrain->comune = $data->comune;
        $terrain->img = $data->img;
        $terrain->ettari = $data->ettari;
        $terrain->foglio_catastale = $data->foglio_catastale;
        $terrain->mappa_catastale = $data->mappa_catastale;
        $terrain->parcella_catastale = $data->parcella_catastale;
        $terrain->tipo_terreno = $data->tipo_terreno;
        $terrain->tipo_irrigazione = $data->tipo_irrigazione;
        $terrain->tipo_offerta = $data->tipo_offerta;
        $terrain->canone_offerta = $data->canone_offerta;
        $terrain->disponibilità = $data->disponibilità;

        $terrain -> save();
    }

    public function modify(Request $request, $id) {
        $data = json_decode($request -> getContent());
        $terrain = Terrain::where('id', $id)->first();

        $terrain->comune = $data->comune;
        $terrain->img = $data->img;
        $terrain->ettari = $data->ettari;
        $terrain->foglio_catastale = $data->foglio_catastale;
        $terrain->mappa_catastale = $data->mappa_catastale;
        $terrain->parcella_catastale = $data->parcella_catastale;
        $terrain->tipo_terreno = $data->tipo_terreno;
        $terrain->tipo_irrigazione = $data->tipo_irrigazione;
        $terrain->tipo_offerta = $data->tipo_offerta;
        $terrain->canone_offerta = $data->canone_offerta;
        $terrain->disponibilità = $data->disponibilità;

        $terrain -> save();
    }

    public function delete($id) {
        return Terrain::where('id', $id)->delete();
    }
}
