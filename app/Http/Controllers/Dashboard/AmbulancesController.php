<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repository\AmbulanceRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AmbulancesController extends Controller
{

        private AmbulanceRepository $ambulanceRepository;

        public function __construct(AmbulanceRepository $ambulanceRepository)
        {
                $this->ambulanceRepository = $ambulanceRepository;
        }

        /**
         * Display a listing of the resource.
         */
        public function index(): \Illuminate\Foundation\Application|Factory|View|Application
        {
                return $this->ambulanceRepository->index();
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create(): \Illuminate\Foundation\Application|Factory|View|Application
        {
                return $this->ambulanceRepository->create();
        }

        /**
         * Store a newly created resource in storage
         * .
         * @throws ValidationException
         */
        public function store(Request $request): RedirectResponse
        {
                return $this->ambulanceRepository->store($request);
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
        public function edit(string $id): \Illuminate\Foundation\Application|Factory|View|Application
        {
                return $this->ambulanceRepository->edit($id);
        }

        /**
         * Update the specified resource in storage.
         *
         * @throws ValidationException
         */
        public function update(Request $request, string $id): RedirectResponse
        {
                return $this->ambulanceRepository->update($request, $id);
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id): RedirectResponse
        {
                return $this->ambulanceRepository->destroy($id);
        }

        /**
         * Toggle availability.
         */
        public function toggleAvailable(string $id)
        {
                return $this->ambulanceRepository->toggleAvailable($id);
        }
}
