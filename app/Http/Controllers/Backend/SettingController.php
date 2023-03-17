<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class SettingController extends Controller
{
    //
    public function index()
    {
        return view('backend.setting', Setting::getSettings());
    }

    public function store(Request $request)
    {
        Setting::where('key', '!=', NULL)->delete();
        foreach ($request->except('_token') as $key => $value) {
            $setting = new Setting;
            $setting->key = $key;
            $setting->value = $request->$key;
            $setting->save();
        }
        return redirect()->route('admin.setting.index');
    }

    public function setwebhook(Request $request){
        $result=$this->sendTelegramData('setwebhook',[
            'query' => ['url'=>$request->url.'/'.\Telegram\Bot\Laravel\Facades\Telegram::getAccessToken()]
        ]);

        return redirect()->route('admin.setting.index')->with('status',$result);
    }


    public function getwebhookinfo()
    {
        $result=$this->sendTelegramData('getWebhookInfo');
        
        return redirect()->route('admin.setting.index')->with('status',$result);
    
    }


    public function sendTelegramData($route = '', $params = [], $method = 'POST')
    {
        $client = new \GuzzleHttp\Client(['base_uri' => 'https://api.telegram.org/bot' . \Telegram\Bot\Laravel\Facades\Telegram::getAccessToken() . '/']);
        $result = $client->request($method, $route, $params);
        return (string) $result->getBody();
    }
}
