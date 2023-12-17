<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invited extends Model
{
    use HasFactory;

    protected $fillable = [
        'pretitle', 'title', 'fullname', 'mobile_no', 'email', 'password', 'email_other', 'organization',
        'position', 'qrcode', 'attendance', 'employee_id', 'person_class_id', 'seat_id', 'notify_by_email', 'notify_by_whatsup',
        'is_attended', 'req_status', 'invitation_type', 'invitation_lang', 'in_or_out',
    ];

    
    public function title()
    {
        return $this->belongsTo(Title::class);
    } 

    public function personClass()
    {
        return $this->belongsTo(PersonClass::class);
    }
    
    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }

    public function employee()
    {
        return $this->belongsTo(Admin::class);
    }


}
