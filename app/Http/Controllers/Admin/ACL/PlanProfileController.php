<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanplanController extends Controller
{

    protected $plan, $Profile;

    public function __construct(Plan $plan, Profile $Profile)
    {
        $this->plan = $plan;
        $this->Profile = $Profile;
    }

    public function profiles($idplan)
    {
        if (!$plan = $this->plan->find($idplan)) {
            return redirect()->back();
        }

        $profiles = $plan->profiles()->paginate();

        return view('admin.pages.plans.profiles.profiles', compact('plan', 'profiles'));
    }

    public function plans($idProfile)
    {
        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }

        $plans = $profile->plans()->paginate();

        return view('admin.pages.profiles.plans.plans', compact('plans', 'profile'));
    }

    public function profilesAvailable(Request $request, $idplan)
    {
        if (!$plan = $this->plan->find($idplan)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $profiles = $plan->profilesAvailable($request->filter);

        return view('admin.pages.plans.profiles.available', compact('profiles', 'plan', 'filters'));
    }

    public function attachProfilesplan(Request $request, $idPlan)
    {
        if (!$plan = $this->plan->find($idPlan)) {
            return redirect()->back();
        }

        if (!$request->profiles || count($request->profiles) == 0) {
            return redirect()
                        ->back()
                        ->with('info', 'Precisa escolher pelo menos uma permissão');
        }

        $plan->profiles()->attach($request->profiles);

        return redirect()->route('plans.profiles', $plan->id);
    }

    public function detachProfilesplan($idPlan, $idProfile)
    {
        $plan = $this->plan->find($idPlan);
        $profile = $this->profile->find($idProfile);

        if (!$plan || !$profile) {
            return redirect()->back();
        }

        $plan->profiles()->detach($profile);
        return redirect()->route('plans.profiles', $plan->id);
    }
}
