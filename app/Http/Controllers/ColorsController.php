<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\color;
use Illuminate\Http\Request;
use Exception;

class ColorsController extends Controller
{

    /**
     * Display a listing of the colors.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $colors = color::paginate(25);

        return view('colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new color.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('colors.create');
    }

    /**
     * Store a new color in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            color::create($data);

            return redirect()->route('colors.color.index')
                ->with('success_message', trans('colors.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('colors.unexpected_error')]);
        }
    }

    /**
     * Display the specified color.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $color = color::findOrFail($id);

        return view('colors.show', compact('color'));
    }

    /**
     * Show the form for editing the specified color.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $color = color::findOrFail($id);
        

        return view('colors.edit', compact('color'));
    }

    /**
     * Update the specified color in the storage.
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
            
            $color = color::findOrFail($id);
            $color->update($data);

            return redirect()->route('colors.color.index')
                ->with('success_message', trans('colors.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('colors.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified color from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $color = color::findOrFail($id);
            $color->delete();

            return redirect()->route('colors.color.index')
                ->with('success_message', trans('colors.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('colors.unexpected_error')]);
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
