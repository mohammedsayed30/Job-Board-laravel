<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Input;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class ListingsController extends Controller
{
    /**
     * this function to display all listings 
     * @param void
     * @return listings
     */
    public function index(Request $request)
    {
        // Get the search term and other filters from the request
        $filters = $request->only(['search', 'tag']);
        return view('listings.index',[
            'listings'=>Listing::latest()->filter($filters)->paginate(6),
        ]);
    }

    /**
     * this function to display all listings 
     * @param void
     * @return listings
     */
    public function show(Listing $listing)
    {
        return view('listings.show',[
            'listing' => $listing,
        ]);
    }

     /**
     * this function to display all listings 
     * @param void
     * @return listings
     */
    public function create()
    {
        return view('listings.create');
    }

         /**
     * this function to display all listings 
     * @param void
     * @return listings
     */
    public function edit(Listing $listing)
    {
        return view('listings.edit',[
            'listing'=>$listing
        ]);
    }

     /**
     * this function to post  a job
     * @param void
     * @return listings
     */
    public function store(Request $request)
    {
        $FormInformation= $request->validate([
            'title'=>'required',
            'description'=>'required',
            'tags'=>'required',
            'email'=>['required','email'],
            'company'=>'required',
            'location'=>'required',
            'website'=>'required',
        ]);
        //add the logo file
        if($request->hasFile('logo')){
            $FormInformation['logo'] = $request->file('logo')->store('logos','public');
        }
        //add the current loged in user id to the user_id
        $FormInformation['user_id']=auth()->id();
        //store the information into the database
        Listing::create($FormInformation);
        return redirect('/')->with('message','Listing created Successfully');
        
    }

         /**
     * this function to update  a job
     * @param void
     * @return listings
     */
    public function update(Request $request,Listing $listing)
    {
        //make sure the logged in  user is the owner
        if($listing->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
        }
        $FormInformation= $request->validate([
            'title'=>'required',
            'description'=>'required',
            'tags'=>'required',
            'email'=>['required','email'],
            'company'=>'required',
            'location'=>'required',
            'website'=>'required',
        ]);
        //add the logo file
        if($request->hasFile('logo')){
            $FormInformation['logo'] = $request->file('logo')->store('logos','public');
        }
        $listing->update($FormInformation);
        return redirect('/')->with('message','Listing Updated Successfully');
        
    }

    /**
     * this function to delete a certain list
     * @param void
     * @return listings
     */
    public function delete(Listing $listing)
    {
         //make sure the logged in  user is the owner
         if($listing->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
        }
        $listing->delete();
        return redirect('/')->with('message','Listing Deleted Successfully');
    }
        /**
     * this function to manage listings
     * @param void
     * @return listings
     */
    public function manage(Listing $listing)
    {
        //to get only the jobs for the current user
      $filters['user_id']=auth()->id();
      //render the manage page with the job posts for this logged user
       return view('listings.manage',[
        'listings'=>Listing::latest()->filter($filters)->paginate(2),
       ]);
    }

}
