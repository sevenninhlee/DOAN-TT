<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class DocFolder extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'doc_folders';

    protected $fillable = [
        'doc_folder_id', 'doc_folder_name', 'user_id', 'priority', 'description'
    ];

    protected $hidden = [
    ];

    private $rules = array(
        'doc_folder_id' => 'required|unique:templates',
        'doc_folder_name' => 'required|unique:templates',
        'user_id' => 'required',
        'priority' => 'required',
    );
}
