<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KeywordController extends Controller
{
    public function index()
    {
        return response()->json(Keyword::all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:keywords,name',
        ]);

        $keyword = Keyword::create($data);
        return response()->json($keyword, Response::HTTP_CREATED);
    }
}
