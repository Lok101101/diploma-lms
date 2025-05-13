<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function createTest(Request $request) {
        Test::create($request->all());

        return redirect()->route('getMyTests');
    }

    public function getMyTests(Request $request) {
        return view('tests.my-tests', ['tests' => Test::get()]);
    }

    public function changeTest(Test $test) {
        return view('tests.test-change-constructor', ['test' => $test]);
    }

    public function saveTest(Request $request) {
        Test::where('id', '=', $request->id)->update(['content' => $request->content]);

        return redirect()->route('getMyTests');
    }

    public function test() {
        return view('tests.test', ['test' => Test::inRandomOrder()->first()]);
    }

    public function deleteTest(Test $test) {
        $test->delete();

        return redirect()->route('getMyTests');
    }
}
