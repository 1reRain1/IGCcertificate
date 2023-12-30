<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ApplicantsTemporary extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'applicants_temporary';

    // Primary key field
    protected $primaryKey = 'UserID';

    // Indicates if the IDs are auto-incrementing
    public $incrementing = true;



    // The attributes that are mass assignable
    protected $fillable = [
        'FullName', 'DateOfBirth', 'PlaceOfBirth', 'PhoneNumber',
        'Email', 'SkillName', 'CV', 'confirmation_token', 'email_token'
    ];


}
