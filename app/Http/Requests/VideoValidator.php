<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class VideoValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'autor' => 'required|max:255',
            'archivo' => 'required|file|mimes:mp4,avi,mov',
            'miniatura' => 'required|file|mimes:png,jpg',
            'idUsuario' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'titulo.required' => 'El campo título es obligatorio.',
            'titulo.max' => 'El título no puede tener más de 255 caracteres.',
            'autor.max' => 'El autor no puede tener más de 255 caracteres.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'autor.required' => 'El autor es obligatorio.',
            'archivo.required' => 'El archivo es obligatorio.',
            'archivo.file' => 'Debe subir un archivo válido.',
            'archivo.mimes' => 'El archivo debe ser un tipo de archivo: mp4, avi, mov.',
            'miniatura.mimes' => 'El archivo debe ser de tipo JPG o PNG.',
            'miniatura.required' => 'La miniatura es obligatoria.',
            'miniatura.file' => 'debe subir un archivo valido.',
            'idUsuario.required' => 'El usuario es obligatorio'


        ];

    }



}
