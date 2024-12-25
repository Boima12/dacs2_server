<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class accounts extends Model
{
    use HasFactory;

    // Define the table name if it differs from the plural form of the model name
    protected $table = 'accounts';

    // Specify the custom primary key
    protected $primaryKey = 'stt';

    // Specify the type of the primary key (int in your case)
    protected $keyType = 'int';

    // Allow mass assignment for these fields
    protected $fillable = [
        // Account Credentials
        'accountName',
        'accountPassword',

        // Personal Information
        'fullName',
        'accountPicture',
        'accountAbout',

        // Professional Information
        'accountSkills',
        'accountCurrentJob',
        'accountEducation',
        'accountDesiredRoles',
        'accountPreferedLocation',
        'accountSalary',

        // Connection
        'accountPhone',
        'accountEmail',
        'accountAddress',
        'accountLink_portfolio',
        'accountLink_linkedin',
        'accountLink_twitter',
        'accountLink_github',
        'accountLink_facebook',
    ];
}
