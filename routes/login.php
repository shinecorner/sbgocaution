<?php


Route::get('/home', function(){ return redirect( app()->getLocale().'/dashboard'); })->name('home');
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
  // echo LaravelLocalization::transRoute("routes.password_reset"); die();
  	Route::get('/', 'AuthLoginController@loginForm')->name('login');
    Route::get(LaravelLocalization::transRoute("login.ROUTES.FORGOT_PASSWORD_LINK"), 'AuthLoginController@showForgetPasswordForm');
    Route::get(LaravelLocalization::transRoute("login.ROUTES.PASSWORD_RESET").'/{token}','AuthLoginController@showResetPasswordForm');
    Route::post(LaravelLocalization::transRoute("login.ROUTES.LOGIN"),'AuthLoginController@login');
    Route::post(LaravelLocalization::transRoute("login.ROUTES.PASSWORD_EMAIL"), 'AuthLoginController@sendResetPasswordLinkEmail');
    Route::post(LaravelLocalization::transRoute("login.ROUTES.PASSWORD_UPDATE"), 'AuthLoginController@reset');

    Route::middleware(['auth'])->group(function () {
        Route::get('dashboard', function () { return view('Login.dashboard.dashboardv1'); })->name('dashboard');
        Route::post(LaravelLocalization::transRoute("login.ROUTES.LOGOUT"), 'AuthLoginController@logout');
    });
});

Route::get('large-compact-sidebar/dashboard/dashboard1', function () { session(['layout' => 'compact']); return view('Login.dashboard.dashboardv1'); })->name('compact');
Route::get('large-sidebar/dashboard/dashboard1', function () { session(['layout' => 'normal']); return view('Login.dashboard.dashboardv1'); })->name('normal');
Route::get('horizontal-bar/dashboard/dashboard1', function () { session(['layout' => 'horizontal']); return view('Login.dashboard.dashboardv1'); })->name('horizontal');

Route::view('dashboard/dashboard1', 'Login.dashboard.dashboardv1')->name('dashboard_version_1');
Route::view('dashboard/dashboard2', 'Login.dashboard.dashboardv2')->name('dashboard_version_2');
Route::view('dashboard/dashboard3', 'Login.dashboard.dashboardv3')->name('dashboard_version_3');
Route::view('dashboard/dashboard4', 'Login.dashboard.dashboardv4')->name('dashboard_version_4');

// uiKits
Route::view('uikits/alerts', 'Login.uiKits.alerts')->name('alerts');
Route::view('uikits/accordion', 'Login.uiKits.accordion')->name('accordion');
Route::view('uikits/buttons', 'Login.uiKits.buttons')->name('buttons');
Route::view('uikits/badges', 'Login.uiKits.badges')->name('badges');
Route::view('uikits/bootstrap-tab', 'Login.uiKits.bootstrap-tab')->name('bootstrap-tab');
Route::view('uikits/carousel', 'Login.uiKits.carousel')->name('carousel');
Route::view('uikits/collapsible', 'Login.uiKits.collapsible')->name('collapsible');
Route::view('uikits/lists', 'Login.uiKits.lists')->name('lists');
Route::view('uikits/pagination', 'Login.uiKits.pagination')->name('pagination');
Route::view('uikits/popover', 'Login.uiKits.popover')->name('popover');
Route::view('uikits/progressbar', 'Login.uiKits.progressbar')->name('progressbar');
Route::view('uikits/tables', 'Login.uiKits.tables')->name('tables');
Route::view('uikits/tabs', 'Login.uiKits.tabs')->name('tabs');
Route::view('uikits/tooltip', 'Login.uiKits.tooltip')->name('tooltip');
Route::view('uikits/modals', 'Login.uiKits.modals')->name('modals');
Route::view('uikits/NoUislider', 'Login.uiKits.NoUislider')->name('NoUislider');
Route::view('uikits/cards', 'Login.uiKits.cards')->name('cards');
Route::view('uikits/cards-metrics', 'Login.uiKits.cards-metrics')->name('cards-metrics');
Route::view('uikits/typography', 'Login.uiKits.typography')->name('typography');

