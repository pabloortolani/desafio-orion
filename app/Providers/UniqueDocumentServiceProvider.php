<?php

namespace App\Providers;

use App\Helpers\HandleData;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class UniqueDocumentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        \Validator::extend('unique_cpf', function ($attribute, $value, $parameters, $validator) {

            $userId = $parameters[0] ?? null;
            $cpf =  HandleData::onlyNumber($value);

            $query = DB::table('users');
            $query->where('cpf','=', $cpf);

            if ($userId) {
                $query->where('id','<>', $userId);
            }

            return (($query->count()) == 0);
        });
    }
}
