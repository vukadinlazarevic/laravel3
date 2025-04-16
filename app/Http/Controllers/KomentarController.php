<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function list() {
        return view("komentars.list", [
            "komentari" => Komentar::all(),
        ]);
    }

    public function create() {
        return view("komentars.create", [
            "blogovi" => Blog::all(),
        ]);
    }

    public function store(Request $request) {
        if (empty($request->blog_id) or empty($request->komentar)) {
            return redirect()->back()->with("error", "Morate izabrati blog i uneti komentar!");
        }

        Komentar::create([
            "komentar" => $request->komentar,
            "blog_id" => $request->blog_id,
        ]);

        return redirect()->route("komentari.list")->with("success", "Uspesno dodat novi komentar!");
    }
}
