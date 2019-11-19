<?php

namespace App\Models;

use App\Models\Traits\Pagination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Post extends Model
{

    use Pagination;

    protected $fillable = ['title','slug','short_description','body','views','likes','published_status','user_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopePublished($q){
        if(in_array('published', config('custom.enum.published_status'))){
            $q->where('published_status', 'published');
        }
        return $q;
    }

    public function scopePostByAuthor($q, $user,$request){
        //Todo only published
        $q->with('user')->where('user_id',$user->id);

        return $this->addPagination($q,$request);
    }

    public function getAll(Request $request){
        $query = $this->with('user');

        return $this->addPagination($query,$request);
    }
}
