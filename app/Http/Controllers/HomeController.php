<?php

namespace App\Http\Controllers;

use App\Models\Roof;
use App\Models\Roofelement;
use App\Models\Formroof;
use App\Models\Tube;
use App\Models\Trusssystem;
use App\Models\Obreshetka;
use App\Models\Paint;
use App\Models\Accessorie;
use App\Models\Montach;
use App\Models\Dopmaterial;
use App\Models\Requisite;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $formroofs = Formroof::orderBy('order')->get(); // форма покрытия
        $roofs = Roof::all(); // покрытие
        $roofelements = Roofelement::all(); //элементы покрытие
        //
        $tube1 = Tube::where('type', '1')->get(); //столбы


        $rigel_types = config('rigel'); // тип ригеля

        $type_trus = config('trus');
        $trus1 = Trusssystem::where('type', '1')->get(); //стропильная система фермы
        $trus2 = Trusssystem::where('type', '2')->get(); //стропильная система стропила
        $obreshetka = Obreshetka::orderBy('order')->get(); // обрешетка


        $paints = Paint::all(); // краска
        $montach = Montach::all();
        $dopmaterials = Dopmaterial::all();

        $service_config = config('service');
        return view('home', [
            'formroofs' => $formroofs,
            'roofelements' => $roofelements,
            'roofs' => $roofs,

            'tube1' => $tube1,

            'rigel_types' => $rigel_types,


            'type_trus' => $type_trus,

            'trus1' => $trus1,
            'trus2' => $trus2,

            'obreshetka' => $obreshetka,

            'paints' => $paints,
            'montach' => $montach,
            'dopmaterials' => $dopmaterials,
            'service_config' => $service_config
        ]);
    }

    public function getAcc(Request $request)
    {
        $id = $request->id;
        $roof = Roof::find($id);
        return response()->json($roof->accessories);
    }

    public function getPhotos(Request $request)
    {
        $default = '/img/home/1.png';
        $url = env('APP_URL') . '/';
        $res = [];
        $roof_id = $request->roof_id;
        $formroof_id = $request->formroof_id;
        $photos = \DB::table('photos')->where('roof_id', $roof_id)
            ->where('formroof_id', $formroof_id)
            ->get();
        if ($photos->isNotEmpty()) {
            foreach ($photos as $photo) {
                $value = $photo->gallery;
                $images = json_decode($photo->gallery);
                foreach ($images as $image) {
                    $res[] = $url . $image;
                }
            }
        } else {
            $res[] = $default;
        }
        return response()->json($res);
    }

    // типы ригеля
    public function getTypeRigel()
    {

        $tube2 = Tube::where('type', '2')->get(); // ригеля
        $type_rigel1 = []; //боковая балка
        $type_rigel2 = []; //боковая ферма
        foreach ($tube2 as $item) {
            if ($item->type_rigel == 1) {
                $type_rigel1[] = [
                    'id' => $item->id,
                    'title' => $item->title,
                ];
            } else {
                $type_rigel2[] = [
                    'id' => $item->id,
                    'title' => $item->title,
                ];
            }
        }
        return response()->json([
            'type_rigel1' => $type_rigel1,
            'type_rigel2' => $type_rigel2,
        ]);
    }

    // данные для pdf
    public function dataPDF()
    {
        $requisite = Requisite::all();

        $tube1 = Tube::where('type', '1')->get(['id', 'title']); //столбы
        $rigel_types = config('rigel'); // тип ригеля
        $tube2 = Tube::where('type', '2')->get(['id', 'title']); // ригеля

        $type_trus = config('trus');
        $trus = Trusssystem::all(['id', 'title']); //стропильная система фермы

        $obreshetka = Obreshetka::all(['id', 'title']); // обрешетка

        $roofelements = Roofelement::all(); //элементы покрытие
        $roofelements_res = collect();
        foreach ($roofelements as $roofelement) {
            $roofelements_res->push([
                'id' => $roofelement->id,
                'title' => $roofelement->roof->title . ' ' . $roofelement->title,
                'price' => $roofelement->price
            ]);
        }

        $paints = Paint::all(['id', 'title','price']);// краска

        $accessories=Accessorie::all(['id', 'title','price']);// аксесуары

        $montachs = Montach::all(['id', 'title','price']);

        $dopmaterials = Dopmaterial::all(); // дополнительные материалы

        return response()->json([
            'tube1' => $tube1,
            'rigel_types' => $rigel_types,
            'tube2' => $tube2,
            'type_trus' => $type_trus,
            'trus' => $trus,
            'obreshetka' => $obreshetka,
            'roofelements' => $roofelements_res,
            'paints'=>$paints,
            'accessories'=>$accessories,
            'montachs'=>$montachs,// монтаж
            'dopmaterials'=>$dopmaterials,

            'requisite' => $requisite,
        ]);
    }
}
