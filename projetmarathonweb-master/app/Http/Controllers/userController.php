<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class userController extends Controller
{
    public function show($id){
        $nbEpisodeVue = DB::table('seen')->where('user_id',$id)->distinct()->count();
        $watchingTime = DB::table('seen')->join('episodes','seen.episode_id','episodes.id')->where('seen.user_id',$id)->sum('duree');

        $allFilmSeenbyuser=DB::table('seen')->join('episodes',"seen.episode_id","episodes.id")->select('serie_id')->distinct()->where('user_id',$id)->get()->pluck('serie_id');

        foreach ($allFilmSeenbyuser as $film){
            $watch=0;
            $total=0;
            $total = DB::table('episodes')->where('serie_id',$film)->sum('duree');
            $watch= DB::table('episodes')->join('seen','episodes.id','seen.episode_id')->where('episodes.serie_id',$film)->where('seen.user_id',$id)->sum('duree');
            $res=($watch/$total)*100;
        }
        $description = DB::table('users')->select('avatar')->where('id', $id) ;

        $allCommentByUser=DB::table('comments')->join('series','comments.serie_id','series.id')->where('comments.user_id',$id)->get();
        $name=DB::table('users')->select('name')->where("id",$id)->select("name")->get()->pluck("name")[0];
        return view('user',["nbEpisodeVue"=>$nbEpisodeVue,"watchingTime"=>$watchingTime,"allComm"=>$allCommentByUser,"name"=>$name]);
    }
}
