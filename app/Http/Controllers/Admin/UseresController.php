<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUsereRequest;
use App\Http\Requests\StoreUsereRequest;
use App\Http\Requests\UpdateUsereRequest;
use App\Models\Usere;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UseresController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('usere_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $useres = Usere::all();

        return view('admin.useres.index', compact('useres'));
    }

    public function create()
    {
        abort_if(Gate::denies('usere_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.useres.create');
    }

    public function store(StoreUsereRequest $request)
    {
        $usere = Usere::create($request->all());

        return redirect()->route('admin.useres.index');
    }

    public function edit(Usere $usere)
    {
        abort_if(Gate::denies('usere_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.useres.edit', compact('usere'));
    }

    public function update(UpdateUsereRequest $request, Usere $usere)
    {
        $usere->update($request->all());

        return redirect()->route('admin.useres.index');
    }

    public function show(Usere $usere)
    {
        abort_if(Gate::denies('usere_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.useres.show', compact('usere'));
    }

    public function destroy(Usere $usere)
    {
        abort_if(Gate::denies('usere_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usere->delete();

        return back();
    }

    public function massDestroy(MassDestroyUsereRequest $request)
    {
        $useres = Usere::find(request('ids'));

        foreach ($useres as $usere) {
            $usere->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
