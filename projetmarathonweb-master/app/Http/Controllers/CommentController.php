<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function create($idSerie) {
        $serie = Serie::find($idSerie);
        return view('comments.create', ["serie"=>$serie]);
    }


    public function store(Request $request)
    {
        $serie_id = $request->serie_id;

        $comment = new comments();
        $comment->content = $request->description;
        $comment->note = $request->note;
        $comment->validated = 0;
        $comment->user_id = $request->user_id;
        $comment->serie_id = $request->serie_id;

        $comment->save();

        return redirect('series/'.$request->serie_id);


    }
    public function formulaireFilm(Request $request){
        return view('changeAvis');
    }

    public function activateCom($id){

        $serieId  = DB::table('comments')->select('serie_id')->where('id',$id)->get()->pluck('serie_id')[0];
        DB::table('comments')->where('id', $id)->update((["validated"=>true]));
        return redirect('series/'.$serieId);
    }
    public function destroyCom($id){
        $serieId  = DB::table('comments')->select('serie_id')->where('id',$id)->get()->pluck('serie_id')[0];
        DB::table('comments')->where('id', $id)->delete();
        return redirect('series/'.$serieId);
    }
    public function update(Request $request,$id){

    }



}