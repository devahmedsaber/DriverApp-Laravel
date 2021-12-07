<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriversRequest;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('dashboard.drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DriversRequest $request)
    {
        // Validation In DriversRequest

        $data = $request->all();

        $this->validate($request, ['password' => 'required|string|min:8']);

        $data['password'] = Hash::make($request->password);

        if ($request->hasFile('avatar_image')) {

            $avatarImage = $request->file('avatar_image');
            $avatarImageExtension = $avatarImage->getClientOriginalExtension();
            $avatarImageName = rand() . '.' . $avatarImageExtension;
            $path = 'public/assets/images/drivers/avatars/';
            $avatarImage->move($path, $avatarImageName);

            $data['avatar_image'] = $avatarImageName;
        }

        if ($request->hasFile('card_image')) {

            $cardImage = $request->file('card_image');
            $cardImageExtension = $cardImage->getClientOriginalExtension();
            $cardImageName = rand() . '.' . $cardImageExtension;
            $path = 'public/assets/images/drivers/cards/';
            $cardImage->move($path, $cardImageName);

            $data['card_image'] = $cardImageName;
        }

        if ($request->hasFile('car_image')) {

            $carImage = $request->file('car_image');
            $carImageExtension = $carImage->getClientOriginalExtension();
            $carImageName = rand() . '.' . $carImageExtension;
            $path = 'public/assets/images/drivers/cars/';
            $carImage->move($path, $carImageName);

            $data['car_image'] = $carImageName;
        }

        if ($request->hasFile('transport_image')) {

            $transportImage = $request->file('transport_image');
            $transportImageExtension = $transportImage->getClientOriginalExtension();
            $transportImageName = rand() . '.' . $transportImageExtension;
            $path = 'public/assets/images/drivers/transports/';
            $transportImage->move($path, $transportImageName);

            $data['transport_image'] = $transportImageName;
        }

        Driver::create($data);

        return redirect()->route('drivers.index')->with('success', 'Driver Added Successfully.');
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
    public function edit($id)
    {
        $driver = Driver::find($id);

        if (!$driver){
            return redirect()->route('drivers.index')->with('error', 'Driver Does Not Exist.');
        }

        return view('dashboard.drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DriversRequest $request, $id)
    {
        $driver = Driver::find($id);

        if (!$driver){
            return redirect()->route('drivers.index')->with('error', 'Driver Does Not Exist.');
        }

        // Validation In DriversRequest

        $data = $request->all();

        if (!empty($request->password)) {
            $this->validate($request, ['password' => 'string|min:8']);
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        if ($request->hasFile('avatar_image')) {

            $destination = 'public/assets/images/drivers/avatars/' . $driver->avatar_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $avatarImage = $request->file('avatar_image');
            $avatarImageExtension = $avatarImage->getClientOriginalExtension();
            $avatarImageName = rand() . '.' . $avatarImageExtension;
            $path = 'public/assets/images/drivers/avatars/';
            $avatarImage->move($path, $avatarImageName);

            $data['avatar_image'] = $avatarImageName;
        }else{
            $data['avatar_image'] = $driver->avatar_image;
        }

        if ($request->hasFile('card_image')) {

            $destination = 'public/assets/images/drivers/cards/' . $driver->card_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $cardImage = $request->file('card_image');
            $cardImageExtension = $cardImage->getClientOriginalExtension();
            $cardImageName = rand() . '.' . $cardImageExtension;
            $path = 'public/assets/images/drivers/cards/';
            $cardImage->move($path, $cardImageName);

            $data['card_image'] = $cardImageName;
        }else{
            $data['card_image'] = $driver->card_image;
        }

        if ($request->hasFile('car_image')) {

            $destination = 'public/assets/images/drivers/cars/' . $driver->car_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $carImage = $request->file('car_image');
            $carImageExtension = $carImage->getClientOriginalExtension();
            $carImageName = rand() . '.' . $carImageExtension;
            $path = 'public/assets/images/drivers/cars/';
            $carImage->move($path, $carImageName);

            $data['car_image'] = $carImageName;
        }else{
            $data['car_image'] = $driver->car_image;
        }

        if ($request->hasFile('transport_image')) {

            $destination = 'public/assets/images/drivers/transports/' . $driver->transport_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $transportImage = $request->file('transport_image');
            $transportImageExtension = $transportImage->getClientOriginalExtension();
            $transportImageName = rand() . '.' . $transportImageExtension;
            $path = 'public/assets/images/drivers/transports/';
            $transportImage->move($path, $transportImageName);

            $data['transport_image'] = $transportImageName;
        }else{
            $data['transport_image'] = $driver->transport_image;
        }

        $driver->update($data);

        return redirect()->route('drivers.index')->with('success', 'Driver Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::find($id);

        if (!$driver){
            return redirect()->route('drivers.index')->with('error', 'Driver Does Not Exist.');
        }

        $driver->delete();

        return redirect()->route('drivers.index')->with('success', 'Driver Deleted Successfully.');
    }
}
