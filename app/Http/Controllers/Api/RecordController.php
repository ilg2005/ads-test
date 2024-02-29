<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Record;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class RecordController extends Controller
{
    public function findRecordById(int $id): JsonResponse
    {

        $record = Record::find($id);

        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        return response()->json($record);
    }

    public function findRecordsByData(Request $request): JsonResponse
    {
        $criteria = $request->all();

        var_dump($criteria);

        $records = Record::findByData($criteria);

        if (count($records) === 0) {
            return response()->json(['message' => 'Records not found'], 404);
        }

        return response()->json($records);
    }
}
