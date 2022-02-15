@extends("layouts.main")

@section("title", "Home")

@section("content")
<div>
    <h1>Page Home</h1>
    <p>Vamos falar sobre a Turma 1</p>
    <p>Claro que vamos falar sobre o melhor da turma primeiro, sendo ele {{$nome}} de {{$idade}}</p>
    <p>E claro que não vamos esquecer dos outros alunos que se empenharam tanto quanto ele para estarem aqui</p>
    @foreach ($alunosTurma1 as $aluno)
        <p>{{$aluno}}</p>
    @endforeach
</div>
@endsection
