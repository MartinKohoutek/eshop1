<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipDivision;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{
    public function AllDivision() {
        $divisions = ShipDivision::latest()->get();
        return response()->view('backend.ship.division.division_all', compact('divisions'));
    }

    public function AddDivision() {
        return view('backend.ship.division.division_add');
    }

    public function StoreDivision(Request $request) {
        ShipDivision::insert([
            'division_name' => $request->division_name,
        ]);

        $notification = [
            'message' => 'Shipping Division Inserted Successfully!',
            'alert-mesage' => 'success',
        ];

        return redirect()->route('all.division')->with($notification);
    }

    public function EditDivision($id) {
        $division = ShipDivision::findOrFail($id);
        return view('backend.ship.division.division_edit', compact('division'));
    }

    public function UpdateDivision(Request $request) {
        ShipDivision::findOrFail($request->id)->update([
            'division_name' => $request->division_name,
        ]);

        $notification = [
            'message' => 'Shipping Division Updated Successfully!',
            'alert-mesage' => 'success',
        ];

        return redirect()->route('all.division')->with($notification);
    }

    public function DeleteDivision($id) {
        ShipDivision::findOrFail($id)->delete();

        $notification = [
            'message' => 'Shipping Division Deleted Successfully!',
            'alert-mesage' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
