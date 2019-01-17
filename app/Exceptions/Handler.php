<?php

namespace App\Exceptions;

use App\Modules\Admins\Exceptions\NoSuchModelException;
use App\Modules\StaticContent\Exceptions\ActiveContentException;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use MarcinOrlowski\ResponseBuilder\ExceptionHandlerHelper;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param Exception $exception
     * @return mixed|void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            $entityName = $exception->getModel();
            flash('No such ' . $entityName)->error();
            return redirect('/' . $entityName);
        }
        if ($exception instanceof ActiveContentException) {
            flash($exception->getMessage())->error();
            return redirect()->back();
        }
        return parent::render($request, $exception);
    }

    /**
     * Override of unauthenticated exception.
     *
     * @param \Illuminate\Http\Request $request
     * @param AuthenticationException $exception
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        $guard = array_get($exception->guards(), 0);
        switch ($guard) {
            case 'admin':
                $login = 'login';
                break;
            case 'company':
                $login = 'companyLogin';
                break;
            default:
                $login = 'login';
        }

        return redirect()->guest(route($login));
    }

}
