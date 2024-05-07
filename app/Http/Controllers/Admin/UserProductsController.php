<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserProductRequest;
use App\Http\Requests\StoreUserProductRequest;
use App\Http\Requests\UpdateUserProductRequest;
use App\Models\Product;
use App\Models\Usere;
use App\Models\UserProduct;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserProductsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userProducts = UserProduct::with(['productid', 'user'])->get();

        return view('admin.userProducts.index', compact('userProducts'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productids = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = Usere::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.userProducts.create', compact('productids', 'users'));
    }

    public function store(StoreUserProductRequest $request)
    {
        $userProduct = UserProduct::create($request->all());

        return redirect()->route('admin.user-products.index');
    }

    public function edit(UserProduct $userProduct)
    {
        abort_if(Gate::denies('user_product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productids = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = Usere::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $userProduct->load('productid', 'user');

        return view('admin.userProducts.edit', compact('productids', 'userProduct', 'users'));
    }

    public function update(UpdateUserProductRequest $request, UserProduct $userProduct)
    {
        $userProduct->update($request->all());

        return redirect()->route('admin.user-products.index');
    }

    public function show(UserProduct $userProduct)
    {
        abort_if(Gate::denies('user_product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userProduct->load('productid', 'user');

        return view('admin.userProducts.show', compact('userProduct'));
    }

    public function destroy(UserProduct $userProduct)
    {
        abort_if(Gate::denies('user_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userProduct->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserProductRequest $request)
    {
        $userProducts = UserProduct::find(request('ids'));

        foreach ($userProducts as $userProduct) {
            $userProduct->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
