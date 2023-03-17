<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TelegramCommand;
use App\Models\TelegramUser;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return $this->show(0);
        // $commands = TelegramCommand::all();
        // return view('backend.index', ['commands' => $commands]);
    }

    public function show($id)
    {

        $commands = TelegramCommand::where('parent_id','like', $id)->get();
        $newCommand_id = TelegramCommand::where('command_id', 'REGEXP', '^([,|.]?[0-9])+$')->get()->max('command_id');
        return view('backend.index', ['commands' => $commands, 'newCommand_id' => $newCommand_id]);
    }

    public function destroy($id)
    {
        $parent_id = TelegramCommand::where('command_id','like', $id)->get('parent_id')->first();
        $parent_id = $parent_id['parent_id'] ?? 0;
        $command = TelegramCommand::where('command_id','like', $id)->firstorfail()->delete();
        return redirect()->route('admin.commands.show', ['id' => $parent_id]);
        //return $this->show($parent_id??0);
    }

    public function store(Request $request)
    {

        $command = new TelegramCommand;
        foreach ($request->except('_token') as $key => $value) {
            if ($key == 'command_id')
                $command->command_id = $request->$key ?? '';
            if ($key == 'parent_id')
                $command->parent_id = $request->$key ?? '';
            if ($key == 'name')
                $command->name = $request->$key ?? '';
            if ($key == 'description')
                $command->description = $request->$key ?? "";
        }
        $command->save();


        return redirect()->route('admin.commands.show', ['id' => ($command->parent_id ?? 0)]);
    }

    public function update(Request $request, $id)
    {
        $command = TelegramCommand::where('command_id','like', $id)->get();
        foreach ($request->except('_token') as $key => $value) {
            if ($key == 'command_id')
                $command = TelegramCommand::where('command_id', $id)->update(['command_id' => $request->$key ?? ""]);
            if ($key == 'parent_id')
                $command = TelegramCommand::where('command_id', $id)->update(['parent_id' => $request->$key ?? ""]);
            if ($key == 'name')
                $command = TelegramCommand::where('command_id', $id)->update(['name' => $request->$key ?? ""]);
            if ($key == 'description')
                $command = TelegramCommand::where('command_id', $id)->update(['description' => $request->$key ?? ""]);
        }

        return redirect()->route('admin.commands.show', ['id' => ($command->parent_id ?? 0)]);
    }
}
