<?php

namespace App;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class Telegram
{
    private $url = 'https://api.telegram.org/';
    const BOT_TOKEN = '6408950608:AAGYsWUHDViiIDbu1uX8Zlxh8W2ZYbast60';
    const CHAT_ID = '@click_uz_test';
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->url . 'bot' . self::BOT_TOKEN . '/',
        ]);
    }


    public function sendDocument()
    {
        $f_path = storage_path() . "/app/backup/backup-" . now()->modify('-1 day')->format('Y-m-d')  . ".sql";

        $this->client->post('sendDocument', [
            'multipart' => [
                ['name' => 'chat_id', 'contents' => self::CHAT_ID],
                [
                    'name' => 'document',
                    'contents' => fopen($f_path, 'r')
                ]
            ]
        ]);
    }


    public function sendMessage($message)
    {
        $this->client->post(__FUNCTION__, [
            'query' => [
                'chat_id' => self::CHAT_ID,
                'text' => $message
            ]
        ]);
    }
}
