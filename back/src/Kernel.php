<?php

namespace App;

use Exception;

class Kernel
{
    public function __construct(public Router $router, public Request $request)
    {
    }

    /**
     * @throws Exception
     */
    private function preRun(): void
    {
        if (!isset($_COOKIE['token'])) {
            setcookie("token", md5(Helper::generateRandomString()), time() + 60 * 60 * 24 * 100, "/");
        }
    }

    /**
     * @throws Exception
     */
    public function run(): void
    {
        $this->preRun();
        $data = $this->router->getRouteInfo($this->request->type, $this->request->name);
        if (!$data) {
            http_response_code(404);
            throw new Exception('Route not found');
        }
        $controller = new $data['controller'];
        $method = $data['method'];
        /** @var Response $response */
        $response = $controller->$method($this->request);

        $response->sendResponse();
    }
}
