<?php

namespace App\Repository;

use App\Interfaces\Repository\DatabasePackagesInterface;
use App\Models\Package;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PackagesRepository implements DatabasePackagesInterface
{

        public function index(): View|\Illuminate\Foundation\Application|Factory|Application
        {
                return view('dashboard.admin.packages.index', [
                        'packages' => Package::all(),
                ]);
        }


        /**
         * Show the form for creating a new resource.
         */
        public function create(): View|\Illuminate\Foundation\Application|Factory|Application
        {
                return view('dashboard.admin.packages.add');
        }
}
