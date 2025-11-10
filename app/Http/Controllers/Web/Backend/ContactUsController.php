<?php

namespace App\Http\Controllers\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Yajra\DataTables\Facades\DataTables;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ContactUs::latest()->get();
            if (!empty($request->input('search.value'))) {
                $searchTerm = $request->input('search.value');
                $data->where('name', 'LIKE', "%$searchTerm%");
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('message', function ($data) {
                    $message       = $data->message;
                    $short_message = strlen($message) > 300 ? substr($message, 0, 300) . '...' : $message;
                    return '<p>' . $short_message . '</p>';
                })
                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-md" role="group" aria-label="Basic example">
                              <a href="#" onclick="showDeleteConfirm(' . $data->id . ')" type="button" class="text-white btn btn-danger btn-xl" title="Delete">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="16"  height="16"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" /><path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" /></svg>
                            </a>
                            </div>';
                })
                ->rawColumns(['message', 'status', 'action'])
                ->make();
        }
        return view('backend.layouts.contact-us.index');
    }

    public function destroy($id)
    {
        $data = ContactUs::findOrFail($id);

        $data->delete();

        return response()->json([
            't-success' => true,
            'message'   => 'Contact Us Deleted successfully.',
        ]);
    }
}
