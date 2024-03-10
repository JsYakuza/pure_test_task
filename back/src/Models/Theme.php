<?php

namespace App\Models;

use Carbon\Carbon;
use PDO;

class Theme extends BaseModel
{
    protected string $table = 'theme';

    public function getThemeWithMessages(int $id): array
    {
        $themeName = $this->pdo->query("SELECT theme_name FROM " . $this->table . " WHERE theme.theme_id = $id")->fetch(PDO::FETCH_ASSOC);
        $messages = $this->pdo->query("SELECT user_id, message_text, message_time FROM messages WHERE theme_id = $id")->fetchAll(PDO::FETCH_ASSOC);
        return [
            'theme' => $themeName,
            'messages' => array_map(static function ($raw) {
                return [
                    'user_id' => $raw['user_id'],
                    'message_text' => $raw['message_text'],
                    'time' => Carbon::parse($raw['message_time'])->format('d-m-Y H-i')
                ];
            }, $messages)
        ];
    }
}
