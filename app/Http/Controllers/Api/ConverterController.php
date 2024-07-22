<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ConverterRequest;
use App\Services\Front\ConverterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ConverterController extends Controller
{
    public function converter(ConverterRequest $request): JsonResponse
    {
        $converter = new ConverterService($request->validated());

        try {
            $result = $converter->convert();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

        return response()->json(['result' => $result], 200);

    }
}
