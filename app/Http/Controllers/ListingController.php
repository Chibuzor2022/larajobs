<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{

    //show all listings
    public function index()

    {
        // dd(request('tag'));
        //dd(request()->tag);
        return view('listings.index', [
            //'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()

            // to get pagination just chnage the get above to paginate

            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)

            //the paginate above will give you number, but if you want simple next and previous you use thi below
            // 'listings' => Listing::latest()->filter(request(['tag', 'search']))->simplepaginate(2)
        ]);
    }

    //show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [

            'listing' => $listing
        ]);
    }
    //Show Create Form
    public function create()
    {
        return view('listings.create');
    }

    // store listing data
    public function store(Request $request)
    {

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',

        ]);


        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);
        return redirect('/')->with('message', 'Listing created successfully!');
    }

    public function edit(Listing $listing)
    {

        return view('listings.edit', ['listing' => $listing]);
    }

    // update listing data
    public function update(Request $request, Listing $listing)
    {

        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',

        ]);


        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);
        return back()->with('message', 'Listing updated successfully!');
    }

    //Delete Listing
    public function destroy(Listing $listing)
    {

        $listing->delete();
        return redirect('/')->with('message', 'Listing was succesfully deleted!');
    }


    //Manage Listings
    public function manage()
    {

        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
