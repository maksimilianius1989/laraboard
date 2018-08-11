<?php


namespace App\Http\Controllers\Adverts;


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

    public function add(Advert $advert)
    {
        try {
            $this->service->add(\Auth::id(), $advert->id);
        } catch (\DomainException $exception) {
            return back()->with('error', $exception->getMessage());
        }

        return redirect()->route('advert.show', $advert)->with('success', 'Advert is added to your favorites.');
    }

    public function remove(Advert $advert)
    {
        try {
            $this->service->remove(\Auth::id(), $advert->id);
        } catch (\DomainException $exception) {
            return back()->with('error', $exception->getMessage());
        }

        return redirect()->route('adverts.show', $advert);
    }
}