<?php

namespace BestLang\core\controller;

use BestLang\core\util\BLCookie;
use BestLang\core\util\BLResponse;
use BestLang\core\util\BLSession;
use BestLang\core\view\BLView;

class BLController
{
    // Helper functions

    // Responses
    protected function html($content)
    {
        return new BLResponse(200, 'text/html', $content);
    }

    protected function plain($content)
    {
        return new BLResponse(200, 'text/plain', $content);
    }

    protected function json($object)
    {
        return new BLResponse(200, 'application/json', json_encode($object, JSON_UNESCAPED_UNICODE));
    }

    protected function view($template, $data = [])
    {
        return new BLResponse(200, 'text/html', BLView::render($template, $data));
    }

    // Cookie & Session
    protected function cookie($arg1 = null, $arg2 = null, $arg3 = 0)
    {
        if (is_null($arg1)) {
            return BLCookie::get();
        }
        if (!is_null($arg2)) {
            BLCookie::set($arg1, $arg2, $arg3);
        }
        if (is_array($arg1)) {
            BLCookie::set($arg1);
        }
        return BLCookie::get($arg1);
    }

    protected function session($arg1 = null, $arg2 = null) {
        if (is_null($arg1)) {
            return BLSession::get();
        }
        if (!is_null($arg2)) {
            BLSession::set($arg1, $arg2);
        }
        if (is_array($arg1)) {
            BLSession::set($arg1);
        }
        return BLSession::get($arg1);
    }
}