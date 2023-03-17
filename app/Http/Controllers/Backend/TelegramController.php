<?php

namespace App\Http\Controllers\Backend;

use Telegram\Bot\FileUpload\InputFile;
use App\Http\Controllers\Controller;
use App\Models\TelegramUser;
use Illuminate\Http\Request;
use \Telegram\Bot\Laravel\Facades\Telegram;
use Illuminate\Support\Str;



class TelegramController extends Controller
{
    //
    public function webhook()
    {
        try {
            //print_r(Telegram::getWebhookUpdates());

            if ($telegram = Telegram::getWebhookUpdates()['message']) {

                if (!TelegramUser::find($telegram['from']['id'])) {

                    $tele = json_encode($telegram['from']);
                    TelegramUser::create(json_decode($tele, true));
                }
                Telegram::commandsHandler(true);
            }
        } catch (\Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public function sendMessage()
    {
        return view('backend.sendMessage');
    }


    public function storeMessage(Request $request)
    {
        $request->validate([
            'message' => 'required'
        ]);

        $text = $request->message;
        $users = TelegramUser::all('id');
        foreach ($users as $user)
            Telegram::sendMessage([
                'chat_id' => $user['id'],
                'parse_mode' => 'HTML',
                'text' => $text
            ]);

        return redirect()->back();
    }


    public function storePhoto(Request $request)
    {
        $request->validate([
            'file' => 'file|mimes:jpeg,png,gif'
        ]);

        $photo = $request->file('file');

        $text = $request->message;
        $users = TelegramUser::all('id');
        foreach ($users as $user)
            Telegram::sendPhoto([
                'chat_id' => $user['id'],
                'parse_mode' => 'HTML',
                'photo' => InputFile::createFromContents(file_get_contents($photo->getRealPath()), Str::random(10) . '.' . $photo->getClientOriginalExtension()),
                'caption' => $request->caption
            ]);


        // Telegram::sendPhoto([
        //     'chat_id' => $request->chat_id,
        //     'photo' => InputFile::createFromContents(file_get_contents($photo->getRealPath()), Str::random(10) . '.' . $photo->getClientOriginalExtension()),
        //     'caption' => $request->caption
        // ]);

        return redirect()->back();
    }
}
