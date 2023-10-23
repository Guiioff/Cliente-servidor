<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisciplinaController extends Controller
{
    public function index (){
        $disciplinas = Disciplina::all();

        return view('index', compact('disciplinas'));
    }

    public function create (){
        return view('cadastro');
    }

    public function store(Request $request){
        try{
            $disciplina = new Disciplina();
            $disciplina->nome = $request->nome;
            $disciplina->carga_horaria = $request->carga_horaria;
            $disciplina->curso = $request->curso;
    
            if ($request->hasFile('ementa')) {
                $ementa = $request->file('ementa');
                $ementa_blob = file_get_contents($ementa);
                $disciplina->ementa = $ementa_blob;
            }
            
            $disciplina->save();
            DB::commit();
    
            return redirect()->route('disciplina.index')->with('success', 'Disciplina cadastrada com sucesso.');
        } catch(Exception $e) {
            DB::rollback();
            dd($e);
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $disciplina = Disciplina::Where('id', $id)->first();

            $disciplina->delete();

            DB::commit();
            return redirect()->route('disciplina.index')->with('sucesso', 'Disciplina deletada com sucesso.');
        } catch (exception $e) {
            DB::rollback();
            dd($e);
        }
    }

    public function view_ementa($id)
    {
        $disciplina = DB::table('disciplinas')->find($id);

        if (!$disciplina) {
            abort(404);
        }

        $fileContent = $disciplina->ementa;

        $headers = ['Content-Type' => 'application/pdf'];

        return response($fileContent, 200, $headers);
    }
    
}
