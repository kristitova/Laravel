<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\QueryBuilders\ResourcesQueryBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Resources;
use Illuminate\Contracts\View\View;
use App\Http\Requests\Users\EditRequest;
use App\Http\Requests\Users\CreateRequest;

class ResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ResourcesQueryBuilder $resourcesQueryBuilder
     * @return View
     */
    public function index(ResourcesQueryBuilder $resourcesQueryBuilder): View
    {
        return \view('admin.resources.index', [
            'resourcesList' => $resourcesQueryBuilder->getAll(),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        //
    }

 /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $resources = Resources::create($request->validated());

        if ($resources) {
            return \redirect()->route('admin.resources.index')->with('success', __('messages.admin.resources.success'));
        }

        return \back()->with('error', __('messages.admin.resources.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Resources $resources
     * @return View
     */
    public function edit(Resources $resources): View
    {
    
        return \view('admin.resources.edit', [
            'resources' => $resources
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest $request
     * @param  Resources $resources
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Resources $resources): RedirectResponse
    {
        $resources = $resources->fill($request->validated());
    
        if ($resources->save()) {
            return \redirect()->route('admin.resources.index')->with('success', 'Ресурс успешно обновлен');
        }

        return \back()->with('error', 'Не удалось сохранить запись');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
