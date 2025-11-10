<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\ApplyForm;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ApplyController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ApplyForm::latest()->get();
            if (!empty($request->input('search.value'))) {
                $searchTerm = $request->input('search.value');
                $data->where('first_name', 'LIKE', "%$searchTerm%");
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('full_name', function ($data) {
                    return $data->first_name . ' ' . $data->last_name;
                })
                ->addColumn('phone', function ($data) {
                    return $data->code . '' . $data->phone;
                })
                ->addColumn('accept_credit_cards', function ($data) {

                    if ($data->accept_credit_cards == 'yes') {
                        return '<span class="badge bg-success text-white">Yes</span>';
                    } else {
                        return '<span class="badge bg-danger text-white">No</span>';
                    }
                    
                })
                ->addColumn('website', function ($data) {
                    return "<a href='" . $data->website . "' target='_blank'>" . $data->website . "</a>";
                })
                ->addColumn('have_website', function ($data) {
                    if ($data->have_website == 'yes') {
                        return '<span class="badge bg-success text-white">Yes</span>';
                    } else {
                        return '<span class="badge bg-danger text-white">No</span>';
                    }
                })
                ->addColumn('receive_call', function ($data) {
                    if ($data->receive_call == 'yes') {
                        return '<span class="badge bg-success text-white">Yes</span>';
                    } else {
                        return '<span class="badge bg-danger text-white">No</span>';
                    }
                })
                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-md" role="group" aria-label="Basic example">
                              <a href="#" onclick="showDeleteConfirm(' . $data->id . ')" type="button" class="text-white btn btn-danger btn-xl" title="Delete">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="16"  height="16"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" /><path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" /></svg>
                            </a>
                            </div>';
                })
                ->rawColumns(['full_name', 'action', 'phone', 'accept_credit_cards', 'have_website', 'receive_call', 'website'])
                ->make();
        }
        return view('backend.layouts.apply.index');
    }

    public function destroy($id)
    {
        $data = ApplyForm::findOrFail($id);

        $data->delete();

        return response()->json([
            't-success' => true,
            'message'   => 'Apply User Deleted successfully.',
        ]);
    }
}
