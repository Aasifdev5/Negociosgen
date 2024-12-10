<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Lab404\Impersonate\Models\Impersonate;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Token;


class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasApiTokens;


    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'membershipType',
        'last_seen',
        'is_online',
        'about',
        'level',
        'refer',
        'username',
        'facebook',
        'instagram',
        'address',
        'linkedin',
        'twitter',
        'birth_date',
        'city',
        'is_active',
        'is_system',
        'email_verified_at',
        'player_id',
        'is_subscribed',
        'country',
        'id_number',
        'language',
        'is_super_admin',
        'facebook_id',
        'google_id',
        'ip_address',
        'account_type',
        'mobile_number',
        'permissions',
        'profile_photo',
        'email_verified_at'
    ];

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token));
    }
    public static function getUserInfo($id)
    {
        $userinfo = User::find($id);

        return $userinfo;
    }
    public function forumPostComments()
    {
        return $this->hasMany(ForumPostComment::class, 'user_id', 'id');
    }
// In the User model
// User model
public function children()
{
    return $this->hasMany(User::class, 'refer');  // 'refer' is the foreign key
}

public function parent()
{
    return $this->belongsTo(User::class, 'refer');  // Refers back to the parent user (the user who referred them)
}


    public static function getUserFullname($id)
    {
        $userinfo = User::find($id);

        return $userinfo ? $userinfo->name : '';
    }
}
