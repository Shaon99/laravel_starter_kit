<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Validation\Rule;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'General Setting';
        $data['navGeneralSettingsActiveClass'] = 'active';
        $data['subNavGeneralSettingsActiveClass'] = 'active';
        $data['general'] = GeneralSetting::first();

        return view('backend.setting.general_setting')->with($data);
    }

    public function generalSettingUpdate(Request $request)
    {
      
        $general = GeneralSetting::first();

        $request->validate([
            'sitename' => 'required',
            'site_currency' => 'required|max:10',
            'logo' => [Rule::requiredIf(function () use ($general) {
                return $general == null;
            }), 'image', 'mimes:jpg,png,jpeg'],
            'icon' => [Rule::requiredIf(function () use ($general) {
                return $general == null;
            }), 'image', 'mimes:jpg,png,jpeg'],
            'login_image' => [Rule::requiredIf(function () use ($general) {
                return $general == null;
            }), 'image', 'mimes:jpg,png,jpeg'],
        ]);

        if ($request->has('logo')) {
            $path = filePath('logo');

            $logo = uploadImage($request->logo, $path,'',@$general->logo);
        }

        if ($request->has('icon')) {
            $path = filePath('icon');
            $icon = uploadImage($request->icon, $path,'',@$general->favicon);
        }

        if ($request->has('login_image')) {
            $path = filePath('login');
            $size = '';
            $login_image = uploadImage($request->login_image, $path, $size, @$general->login_image);

        }

        if ($request->has('frontend_login_image')) {
            $path = filePath('frontendlogin');
            $size = '';
            $frontend_login_image = uploadImage($request->frontend_login_image, $path, $size, @$general->frontend_login_image);
        } 
        
        if ($request->has('breadcrumbs')) {
            $path = filePath('breadcrumbs');
            $size = '';
            $breadcrumbs = uploadImage($request->breadcrumbs, $path, $size, @$general->breadcrumbs);
        }
       

        if ($request->has('default')) {

            $default = 'default' . '.' . $request->default->getClientOriginalExtension();

            $request->default->move(filePath('default'), $default);
        }
        

        GeneralSetting::updateOrCreate([
            'id' => 1
        ], [
            'sitename' => $request->sitename,
            'site_currency' => $request->site_currency,
            'user_reg' => $request->user_reg == 'on' ? 1 : 0,
            'is_email_verification_on' => $request->is_email_verification_on == 'on' ? 1 : 0,
            'is_sms_verification_on' => $request->is_sms_verification_on == 'on' ? 1 : 0,
            'logo' => isset($logo) ? ($logo ?? '') : GeneralSetting::first()->logo,
            'favicon' => isset($icon) ? ($icon ?? '') : GeneralSetting::first()->favicon,
            'login_image' => isset($login_image) ? ($login_image ?? '') : GeneralSetting::first()->login_image,
            'primary_color' =>  $request->primary_color ?? '',           
            'copyright' => $request->copyright,
            'timezone' => $request->timezone,
            'map_link' => $request->map_link,
            'frontend_login_image' => isset($frontend_login_image) ? ($frontend_login_image ?? '') : GeneralSetting::first()->frontend_login_image,
            'breadcrumbs' => isset($breadcrumbs) ? ($breadcrumbs ?? '') : GeneralSetting::first()->breadcrumbs,
            'default_image' => isset($default) ? ($default ?? '') : GeneralSetting::first()->default_image,

        
        ]);

        $this->updateTimeZone($request->timezone);

        $notify[] = ['success', 'General setting has been updated.'];
        return back()->withNotify($notify);
    }


    protected function updateTimeZone($data)
    {
        $timezone = config_path('timezone.php');

        $content = '';

        $content .= '<?php $timezone = ' . '"' . $data . '"' . '?>';

        file_put_contents($timezone, $content);
    }



    public function analytics()
    {
        $data['pageTitle'] = 'Google Analytics Setting';
        $data['navGeneralSettingsActiveClass'] = 'active';
        $data['subNavAnalyticsActiveClass'] = 'active';
        $data['general'] = GeneralSetting::first();

        return view('backend.setting.analytics')->with($data);
    }

    public function analyticsUpdate(Request $request)
    {
        $general = GeneralSetting::first();

        $data = $request->validate([
            'analytics_key' => 'required',
            'analytics_status' => 'required'
        ]);

        $general->update($data);


        $notify[] = ['success', "Analytics Updated Successfully"];

        return redirect()->back()->withNotify($notify);
    }

    public function cookieConsent()
    {
        $data['pageTitle'] = 'Cookie Consent';
        $data['navGeneralSettingsActiveClass'] = 'active';
        $data['subNavCookieActiveClass'] = 'active';
        $data['cookie'] = GeneralSetting::first();

        return view('backend.setting.cookie')->with($data);
    }

    public function cookieConsentUpdate(Request $request)
    {
        $data = $request->validate([
            'allow_modal' => 'required|integer',
            'button_text' => 'required|max:100',
            'cookie_text' => 'required'
        ]);

        GeneralSetting::updateOrCreate(['id' => 1], $data);

        $notify[] = ['success', "Cookie Consent Updated Successfully"];

        return redirect()->back()->withNotify($notify);
    }

    public function recaptcha()
    {
        $data['pageTitle'] = 'Google Recaptcha';
        $data['navGeneralSettingsActiveClass'] = 'active';
        $data['subNavRecaptchaActiveClass'] = 'active';

        $data['recaptcha'] = GeneralSetting::first();

       

        return view('backend.setting.recaptcha')->with($data);
    }

    public function recaptchaUpdate(Request $request)
    {
        $data = $request->validate([
            'allow_recaptcha' => 'required',
            'recaptcha_key' => 'required',
            'recaptcha_secret' => 'required'
        ]);

        GeneralSetting::updateOrCreate(['id' => 1], $data);

        $notify[] = ['success', "Recaptcha Updated Successfully"];

        return redirect()->back()->withNotify($notify);
    }

    public function liveChat()
    {
        $data['pageTitle'] = 'Twak To Live Chat Setting';
        $data['navGeneralSettingsActiveClass'] = 'active';
        $data['subNavLiveChatActiveClass'] = 'active';
        $data['twakto'] = GeneralSetting::first();

        return view('backend.setting.twakto')->with($data);
    }

    public function liveChatUpdate(Request $request)
    {
        $data = $request->validate([
            'twak_allow' => 'required',
            'twak_key' => 'required'
        ]);

        $twak = GeneralSetting::first();

        $twak->update($data);

        $notify[] = ['success', "Twak Updated Successfully"];

        return redirect()->back()->withNotify($notify);
    }


    public function databaseBackup()
    {
        $mysqlHostName      = env('DB_HOST');
        $mysqlUserName      = env('DB_USERNAME');
        $mysqlPassword      = env('DB_PASSWORD');
        $DbName             = env('DB_DATABASE');

        $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword", array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();

        $output = '';
        foreach ($result as $table) {

            $show_table_query = "SHOW CREATE TABLE " . $table[0] . "";
            $statement = $connect->prepare($show_table_query);
            $statement->execute();
            $show_table_result = $statement->fetchAll();

            foreach ($show_table_result as $show_table_row) {
                $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
            }
            $select_query = "SELECT * FROM " . $table[0] . "";
            $statement = $connect->prepare($select_query);
            $statement->execute();
            $total_row = $statement->rowCount();

            for ($count = 0; $count < $total_row; $count++) {
                $single_result = $statement->fetch(\PDO::FETCH_ASSOC);

                $table_column_array = array_keys($single_result);
                $table_value_array = array_values($single_result);
                $output .= "\nINSERT INTO $table[0] (";
                $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
                $output .= "'" . implode("','", $table_value_array) . "');\n";
            }
        }
        $file_name = 'database_backup_on_' . date('y-m-d') . '.sql';
        $file_handle = fopen($file_name, 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        unlink($file_name);
    }

    public function cacheClear()
    {

        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('optimize:clear');

        return back()->with('success', 'Caches cleared successfully!');
    }
}
