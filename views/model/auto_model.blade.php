@php
    echo "<?php".PHP_EOL;
@endphp
///////////////////////////////////////
///////////////////////////////////////
////                               ////
////    DO NOT MODIFY THIS FILE    ////
////                               ////
///////////////////////////////////////
///////////////////////////////////////

/*
|--------------------------------------------------------------------------
| Auto {{ $config->modelNames->name }} Model
|--------------------------------------------------------------------------
|
| Dynamically generated model.
|
| Includes relationships.
|
*/

namespace {{ $config->namespaces->model }}{{ $config->autoModel->_namespace }};

{{ 'use Illuminate\Database\Eloquent\Model' }};
@if($config->options->softDelete){{ 'use Illuminate\Database\Eloquent\SoftDeletes' }};@endif

@if($config->options->tests or $config->options->factory){{ 'use Illuminate\Database\Eloquent\Factories\HasFactory;' }}@endif

@if(isset($swaggerDocs)){!! $swaggerDocs  !!}@endif

class {{ $config->autoModel->prefix }}{{ $config->modelNames->name }} extends Model
{
@if($config->options->softDelete){{ infy_tab().'use SoftDeletes;' }}@endif
@if($config->options->tests or $config->options->factory){{ infy_tab().'use HasFactory;' }}@endif


    public $table = '{{ $config->tableName }}';

@if($customPrimaryKey)@tab()protected $primaryKey = '{{ $customPrimaryKey }}';@nls(2)@endif
@if($config->connection)@tab()protected $connection = '{{ $config->connection }}';@nls(2)@endif
@if(!$timestamps)@tab()public $timestamps = false;@nls(2)@endif
@if($customSoftDelete)@tab()protected $dates = ['{{ $customSoftDelete }}'];@nls(2)@endif
@if($customCreatedAt)@tab()const CREATED_AT = '{{ $customCreatedAt }}';@nls(2)@endif
@if($customUpdatedAt)@tab()const UPDATED_AT = '{{ $customUpdatedAt }}';@nls(2)@endif
    // Protected $fillable available using $fillables array
    // Protected $casts available using $casts array

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static array $rules = [
        {!! $rules !!}
    ];

    {!! $relations !!}
}
