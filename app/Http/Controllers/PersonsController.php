<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class PersonsController extends BaseController
{
    public function __invoke()
    {
        $persons = [
            [
                'id' => 1,
                'name' => 'John',
                'age' => 32,
                'job' => 'Web Developer'
            ],
            [
                'id' => 2,
                'name' => 'Ivan',
                'age' => 21,
                'job' => 'Developer'
            ],
            [
                'id' => 3,
                'name' => 'Oleg',
                'age' => 27,
                'job' => 'Designer'
            ],
            [
                'id' => 4,
                'name' => 'Iryna',
                'age' => 21,
                'job' => 'Manager'
            ],
        ];

        return $persons;
    }
}
