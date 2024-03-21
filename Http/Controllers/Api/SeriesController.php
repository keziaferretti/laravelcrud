<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use GuzzleHttp\Psr7\Request;

class SeriesController extends Controller
{

    public function index()
    {
        return Series::all();
    }

    public function store(SeriesFormRequest $request)
    {
        return Series::create($request->all());
    }

    public function show(Series $series)
    {
        return $series;
    }

    public function update(SeriesFormRequest $request, $id)
    {
       $series = Series::findOrFail($id);
    $series->update($request->input());
       return $series;
    }

    public function destroy(int $series)
    {
        Series::destroy($series);
        return response()->noContent();
    }
}
