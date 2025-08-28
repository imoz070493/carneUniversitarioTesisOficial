<?php

namespace App;

use App\Mail\ResetPasswordMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use App\Mail\VerifyEmailCustom;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','usuario','estado','estudiante_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tokens()
    {
        return $this->hasMany('App\OauthAccessToken');
    }

    public function sendEmailVerificationNotification()
    {
        Mail::to($this->email)->send(new VerifyEmailCustom($this));
    }

    public function sendPasswordResetNotification($token)
    {
        Mail::to($this->email)->send(new ResetPasswordMail($token, $this->email));
    }
}
