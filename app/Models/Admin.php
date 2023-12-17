<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
 
class Admin extends Authenticatable
{
  use Notifiable;
  protected $guard = 'admin';
  protected $fillable = ['name','username' ,'email', 'password'];
  protected $hidden = ['password', 'remember_token'];

  public function inviteds()
    {
        return $this->hasMany(Invited::class);
    }

    public function pages()
    {
        return $this->belongsToMany(Page::class, 'employee_pages')->withPivot('permission');
    }
}