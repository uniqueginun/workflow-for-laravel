<?php

use App\Imports\StructureImport;
use App\Models\Structure;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

function addChildrenRecursively(&$item, $collection): void
{
    $children = $collection->where('parent_id', $item['id']);

    if ($children->isNotEmpty()) {
        $item['children'] = collect();
        $children->each(function ($child) use (&$item, $collection) {
            addChildrenRecursively($child, $collection);
            $item['children']->push($child);
        });
    }
}

Route::get('/', function () {
    //Excel::import(new StructureImport(), storage_path('app/public/structure.xlsx'));

    $baseCollection = Structure::query()->orderBy('id')->get()->transform(function ($item) {
        $item['text'] = $item->name;
        $item['opened'] = false;
        $item['data'] = ['id' => $item['id'], 'parent_id' => $item['parent_id']];
        $item['children'] = collect();
        return $item;
    });

    $tree = collect();

    $baseCollection->each(function (&$item) use ($baseCollection, &$tree) {
        if ($item['parent_id'] === null) {
            addChildrenRecursively($item, $baseCollection);
            $tree->push($item);
        }
    });

    return view('welcome', [
        'tree' => $tree,
        'base' => $baseCollection
    ]);
});
