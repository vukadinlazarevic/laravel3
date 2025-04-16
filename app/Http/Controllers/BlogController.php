<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        return view("blogs.list", [
            "blogovi" => Blog::all(),
        ]);
    }

    public function create() {
        return view("blogs.create");
    }

    public function store(Request $request) {
        // $naslov = $request->naslov;
        // $sadrzaj = $request->sadrzaj;

        if (empty($request->naslov) or empty($request->sadrzaj)) {
            return redirect()->back()->with("error", "Naslov i sadrzaj su obavezni!");
        }

        Blog::create([
            "naslov" => $request->naslov,
            "sadrzaj" => $request->sadrzaj,
        ]); // mozemo i ovako da sacuvamo podatak u bazu

        // kada smo sacuvali novi blog, vratimo korisnika na pocetnu (index) rutu
        return redirect(url("/"))->with("success", "Blog je uspesno kreiran i sacuvan u bazi.");
    }

    public function edit($id) {
        $blog = Blog::find($id);
        return view("blogs.edit", [
            "blog" => $blog
        ]);
    }

    public function update(Request $request, $id) {
        if (empty($request->naslov) or empty($request->sadrzaj)) {
            return redirect()->back()->with("error", "Naslov i sadrzaj su obavezni!");
        }

        $blog = Blog::find($id);
        $blog->naslov = $request->naslov;
        $blog->sadrzaj = $request->sadrzaj;
        $blog->save(); // sacuvamo izmene

        return redirect(url("/"))->with("info", "Blog je uspesno izmenjen!");
    }

    public function delete($id) {
        return view("blogs.delete", [
            "id" => $id,
            "blog" => Blog::findOrFail($id),
        ]);
    }

    public function destroy($id) {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect(url("/"))->with("success", "Blog je uspesno obrisan iz baze!");
    }
}
