<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class AgentListingStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
   /*  public function authorize(): bool
    {
        return false;
    } */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => ['required', 'image', 'max:2000'],
            'thumbnail_image' => ['required', 'image', 'max:2000'],
            'title' => ['required', 'string', 'max:255', 'unique:listings,title'],
            'category_id' => ['required', 'integer'],
            'location_id' => ['required', 'integer'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'max:255'],
            'website' => ['nullable', 'url'],
            'facebook_link' => ['nullable', 'url'],
            'x_link' => ['nullable', 'url'],
            'linkedin_link' => ['nullable', 'url'],
            'whatsapp_link' => ['nullable', 'url'],
            'instagram_link' => ['nullable', 'url'],
            'attachment' => ['nullable', 'mimetypes:jpg,png,csv,pdf' , 'max:5000'],
            'amenity_id.*' => ['nullable', 'integer'],
            'description' => ['required'],
            'google_map_embed_code' => ['nullable'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
            'is_featured' => ['required', 'boolean'],
            'is_verified' => ['required', 'boolean'],
        ];
    }
}
