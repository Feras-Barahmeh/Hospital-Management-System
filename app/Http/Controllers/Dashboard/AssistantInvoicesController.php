<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repository\AssistantInvoicesRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AssistantInvoicesController extends Controller
{
        private AssistantInvoicesRepository $assistantInvoicesRepository;

        public function __construct(AssistantInvoicesRepository $assistantInvoicesRepository)
        {
                $this->assistantInvoicesRepository = $assistantInvoicesRepository;
        }

        /**
         * Display a listing of the resource.
         */
        public function index(): \Illuminate\Foundation\Application|Factory|View|Application
        {
                return $this->assistantInvoicesRepository->index();
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create(): \Illuminate\Foundation\Application|Factory|View|Application
        {
                return $this->assistantInvoicesRepository->create();
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
        public function edit(string $id): \Illuminate\Foundation\Application|Factory|View|Application
        {
                return $this->assistantInvoicesRepository->edit($id);
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
        public function destroy(string $id): RedirectResponse
        {
                return $this->assistantInvoicesRepository->destroy($id);
        }
}
