<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repository\DoctorRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DoctorController extends Controller
{

    private DoctorRepository $doctorRepository;

    public function __construct(DoctorRepository $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return $this->doctorRepository->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Factory|Application|\Illuminate\Contracts\Foundation\Application
    {
        return $this->doctorRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        return $this->doctorRepository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View|Factory|Application|\Illuminate\Contracts\Foundation\Application
    {
        return $this->doctorRepository->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View|Factory|Application|\Illuminate\Contracts\Foundation\Application
    {
        return $this->doctorRepository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->doctorRepository->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        return $this->doctorRepository->destroy($id);
    }

    public function purge(Request $request): RedirectResponse
    {
        return $this->doctorRepository->purge($request);
    }

    /**
     * Change Password
     */
    public function resetPassword(Request $request): RedirectResponse
    {
        return $this->doctorRepository->resetPassword($request);
    }
    /**
     * Toggle status doctor
     */
    public function toggleStatus(Request $request): RedirectResponse
    {
        return $this->doctorRepository->toggleStatus($request);
    }
}
