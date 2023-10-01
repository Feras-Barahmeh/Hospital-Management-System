<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repository\PackagesRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
        private PackagesRepository $packagesRepository;

        public function __construct(PackagesRepository $packagesRepository)
        {
                $this->packagesRepository = $packagesRepository;
        }

        /**
         * Display a listing of the resource.
         */
        public function index(): View|Factory|\Illuminate\Foundation\Application|Application
        {
                return $this->packagesRepository->index();
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create(): View|Factory|\Illuminate\Foundation\Application|Application
        {
                return $this->packagesRepository->create();
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
                //
        }

        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
                //
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
                return $this->packagesRepository->edit($id);
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
                //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id): false|RedirectResponse
        {
                return $this->packagesRepository->destroy($id);
        }

        /**
         * Toggle status package
         */
        public function toggleStatus(Request $request): RedirectResponse
        {
                return $this->packagesRepository->toggleStatus($request);
        }
}
