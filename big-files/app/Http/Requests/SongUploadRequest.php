<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SongUploadRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'file' => 'required|file|mimes:mp3,wav,m4a|max:512000', // max ~500MB
        ];
    }
}