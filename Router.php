<?php

namespace App;

class Router
{
    /**
     * Mevcut yolu tutar
     * @var string
     */
    protected $actualPath;

    /**
     * Mevcut istek metodunu tutar
     * @var string
     */
    protected $actualMethod;

    /**
     * Tanımlanmış rotaları tutar
     * @var array
     */
    protected $routes = [];

    /**
     * 404 Sayfasını tutar
     * @var Closure|string
     */
    protected $notFound;

    /**
     * Rotacıyı başlatır
     * @param string $currentPath Mevcut yol
     * @param string $currentMethod Mevcut istek metodu
     */
    public function __construct($currentPath, $currentMethod)
    {
        $this->actualPath = $currentPath;
        $this->actualMethod = $currentMethod;

        // Sayfa bulunamadı rotasını ayarlayalım
        $this->notFound = function () {
            http_response_code(404);
            echo '404 Not Found';
        };
    }

    /**
     * Yeni bir GET rotası yaratır
     * @param string $path İstek yolu
     * @param Closure|string $callback Geri çağırım işlevi
     * @return void
     */
    public function get($path, $callback)
    {
        $this->routes[] = ['GET', $path, $callback];
    }

    /**
     * Yeni bir POST rotası yaratır
     * @param string $path İstek yolu
     * @param Closure|string $callback Geri çağırım işlevi
     * @return void
     */
    public function post($path, $callback)
    {
        $this->routes[] = ['POST', $path, $callback];
    }

    /**
     * Rotalar tanımlandıktan sonra eşleşen rotayı bulup çalıştırır
     * @return mixed
     */
    public function run()
    {
        foreach ($this->routes as $route) {
            list($method, $path, $callback) = $route;

            $checkMethod = $this->actualMethod == $method;
            $checkPath = preg_match("~^{$path}$~ixs", $this->actualPath, $params);

            if ($checkMethod && $checkPath) {

                if ($method == 'POST') {
                    $params = $this->repairPost($_POST);

                    return call_user_func($callback, $params);
                }

                array_shift($params);

                return call_user_func_array($callback, $params);
            }
        }

        return call_user_func($this->notFound);
    }

    public function repairPost($data)
    {
        $rawpost = "&" . file_get_contents("php://input");

        foreach ($data as $key => $value) {
            $pos = preg_match_all("/&" . $key . "=([^&]*)/i", $rawpost, $regs, PREG_PATTERN_ORDER);

            if ((!is_array($value)) && ($pos > 1)) {
                $qform[$key] = array();

                for ($i = 0; $i < $pos; $i++) {
                    $qform[$key][$i] = urldecode($regs[1][$i]);
                }

            } else {
                $qform[$key] = $value;
            }
        }

        return $qform;
    }
}