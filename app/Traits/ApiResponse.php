<?php
/*
 * Made With ♥ By Mohamed Said (c) 2022
 * - Github : https://github.com/EGYWEB-Mohamed
 * - Whatsapp : https://wa.me/+201141173045
 * - Website : https://msaied.com
 */

namespace App\Traits;

trait ApiResponse
{
    public function sendSuccess($message, $data = [], $status = 200)
    {
        return response([
            'success' => true,
            'data' => $data,
            'message' => $message,
        ], $status);
    }


    public function sendError($message, $data = [],$status = 422)
    {
        return response([
            'success' => false,
            'message' => $message,
            'data' => $data
        ], $status);
    }
}
