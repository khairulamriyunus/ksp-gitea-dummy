<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeaveRequest;
use App\Http\Requests\UpdateLeaveRequest;
use App\Models\Leave;

class LeaveController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Leave::class);
        $records = Leave::paginate(25);
        return view('leaves.index', compact('records'));
    }

    public function create()
    {
        $this->authorize('create', Leave::class);
        return view('leaves.create');
    }

    public function store(StoreLeaveRequest $request)
    {
        $this->authorize('create', Leave::class);
        $record = Leave::create($request->validated());
        return redirect()->route('leaves.show', $record);
    }

    public function show(Leave $leave)
    {
        $this->authorize('view', $leave);
        return view('leaves.show', ['record' => $leave]);
    }

    public function edit(Leave $leave)
    {
        $this->authorize('update', $leave);
        return view('leaves.edit', ['record' => $leave]);
    }

    public function update(UpdateLeaveRequest $request, Leave $leave)
    {
        $this->authorize('update', $leave);
        $leave->update($request->validated());
        return redirect()->route('leaves.show', $leave);
    }

    public function destroy(Leave $leave)
    {
        $this->authorize('delete', $leave);
        $leave->delete();
        return redirect()->route('leaves.index');
    }
}