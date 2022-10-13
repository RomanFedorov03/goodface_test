<?php

namespace App\Http\Controllers;

use App\Services\Mankind;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @var Mankind
     */
    public $mankind;

    public function __construct(Mankind $mankind){
        $this->mankind = $mankind;
    }
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('welcome')
            ->with([
                'persons' => $this->mankind->get(),
                'sexPercent' => $this->mankind->sexPercent(),
            ]);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function personById($id)
    {
        return view('pages.person')
            ->with([
                'person' => $this->mankind->getById($id),
            ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function loadCSV(Request $request): RedirectResponse
    {
        $this->mankind->loadCSV($request);
        return redirect()->back();
    }
}
