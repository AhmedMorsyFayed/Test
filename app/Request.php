<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table='requests';
    protected $fillable=['id','name','Department','Request','Status','creation'];
    public $timestamps = false;

}
