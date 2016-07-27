<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;


class User extends Authenticatable implements StaplerableInterface
{
    use EntrustUserTrait, EloquentTrait;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image_file_name', 'image_file_size', 'image_content_type', 'image_updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function __construct(array $attributes = array()) {
        
        $this->hasAttachedFile('image', [
            'styles' => [
                'medium' => '300x300',
                'thumb' => '100x100'
            ],
            'url'         => '/uploads/avatar/:attachment/:id/:style/:filename',
            'default_url' => '/default.gif',
            'path'        => ':app_root/public/uploads/media/uploads/avatar/:attachment/:id/:style/:filename',
        ]);

        parent::__construct($attributes);
    }

    /**
     * The "booting" method of the model.
     */
    public static function boot()
    {
        parent::boot();

        static::bootStapler();
    }
}
