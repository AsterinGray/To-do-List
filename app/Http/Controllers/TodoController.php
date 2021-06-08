<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort = $request->query('sort');
        $user_id = auth()->user()->id;
        $date = Carbon::now();
        $target_date = Carbon::now()->addDay(7);

        if(!$sort){
            $todos = Todo::where('user_id', $user_id)->get();
            $notifs = Todo::where('user_id', $user_id)->whereDate('enddate', '<', $target_date)->get();
            return view('dashboard', compact('todos','notifs')); 
        }else if ($sort == 'asc'){
            $todos = Todo::where('user_id', $user_id)->orderBy('enddate', 'asc')->get();
            $notifs = Todo::where('user_id', $user_id)->whereDate('enddate', '<', $target_date)->get();
            return view('dashboard', compact('todos','notifs'));
        }else if($sort == 'desc'){
            $todos = Todo::where('user_id', $user_id)->orderBy('enddate', 'desc')->get();
            $notifs = Todo::where('user_id', $user_id)->whereDate('enddate', '<', $target_date)->get();
            return view('dashboard', compact('todos','notifs'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user()->id;
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'end' => 'required',
        ]);

        Todo::create([
            'title' => $request->title,
            'description' => $request->desc,
            'enddate' => $request->end,
            'user_id' => $user,
        ]);

        return redirect('/dashboard')->with('status', "Todo created");
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view("edit", compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'end' => 'required',
        ]);

        Todo::where('id', $id)
            ->update([
                'title' => $request->title,
                'description' => $request->desc,
                'enddate' => $request->end,
            ]);
        return redirect('/dashboard')->with('status', 'Todo Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::destroy($id);
        return redirect('/dashboard')->with('status', 'Task Deleted!');
    }

    public function changeToDo($id)
    {
        Todo::where('id', $id)
            ->update([
                'status' => "Todo",
            ]);
        return redirect('/dashboard')->with('status', 'Task changed to To-do!');
    }

    public function changeToComp($id)
    {
        Todo::where('id', $id)
            ->update([
                'status' => "Completed",
            ]);
        return redirect('/dashboard')->with('status', 'Task changed to Completed!');
    }
}
