<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Organization;
use App\Models\Community;
use App\Models\Title;
use App\Models\Staff;

class MainController extends Controller
{
    // ==================== ACTIVITIES ====================
    public function activities() {
        $data = Activity::all();
        return view('activities', compact('data'));
    }

    public function activityStore(Request $request) {
        Activity::create(['name' => $request->name]);
        return redirect('/activities');
    }

    public function activityEdit($id) {
        $item = Activity::findOrFail($id);
        return view('activities_edit', compact('item'));
    }

    public function activityUpdate(Request $request, $id) {
        $item = Activity::findOrFail($id);
        $item->update(['name' => $request->name]);
        return redirect('/activities');
    }

    public function activityDelete($id) {
        $item = Activity::findOrFail($id);
        $item->delete();
        return redirect('/activities');
    }

    // ==================== ORGANIZATIONS ====================
    public function organizations() {
        $data = Organization::all();
        return view('organizations', compact('data'));
    }

    public function organizationStore(Request $request) {
        Organization::create(['name' => $request->name]);
        return redirect('/organizations');
    }

    public function organizationEdit($id) {
        $item = Organization::findOrFail($id);
        return view('organizations_edit', compact('item'));
    }

    public function organizationUpdate(Request $request, $id) {
        $item = Organization::findOrFail($id);
        $item->update(['name' => $request->name]);
        return redirect('/organizations');
    }

    public function organizationDelete($id) {
        $item = Organization::findOrFail($id);
        $item->delete();
        return redirect('/organizations');
    }

    // ==================== COMMUNITIES ====================
    public function communities() {
        $data = Community::all();
        return view('communities', compact('data'));
    }

    public function communityStore(Request $request) {
        Community::create(['name' => $request->name]);
        return redirect('/communities');
    }

    public function communityEdit($id) {
        $item = Community::findOrFail($id);
        return view('communities_edit', compact('item'));
    }

    public function communityUpdate(Request $request, $id) {
        $item = Community::findOrFail($id);
        $item->update(['name' => $request->name]);
        return redirect('/communities');
    }

    public function communityDelete($id) {
        $item = Community::findOrFail($id);
        $item->delete();
        return redirect('/communities');
    }

    // ==================== TITLES ====================
    public function titles() {
        $data = Title::all();
        return view('titles', compact('data'));
    }

    public function titleStore(Request $request) {
        Title::create([
            'title_name' => $request->name
        ]);
        return redirect('/titles');
    }

    public function titleEdit($id) {
        $item = Title::findOrFail($id);
        return view('titles_edit', compact('item'));
    }

    public function titleUpdate(Request $request, $id) {
        $item = Title::findOrFail($id);
        $item->update([
            'title_name' => $request->name
        ]);
        return redirect('/titles');
    }

    public function titleDelete($id) {
        $item = Title::findOrFail($id);
        $item->delete();
        return redirect('/titles');
    }

    // ==================== STAFF (w07 With Relationships) ====================
    public function staff() {
        $data = Staff::with(['title', 'organization'])->get();
        $titles = Title::all();
        $organizations = Organization::all();

        return view('staff', compact('data', 'titles', 'organizations'));
    }

    public function staffStore(Request $request) {
        Staff::create([
            'title_id' => $request->title_id,
            'name' => $request->name,
            'position' => $request->position,
            'organization_id' => $request->organization_id,
        ]);
        return redirect('/staff');
    }

    public function staffEdit($id) {
        $item = Staff::findOrFail($id);
        $titles = Title::all();
        $organizations = Organization::all();

        return view('staff_edit', compact('item', 'titles', 'organizations'));
    }

    public function staffUpdate(Request $request, $id) {
        $item = Staff::findOrFail($id);
        $item->update([
            'title_id' => $request->title_id,
            'name' => $request->name,
            'position' => $request->position,
            'organization_id' => $request->organization_id,
        ]);
        return redirect('/staff');
    }

    public function staffDelete($id) {
        $item = Staff::findOrFail($id);
        $item->delete();
        return redirect('/staff');
    }
}