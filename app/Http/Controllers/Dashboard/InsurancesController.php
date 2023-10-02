<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repository\InsuranceRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class InsurancesController extends Controller
{
        private InsuranceRepository $insuranceRepository;

        public function __construct(InsuranceRepository $insuranceRepository)
        {
                $this->insuranceRepository = $insuranceRepository;
        }

        /**
         * Display a listing of the resource.
         */
        public function index(): \Illuminate\Foundation\Application|Factory|View|Application
        {
                return $this->insuranceRepository->index();
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
                //
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request): RedirectResponse
        {
                return $this->insuranceRepository->store($request);
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
                //
        }

        /**
         * Update the specified resource in storage.
         *
         * @throws ValidationException
         */
        public function update(Request $request, string $id): RedirectResponse
        {
                return $this->insuranceRepository->update($request, $id);
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id): RedirectResponse
        {
                return $this->insuranceRepository->destroy($id);
        }

        /**
         * Toggle status
         */
        public function toggleStatus($id): RedirectResponse
        {
                return $this->insuranceRepository->toggleStatus($id);
        }
}
