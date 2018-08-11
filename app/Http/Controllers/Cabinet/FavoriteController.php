<?php


namespace App\Http\Controllers\Cabinet;


use App\Entity\Adverts\Advert\Advert;
use App\Http\Controllers\Controller;
use App\UseCases\Adverts\FavoriteService;

class FavoriteController extends Controller
{
    private $service;

    public function __controller(FavoriteService $service)
    {
        $this->service = $service;
        $this->middleware('auth');
    }

    public function index()
    {
        $adverts = Advert::favoredByUser(Auth::user()->orderByDesc('id')->paginate(20));

        return view('cabinet.favorites.index', compact('adverts'));
    }

    public function remove(Advert $advert)
    {
        try {
            $this->service->remove(Auth::id(), $advert->id);
        } catch (\DomainException $exception) {
            return back()->with('error', $exception->getMessage());
        }

        return redirect()->route('cabinet.favorites.index');
    }
}