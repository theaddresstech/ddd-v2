<?php

namespace Src\Domain\User\Http\Controllers\Auth;

use Src\Domain\User\Http\Resources\User\UserResource;
use Src\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use theaddresstech\DDD\Traits\Responder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginController extends Controller
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
            if(!auth()->attempt(['email'=>$request->email,'password' =>$request->password,])){
                return response()->json(['message' => 'email or password incorrect!',], 401);
            }

            $user = \auth()->user();

            $this->setData('data', $user);

            $this->useCollection(UserResource::class, 'data');
            if ($request->wantsJson()) {
                $this->setData('meta', [
                    'token' => $user->createToken('admin_token')->accessToken, //todo add function to generate token
                ]);
            }
        }
        catch(\Exception $exception){
            $this->setApiResponse(fn() => response(['message' => $exception->getMessage()],Response::HTTP_CONFLICT));
        }
        return $this->response();
    }
}
