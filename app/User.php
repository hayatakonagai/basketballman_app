<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CustomVerifyEmail;
use App\Notifications\CustomResetPassword;
use Overtrue\LaravelFavorite\Traits\Favoriter;
class User extends Authenticatable implements MustVerifyEmail

{
    public function team()
    {
        return $this->HasMany('App\Team');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public $timestamps = false;

    use Notifiable, Favoriter;
        public function sendEmailVerificationNotification()
        {
            $this->notify(new CustomVerifyEmail());
        }
            public function sendPasswordResetNotification($token) {
            $this->notify(new CustomResetPassword($token));
            }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'password', 'gender', 'height', 'weight','age','where','position','carrer','acievement','appeal','image'
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
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
    const WHERE=['北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','新潟県','富山県','石川県','福井県','山梨県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県'];
    protected $guarded=[];
}
