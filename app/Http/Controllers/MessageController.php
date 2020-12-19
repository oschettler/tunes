<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function update(Request $request)
    {
        $text = $request->input('text');
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/storage/nachricht.txt',
            substr($text, 0, 200)
        );
        return back();
    }
}