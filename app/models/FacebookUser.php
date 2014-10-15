<?php

class FacebookUser extends Eloquent {

    public function profiles()
    {
        return $this->hasMany('Profile');
    }
}