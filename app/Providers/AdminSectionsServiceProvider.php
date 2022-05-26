<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        \App\Models\Tube::class => 'App\Http\Sections\Tubes',
        \App\Models\Trusssystem::class => 'App\Http\Sections\Trusssystems',
        \App\Models\Roof::class => 'App\Http\Sections\Roofs',
        \App\Models\Roofelement::class => 'App\Http\Sections\Roofelements',
        \App\Models\Paint::class => 'App\Http\Sections\Paints',
//        \App\Models\Example::class => 'App\Http\Sections\Examples',
        \App\Models\Formroof::class => 'App\Http\Sections\Formroofs',
        \App\Models\Service::class => 'App\Http\Sections\Services',
        \App\Models\Obreshetka::class => 'App\Http\Sections\Obreshetkas',
        \App\Models\Accessorie::class => 'App\Http\Sections\Accessories',
        \App\Models\Montach::class => 'App\Http\Sections\Montaches',
        \App\Models\Dopmaterial::class => 'App\Http\Sections\Dopmaterials',
        \App\Models\Photo::class => 'App\Http\Sections\Photos',
        \App\Models\Requisite::class => 'App\Http\Sections\Requisites',
    ];

    /**
     * Register sections.
     *
     * @param \SleepingOwl\Admin\Admin $admin
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}
