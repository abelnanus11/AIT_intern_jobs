<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
     public function index(){
        return view('listings.index', [
       
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(6)
        ]);

     }

     public function create(){
        return view('listings.create');
     }
      
       public function store(Request $request){
    
           $formFields= $request->validate([
               "title" =>'required',
               "company" =>["required", Rule::unique("listings", "company")],
               "location" => "required",
                "webiste"=> "required",
               "email" => ["required", "email"],
               "tags"=>"required",
               "description"=> "required",
                
           ]);

           if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
               
          $formFields["user_id"]= auth()->id();
                 
              Listing::create($formFields);

              return redirect("/")->with("message", "Intern Job created successfully!");
       }


       //udate job form
       public function update(Request $request, Listing $listing){


            if($listing->user_id != auth()->id()){
                abort(403, "Unauthorized Action");
            }
    
           $formFields= $request->validate([
               "title" =>'required',
               "company" =>["required"],
               "location" => "required",
                "webiste"=> "required",
               "email" => ["required", "email"],
               "tags"=>"required",
               "description"=> "required",
                
           ]);

           if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

                 
              $listing->update($formFields);

              return back()->with("message", "Intern Job updated successfully!");
       }

      

       public function show(Listing $listing){
        return view('listings.show', [
       
            'listing' => $listing
        ]);

     }


     //edit form
       public function edit(Listing $listing){

        return view("listings.edit", ["listing" => $listing]);

       }


       //delete form

        public function delete( Listing $listing){
            if($listing->user_id != auth()->id()){
                abort(403, "Unauthorized Action");
            }
            $listing->delete();
            return redirect("/")->with("message", "Intern Job form Deleted successfully!!");

        }

        public function manage(){
            return view("listings.manage", ["listings"=>auth()->user()->listings()->get()]);
        }
}
