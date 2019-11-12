<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Stamp extends Model
{
    use Notifiable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'stamps';

    protected $fillable = [
        'user_id', 'stamp_type', 'text', 'font_face', 'uploaded_url'
    ];

    protected $hidden = [
    ];

    private $rules = array(
        'user_id' => 'required',
        'stamp_type' => 'required',
        'uploaded_url' => 'required',
    );
}
