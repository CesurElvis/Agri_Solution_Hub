<?php

class Message extends Model
{
    public $errors= [];
    protected $table = 'messages';
    protected $allowedColumns = [
        'msg_id',
        'message',
        'sender',
        'receiver',
        'date',
       
        
    ];





}