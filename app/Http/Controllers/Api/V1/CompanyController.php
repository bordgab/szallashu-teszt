<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use LaravelJsonApi\Laravel\Http\Controllers\Actions;

class CompanyController extends Controller
{
    use Actions\FetchOne;
    use Actions\FetchMany;
    use Actions\Store;
    use Actions\Update;
}
