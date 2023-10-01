<?php

namespace App\Interfaces\Repository;

use Illuminate\Http\Request;

interface DatabasePackagesInterface
{
        public function index();
        /**
         * Show the form for creating a new resource.
         */
        public function create();
        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id);
        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id);
        /**
         * Toggle status package
         */
        public function toggleStatus(Request $request);
}
