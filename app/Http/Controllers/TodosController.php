<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
    /**
     * List Todos 
     * @param Nill
     * @return Array $todos
     * @author Elijah Aborisade
     */
    public function index(Request $request)
    {
        try{
            $todos = Http::withHeaders([
            ])->get($this->getBaseEndpointURL( 'todos' ));

            $todos = json_decode( $todos->body() );

            return view('dashboard', ['todos' => $todos->todos]);
        } catch (\Throwable $th) {

            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    /**
     * Edit Todo
     * @param Integer $todo
     * @return Collection $todo
     * @author Elijah Aborisade
     */
    public function edit($id)
    {
        try{
            $todo = Http::withHeaders([
            ])->get($this->getBaseEndpointURL( 'todos/'.$id ));

            $todo = json_decode( $todo->body() );

            return view('edit', ['todo' => $todo->todo]);
        } catch (\Throwable $th) {

            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function show(Request $request, $id)
    {
        try{
            $todo = Http::withHeaders([
            ])->get($this->getBaseEndpointURL( 'todos/'.$id ));

            $todo = json_decode( $todo->body() );

            return view('show', ['todo' => $todo]);
            
        } catch (\Throwable $th) {

            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function byUserId(Request $request)
    {
        try{
            $todos = Http::withHeaders([
            ])->get($this->getBaseEndpointURL( 'todos' ));

            $todos = json_decode( $todos->body() );

            return view('dashboard', ['todos' => $todos->todos]);
            
        } catch (\Throwable $th) {

            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    /**
     * Update Todo
     * @param Request $request, $id
     * @author Elijah Aborisade
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        try {
            $todo = Http::withHeaders([
            ])->put($this->getBaseEndpointURL( 'todos/'.$id ), $data);

            return redirect()->route('dashboard')->with('Success','Todo Updated Successfully.');

        } catch (\Throwable $th) {

            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }

    }

    /**
     * Create Todo 
     * @param Nill
     * @return Array $todo
     * @author Elijah Aborisade
     */
    public function create(Request $request)
    {
        return view('add');
    }

    /**
     * Store Todo
     * @param Request $request
     * @author Elijah Aborisade
     */
    public function store(Request $request)
    {       
        $data = $request->all();
        try{
            $todo = Http::withHeaders([
            ])->post($this->getBaseEndpointURL( 'todos' ), $data );

            $todo = json_decode( $todo->body() );

            return redirect()->route('dashboard');           
        } catch (\Throwable $th) {

            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    /**
     * Delete Todo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            $todo = Http::withHeaders([
            ])->delete($this->getBaseEndpointURL( 'todos/'.$id ));

            return redirect()->route('dashboard')->with('success','Todo deleted successfully.');
        } catch (\Throwable $th) {
            
            return redirect()->route('')->with('error',$th->getMessage());
        }
    }
}
