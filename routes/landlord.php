<?php
//dd(app()->getLocale());
\Log::info(LaravelLocalization::transRoute("landlord/regrequest.routes.REGISTER_REQUEST"));
Route::get('/home', function(){ return redirect( app()->getLocale().'/dashboard'); })->name('home');
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
    Route::get('/test', 'AuthLoginController@loginForm')->name('login');
  	Route::get('/', 'AuthLoginController@loginForm')->name('login');
    Route::get(LaravelLocalization::transRoute("landlord/login.routes.FORGOT_PASSWORD_LINK"), 'AuthLoginController@showForgetPasswordForm');
    Route::get(LaravelLocalization::transRoute("landlord/login.routes.PASSWORD_RESET").'/{token}','AuthLoginController@showResetPasswordForm');
    Route::post(LaravelLocalization::transRoute("landlord/login.routes.LOGIN"),'AuthLoginController@login');
    Route::post(LaravelLocalization::transRoute("landlord/login.routes.PASSWORD_EMAIL"), 'AuthLoginController@sendResetPasswordLinkEmail');
    Route::post(LaravelLocalization::transRoute("landlord/login.routes.PASSWORD_UPDATE"), 'AuthLoginController@reset');
    Route::post(LaravelLocalization::transRoute("landlord/regrequest.routes.REGISTER_REQUEST"),'RegrequestController@store');

    Route::middleware(['auth'])->group(function () {
        Route::get('dashboard', function () { return view('landlord.dashboard.dashboardv1'); })->name('dashboard');
        Route::post(LaravelLocalization::transRoute("landlord/login.routes.LOGOUT"), 'AuthLoginController@logout');
    });
    Route::any('/{any}',function(){
        return  view('landlord.others.notFound');
    })->where('any','.*')->name('any');
});



Route::get('large-compact-sidebar/dashboard/dashboard1', function () { session(['layout' => 'compact']); return view('Login.dashboard.dashboardv1'); })->name('compact');
Route::get('large-sidebar/dashboard/dashboard1', function () { session(['layout' => 'normal']); return view('Login.dashboard.dashboardv1'); })->name('normal');
Route::get('horizontal-bar/dashboard/dashboard1', function () { session(['layout' => 'horizontal']); return view('Login.dashboard.dashboardv1'); })->name('horizontal');

Route::view('dashboard/dashboard1', 'landlord.dashboard.dashboardv1')->name('dashboard_version_1');
Route::view('dashboard/dashboard2', 'landlord.dashboard.dashboardv2')->name('dashboard_version_2');
Route::view('dashboard/dashboard3', 'landlord.dashboard.dashboardv3')->name('dashboard_version_3');
Route::view('dashboard/dashboard4', 'landlord.dashboard.dashboardv4')->name('dashboard_version_4');

// uiKits
Route::view('uikits/alerts', 'landlord.uiKits.alerts')->name('alerts');
Route::view('uikits/accordion', 'landlord.uiKits.accordion')->name('accordion');
Route::view('uikits/buttons', 'landlord.uiKits.buttons')->name('buttons');
Route::view('uikits/badges', 'landlord.uiKits.badges')->name('badges');
Route::view('uikits/bootstrap-tab', 'landlord.uiKits.bootstrap-tab')->name('bootstrap-tab');
Route::view('uikits/carousel', 'landlord.uiKits.carousel')->name('carousel');
Route::view('uikits/collapsible', 'landlord.uiKits.collapsible')->name('collapsible');
Route::view('uikits/lists', 'landlord.uiKits.lists')->name('lists');
Route::view('uikits/pagination', 'landlord.uiKits.pagination')->name('pagination');
Route::view('uikits/popover', 'landlord.uiKits.popover')->name('popover');
Route::view('uikits/progressbar', 'landlord.uiKits.progressbar')->name('progressbar');
Route::view('uikits/tables', 'landlord.uiKits.tables')->name('tables');
Route::view('uikits/tabs', 'landlord.uiKits.tabs')->name('tabs');
Route::view('uikits/tooltip', 'landlord.uiKits.tooltip')->name('tooltip');
Route::view('uikits/modals', 'landlord.uiKits.modals')->name('modals');
Route::view('uikits/NoUislider', 'landlord.uiKits.NoUislider')->name('NoUislider');
Route::view('uikits/cards', 'landlord.uiKits.cards')->name('cards');
Route::view('uikits/cards-metrics', 'landlord.uiKits.cards-metrics')->name('cards-metrics');
Route::view('uikits/typography', 'landlord.uiKits.typography')->name('typography');

