<?php

namespace App\Models;

class Messages extends BaseModel
{
    protected string $table = 'messages';

    public function create(array $values): bool
    {
        return $this->pdo->prepare('INSERT INTO messages(theme_id, message_text, message_time, user_id) VALUES (?, ?, ?, ?)')->execute($values);
    }
}
