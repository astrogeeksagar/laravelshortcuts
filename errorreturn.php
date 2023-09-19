<?php 

$inputs = [
    'countryname' => $request->input('countryname'),
    'country_code' => $request->input('country_code'),
    'nationality' => $request->input('nationality'),
];

foreach ($inputs as $key => $value) {
    $existingRecord = DB::table('countries')
        ->where($key, $value)
        ->where('propertyid', $property_id)
        ->first();

    if ($existingRecord) {
        return back()->with('error', ucfirst($key) . ' already exists!');
    }
}
