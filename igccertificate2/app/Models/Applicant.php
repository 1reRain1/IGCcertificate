<?php
namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Applicant extends Model
{


    protected $primaryKey = 'UserID';

    protected $fillable = [
        'FullName',
        'DateOfBirth',
        'PlaceOfBirth',
        'PhoneNumber',
        'Email',
        'SkillName',
        'CV',
        'email_token'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($applicant) {
            // Only set email_token if it's not already set
            $applicant->email_token = $applicant->email_token ?? Str::random(60);
        });
    }

    public function getCvDownloadUrlAttribute()
    {
        if ($this->CV) {
            return route('admin.cvs.download', ['filename' => $this->CV]);
        }

        return '';
    }

    // Rest of your model...
}