// extra kits
Route::view('extrakits/dropDown', 'Login.extraKits.dropDown')->name('dropDown');
Route::view('extrakits/imageCroper', 'Login.extraKits.imageCroper')->name('imageCroper');
Route::view('extrakits/loader', 'Login.extraKits.loader')->name('loader');
Route::view('extrakits/laddaButton', 'Login.extraKits.laddaButton')->name('laddaButton');
Route::view('extrakits/toastr', 'Login.extraKits.toastr')->name('toastr');
Route::view('extrakits/sweetAlert', 'Login.extraKits.sweetAlert')->name('sweetAlert');
Route::view('extrakits/tour', 'Login.extraKits.tour')->name('tour');
Route::view('extrakits/upload', 'Login.extraKits.upload')->name('upload');


// Apps
Route::view('apps/invoice', 'Login.apps.invoice')->name('invoice');
Route::view('apps/inbox', 'Login.apps.inbox')->name('inbox');
Route::view('apps/chat', 'Login.apps.chat')->name('chat');
Route::view('apps/calendar', 'Login.apps.calendar')->name('calendar');
Route::view('apps/task-manager-list', 'Login.apps.task-manager-list')->name('task-manager-list');
Route::view('apps/task-manager', 'Login.apps.task-manager')->name('task-manager');
Route::view('apps/toDo', 'Login.apps.toDo')->name('toDo');

// forms
Route::view('forms/basic-action-bar', 'Login.forms.basic-action-bar')->name('basic-action-bar');
Route::view('forms/multi-column-forms', 'Login.forms.multi-column-forms')->name('multi-column-forms');
Route::view('forms/smartWizard', 'Login.forms.smartWizard')->name('smartWizard');
Route::view('forms/tagInput', 'Login.forms.tagInput')->name('tagInput');
Route::view('forms/forms-basic', 'Login.forms.forms-basic')->name('forms-basic');
Route::view('forms/form-layouts', 'Login.forms.form-layouts')->name('form-layouts');
Route::view('forms/form-input-group', 'Login.forms.form-input-group')->name('form-input-group');
Route::view('forms/form-validation', 'Login.forms.form-validation')->name('form-validation');
Route::view('forms/form-editor', 'Login.forms.form-editor')->name('form-editor');

// Charts

Route::view('charts/echarts', 'Login.charts.echarts')->name('echarts');
Route::view('charts/chartjs', 'Login.charts.chartjs')->name('chartjs');
Route::view('charts/apexLineCharts', 'Login.charts.apexLineCharts')->name('apexLineCharts');
Route::view('charts/apexAreaCharts', 'Login.charts.apexAreaCharts')->name('apexAreaCharts');
Route::view('charts/apexBarCharts', 'Login.charts.apexBarCharts')->name('apexBarCharts');
Route::view('charts/apexColumnCharts', 'Login.charts.apexColumnCharts')->name('apexColumnCharts');
Route::view('charts/apexRadialBarCharts', 'Login.charts.apexRadialBarCharts')->name('apexRadialBarCharts');
Route::view('charts/apexRadarCharts', 'Login.charts.apexRadarCharts')->name('apexRadarCharts');
Route::view('charts/apexPieDonutCharts', 'Login.charts.apexPieDonutCharts')->name('apexPieDonutCharts');
Route::view('charts/apexSparklineCharts', 'Login.charts.apexSparklineCharts')->name('apexSparklineCharts');
Route::view('charts/apexScatterCharts', 'Login.charts.apexScatterCharts')->name('apexScatterCharts');
Route::view('charts/apexBubbleCharts', 'Login.charts.apexBubbleCharts')->name('apexBubbleCharts');
Route::view('charts/apexCandleStickCharts', 'Login.charts.apexCandleStickCharts')->name('apexCandleStickCharts');
Route::view('charts/apexMixCharts', 'Login.charts.apexMixCharts')->name('apexMixCharts');

// datatables
Route::view('datatables/basic-tables', 'Login.datatables.basic-tables')->name('basic-tables');

// sessions
Route::view('sessions/signIn', 'Login.sessions.signIn')->name('signIn');
Route::view('sessions/signUp', 'Login.sessions.signUp')->name('signUp');
Route::view('sessions/forgot', 'Login.sessions.forgot')->name('forgot');

// widgets
Route::view('widgets/card', 'Login.widgets.card')->name('widget-card');
Route::view('widgets/statistics', 'Login.widgets.statistics')->name('widget-statistics');

// others
Route::view('others/notFound', 'Login.others.notFound')->name('notFound');
Route::view('others/user-profile', 'Login.others.user-profile')->name('user-profile');
Route::view('others/starter', 'Login.starter')->name('starter');
Route::view('others/faq', 'Login.others.faq')->name('faq');
