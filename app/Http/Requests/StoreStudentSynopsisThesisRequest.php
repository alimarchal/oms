<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentSynopsisThesisRequest extends FormRequest
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
            'synopsis_file_1' => ['required', 'mimes:pdf,doc,docx'],
            'thesis_document_1' => ['required', 'mimes:pdf,doc,docx'],
            'synopsis_approval_notification_1' => ['required', 'mimes:pdf,doc,docx'],
            'area_of_specialization' => ['required'],
            'thesis_title' => ['required'],
            'agree' => ['required'],
            [
                'agree.required' => 'You have to choose the file!',
            ],
        ];
    }
}
