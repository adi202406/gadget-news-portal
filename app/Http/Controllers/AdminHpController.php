<?php

namespace App\Http\Controllers;

use App\Models\Hp;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;


class AdminHpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.hp.index', [
            'title' => 'Dashboard Category Admin',
            "hps"=> Hp::paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.hp.create', [
            'hp' => Hp::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => ['required'],
            'slug' => ['required', 'unique:hps'],
            'tanggalRilis' => ['required'],
            'harga' => ['required'],
            'jaringan' => ['required'],
            'dimensi' => ['required'],
            'berat' => ['required'],
            'ukuranLayar' => ['required'],
            'refreshRate' => ['required'],
            'resolusi' => ['required'],
            'proteksiLayar' => ['required'],
            'chipset' => ['required'],
            'cpu' => ['required'],
            'gpu' => ['required'],
            'ram' => ['required'],
            'memori' => ['required'],
            'kameraBelakang' => ['required'],
            'kameraMpBelakang' => ['required'],
            'kameraDepan' => ['required'],
            'kameraMpDepan' => ['required'],
            'bluetooth' => ['required'],
            'infrared' => ['required'],
            'nfc' => ['required'],
            'gps' => ['required'],
            'usb' => ['required'],
            'jenisBaterai' => ['required'],
            'kapasitasBaterai' => ['required'],
            'fiturCas' => ['required'],
            'os' => ['required'],
            'warna' => ['required'],
            'speaker' => ['required'],
            'link' => ['required']
        ]);

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('post-images');
            // $img = $request->file('image')->store('post-images');
            // $imgSplit = explode('/', $img);
            // $validateData['image'] = $imgSplit[1];
        }

        $validateData['user_id'] = auth()->user()->id;

        Hp::create($validateData);

        return redirect('/dashboard/hp')->with('success', 'Hp Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hp $hp)
    {
        return view('dashboard.hp.show',[
            'hp' => $hp,
            // 'title' => $hp->title
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($title)
    {
        $hp = Hp::where('title', $title)->firstOrFail();
        return view('dashboard.hp.edit', [
            'hp' => $hp,
            'hps' => Hp::all()
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hp $hp)
    {
        $rules =[
            'title' => ['required'],
            'tanggalRilis' => ['required'],
            'harga' => ['required'],
            'jaringan' => ['required'],
            'dimensi' => ['required'],
            'berat' => ['required'],
            'ukuranLayar' => ['required'],
            'refreshRate' => ['required'],
            'resolusi' => ['required'],
            'proteksiLayar' => ['required'],
            'chipset' => ['required'],
            'cpu' => ['required'],
            'gpu' => ['required'],
            'ram' => ['required'],
            'memori' => ['required'],
            'kameraBelakang' => ['required'],
            'kameraMpBelakang' => ['required'],
            'kameraDepan' => ['required'],
            'kameraMpDepan' => ['required'],
            'bluetooth' => ['required'],
            'infrared' => ['required'],
            'nfc' => ['required'],
            'gps' => ['required'],
            'usb' => ['required'],
            'jenisBaterai' => ['required'],
            'kapasitasBaterai' => ['required'],
            'fiturCas' => ['required'],
            'os' => ['required'],
            'warna' => ['required'],
            'speaker' => ['required'],
        ];

        

        if($request->slug != $hp->slug){
            $rules['slug'] = ['required','unique:hps'];
        }

        $validateData =  $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-images');
            // $img = $request->file('image')->store('post-images');
            // $imgSplit = explode('/', $img);
            // $validateData['image'] = $imgSplit[1];
        }


        $validateData['user_id'] = auth()->user()->id;

        Hp::where('id', $hp->id)
            ->update($validateData);

        return redirect('/dashboard/hp')->with('success', 'Hp Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hp $hp)
    {
        Hp::destroy($hp->id);
        return redirect('/dashboard/hp')->with('success', 'Hp Berhasil Dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Hp::class, 'slug', $request->title);
        return response()-> json(['slug' => $slug]);
    }
}
