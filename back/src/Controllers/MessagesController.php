<?php

namespace App\Controllers;

use App\Models\Messages;
use App\Request;
use App\Response;
use Carbon\Carbon;
use Exception;

class MessagesController
{
    private Messages $messages;

    public function __construct()
    {
        $this->messages = new Messages();
    }

    /**
     * @throws Exception
     */
    public function create(Request $request): Response
    {
        $request->validateBody([
            'theme_id' => ['required'],
            'message_text' => ['required'],
            'user_id' => ['required'],
        ]);

        $this->messages->create([
            $request->input('theme_id'),
            $request->input('message_text'),
            Carbon::now()->timestamp,
            $request->input('user_id'),
        ]);
        return new Response('Success', 200);
    }
}