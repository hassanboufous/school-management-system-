<?php

namespace App\Http\Controllers\library;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Models\Library;
use App\Repository\library\LibraryRepositoryInterface;
use Illuminate\Http\Request;

class LibraryController extends Controller
{

    protected $library;

    public function __construct(LibraryRepositoryInterface $library)
    {
        $this->library = $library;
    }

    public function index(){
      return $this->library->index();
    }

    public function create(){
       return $this->library->create();
    }

    public function store(StoreBookRequest $request){
       return $this->library->store($request);
    }

    public function edit($id){
       return $this->library->edit($id);
    }

    public function update(Request $request, $id){
       return $this->library->update($request,$id);
    }

    public function destroy($id){
      return $this->library->destroy($id);
    }

    public function download($id){
      return $this->library->download($id);
    }
}
