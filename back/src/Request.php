<?php

namespace App;

use Exception;

class Request
{
    public function __construct(
        public string $type,
        public string $name,
        public array $body = [],
        public array $queryParams = []
    ) {
    }

    public function input(string $key): mixed
    {
        return array_key_exists($key, $this->body) ? $this->body[$key] : '';
    }

    public function values(): array
    {
        return array_values($this->body);
    }

    /**
     * Вот этот метод можно вынести в отдельный класс Validor,
     * все проверки вынести в отдельные класс правил, например RequiredRule
     * так можно сделать отдельный класс для эксепшенов и хранить их коллекцию отдельно, чтобы не вызывать new Exception, так как это слишком обобщенно
     *
     * @throws Exception
     */
    public function validateBody(array $rules): void
    {
        foreach ($rules as $param => $rule) {
            if (in_array('required', $rule) && !$this->validateRequired($param)) {
                throw new Exception($param.' required');
            }
        }
    }

    public function validateRequired(string $param): bool
    {
        return array_key_exists($param, $this->body);
    }
}
