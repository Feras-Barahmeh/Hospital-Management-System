<?php

namespace App\Interfaces\Repository;

use Illuminate\Http\Request;

interface IDoctors
{
    public function all();

    public function store(Request $request);

    public function update(Request $request);

    public function destroy($id);
}
