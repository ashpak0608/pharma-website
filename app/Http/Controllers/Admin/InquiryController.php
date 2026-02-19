<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        $query = Inquiry::query();
        
        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('phone', 'LIKE', "%{$search}%")
                  ->orWhere('message', 'LIKE', "%{$search}%");
            });
        }
        
        // Status filter
        if ($request->has('status') && $request->status !== '') {
            if ($request->status == 'unread') {
                $query->where('status', 0);
            } elseif ($request->status == 'read') {
                $query->where('status', 1);
            }
        }
        
        // Date filter
        if ($request->has('date') && !empty($request->date)) {
            $query->whereDate('created_at', $request->date);
        }
        
        // Get paginated results
        $inquiries = $query->latest()->paginate(10);
        
        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function show(Inquiry $inquiry)
    {
        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return redirect()->route('admin.inquiries.index')->with('success', 'Inquiry deleted successfully');
    }

    public function markAsRead(Inquiry $inquiry)
    {
        $inquiry->update(['status' => 1]);
        return redirect()->back()->with('success', 'Inquiry marked as read');
    }
}