<?php

namespace App\Models;

use App\Models\Traits\Pagination;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class User extends Authenticatable
{
    use Notifiable, Pagination;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function contact(){
        return $this->hasOne(Contact::class);
    }

    public function getAll(Request $request)
    {
        $query = $this->with('contact');
        if($request->has('search')){
            $query->where('name','like',"%{$request->search}%");
        }
        return $query->paginate()->appends($request->query())->toJson();
    }

    public function scopeAdmin($q){
        return $q->where('role','admin');
    }
}
