<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SmtpSetting;
use App\Models\SiteSettings;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class SettingController extends Controller
{
    public function SmtpSetting(){
        $smtp = SmtpSetting::find(1);
        return view('admin.backend.setting.smtp_update',compact('smtp'));
    }

    public function UpdateSmtp(Request $request){

        $smtpId = $request->id;

        SmtpSetting::find($smtpId)->update([
            'mailer' => $request->mailer,
            'host' => $request->host,
            'port' => $request->port,
            'username' => $request->username,
            'password' => $request->password,
            'encryption' => $request->encryption,
            'from_address' => $request->from_address
        ]);


        $notification = array(
            'message' => 'Smtp Setting updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }

    public function SiteSetting(){
        $site = SiteSettings::find(1);
        return view('admin.backend.site.site_update',compact('site'));
    }

    public function UpdateSite(Request $request){

        $site_id = $request->id;
        $item = SiteSettings::find($site_id);
        $img = $item->logo;

        if($request->hasFile('logo')){
            // unlink('public/'.$img);
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(140,41)->save('public/upload/site/'.$name_gen);
            $save_url = 'upload/site/'.$name_gen;

            SiteSettings::find($site_id)->update(
                [
                    'phone'=> $request->phone,
                    'email'=> $request->email,
                    'address'=> $request->address,
                    'facebook'=> $request->facebook,
                    'twitter'=> $request->twitter,
                    'copyright'=> $request->copyright,
                    'logo' => $save_url,
                    'updated_at' => Carbon::now()
                ]
            );
            $notification = array(
                'message' => 'Site Setting Updated with Image Successfully',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);

        } else{
            SiteSettings::find($site_id)->update(
                [
                   'phone'=> $request->phone,
                    'email'=> $request->email,
                    'address'=> $request->address,
                    'facebook'=> $request->facebook,
                    'twitter'=> $request->twitter,
                    'copyright'=> $request->copyright,
                    'updated_at' => Carbon::now()
                ]
            );
            $notification = array(
                'message' => 'Site Setting Updated without Image Successfully',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    }

}
