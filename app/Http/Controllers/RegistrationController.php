<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'meeting_id' => 'required',
            'user_id' => 'required'
        ]);

        $meeting_id = $request->input('meeting_id');
        $user_id = $request->input('user_id');

        $meeting = [
            'title' => 'Title',
            'descriptopn' => 'Description',
            'time' => 'Time',
            'view_meeting' => [
                'href' => 'api/v1/meeting/1',
                'method' => 'GET',
            ],
        ];

        $user = [
            'name' => 'Name',
        ];

        $response = [
            'msg' => 'User registered for meeting',
            'meeting' => $meeting,
            'user' => $user,
            'unregister' => [
                'href' => 'api/v1/meeting/registration/1',
                'method' => 'DELETE'
            ],
        ];

        return response()->json($response,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meeting = [
            'title' => 'Title',
            'descriptopn' => 'Description',
            'time' => 'Time',
            'view_meeting' => [
                'href' => 'api/v1/meeting/1',
                'method' => 'GET',
            ],
        ];

        $user = [
            'name' => 'Name',
        ];

        $response = [
            'msg' => 'User unregistered from meeting',
            'meeting' => $meeting,
            'user' => $user,
            'register' => [
                'href' => 'api/v1/meeting/registration',
                'method' => 'POST',
                'params' => 'user_id, meeting_id'
            ],
        ];

        return response()->json($response,200);
    }
}
