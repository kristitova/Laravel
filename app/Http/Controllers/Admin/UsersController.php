<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\QueryBuilders\UsersQueryBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\User;


class UsersController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @param UsersQueryBuilder $usersQueryBuilder
     * @return View
     */
    public function index(UsersQueryBuilder $usersQueryBuilder):View
    {
        return \view('admin.users.index', [
            'usersList' => $usersQueryBuilder->getAll(),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return \view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
        ]);

        return response()->json($request->all(['username', 'review']));
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
     * @param User $users
     * @param UsersQueryBuilder $usersQueryBuilder
     * @return View
     */
    public function edit(User $users, UsersQueryBuilder $usersQueryBuilder): View
    {
        dd($users);
        return \view('admin.users.edit', [
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest $request
     * @param  User $users
     * @return RedirectResponse
     */
    public function update(EditRequest $request, User $users): RedirectResponse
    {
        $users = $users->fill($request->validated());
    
        if ($users->save()) {
            return \redirect()->route('admin.users.index')->with('success', 'Пользователь успешно обновлен');
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
