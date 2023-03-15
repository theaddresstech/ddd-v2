<?php

namespace Src\Domain\Dashboard\Http\Controllers;

use Src\Infrastructure\Http\AbstractControllers\BaseController as Controller;

use Src\Domain\General\Repositories\Contracts\DashboardRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    /**
     * View Path.
     *
     * @var string
     */
    protected $viewPath = 'dashboard';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'Dashboard';

    /**
     * Domain Alias.
     *
     * @var string
     */
    protected $domainAlias = 'dashboards';


    /**
     * Get All Dashboard.
     *
     * @return void
     */
    public function __invoke(Request $request)
    {
        return view("{$this->domainAlias}::{$this->viewPath}.index",[
            'data' => []
        ]);
    }
}
