<?php

namespace App;

use Exception;

class Helper
{
    /**
     * @throws Exception
     */
    public static function generateRandomString(int $length = 10): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public static function convertRequestBody(string $body): array
    {
        $params = $body ? explode('&', $body) : [];

        return self::convertParamsToArray($params);
    }

    public static function convertQueryString(string $queryString): array
    {
        $isQueryParamsExists = strpos($queryString, '?');
        $params = $isQueryParamsExists ? explode(
            '&',
            substr($queryString, $isQueryParamsExists + 1)
        ) : [];

        return self::convertParamsToArray($params);
    }

    public static function convertParamsToArray(array $params): array
    {
        $convertedParams = [];
        foreach ($params as $param) {
            $data = explode('=', $param);
            $convertedParams[$data[0]] = $data[1];
        }

        return $convertedParams;
    }
}