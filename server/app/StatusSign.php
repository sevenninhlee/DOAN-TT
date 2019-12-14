<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusSign extends Model
{
    protected $table = "status_sign";

    protected $fillable = [
        'document_id', 'recip_id', 'status'
    ];
}
