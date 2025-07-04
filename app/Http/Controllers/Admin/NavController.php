<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNavRequest;
use App\Http\Requests\StoreNavRequest;
use App\Http\Requests\UpdateNavRequest;
use App\Models\Nav;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NavController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('nav_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $navs = Nav::all();

        return view('admin.navs.index', compact('navs'));
    }

    public function create()
    {
        abort_if(Gate::denies('nav_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.navs.create');
    }

    public function store(StoreNavRequest $request)
    {
        $nav = Nav::create($request->all());

        return redirect()->route('admin.navs.index');
    }

    public function edit(Nav $nav)
    {
        abort_if(Gate::denies('nav_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.navs.edit', compact('nav'));
    }

    public function update(UpdateNavRequest $request, Nav $nav)
    {
        $nav->update($request->all());

        return redirect()->route('admin.navs.index');
    }

    public function show(Nav $nav)
    {
        abort_if(Gate::denies('nav_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.navs.show', compact('nav'));
    }

    public function destroy(Nav $nav)
    {
        abort_if(Gate::denies('nav_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nav->delete();

        return back();
    }

    public function massDestroy(MassDestroyNavRequest $request)
    {
        $navs = Nav::find(request('ids'));

        foreach ($navs as $nav) {
            $nav->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
