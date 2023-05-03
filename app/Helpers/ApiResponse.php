<?php

namespace App\Helpers;

class ApiResponse
{

  public static function createApi($code = null, $message = null, $data = null)
  {
    $response = [
      'code' => $code,
      'message' => $message,
      'data' => $data,
    ];

    return response()->json($response, $code);
  }
}
