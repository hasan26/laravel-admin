<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="DetailOrder",
 *      required={"id_menu", "id_order"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_menu",
 *          description="id_menu",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="id_order",
 *          description="id_order",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class DetailOrder extends Model
{
    use SoftDeletes;

    public $table = 'detail_orders';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_menu',
        'id_order',
        'qty'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_menu' => 'integer',
        'id_order' => 'integer',
        'qty' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_menu' => 'required',
        'id_order' => 'required',
        'qty' => 'required'
    ];

    public function get_menu(){
        return $this->hasOne('App\Models\menu','id','id_menu');
    }

    public function toArray()
    {
        $array = parent::toArray();
        $array['menu'] = $this->get_menu;
        return $array;
    }

    
}
