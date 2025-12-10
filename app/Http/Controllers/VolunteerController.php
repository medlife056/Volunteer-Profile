<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\VolunteerService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VolunteerController extends Controller
{
    protected $volunteerService;

    public function __construct(VolunteerService $volunteerService)
    {
        $this->volunteerService = $volunteerService;
    }

    public function info()
    {
        $userId = Auth::id();
        $volunteer = $this->volunteerService->getProfile($userId);

        return response()->json([
            'volunteer' => $volunteer
        ]);
    }

    public function updateInfo(Request $request)
    {
        $userId = Auth::id();

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');

            $oldPhotoPath = $this->volunteerService->getProfile($userId)->photo_path;
            if ($oldPhotoPath && Storage::exists($oldPhotoPath)) {
                Storage::delete($oldPhotoPath);
            }

            $path = $photo->store('volunteer_photos', 'public');
            $data['photo_path'] = $path;
        }

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $volunteer = $this->volunteerService->updateProfile($userId, $data);

        return response()->json([
            'message' => 'updated',
            'volunteer' => $volunteer
        ]);
    }

}
