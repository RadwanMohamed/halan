<?php

namespace App\Exceptions;
use Illuminate\Support\Facades\Auth;
use Request;
use App\Traits\ApiResponser;
use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use ApiResponser;
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
     * @param  \Exception  $exception
     * @return void
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
        if($exception instanceof ValidationException)
            return $this->convertValidationExceptionToResponse($exception,$request);
        if ($exception instanceof ModelNotFoundException)
        {
            $modelName = strtolower(class_basename($exception->getModel()));
            return $this->errorResponse("doesnt exists any {$modelName} with the specified indictor!",200);
        }
        if ($exception instanceof AuthenticationException)
        {
            return $this->unauthenticated($request,$exception);
        }
        if ($exception instanceof AuthorizationException)
        {
            return $this->errorResponse($exception->getMessage(),403);
        }
        if ($exception instanceof NotFoundHttpException)
        {
            return $this->errorResponse('the specified url can not be found',404);
        }
        if ($exception instanceof MethodNotAllowedHttpException )
        {
            return $this->errorResponse('the specified method for the request is invalid',405);
        }
        if ($exception instanceof HttpException )
        {
            return $this->errorResponse($exception->getMessage(),$exception->getStatusCode());
        }
        if ($exception instanceof QueryException )
        {
            if($exception->errorInfo[1]==1451)
                return $this->errorResponse('cannot remove this resource permanently, it is related with another resource',409);

            return $this->errorResponse($exception->getMessage(),$exception->getCode());
        }
        if(config('app.debug'))
            return parent::render($request, $exception);

        return $this->errorResponse('unexpected exception, try later',5000);

    }


    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $this->errorResponse('unauthenticated',401);
    }

    /**
     * Create a response object from the given validation exception.
     *
     * @param  \Illuminate\Validation\ValidationException  $e
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        $errors = $e->validator->errors()->getMessages();
        return $this->errorResponse($errors,422);
    }
}
