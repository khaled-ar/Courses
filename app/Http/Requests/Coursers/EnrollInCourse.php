<?php

namespace App\Http\Requests\Coursers;

use Illuminate\Foundation\Http\FormRequest;

class EnrollInCourse extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

        ];
    }

    public function enroll($course) {

        $user = request()->user();
        $user->courses()->create([
            'user_id'   => $user->id,
            'course_id' => $course->id
        ]);
        return $this->generalResponse(null, 'Course Enrolled Successfully');
    }
}
