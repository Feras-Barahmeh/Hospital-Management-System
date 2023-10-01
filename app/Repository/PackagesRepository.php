<?php

namespace App\Repository;

use App\Interfaces\Repository\DatabasePackagesInterface;
use App\Models\Package;
use App\Traits\Messages;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PackagesRepository implements DatabasePackagesInterface
{
        use Messages;

        public function index(): View|\Illuminate\Foundation\Application|Factory|Application
        {
                return view('dashboard.admin.packages.index', [
                        'packages' => Package::all(),
                ]);
        }


        /**
         * Show the form for creating a new resource.
         */
        public function create(): View|\Illuminate\Foundation\Application|Factory|Application
        {
                return view('dashboard.admin.packages.add');
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id): View|\Illuminate\Foundation\Application|Factory|Application
        {
                return view('dashboard.admin.packages.edit', [
                        'id' => $id,
                        'package' => Package::find($id),
                ]);
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id): false|RedirectResponse
        {
                $package = Package::find($id);
                $name = $package->package_name ?? '';
                if ($package && $package->delete()) {
                        self::popupSuccess('packages', 'success_delete', $name);
                        return Redirect::route('admin.packages.index');
                }

                self::popupFail('packages', 'failed');
                return Redirect::back();
        }

        /**
         * Toggle status package
         */
        public function toggleStatus(Request $request): RedirectResponse
        {
                $package = Package::find($request->input('id'));

                $package->status = ! $package->status;
                $package->save();
                self::successNotification('packages', 'success_toggle_status');
                return Redirect::route('admin.packages.index');
        }
}
