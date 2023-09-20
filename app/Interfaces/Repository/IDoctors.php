<?php

namespace App\Interfaces\Repository;

use Illuminate\Http\Request;

interface IDoctors
{
    public function index();
    public function create();
    public function store(Request $request);
    public function show(string $id);
    public function edit(string $id);
    public function update(Request $request, string $id);
    public function destroy($id);
    public function purge(Request $request);
    public function resetPassword(Request $request);
    public function toggleStatus(Request $request);
}
