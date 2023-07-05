<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class color extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'colors';

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
                  'valeur'
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

    public function produits()
    {
        return $this->belongsToMany(produit::class, 'color_produit');
    }


}
