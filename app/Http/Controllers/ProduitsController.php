<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\category as Category;
use App\Models\produit;
use App\Models\color;
use App\Models\size;
use Illuminate\Http\Request;
use Exception;
use App\Models\ordre;
class ProduitsController extends Controller
{

    /**
     * Display a listing of the produits.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $produits = produit::with('category')->paginate(25);

        return view('produits.index', compact('produits'));
    }

    /**
     * Show the form for creating a new produit.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->all();

        return view('produits.create', compact('categories'));
    }

    /**
     * Store a new produit in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

           $produit=  produit::create($data);
           $produit->colors()->attach($request->color);
           $produit->sizes()->attach($request->size);
            return redirect()->route('produits.produit.index')
                ->with('success_message', trans('produits.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('produits.unexpected_error')]);
        }
    }

    /**
     * Display the specified produit.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $produit = produit::with('category')->findOrFail($id);

        return view('produits.show', compact('produit'));
    }
    public function commande(Request $request)
    {

        $oreder = ordre::find($request->order);
        $produit = produit::with('category')->findOrFail($oreder->produit_id);
        $produit->color = color::findOrFail($oreder->color_id);
        $produit->size = size::findOrFail($oreder->size_id);
        $produit->quantity =$oreder->quantity ;
        return view('front.commande', compact('produit'));
    }

    /**
     * Show the form for editing the specified produit.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $produit = produit::findOrFail($id);
        $categories = Category::pluck('name','id')->all();

        return view('produits.edit', compact('produit','categories'));
    }

    /**
     * Update the specified produit in the storage.
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

            $produit = produit::findOrFail($id);
            $produit->update($data);
            $produit->colors()->detach();
            $produit->sizes()->detach();
            $produit->colors()->attach($request->color);

           $produit->sizes()->attach($request->size);
            return redirect()->route('produits.produit.index')
                ->with('success_message', trans('produits.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('produits.unexpected_error')]);
        }
    }

    /**
     * Remove the specified produit from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $produit = produit::findOrFail($id);
            $produit->delete();

            return redirect()->route('produits.produit.index')
                ->with('success_message', trans('produits.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('produits.unexpected_error')]);
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
                'name' => 'string|min:1|max:255|nullable',
            'name_ar' => 'string|min:1|nullable',
            'description' => 'string|min:1|max:1000|nullable',
            'description_ar' => 'string|min:1|max:1000|nullable',
            'price' => 'string|min:1|nullable',
            'photo' => ['file','nullable'],
            'category_id' => 'nullable',
        ];


        $data = $request->validate($rules);

        if ($request->has('custom_delete_photo')) {
            $data['photo'] = null;
        }
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->moveFile($request->file('photo'));
        }



        return $data;
    }

    /**
     * Moves the attached file to the server.
     *
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return string
     */
    protected function moveFile($file)
    {
        if (!$file->isValid()) {
            return '';
        }

        $path = config('laravel-code-generator.files_upload_path', 'uploads');
        $saved = $file->store('images',['disk' => 'public_uploads']);

        return  $saved;
    }
    public function details ($id)
    {
        $produit = produit::with('category')->findOrFail($id);

        return view('front.details', compact('produit'));
    }


}
