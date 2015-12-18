<?php

namespace Test;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_to', 'user_from', 'value'];
    
    /**
     * Define relation with Users model for user recipient
     * @return type
     */
    public function userRecipient()
    {
        return $this->belongsTo('Test\Users', 'user_to');
    }
    
    /**
     * Define relation with Users model for user sender
     * @return type
     */
    public function userSender()
    {
        return $this->belongsTo('Test\Users', 'user_from');
    }
    
}