// extra kits
Route::view('extrakits/dropDown', 'landlord.extraKits.dropDown')->name('dropDown');
Route::view('extrakits/imageCroper', 'landlord.extraKits.imageCroper')->name('imageCroper');
Route::view('extrakits/loader', 'landlord.extraKits.loader')->name('loader');
Route::view('extrakits/laddaButton', 'landlord.extraKits.laddaButton')->name('laddaButton');
Route::view('extrakits/toastr', 'landlord.extraKits.toastr')->name('toastr');
Route::view('extrakits/sweetAlert', 'landlord.extraKits.sweetAlert')->name('sweetAlert');
Route::view('extrakits/tour', 'landlord.extraKits.tour')->name('tour');
Route::view('extrakits/upload', 'landlord.extraKits.upload')->name('upload');


// Apps
Route::view('apps/invoice', 'landlord.apps.invoice')->name('invoice');
Route::view('apps/inbox', 'landlord.apps.inbox')->name('inbox');
Route::view('apps/chat', 'landlord.apps.chat')->name('chat');
Route::view('apps/calendar', 'landlord.apps.calendar')->name('calendar');
Route::view('apps/task-manager-list', 'landlord.apps.task-manager-list')->name('task-manager-list');
Route::view('apps/task-manager', 'landlord.apps.task-manager')->name('task-manager');
Route::view('apps/toDo', 'landlord.apps.toDo')->name('toDo');

// forms
Route::view('forms/basic-action-bar', 'landlord.forms.basic-action-bar')->name('basic-action-bar');
Route::view('forms/multi-column-forms', 'landlord.forms.multi-column-forms')->name('multi-column-forms');
Route::view('forms/smartWizard', 'landlord.forms.smartWizard')->name('smartWizard');
Route::view('forms/tagInput', 'landlord.forms.tagInput')->name('tagInput');
Route::view('forms/forms-basic', 'landlord.forms.forms-basic')->name('forms-basic');
Route::view('forms/form-layouts', 'landlord.forms.form-layouts')->name('form-layouts');
Route::view('forms/form-input-group', 'landlord.forms.form-input-group')->name('form-input-group');
Route::view('forms/form-validation', 'landlord.forms.form-validation')->name('form-validation');
Route::view('forms/form-editor', 'landlord.forms.form-editor')->name('form-editor');

// Charts

Route::view('charts/echarts', 'landlord.charts.echarts')->name('echarts');
Route::view('charts/chartjs', 'landlord.charts.chartjs')->name('chartjs');
Route::view('charts/apexLineCharts', 'landlord.charts.apexLineCharts')->name('apexLineCharts');
Route::view('charts/apexAreaCharts', 'landlord.charts.apexAreaCharts')->name('apexAreaCharts');
Route::view('charts/apexBarCharts', 'landlord.charts.apexBarCharts')->name('apexBarCharts');
Route::view('charts/apexColumnCharts', 'landlord.charts.apexColumnCharts')->name('apexColumnCharts');
Route::view('charts/apexRadialBarCharts', 'landlord.charts.apexRadialBarCharts')->name('apexRadialBarCharts');
Route::view('charts/apexRadarCharts', 'landlord.charts.apexRadarCharts')->name('apexRadarCharts');
Route::view('charts/apexPieDonutCharts', 'landlord.charts.apexPieDonutCharts')->name('apexPieDonutCharts');
Route::view('charts/apexSparklineCharts', 'landlord.charts.apexSparklineCharts')->name('apexSparklineCharts');
Route::view('charts/apexScatterCharts', 'landlord.charts.apexScatterCharts')->name('apexScatterCharts');
Route::view('charts/apexBubbleCharts', 'landlord.charts.apexBubbleCharts')->name('apexBubbleCharts');
Route::view('charts/apexCandleStickCharts', 'landlord.charts.apexCandleStickCharts')->name('apexCandleStickCharts');
Route::view('charts/apexMixCharts', 'landlord.charts.apexMixCharts')->name('apexMixCharts');

// datatables
Route::view('datatables/basic-tables', 'landlord.datatables.basic-tables')->name('basic-tables');

// sessions
Route::view('sessions/signIn', 'landlord.sessions.signIn')->name('signIn');
Route::view('sessions/signUp', 'landlord.sessions.signUp')->name('signUp');
Route::view('sessions/forgot', 'landlord.sessions.forgot')->name('forgot');

// widgets
Route::view('widgets/card', 'landlord.widgets.card')->name('widget-card');
Route::view('widgets/statistics', 'landlord.widgets.statistics')->name('widget-statistics');

// others
Route::view('others/notFound', 'landlord.others.notFound')->name('notFound');
Route::view('others/user-profile', 'landlord.others.user-profile')->name('user-profile');
Route::view('others/starter', 'landlord.starter')->name('starter');
Route::view('others/faq', 'landlord.others.faq')->name('faq');
