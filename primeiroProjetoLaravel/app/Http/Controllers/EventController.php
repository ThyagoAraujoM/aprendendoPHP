<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{

    public function index()
    {
        $search = request("search");
        if ($search) {
            // se estiver algo na pesquisa ele vai pegar apenas os cursos que contenham o que foi pesquisado
            $events = Event::where([
                ["title", "like", "%" . $search . "%"]
            ])->get();
        } else {
            // pega todos os eventos do server
            $events = Event::all();
        }

        return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        // pega o modelo do evento e passa todos os valores passados pelo
        // request e depois salva no banco
        $event = new Event;

        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->items = $request->items;

        // Image Upload
        if ($request->hasFile('image') && $request->file("image")->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $requestImage->move(public_path("img/events"), $imageName);
            $event->image = $imageName;
        }
        // pegando os dados do usuário logado e passando o di para o evento
        // identificando quem o criou.
        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with("msg", "Evento criado com sucesso");
    }

    public function show($id)
    {
        // função do elquent que procura algum dado no banco com o mesmo id passado.
        //  Se existir ele vai retornar os dados e vamos retornar a página carregada,
        // se não a própria função retorna um Not Found
        $event = Event::findOrFail($id);

        $eventOwner = User::where("id", $event->user_id)->first()->toArray();

        return view("events.show", ['event' => $event, "eventOwner" => $eventOwner]);
    }

    public function dashboard()
    {
        $user = auth()->user();

        $events = $user->events;

        return view('events.dashboard', ['events' => $events]);
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();

        return redirect("/dashboard")->with("msg", "Evento deletado com sucesso!");
    }
}
