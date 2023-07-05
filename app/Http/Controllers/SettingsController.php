<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\setting;
use Illuminate\Http\Request;
use Exception;

class SettingsController extends Controller
{

    /**
     * Display a listing of the settings.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $setting = setting::latest()->first();

        if($setting == null){
            $setting = new setting();
            $setting->save();
        }


        return view('settings.edit', compact('setting'));
    }

    /**
     * Show the form for creating a new setting.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {


        return view('settings.create');
    }

    /**
     * Store a new setting in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            setting::create($data);

            return redirect()->route('settings.setting.index')
                ->with('success_message', trans('settings.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('settings.unexpected_error')]);
        }
    }

    /**
     * Display the specified setting.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $setting = setting::findOrFail($id);

        return view('settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified setting.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $setting = setting::findOrFail($id);


        return view('settings.edit', compact('setting'));
    }

    /**
     * Update the specified setting in the storage.
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

            $setting = setting::findOrFail($id);
            $setting->update($data);

            return redirect()->route('settings.setting.index')
                ->with('success_message', trans('settings.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('settings.unexpected_error')]);
        }
    }

    /**
     * Remove the specified setting from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $setting = setting::findOrFail($id);
            $setting->delete();

            return redirect()->route('settings.setting.index')
                ->with('success_message', trans('settings.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('settings.unexpected_error')]);
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
                'phone' => 'string|min:1|nullable',
            'email' => 'nullable',
            'whatsapp' => 'string|min:1|nullable',
        ];


        $data = $request->validate($rules);




        return $data;
    }

}
