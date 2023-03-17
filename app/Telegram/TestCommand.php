<?php

namespace App\Telegram;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;
use \Telegram\Bot\Laravel\Facades\Telegram;


/**
 * Class TestCommand.
 */
class TestCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'cry_for_help';

    /**
     * @var array Command Aliases
     */
    //protected $aliases = ['listcommands'];

    /**
     * @var string Command Description
     */
    protected $description = 'cry_for_help command, Get a list of commands';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
       /* $this->replyWithChatAction(['action'=>Actions::TYPING]);

        $user=\App\Models\User::find(1);
        //$commands = $this->telegram->getCommands();

        $this->replyWithMessage(['text'=>'contact with me : '.$user->email]);

        $telegram_user=Telegram::getWebhookUpdates()['message'];
        $text=sprintf('%s: %s'.PHP_EOL, 'Sender id',$telegram_user['from']['id']);
        //$text.=sprintf('%s: %s'.PHP_EOL,'Sender Name',$telegram_user['from']['username']);

        $keyboard = [
            ['7', '8', '9'],
            ['4', '5', '6'],
            ['1', '2', '3'],
                 ['0']
        ];
        
        $reply_markup = Keyboard::make([
            'keyboard' => $keyboard, 
            'resize_keyboard' => true, 
            'one_time_keyboard' => true
        ]);
        
        $response = Telegram::sendMessage([
            'chat_id' => $telegram_user['from']['id'], 
            'text' => 'Hello World', 
            'reply_markup' => $reply_markup
        ]);
        
        $messageId = $response->getMessageId();
        
        //$text = '';
        /*foreach ($commands as $name => $handler) {
            /* @var Command $handler 
            /*$text .= sprintf('/%s - %s'.PHP_EOL, $name, $handler->getDescription());
        }*/

       // $this->replyWithMessage(compact('text'));
    }
}
