<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function update(Request $request)
    {
        $now = Carbon::now()->toDateTimeString();
        $text = $request->input('text');
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/storage/nachricht.txt',
            "{$now}|" . substr($text, 0, 200)
        );
        return back();
    }
}