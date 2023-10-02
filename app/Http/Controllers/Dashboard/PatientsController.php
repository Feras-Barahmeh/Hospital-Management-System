<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repository\PatientRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PatientsController extends Controller
{
        private PatientRepository $patientRepository;

        public function __construct(PatientRepository $patientRepository)
        {
                $this->patientRepository = $patientRepository;
        }

        /**
         * Display a listing of the resource.
         */
        public function index(): \Illuminate\Foundation\Application|Factory|View|Application
        {
                return $this->patientRepository->index();
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create(): \Illuminate\Foundation\Application|Factory|View|Application
        {
                return $this->patientRepository->create();
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request): RedirectResponse
        {
                return $this->patientRepository->store($request);
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
                return $this->patientRepository->edit($id);
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
                return $this->patientRepository->update($request, $id);
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
                return $this->patientRepository->destroy($id);
        }
}
