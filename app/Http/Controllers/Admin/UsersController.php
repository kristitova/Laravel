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
use App\Http\Requests\Users\EditRequest;
use App\Http\Requests\Users\CreateRequest;


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
   // public function store(Request $request)
  //  {
   //    $request->validate([
   //        'username' => 'required',
   //     ]);

    //   return response()->json($request->all(['username', 'review']));
    

//}

 /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $user = User::create($request->validated());

        if ($user) {
            return \redirect()->route('admin.users.index')->with('success', __('messages.admin.users.success'));
        }

        return \back()->with('error', __('messages.admin.users.fail'));
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
     * @param User $user
     * @param UsersQueryBuilder $usersQueryBuilder
     * @return View
     */
    public function edit(User $user, UsersQueryBuilder $usersQueryBuilder): View
    {
    
        return \view('admin.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest $request
     * @param  User $user
     * @return RedirectResponse
     */
    public function update(EditRequest $request, User $user): RedirectResponse
    {
        $users = $user->fill($request->validated());
    
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
