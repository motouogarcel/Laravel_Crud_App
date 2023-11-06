<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //verification que l'utilisateur est connecté
        $user = auth()->user();

        //chargement de toute les taches de la BD
        $tache = Tache::orderBy('echeance', 'desc')->where('user_id',$user->id)->get();
// dd($tache);
        // On transmet les Post à la vue
        return view('index', compact('tache'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $this->validate($request, [
        //     'title' => '|required|string|max:255',
        //     "description" => '|required|image|max:1024',
        //     "echeance" => '|required',
        // ]);

        $input = array(
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'echeance' => $request->input('echeance'),
        'status' => $request->input('status'),
        'user_id' => auth()->id(),

        );
        Tache::create($input);


        return redirect()->route('tache.index')->with('message','Tache enregistré avec succes');;
        
    
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Tache $tache)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $tache = Tache::find($id);
       
        return view("edit",compact('tache'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tache = Tache::find($id);
        $input=$request->post()   ;
        unset($input['_token']) ;
        unset($input['_method']) ;
        //
        // dd($request->post());
        // $input = array(
        //     'title' => $request->input('title'),
        //     'description' => $request->input('description'),
        //     'echeance' => $request->input('echeance'),
        //     );
            $tache->update($input);
            // $tache->title = $request->input('title');
            // $tache->description = $request->input('description');
            // $tache->echeance = $request->input('echeance');

            // $tache->save();
            return redirect()->route('tache.index')->with('message','Tache modifié avec succes');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        
        $tache = Tache::find($id);
        $tache->delete();

        return redirect()->route('tache.index')->with('message','Tache supprimer avec succes');
    }
}
