<?php

namespace App\Http\Controllers;

use App\Models\ApplicationSetting;
use Illuminate\Http\Request;

class ApplicationSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timezone = $this->timeZones();
        $getLang = $this->getLang();
        $data = ApplicationSetting::find(1);
        return view('setting.application-setting', compact('data', 'timezone', 'getLang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ApplicationSetting $applicationSetting)
    {
        $request->validate([
            'item_name' => ['required', 'string', 'max:255'],
            'item_short_name' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255'],
            'company_email' => ['required', 'email', 'max:255'],
            'time_zone' => ['required', 'string', 'max:255'],
            'language' => ['required', 'string', 'max:255'],
            'company_address' => ['required', 'string', 'max:255'],
            'logo' => ['image', 'mimes:png', 'max:2048'],
            'favicon' => ['image', 'mimes:png', 'max:2048']
        ]);

        ApplicationSetting::updateOrCreate(['id' => "1"], [
            'item_name' => $request->item_name,
            'item_short_name' => $request->item_short_name,
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'company_email' => $request->company_email,
            'language' => $request->language,
            'time_zone' => $request->time_zone,
        ]);

        if ($request->hasFile('logo')) {
            $logo_text = $request->logo;
            $logo_text_new_name = 'logo-text.png';
            $logo_text->move('img/', $logo_text_new_name);
        }

        if ($request->hasFile('favicon')) {
            $favicon = $request->favicon;
            $favicon_new_name = 'favicon.png';
            $favicon->move('img/', $favicon_new_name);
        }

        return redirect()->route('application-settings.index')->withSuccess(trans('Application Settings Has Updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApplicationSetting $applicationSetting)
    {
        //
    }
}
