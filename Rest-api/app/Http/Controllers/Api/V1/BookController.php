<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Models\BookModel;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //index
    public function index()
    {
        return response()->json(BookModel::all());
    }
    //View
    public function view($id)
    {
        $book = BookModel::where('bookID', $id)->get();
        return response()->json($book);
        // return response()->json(BookModel::where('bookID', $id)->get());
    }
    //View-publisher ID
    public function view2($id)
    {
        return response()->json(BookModel::where('id', $id)->get());
    }
    //TotView
    public function totView($id)
    {
        $book = BookModel::join('admin_models', 'admin_models.id', '=', 'book_models.id')
            ->where('book_models.bookID', $id)
            ->get(['book_models.title', 'book_models.img', 'book_models.id', 'admin_models.name', 'admin_models.location']);
        return response()->json($book);
    }
    //store
    public function store(StoreBookRequest $request)
    {
        BookModel::create($request->validated());
        return response()->json("Book Data Inserted");
    }
    // Upload image
    public function upload(Request $request)
    {

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            // $extention = $file->getClientOriginalExtension();
            $fileName = $file->getClientOriginalName();
            $newImg = time() . $fileName;
            $file->move('storage/uploads/', $newImg);
            // You might want to return the full URL of the uploaded image instead of just the file name
            $imageUrl = asset('storage/uploads/' . $newImg);
            // Return the image URL as a response
            return response()->json($imageUrl);
        } else {
            return response()->json(['error' => 'Upload Unsuccessful'], 400);
        }
    }

    //update
    public function update(StoreBookRequest $request, $id)
    {
        $data = BookModel::where('bookID', $id);
        $data->update($request->validated());
        return response()->json("Book Data Updated");
    }
    //Delete method
    public function delete($id)
    {

        $user = BookModel::where('bookID', $id);
        // $file->move('storage/uploads/', $newImg);
        // $user = BookModel::find($id);

        $path = "storage/uploads/";
        // $file = $user->get('img');

        // Decode the JSON data into a PHP array
        $data = json_decode($user->get('img'), true);
        $imgURL = explode($path, $data[0]['img']);
        $new = $path . $imgURL[1];

        if (file_exists($new)) {
            @unlink($new);
        }
            $user->delete();



        return response()->json($new);

        // return response()->json("Data Deleted");
    }
}
