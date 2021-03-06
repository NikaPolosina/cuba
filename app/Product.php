<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
    use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use SearchableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['product_name', 'category_id',  'product_description', 'content', 'product_image', 'product_price'];

    public function getCompany(){
        return $this->belongsToMany('App\Company');

    }
    public function getCategory(){
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    protected $searchable = [ 'columns' => ['product_name' => 5,],];


}
