<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $nome = "Matheus";
        $idade = 29;
        $alunosTurma1 = ["Matheus", "Maria", "João", "Saulo"];

        return view("welcome",
        [
            "nome"=> $nome,
            "idade"=> $idade,
            "alunosTurma1"=> $alunosTurma1
        ]);
    }
    public function products(){
        $busca = request("search");
        return view('products',['busca' => $busca]);
    }
    public function user($id = 1){
        return view('user',['id'=> $id]);
    }
}
?>
