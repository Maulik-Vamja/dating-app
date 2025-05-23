<?php

use Illuminate\Support\Facades\Auth;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Dashboard ---------------------------------------------------------------------------------------------------------------------------------------------------
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route(Auth::getDefaultDriver() . '.dashboard.index'));
});

// Users -------------------------------------------------------------------------------------------------------------------------------------------------------
Breadcrumbs::register('users_list', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Escorts', route(Auth::getDefaultDriver() . '.escorts.index'));
});

Breadcrumbs::register('users_create', function ($breadcrumbs) {
    $breadcrumbs->parent('users_list');
    $breadcrumbs->push('Add New Escort', route(Auth::getDefaultDriver() . '.escorts.create'));
});

Breadcrumbs::register('users_update', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('users_list');
    $breadcrumbs->push('Edit Escort', route(Auth::getDefaultDriver() . '.escorts.edit', $id));
});

//generate for users_show breadcumb copilot
Breadcrumbs::register('users_show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('users_list');
    $breadcrumbs->push('View Escort', route(Auth::getDefaultDriver() . '.escorts.show', $id));
});



// Quick Links
Breadcrumbs::register('quick_link', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(__('Mange Quick Link'), route('admin.quickLink'));
});
// Profile
Breadcrumbs::register('my_profile', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(__('Manage Account'), route('admin.profile'));
});


// Role Management -------------------------------------------------------------------------------------------------------------------------------------------------------
Breadcrumbs::register('roles_list', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Roles', route(Auth::getDefaultDriver() . '.roles.index'));
});
Breadcrumbs::register('roles_create', function ($breadcrumbs) {
    $breadcrumbs->parent('roles_list');
    $breadcrumbs->push('Add New Role', route(Auth::getDefaultDriver() . '.roles.create'));
});
Breadcrumbs::register('roles_update', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('roles_list');
    $breadcrumbs->push(__('Edit Role'), route('admin.roles.edit', $id));
});

// countries -------------------------------------------------------------------------------------------------------------------------------------------------------
Breadcrumbs::register('countries_list', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Countries', route(Auth::getDefaultDriver() . '.countries.index'));
});
Breadcrumbs::register('countries_create', function ($breadcrumbs) {
    $breadcrumbs->parent('countries_list');
    $breadcrumbs->push('Add New Country', route(Auth::getDefaultDriver() . '.countries.create'));
});

Breadcrumbs::register('countries_update', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('countries_list');
    $breadcrumbs->push('Edit Country', route(Auth::getDefaultDriver() . '.countries.edit', $id));
});

// states -------------------------------------------------------------------------------------------------------------------------------------------------------
Breadcrumbs::register('states_list', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('States', route(Auth::getDefaultDriver() . '.states.index'));
});
Breadcrumbs::register('states_create', function ($breadcrumbs) {
    $breadcrumbs->parent('states_list');
    $breadcrumbs->push('Add New State', route(Auth::getDefaultDriver() . '.states.create'));
});

Breadcrumbs::register('states_update', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('states_list');
    $breadcrumbs->push('Edit State', route(Auth::getDefaultDriver() . '.states.edit', $id));
});

// cities -------------------------------------------------------------------------------------------------------------------------------------------------------
Breadcrumbs::register('cities_list', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Cities', route(Auth::getDefaultDriver() . '.cities.index'));
});
Breadcrumbs::register('cities_create', function ($breadcrumbs) {
    $breadcrumbs->parent('cities_list');
    $breadcrumbs->push('Add New City', route(Auth::getDefaultDriver() . '.cities.create'));
});

Breadcrumbs::register('cities_update', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('cities_list');
    $breadcrumbs->push('Edit City', route(Auth::getDefaultDriver() . '.cities.edit', $id));
});

// CMS Pages ---------------------------------------------------------------------------------------------------------------------------------------------------
Breadcrumbs::register('cms_list', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(__('CMS Pages'), route('admin.pages.index'));
});
Breadcrumbs::register('cms_update', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('cms_list');
    $breadcrumbs->push(__('Edit CMS Page'), route('admin.pages.edit', $id));
});

// FAQs ---------------------------------------------------------------------------------------------------------------------------------------------------
Breadcrumbs::register('faqs_list', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(__('Faqs'), route('admin.faqs.index'));
});
Breadcrumbs::register('faqs_create', function ($breadcrumbs) {
    $breadcrumbs->parent('faqs_list');
    $breadcrumbs->push('Add New Faq', route('admin.faqs.create'));
});
Breadcrumbs::register('faqs_update', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('faqs_list');
    $breadcrumbs->push(__('Edit Faqs'), route('admin.faqs.edit', $id));
});


// FAQs ---------------------------------------------------------------------------------------------------------------------------------------------------
Breadcrumbs::register('verification_request_list', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(__('Verification Requests'), route('admin.verification-requests.index'));
});
// Breadcrumbs::register('verification_request_create', function ($breadcrumbs) {
//     $breadcrumbs->parent('verification_request_list');
//     $breadcrumbs->push('Add New Verification Request', route('admin.verification-requests.create'));
// });
// Breadcrumbs::register('verification_request_update', function ($breadcrumbs, $id) {
//     $breadcrumbs->parent('verification_request_list');
//     $breadcrumbs->push(__('Edit Verification Request'), route('admin.verification-requests.edit', $id));
// });
//generate for users_show breadcumb copilot
Breadcrumbs::register('verification_request_show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('verification_request_list');
    $breadcrumbs->push('View Verification Request', route('admin.verification-requests.show', $id));
});


// Blogs ---------------------------------------------------------------------------------------------------------------------------------------------------
Breadcrumbs::register('blogs_list', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(__('Blogs'), route('admin.blogs.index'));
});
Breadcrumbs::register('blog_create', function ($breadcrumbs) {
    $breadcrumbs->parent('blogs_list');
    $breadcrumbs->push('Add New Blog', route('admin.blogs.create'));
});
Breadcrumbs::register('blog_update', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('blogs_list');
    $breadcrumbs->push(__('Edit Blog'), route('admin.blogs.edit', $id));
});

//site configuartion
Breadcrumbs::register('site_setting', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(__('Site Configuration'), route('admin.settings.index'));
});

//Meta Tag Management
Breadcrumbs::register('meta_tags', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(__('Meta Tags Management'), route('admin.meta-tags.index'));
});
