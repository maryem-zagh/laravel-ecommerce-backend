<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\UserController;

use App\Models\ProductCategory;
use App\Models\user;
use Cviebrock\EloquentSluggable\Services\SlugService;

use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\ConfirmablePasswordController;
use Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController;
use Laravel\Fortify\Http\Controllers\ConfirmedTwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationPromptController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\PasswordController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;
use Laravel\Fortify\Http\Controllers\RecoveryCodeController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\TwoFactorQrCodeController;
use Laravel\Fortify\Http\Controllers\TwoFactorSecretKeyController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


<<<<<<< HEAD
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    
});

// Route::post('/login', [AuthenticatedSessionController::class, 'create'])
// ->middleware('auth:sanctum')
// ->name('login');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);


            Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware(['guest:'.config('fortify.guard')])
                ->name('password.request');

            Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware(['guest:'.config('fortify.guard')])
                ->name('password.reset');
        

        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
            ->middleware(['guest:'.config('fortify.guard')])
            ->name('password.email');

        Route::post('/reset-password', [NewPasswordController::class, 'store'])
            ->middleware(['guest:'.config('fortify.guard')])
            ->name('password.update');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store']);

            Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
                ->name('verification.notice');
        

        Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
            ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'signed'])
            ->name('verification.verify');

        Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
            ->name('verification.send');

                    Route::put('/user/profile-information', [ProfileInformationController::class, 'update']);
 
            Route::get('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'create'])
                ->middleware(['guest:'.config('fortify.guard')])
                ->name('two-factor.login');
        

        Route::post('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'store'])
           ;

        $twoFactorMiddleware = Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword')
            ? [config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'password.confirm']
            : [config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')];

        Route::post('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'store'])
            ->middleware($twoFactorMiddleware)
            ->name('two-factor.enable');

        Route::post('/user/confirmed-two-factor-authentication', [ConfirmedTwoFactorAuthenticationController::class, 'store'])
            ->middleware($twoFactorMiddleware)
            ->name('two-factor.confirm');

        Route::delete('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'destroy'])
            ->middleware($twoFactorMiddleware)
            ->name('two-factor.disable');

        Route::get('/user/two-factor-qr-code', [TwoFactorQrCodeController::class, 'show'])
            ->middleware($twoFactorMiddleware)
            ->name('two-factor.qr-code');

        Route::get('/user/two-factor-secret-key', [TwoFactorSecretKeyController::class, 'show'])
            ->middleware($twoFactorMiddleware)
            ->name('two-factor.secret-key');

        Route::get('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'index'])
            ->middleware($twoFactorMiddleware)
            ->name('two-factor.recovery-codes');

        Route::post('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'store'])
            ->middleware($twoFactorMiddleware);
    


Route::group(['middleware' => ['auth:sanctum']],function(){
   
    

});


// Route::middleware('auth::sanctum')->group(
//  function () {
//     $enableViews = config('fortify.views', true);

//     // Authentication...
//     if ($enableViews) {
//         Route::get('/login', [AuthenticatedSessionController::class, 'create'])
//             ->middleware(['guest:'.config('fortify.guard')])
//             ->name('login');
//     }

//     $limiter = config('fortify.limiters.login');
//     $twoFactorLimiter = config('fortify.limiters.two-factor');
//     $verificationLimiter = config('fortify.limiters.verification', '6,1');

//     Route::post('/login', [AuthenticatedSessionController::class, 'store'])
//         ->middleware(array_filter([
//             'guest:'.config('fortify.guard'),
//             $limiter ? 'throttle:'.$limiter : null,
//         ]));

//     Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
//         ->name('logout');

//     // // Password Reset...
//     // if (Features::enabled(Features::resetPasswords())) {
//     //     if ($enableViews) {
//     //         Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
//     //             ->middleware(['guest:'.config('fortify.guard')])
//     //             ->name('password.request');

//     //         Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
//     //             ->middleware(['guest:'.config('fortify.guard')])
//     //             ->name('password.reset');
//     //     }

//     //     Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
//     //         ->middleware(['guest:'.config('fortify.guard')])
//     //         ->name('password.email');

//     //     Route::post('/reset-password', [NewPasswordController::class, 'store'])
//     //         ->middleware(['guest:'.config('fortify.guard')])
//     //         ->name('password.update');
//     // }

//     // Registration...
//     if (Features::enabled(Features::registration())) {
//         if ($enableViews) {
//             Route::get('/register', [RegisteredUserController::class, 'create'])
//                 ->middleware(['guest:'.config('fortify.guard')])
//                 ->name('register');
//         }

//         Route::post('/register', [RegisteredUserController::class, 'store'])
//             ->middleware(['guest:'.config('fortify.guard')]);
//     }

//     // // Email Verification...
//     // if (Features::enabled(Features::emailVerification())) {
//     //     if ($enableViews) {
//     //         Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
//     //             ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
//     //             ->name('verification.notice');
//     //     }

//     //     Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
//     //         ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'signed', 'throttle:'.$verificationLimiter])
//     //         ->name('verification.verify');

//     //     Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//     //         ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'throttle:'.$verificationLimiter])
//     //         ->name('verification.send');
//     // }

//     // // Profile Information...
//     // if (Features::enabled(Features::updateProfileInformation())) {
//     //     Route::put('/user/profile-information', [ProfileInformationController::class, 'update'])
//     //         ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
//     //         ->name('user-profile-information.update');
//     // }

//     // // Passwords...
//     // if (Features::enabled(Features::updatePasswords())) {
//     //     Route::put('/user/password', [PasswordController::class, 'update'])
//     //         ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
//     //         ->name('user-password.update');
//     // }

//     // // Password Confirmation...
//     // if ($enableViews) {
//     //     Route::get('/user/confirm-password', [ConfirmablePasswordController::class, 'show'])
//     //         ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')]);
//     // }

//     // Route::get('/user/confirmed-password-status', [ConfirmedPasswordStatusController::class, 'show'])
//     //     ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
//     //     ->name('password.confirmation');

//     // Route::post('/user/confirm-password', [ConfirmablePasswordController::class, 'store'])
//     //     ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
//     //     ->name('password.confirm');

//     // // Two Factor Authentication...
//     // if (Features::enabled(Features::twoFactorAuthentication())) {
//     //     if ($enableViews) {
//     //         Route::get('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'create'])
//     //             ->middleware(['guest:'.config('fortify.guard')])
//     //             ->name('two-factor.login');
//     //     }

//     //     Route::post('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'store'])
//     //         ->middleware(array_filter([
//     //             'guest:'.config('fortify.guard'),
//     //             $twoFactorLimiter ? 'throttle:'.$twoFactorLimiter : null,
//     //         ]));

//     //     $twoFactorMiddleware = Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword')
//     //         ? [config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'password.confirm']
//     //         : [config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')];

//     //     Route::post('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'store'])
//     //         ->middleware($twoFactorMiddleware)
//     //         ->name('two-factor.enable');

//     //     Route::post('/user/confirmed-two-factor-authentication', [ConfirmedTwoFactorAuthenticationController::class, 'store'])
//     //         ->middleware($twoFactorMiddleware)
//     //         ->name('two-factor.confirm');

//     //     Route::delete('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'destroy'])
//     //         ->middleware($twoFactorMiddleware)
//     //         ->name('two-factor.disable');

//     //     Route::get('/user/two-factor-qr-code', [TwoFactorQrCodeController::class, 'show'])
//     //         ->middleware($twoFactorMiddleware)
//     //         ->name('two-factor.qr-code');

//     //     Route::get('/user/two-factor-secret-key', [TwoFactorSecretKeyController::class, 'show'])
//     //         ->middleware($twoFactorMiddleware)
//     //         ->name('two-factor.secret-key');

//     //     Route::get('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'index'])
//     //         ->middleware($twoFactorMiddleware)
//     //         ->name('two-factor.recovery-codes');

//     //     Route::post('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'store'])
//     //         ->middleware($twoFactorMiddleware);
//     // }
// });

=======
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth::sanctum')->group(
 function () {
    $enableViews = config('fortify.views', true);

    // Authentication...
    if ($enableViews) {
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])
            ->middleware(['guest:'.config('fortify.guard')])
            ->name('login');
    }

    $limiter = config('fortify.limiters.login');
    $twoFactorLimiter = config('fortify.limiters.two-factor');
    $verificationLimiter = config('fortify.limiters.verification', '6,1');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:'.config('fortify.guard'),
            $limiter ? 'throttle:'.$limiter : null,
        ]));

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // // Password Reset...
    // if (Features::enabled(Features::resetPasswords())) {
    //     if ($enableViews) {
    //         Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    //             ->middleware(['guest:'.config('fortify.guard')])
    //             ->name('password.request');

    //         Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    //             ->middleware(['guest:'.config('fortify.guard')])
    //             ->name('password.reset');
    //     }

    //     Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    //         ->middleware(['guest:'.config('fortify.guard')])
    //         ->name('password.email');

    //     Route::post('/reset-password', [NewPasswordController::class, 'store'])
    //         ->middleware(['guest:'.config('fortify.guard')])
    //         ->name('password.update');
    // }

    // // Registration...
    // if (Features::enabled(Features::registration())) {
    //     if ($enableViews) {
    //         Route::get('/register', [RegisteredUserController::class, 'create'])
    //             ->middleware(['guest:'.config('fortify.guard')])
    //             ->name('register');
    //     }

    //     Route::post('/register', [RegisteredUserController::class, 'store'])
    //         ->middleware(['guest:'.config('fortify.guard')]);
    // }

    // // Email Verification...
    // if (Features::enabled(Features::emailVerification())) {
    //     if ($enableViews) {
    //         Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
    //             ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
    //             ->name('verification.notice');
    //     }

    //     Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    //         ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'signed', 'throttle:'.$verificationLimiter])
    //         ->name('verification.verify');

    //     Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    //         ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'throttle:'.$verificationLimiter])
    //         ->name('verification.send');
    // }

    // // Profile Information...
    // if (Features::enabled(Features::updateProfileInformation())) {
    //     Route::put('/user/profile-information', [ProfileInformationController::class, 'update'])
    //         ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
    //         ->name('user-profile-information.update');
    // }

    // // Passwords...
    // if (Features::enabled(Features::updatePasswords())) {
    //     Route::put('/user/password', [PasswordController::class, 'update'])
    //         ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
    //         ->name('user-password.update');
    // }

    // // Password Confirmation...
    // if ($enableViews) {
    //     Route::get('/user/confirm-password', [ConfirmablePasswordController::class, 'show'])
    //         ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')]);
    // }

    // Route::get('/user/confirmed-password-status', [ConfirmedPasswordStatusController::class, 'show'])
    //     ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
    //     ->name('password.confirmation');

    // Route::post('/user/confirm-password', [ConfirmablePasswordController::class, 'store'])
    //     ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
    //     ->name('password.confirm');

    // // Two Factor Authentication...
    // if (Features::enabled(Features::twoFactorAuthentication())) {
    //     if ($enableViews) {
    //         Route::get('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'create'])
    //             ->middleware(['guest:'.config('fortify.guard')])
    //             ->name('two-factor.login');
    //     }

    //     Route::post('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'store'])
    //         ->middleware(array_filter([
    //             'guest:'.config('fortify.guard'),
    //             $twoFactorLimiter ? 'throttle:'.$twoFactorLimiter : null,
    //         ]));

    //     $twoFactorMiddleware = Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword')
    //         ? [config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'password.confirm']
    //         : [config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')];

    //     Route::post('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'store'])
    //         ->middleware($twoFactorMiddleware)
    //         ->name('two-factor.enable');

    //     Route::post('/user/confirmed-two-factor-authentication', [ConfirmedTwoFactorAuthenticationController::class, 'store'])
    //         ->middleware($twoFactorMiddleware)
    //         ->name('two-factor.confirm');

    //     Route::delete('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'destroy'])
    //         ->middleware($twoFactorMiddleware)
    //         ->name('two-factor.disable');

    //     Route::get('/user/two-factor-qr-code', [TwoFactorQrCodeController::class, 'show'])
    //         ->middleware($twoFactorMiddleware)
    //         ->name('two-factor.qr-code');

    //     Route::get('/user/two-factor-secret-key', [TwoFactorSecretKeyController::class, 'show'])
    //         ->middleware($twoFactorMiddleware)
    //         ->name('two-factor.secret-key');

    //     Route::get('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'index'])
    //         ->middleware($twoFactorMiddleware)
    //         ->name('two-factor.recovery-codes');

    //     Route::post('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'store'])
    //         ->middleware($twoFactorMiddleware);
    // }
});

>>>>>>> b95e4d992aa5a7d447ba5d73dc2a43c62686a515
Route::resource('users', UserController::class);

Route::resource('products', ProductController::class);
Route::get('category/{id}', [CategoryController::class , 'get_subcategories']);
Route::get('category0/{id}', [CategoryController::class , 'get_subcategories_position0']);
Route::post('search', [ProductCategoryController::class , 'search']);

Route::get('product/{id}', [ProductController::class , 'find_product']);
Route::get('count', [ProductController::class , 'count']);

Route::get('products_by_tag/{id}', [ProductController::class, 'products_by_tag']);
Route::get('products_by_category/{id}', [ProductController::class, 'products_by_category']);

Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);



