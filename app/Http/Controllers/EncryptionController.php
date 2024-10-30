<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EncryptionController extends Controller
{
    public function encrypt()
    {
        $encrypted = Crypt::encryptString('Hello, this is a test message');
        return $encrypted; // This will return the encrypted string
    }

    public function decrypt(Request $request)
    {
        // Assuming the encrypted string is passed in the request
        $encryptedMessage = $request->input('encrypted_message'); // Retrieve the encrypted message from the request

        try {
            $decrypted = Crypt::decryptString($encryptedMessage);
            return $decrypted; //return the decrypted message
        } catch (\Exception $e) {
            return response()->json(['error' => 'Decryption failed: invalid or tampered message'], 400);
        }
    }
}
