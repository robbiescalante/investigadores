<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Investigator;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class InvestigatorController extends Controller
{
    public function index()
    {
        if(Request::get('filtercategory')){

            $checked = $_GET['filtercategory'];
            $ids = DB::table('category_investigator')
            ->whereIn('category_id', $checked)
            ->pluck('investigator_id');

            if(Request::get('filtertag')){

                $checked1 = $_GET['filtertag'];
                $idss = DB::table('investigator_tag')
                ->whereIn('tag_id', $checked1)
                ->pluck('investigator_id');

                $investigators = Investigator::orderBy('name', 'asc')
                ->filter(request(['search']))
                ->join('titles', 'titles.id', '=', 'investigators.title_id')
                ->whereIn('investigators.id', ($ids))
                ->WhereIn('investigators.id', $idss)
                ->paginate(4);

            } else {

                $investigators = Investigator::orderBy('name', 'asc')
                ->filter(request(['search']))
                ->join('titles', 'titles.id', '=', 'investigators.title_id')
                ->whereIn('investigators.id', ($ids))
                ->paginate(4);

            }

        } else if(Request::get('filtertag')) {

            $checked1 = $_GET['filtertag'];
            $idss = DB::table('investigator_tag')
            ->whereIn('tag_id', $checked1)
            ->pluck('investigator_id');

            $investigators = Investigator::orderBy('name', 'asc')
                ->filter(request(['search']))
                ->join('titles', 'titles.id', '=', 'investigators.title_id')
                ->whereIn('investigators.id', ($idss))
                ->paginate(4);

        } else {

            $investigators = Investigator::orderBy('name', 'asc')
            ->filter(request(['search']))
            ->join('titles', 'titles.id', '=', 'investigators.title_id')
            ->paginate(4)
            ->withQueryString();
        }

        //$categories = Category::all();
        $categories = DB::table('category_investigator as ci')
                        ->join('categories as c', 'c.id', '=', 'ci.category_id')
                        ->select('c.id', 'c.name', DB::raw('count(*) as Total'))
                        ->groupBy('ci.category_id', 'c.id', 'c.name')
                        ->orderBy('Total', 'desc')
                        ->get();

        //$tags = Tag::all();
        $tags = DB::table('investigator_tag as it')
                        ->join('tags as t', 't.id', '=', 'it.tag_id')
                        ->select('t.id', 't.name', DB::raw('count(*) as Total'))
                        ->groupBy('it.tag_id', 't.id', 't.name')
                        ->orderBy('Total', 'desc')
                        ->get();

        return view('investigators.index', [
            'investigators' => $investigators,
            'categories' => $categories,
            'tags' => $tags,
        ]);


    return view('investigators.index', compact('investigators', 'tags', 'categories'));
    }

    public function show(Investigator $investigator)
    {
        $categories = Category::all();
        /*
        $licenciatura = DB::table('studies as s')
        ->join('study_investigator as si', 'si.study_id', '=', 's.id')
        ->join('investigators as i', 'si.investigator_id', '=', 'i.id')
        ->where('i.id', '=', $investigator->id)
        ->where('s.level', 'LIKE', 'Licenciatura')
        ->orderBy('s.id', 'asc')
        ->get();

        $maestria = DB::table('studies as s')
        ->join('study_investigator as si', 'si.study_id', '=', 's.id')
        ->join('investigators as i', 'si.investigator_id', '=', 'i.id')
        ->where('i.id', '=', $investigator->id)
        ->where('s.level', 'LIKE', 'Maestría')
        ->orderBy('s.id', 'asc')
        ->get();

        $doctorado = DB::table('studies as s')
        ->join('study_investigator as si', 'si.study_id', '=', 's.id')
        ->join('investigators as i', 'si.investigator_id', '=', 'i.id')
        ->where('i.id', '=', $investigator->id)
        ->where('s.level', 'LIKE', 'Doctorado')
        ->orderBy('s.id', 'asc')
        ->get();
        */
        $estudios = DB::table('studies as s')
        ->join('study_investigator as si', 'si.study_id', '=', 's.id')
        ->join('investigators as i', 'si.investigator_id', '=', 'i.id')
        ->where('i.id', '=', $investigator->id)
        ->orderBy('s.id', 'asc')
        ->get();

        $capitulos = DB::table('capitulos_libros as cl')
        ->join('capitulos_libros_investigator as cli', 'cl.id', '=', 'cli.capitulos_libro_id')
        ->join('investigators as i', 'i.id', '=', 'cli.investigator_id')
        ->where('i.id', '=', $investigator->id)
        ->orderBy('cl.id', 'asc')
        ->get();

        $title = DB::table('titles')
        ->where('id', '=', $investigator->title_id)
        ->first();

        return view('investigators.show', [
            //'licenciatura' => $licenciatura,
            //'maestria' => $maestria,
            //'doctorado' => $doctorado,
            'estudios'  => $estudios,
            'investigator' => $investigator,
            'categories' => $categories,
            'capitulos' => $capitulos,
            'title' => $title,
        ]);
    }

    public function home(){

        return view('investigators.home', [

        ]);

    }
}

