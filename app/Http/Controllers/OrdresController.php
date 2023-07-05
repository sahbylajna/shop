<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\color as Color;
use App\Models\prouduit as Produit;
use App\Models\Size;
use App\Models\ordre;
use Illuminate\Http\Request;
use Exception;

class OrdresController extends Controller
{

    /**
     * Display a listing of the ordres.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $ordres = ordre::with('produit','color','size')->paginate(25);

        return view('ordres.index', compact('ordres'));
    }

    /**
     * Show the form for creating a new ordre.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $produits = Produit::pluck('name','id')->all();
$colors = Color::pluck('name','id')->all();
$sizes = Size::pluck('name','id')->all();

        return view('ordres.create', compact('produits','colors','sizes'));
    }

    /**
     * Store a new ordre in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            ordre::create($data);

            return redirect()->route('ordres.ordre.index')
                ->with('success_message', trans('ordres.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ordres.unexpected_error')]);
        }
    }

    /**
     * Display the specified ordre.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $ordre = ordre::with('produit','color','size')->findOrFail($id);

        return view('ordres.show', compact('ordre'));
    }

    /**
     * Show the form for editing the specified ordre.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $ordre = ordre::findOrFail($id);
        $produits = Produit::pluck('name','id')->all();
$colors = Color::pluck('name','id')->all();
$sizes = Size::pluck('name','id')->all();

        return view('ordres.edit', compact('ordre','produits','colors','sizes'));
    }

    /**
     * Update the specified ordre in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $ordre = ordre::findOrFail($id);
            $ordre->update($data);

            return redirect()->route('ordres.ordre.index')
                ->with('success_message', trans('ordres.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ordres.unexpected_error')]);
        }
    }

    /**
     * Remove the specified ordre from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $ordre = ordre::findOrFail($id);
            $ordre->delete();

            return redirect()->route('ordres.ordre.index')
                ->with('success_message', trans('ordres.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ordres.unexpected_error')]);
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'produit_id' => 'nullable',
            'color_id' => 'nullable',
            'size_id' => 'nullable',
            'etat' => 'nullable',
            'quantity' => 'string|min:1|nullable',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
