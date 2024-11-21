<?php
namespace App\Http\Controllers;

use App\Models\Banner_Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class Banner_controller extends Controller
{
    public function index()
    {
        $test = Banner_Video::all();
        return view('banner_list', compact('test'));
    }
    public function create()
    {
        return view('banner_create');
    }
    public function store(Request $request)
    {
            $request->validate([
                'video' => 'required|file|mimes:mp4|max:20480', // Validate the file input
            ]);
            // Handle the uploaded file
            if ($request->hasFile('video')) {
                $video = $request->file('video');
                $videoName = time() . '.' . $video->getClientOriginalExtension();
                $video->move(public_path('uploads/videos'), $videoName);
        
                // Remove the existing video if it exists
                $existingVideo = Banner_Video::first();
                if ($existingVideo) {
                    if (file_exists(public_path('uploads/videos/' . $existingVideo->video))) {
                        unlink(public_path('uploads/videos/' . $existingVideo->video));
                    }
                    // Update the existing record
                    $existingVideo->update(['video' => $videoName]);
                } else {
                    // Create a new record
                    Banner_Video::create(['video' => $videoName]);
                }
            }
        // Redirect to the banners list with a success message
        return redirect()->route('banners.list')->with('success', 'Banner video added successfully!');
    }
   
    public function edit($id)
    {
        $banner = Banner_Video::findOrFail($id); // Use a clearer variable name
        return view('banner_edit', [
            'banner' => $banner // Change variable name for clarity
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $banner = Banner_Video::findOrFail($id);
        
        // Initialize validation rules
        $rules = [];
        
        // Check if a new video is uploaded
        if ($request->hasFile('video')) {
            $rules['video'] = 'required|mimes:mp4,mov,avi,wmv|max:15360'; // max:15360 is 15MB
        }
    
        // Custom validation messages
        $customMessages = [
            'video.max' => 'The uploaded video size must not exceed 15 MB.', // Custom message for max size
            'video.required' => 'Please upload a video.', // Custom message for required video
            'video.mimes' => 'Only video files (mp4, mov, avi, wmv) are allowed.' // Custom message for type
        ];
    
        // Validate the request
        $validator = Validator::make($request->all(), $rules, $customMessages);
        if ($validator->fails()) {
            return redirect()->route('banners.edit', $id)->withInput()->withErrors($validator);
        }
    
        // Handle video upload
        if ($request->hasFile('video')) {
            // If there is an existing video, delete it (optional, based on your logic)
            if ($banner->video) {
                $existingVideoPath = public_path('uploads/videos/' . $banner->video);
                if (file_exists($existingVideoPath)) {
                    unlink($existingVideoPath); // Delete the old video file
                }
            }
            // Store the new video
            $video = $request->file('video');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $banner->video = $videoName; 
            $video->move(public_path('uploads/videos'), $videoName); // Move the video to the uploads directory
        }
    
        // Save the banner data
        $banner->save();
    
        return redirect()->route('banners.list')->with('success', 'Banner updated successfully.');
    }
    
    public function destroy($id)
    {
        $banner = Banner_Video::findOrFail($id);
        
        $banner->delete();
    
        return redirect()->route('banners.list')->with('success', 'Banner deleted successfully.');
    }
    
}

