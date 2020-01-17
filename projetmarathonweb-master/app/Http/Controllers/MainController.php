<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Series;
use App\Models\episode;
use App\Models\comments;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Helper\Table;

class MainController extends Controller
{

    public function register(){
        return view("register");
    }


    public function login(){
        return view("login");
    }


    public function index() {
        $commentaireRecent = DB::table('comments')->select('serie_id')->Orderby('updated_at', 'asc')->limit(5)->pluck('serie_id');
        $imageCom=DB::table('series')->select('urlImage','id')->whereIn('id',$commentaireRecent)->get()->values();

        $series = DB::table('series')->Orderby('note', 'desc')->limit(5)->get();

        $var1=1 ;

        $allFilmSeenbyuser=DB::table('seen')->join('episodes',"seen.episode_id","episodes.id")->select('serie_id')->distinct()->where('user_id',$var1)->get()->pluck('serie_id');

        $setUpFilmRecap=array(
            "idFilm",
            "nbVu",
            "nbTotal"
        );
        $res=[];

        foreach ($allFilmSeenbyuser as $film){
            $watch=0;
            $total=0;
            $total = DB::table('episodes')->where('serie_id',$film)->sum('duree');
            $watch= DB::table('episodes')->join('seen','episodes.id','seen.episode_id')->where('episodes.serie_id',$film)->where('seen.user_id',$var1)->sum('duree');
            $res=($watch/$total)*100;
        }
        return view('index',['commentaireRecent' => $imageCom,'serieRecente'=>$series]);


    }
    public function listAllSeries(){
        $allImages = DB::table("series")->select('urlImage','id')->get();
        return view('series',["Images"=>$allImages]);
    }

    public function find(Request $request,$id ){

        $commentOfTheSerie =DB::table('comments')->join('users','comments.user_id','users.id') ->select('content','note','users.updated_at','users.name','validated','comments.id')->where('serie_id',$id)->get();
        $serie= series::find($id);

        $nbCom = DB::table('comments')->where('serie_id',$id)->count();
        $nbComUnvalidated= DB::table('comments')->where('serie_id',$id)->where('validated',false)->count();
        if($nbCom!=0)$comValidate=$nbComUnvalidated/$nbCom;
        else $comValidate=0;
        $nbSaison = DB::table('episodes')->select("saison")->where('serie_id',$id)->max("saison");
        $res=[];
        for($i=0;$i<$nbSaison;$i++) {
            $tmpRes=[];
            $resRequest= DB::table('episodes')->select('urlImage')->where('serie_id', $id)->where('saison', $i)->get()->values()->pluck('urlImage');
            foreach ($resRequest as $test)
                $tmpRes[] = $test;
            $res[] = $tmpRes;
        }
        //echo implode($res)[2];
        return view("episode",["serie"=>$serie,"comments"=>$commentOfTheSerie,"moyenne"=>$comValidate*100,"filmId"=>$id,"nbSaison"=>$nbSaison,"allContent"=>$res]);
    }

    public function comments($id) {
        $comments = comments::all()->where('serie_id',$id);;
        return view('comments', ['comments' => $comments]);
    }

    public function avis($id) {
        $avis = comments::all()->where('serie_id',$id);;
        return view('comments', ['comments' => $avis]);
    }

    public function createCom()
    {
        return view('createCom');

    }
    public function modifiefilm($id){
        $content=series::find($id);
        return view('changeAvis',["content"=>$content]);
    }



}
