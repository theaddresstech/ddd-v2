<?php

namespace Src\Domain\User\Http\Controllers\Auth;

use Src\Domain\User\Entities\User;
use Src\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use theaddresstech\DDD\Traits\Responder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    use Responder;
    /**
     * View Path.
     *
     * @var string
     */
    protected $viewPath = 'user';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'users';

    /**
     * Domain Alias.
     *
     * @var string
     */
    protected $domainAlias = 'users';

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function __invoke(Request $request)
    {
        try{

        }
        catch(\Exception $exception){
            $this->setApiResponse(fn() => response(['message' => $exception->getMessage()],Response::HTTP_CONFLICT));
        }
        return $this->response();
    }
}
