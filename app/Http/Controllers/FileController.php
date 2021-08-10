<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $files = File::paginate(20);
        return view('home')->with(['files' => $files]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file'
        ]);
        
        $file = $request->file('file');
        $name = $file->getClientOriginalName();
        $ext = $file->extension();
        $size = filesize($file);
        $path = $file->store('uploads');
        $user_id = Auth::id();

        //dd($path);
        File::create([
            'name' => $name,
            'ext' => $ext,
            'size' => $size,
            'user_id' => $user_id,
            'url' => $path
        ]);
        
        return redirect()->route('home')->with('success', 'Los datos se han guardado correctamente.');
    }

    public function destroy(File $file)
    {
        $file->delete();
        Storage::delete($file->url);
        
        return redirect()->route('home')->with('success', 'El archivo se ha eliminado!');
    }

    public function download(Request $request, File $file){
        return Storage::download($file->url, $file->name);
    }
}
