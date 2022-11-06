<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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

    public function getData_id()
    {
        return $this->id;
    }


    public function getData_image()
    {
        return $this->image;
    }

    public function getData_occupation()
    {
        return $this->occupation;
    }

    public function getData_age()
    {
        return $this->age;
    }

    public function getData_profile()
    {
        return $this->profile;
    }


    public function getData_name()
    {
        return $this->name;
    }

    public function getData_address()
    {
        return $this->address;
    }

    public function getData_workhistory()
    {
        return $this->workhistory;
    }

    public function getData_skill()
    {
        return $this->skill;
    }

    public function getData_licence()
    {
        return $this->licence;
    }
}