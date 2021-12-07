<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DriversController extends Controller
{
    use ApiTrait;

    public function getAll()
    {
        $drivers = Driver::all();
        return $this->success('Drivers Fetched Successfully.', $drivers);
    }

    public function getById($id)
    {
        $driver = Driver::find($id);

        if (!$driver)
            return $this->fail('No Available Data.');

        return $this->success('Driver Fetched Successfully.', $driver);
    }

    public function create(Request $request)
    {
        // Validation

        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:drivers,email',
            'phone' => 'required',
            'card_id' => 'required|numeric|unique:drivers,card_id',
            'city' => 'required',
            'transportation_type' => 'required',
            'avatar_image' => 'nullable|image|mimes:jpg,jpeg,png',
            'card_image' => 'nullable|image|mimes:jpg,jpeg,png',
            'car_image' => 'nullable|image|mimes:jpg,jpeg,png',
            'transport_image' => 'nullable|image|mimes:jpg,jpeg,png',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->returnValidationError($validator);
        }

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

        $driver = Driver::create($data);

        return $this->success('Driver Created Successfully.', $driver);
    }

    public function update(Request $request, $id)
    {
        // Validation

        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:drivers,email,' . $id,
            'phone' => 'required',
            'card_id' => 'required|numeric|unique:drivers,card_id,' . $id,
            'city' => 'required',
            'transportation_type' => 'required',
            'avatar_image' => 'nullable|image|mimes:jpg,jpeg,png',
            'card_image' => 'nullable|image|mimes:jpg,jpeg,png',
            'car_image' => 'nullable|image|mimes:jpg,jpeg,png',
            'transport_image' => 'nullable|image|mimes:jpg,jpeg,png',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->returnValidationError($validator);
        }

        $driver = Driver::find($id);

        if (!$driver){
            return $this->fail('No Available Data.');
        }

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

        return $this->success('Driver Updated Successfully.', $driver);
    }

    public function delete($id)
    {
        $driver = Driver::find($id);

        if (!$driver){
            return $this->fail('No Available Data.');
        }

        $driver->delete();

        return $this->success('Driver Deleted Successfully.', $driver);
    }
}
