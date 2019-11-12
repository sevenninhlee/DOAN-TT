<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'signatures';

    protected $fillable = [
        'user_id', 'signature_type', 'text', 'font_face', 'uploaded_url'
    ];

    protected $hidden = [
    ];

    private $rules = array(
        'user_id' => 'required',
        'signature_type' => 'required',
        'uploaded_url' => 'required',
    );
}
