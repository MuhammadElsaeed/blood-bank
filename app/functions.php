<?php

function jsonResponce($status, $message, $data = null, $code = 200) {
    return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data
                    ], $code);
}
