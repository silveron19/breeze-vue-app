<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::select('id', 'name', 'price')->get();

        return Inertia::render('Items/Index', [
            'items' => $items,
        ]);
    }

    public function create()
    {
        return Inertia::render('Items/Create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $item = new Item([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
        ]);

        $item->user_id = Auth::id();
        $item->save();

        return Redirect::route('items.index')->with('success', 'Item has been added');
    }

    public function edit(Item $item)
    {
        return Inertia::render('Items/Edit', ['item' => $item]);
    }

    public function update(Item $item, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $item->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);

        return Redirect::route('items.index')->with('success', 'Item has been updated');
    }
    public function destroy(Item $item, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $item->delete([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);

        return Redirect::route('items.index')->with('success', 'Item has been deleted');
    }
}
