<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipDistricts;
use App\Models\ShipDivision;
use App\Models\ShipState;
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

    public function AllDistrict() {
        $districts = ShipDistricts::latest()->get();
        return view('backend.ship.district.district_all', compact('districts'));
    }

    public function AddDistrict() {
        $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
        return view('backend.ship.district.district_add', compact('divisions'));
    }

    public function StoreDistrict(Request $request) {
        ShipDistricts::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
        ]);

        $notification = [
            'message' => 'Shipping District Inserted Successfully!',
            'alert-mesage' => 'success',
        ];

        return redirect()->route('all.district')->with($notification);
    }

    public function EditDistrict($id) {
        $district = ShipDistricts::findOrFail($id);
        $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
        return view('backend.ship.district.district_edit', compact('district', 'divisions'));
    }

    public function UpdateDistrict(Request $request) {
        ShipDistricts::findOrFail($request->id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
        ]);

        $notification = [
            'message' => 'Shipping District Updated Successfully!',
            'alert-mesage' => 'success',
        ];

        return redirect()->route('all.district')->with($notification);
    }

    public function DeleteDistrict($id) {
        ShipDistricts::findOrFail($id)->delete();

        $notification = [
            'message' => 'Shipping District Deleted Successfully!',
            'alert-mesage' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function AllState() {
        $states = ShipState::latest()->get();
        return view('backend.ship.state.state_all', compact('states'));
    }

    public function AddState() {
        $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
        $districts = ShipDistricts::orderBy('district_name', 'ASC')->get();
        return view('backend.ship.state.state_add', compact('divisions', 'districts'));
    }

    public function GetDistrict($division_id) {
        $district = ShipDistricts::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($district);
    }

    public function StoreState(Request $request) {
        ShipState::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
        ]);

        $notification = [
            'message' => 'Shipping State Inserted Successfully!',
            'alert-mesage' => 'success',
        ];

        return redirect()->route('all.state')->with($notification);
    }
}
