<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $description
 * @property string|null $delete_date
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Record newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Record newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Record query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Record whereDeleteDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Record whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Record whereId($value)
 * @mixin \Eloquent
 */
class Record extends Model
{
    protected $table = "records";

    protected $primaryKey = 'id';

    protected $fillable = [
        'description',
        'delete_date'
    ];

    protected $hidden = [
        'id',
        'delete_date'
    ];

    public $timestamps = FALSE;

}
