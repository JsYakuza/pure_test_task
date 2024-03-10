<?php

namespace App;

use JsonException;

class Response
{
    public function __construct(public mixed $content, public int $status = 200)
    {
    }

    /**
     * @throws JsonException
     */
    public function sendResponse(): void
    {
        http_response_code($this->status);
        echo json_encode($this->content, JSON_THROW_ON_ERROR);
    }
}