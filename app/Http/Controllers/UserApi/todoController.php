<?php

namespace App\Http\Controllers\UserApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class todoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Todo::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(),[
            'list'=> 'required|min:5',
            'description' => 'required|min:5'
        ]);

        if($validasi->fails()){
            return response()->json([
                'pesan' => $validasi->errors()
            ], 403);
        }
        $newTodo = new Todo;
        return $newTodo->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ListDt = Todo::where('id', $id)->get();
        return $ListDt;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $listAda = Todo::find($id);

        if($listAda){

            $listAda->completed = $request->item['completed'] ? true : false;
            $listAda->complete_date = $request->item['completed'] ? Carbon::now() : null;
            $listAda->save();
            return $listAda;

        }
        return "List tidak di temukan";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ListAda = Todo::find($id);
        if($ListAda){
            $ListAda->delete($ListAda);
            return "Berhasil di hapus";
        }
    }

    public function updateList(Request $request, $id){

        $listAda = Todo::find($id);
        return $listAda->update($request->all());
         
    }
}
