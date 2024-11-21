<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function markAsReadAjax($id)
    {
        $notification = Notification::find($id);
    
        if ($notification) {
            // Mark the notification as read
            $notification->read_status = 1;
            $notification->save();
    
            return response()->json(['success' => true, 'message' => 'Notification marked as read']);
        }
    
        return response()->json(['success' => false, 'message' => 'Notification not found'], 404);
    }
public function showAll()
{
    return redirect()->route('dashboard');
}
}