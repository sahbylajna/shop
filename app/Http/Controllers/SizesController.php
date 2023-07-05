<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\size;
use Illuminate\Http\Request;
use Exception;

class SizesController extends Controller
{

    /**
     * Display a listing of the sizes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sizes = size::paginate(25);

        return view('sizes.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new size.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('sizes.create');
    }

    /**
     * Store a new size in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            size::create($data);

            return redirect()->route('sizes.size.index')
                ->with('success_message', trans('sizes.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('sizes.unexpected_error')]);
        }
    }

    /**
     * Display the specified size.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $size = size::findOrFail($id);

        return view('sizes.show', compact('size'));
    }

    /**
     * Show the form for editing the specified size.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $size = size::findOrFail($id);
        

        return view('sizes.edit', compact('size'));
    }

    /**
     * Update the specified size in the storage.
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
            
            $size = size::findOrFail($id);
            $size->update($data);

            return redirect()->route('sizes.size.index')
                ->with('success_message', trans('sizes.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('sizes.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified size from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $size = size::findOrFail($id);
            $size->delete();

            return redirect()->route('sizes.size.index')
                ->with('success_message', trans('sizes.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('sizes.unexpected_error')]);
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
            'valeur' => 'string|min:1|nullable', 
        ];

        
        $data = $request->validate($rules);




        return $data;
    }

}
