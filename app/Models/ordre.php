<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ordre extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ordres';

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
                  'produit_id',
                  'color_id',
                  'size_id',
                  'quantity',
                  'etat'
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
     * Get the produit for this model.
     *
     * @return App\Models\Produit
     */
    public function produit()
    {
        return $this->belongsTo('App\Models\produit','produit_id');
    }

    /**
     * Get the color for this model.
     *
     * @return App\Models\Color
     */
    public function color()
    {
        return $this->belongsTo('App\Models\color','color_id');
    }

    /**
     * Get the size for this model.
     *
     * @return App\Models\Size
     */
    public function size()
    {
        return $this->belongsTo('App\Models\size','size_id');
    }



}
