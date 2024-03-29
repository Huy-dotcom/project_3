<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Auth::guard('admin')->user()->notifications()->orderBy('read_at', 'asc')->orderBy('created_at', 'desc')->get();
        return view('admin.notifications.list', compact('notifications'));
    }

    public function markAllAsRead()
    {
        Auth::guard('admin')->user()->unreadNotifications->markAsRead();
        $notifications = Auth::guard('admin')->user()->notifications()->orderBy('read_at', 'asc')->orderBy('created_at', 'desc')->get();
        foreach ($notifications as $k => $notification) {
            $notifications[$k]['date_read'] = date('d/m/Y H:i:s', strtotime($notification->read_at));
        }
        return response()->json([
            'status' => 200,
            'notifications' => $notifications,
            'check' => Auth::guard('admin')->user()->unreadNotifications->count() - 1,
            'id' => Auth::guard('admin')->user()->id,
        ]); 
    }

    public function markAsRead(Request $request)
    {
        Auth::guard('admin')->user()->unreadNotifications->where('id', $request->id)->markAsRead();
        return response()->json([
            'status' => 200,
            'count' => Auth::guard('admin')->user()->unreadNotifications->count() - 1,
            'date_read' => date('d/m/Y H:i:s', strtotime(Auth::guard('admin')->user()->notifications()->where('id', $request->id)->first()->read_at)),
            'check' => Auth::guard('admin')->user()->unreadNotifications->count() - 1,
            'id' => Auth::guard('admin')->user()->id,
        ]); 
    }

    public function render()
    {
        return response()->json([
            'status' => 200,
            'html' => view('admin.layouts.includes.notification')->render(),
            'id' => Auth::guard('admin')->user()->id,
            'count' => Auth::guard('admin')->user()->unreadNotifications->count() < 3 ? Auth::guard('admin')->user()->unreadNotifications->count() : '3+',
            'check' => Auth::guard('admin')->user()->unreadNotifications->count()
        ]);
    }
}
