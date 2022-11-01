<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

        'dashboard' => \App\Http\Middleware\dashboard\dashboard::class,
        'dashboardfilteryesterday' => \App\Http\Middleware\dashboard\dashboard::class,
        'dashboardfiltertoday' => \App\Http\Middleware\dashboard\dashboard::class,
        'dashboardfilterweek' => \App\Http\Middleware\dashboard\dashboard::class,
        'dashboardfiltercustom' => \App\Http\Middleware\dashboard\dashboard::class,
        'totalSmsEmail' => \App\Http\Middleware\dashboard\dashboard::class,

        'merchantList' => \App\Http\Middleware\merchant\merchant::class,
        'expmerchantList' => \App\Http\Middleware\merchant\expmerchant::class,
        'validmerchantList' => \App\Http\Middleware\merchant\validmerchant::class,
        'manage_plan' => \App\Http\Middleware\merchant\manageplan::class,


        'shoplistdashboard' => \App\Http\Middleware\merchant\merchant::class,
        'shoplistyesterday' => \App\Http\Middleware\merchant\merchant::class,
        'shoplisttoday' => \App\Http\Middleware\merchant\merchant::class,
        'shoplistweek' => \App\Http\Middleware\merchant\merchant::class,
        'shoplistcustom' => \App\Http\Middleware\merchant\merchant::class,

        'domainRequest' => \App\Http\Middleware\common\domainrequest::class,
        'fbPending' => \App\Http\Middleware\common\fbpending::class,
        'googlePending' => \App\Http\Middleware\common\googlepending::class,
        'domainstatus_change' => \App\Http\Middleware\common\domainrequest::class,
        'facebookUpdate' => \App\Http\Middleware\common\fbpending::class,
        'googleUpdate' => \App\Http\Middleware\common\googlepending::class,
        'notificationList' => \App\Http\Middleware\common\notification::class,
        'notificationUpdate' => \App\Http\Middleware\common\notification::class,
        'ajaxNotiCount' => \App\Http\Middleware\common\notification::class,
        'versionupdate' => \App\Http\Middleware\common\versionupdate::class,
        'versionlog' => \App\Http\Middleware\common\versionlog::class,
        'reminder' => \App\Http\Middleware\common\reminder::class,
        'email_template' => \App\Http\Middleware\common\emailtemplate::class,
        'error_log' => \App\Http\Middleware\common\errorlog::class,
        'promocode' => \App\Http\Middleware\common\promocode::class,
        'payment' => \App\Http\Middleware\common\payment::class,


        'view_product' => \App\Http\Middleware\ticket\ticketproduct::class,
        'add_product_action' => \App\Http\Middleware\ticket\ticketproduct::class,
        'edit_product_action' => \App\Http\Middleware\ticket\ticketproduct::class,
        'delete_product' => \App\Http\Middleware\ticket\ticketproduct::class,
        'view' => \App\Http\Middleware\ticket\manageticket::class,
        'ticketDetails' => \App\Http\Middleware\ticket\manageticket::class,
        'store' => \App\Http\Middleware\ticket\manageticket::class,
        'update' => \App\Http\Middleware\ticket\manageticket::class,
  

        'viewRoles' => \App\Http\Middleware\role\viewrole::class,
        'addRoles' => \App\Http\Middleware\role\viewrole::class,
        'addRolesAction' => \App\Http\Middleware\role\viewrole::class,
        'deleteRoles' => \App\Http\Middleware\role\viewrole::class,
        'editRoles' => \App\Http\Middleware\role\viewrole::class,
        'editRolesAction' => \App\Http\Middleware\role\viewrole::class,
        'viewManageRoles' => \App\Http\Middleware\role\managerole::class,
        'addAdminType' => \App\Http\Middleware\role\managerole::class,
        'addManageRoles' => \App\Http\Middleware\role\managerole::class,
        'addManageRolesAction' => \App\Http\Middleware\role\managerole::class,

        'revenue_report' => \App\Http\Middleware\revenue\revenue::class,
        'trans_history' => \App\Http\Middleware\revenue\revenue::class,




    ];
}
