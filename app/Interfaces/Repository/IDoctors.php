<?php

namespace App\Interfaces\Repository;

use Illuminate\Http\Request;

interface IDoctors
{
    public function index();
    public function create();
    public function store(Request $request);
    public function update(Request $request);
    public function destroy($id);
    public function purge(Request $request);
}
