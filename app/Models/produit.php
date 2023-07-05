<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produit extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'produits';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'name',
                  'name_ar',
                  'description',
                  'description_ar',
                  'price',
                  'photo',
                  'category_id'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get the category for this model.
     *
     * @return App\Models\Category
     */
    public function category()
    {
        return $this->belongsTo('App\Models\category','category_id');
    }


    public function colors()
    {
        return $this->belongsToMany(color::class, 'color_produit');
    }
    public function sizes()
    {
        return $this->belongsToMany(size::class, 'size_produit');
    }
}
