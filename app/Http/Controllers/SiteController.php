<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use Illuminate\Support\Facades\Hash;


class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       //dd($request);
        $specific_data = Site::orderBy('id', 'asc');
       // $site_list = Site::paginate(3);
        $search= $request->search;
        $status = $request->status;
        if(!empty($request->all())){

                if(!($request->filled('search') && $request->filled('status'))){
                    if($request->filled('search')){

                     $specific_data = Site::query()->where('name','Like',"%{$search}%")
                                            ->orWhere('username','Like',"%{$search}%")
                                            ->orWhere('db_link','Like',"%{$search}%")
                                            ->orWhere('db_name','Like',"%{$search}%")
                                            ->orWhere('db_user_name','Like',"%{$search}%");
                                                   
                    // $specific_data->appends($request->all());
                    if($specific_data->doesntExist()){
                        return view('sites.blank');
                      }
                   $paginator = $specific_data->paginate(2);
                   $paginator->appends(['search'=>$search]);
                    $count = $paginator->perPage()*($paginator->currentPage()-1);
                    //dd($count);
                    return view('sites.list',['count'=>$count], ['site_list'=>$paginator]);
                
                    }
                    else if($request->filled('status')){
                    //  dd($request->all());
                        $status = Site::query()->where('status', $status)->paginate(2);
                    // dd($status);
                        // $status -> appends(['active'=>$request->input('1'), 'deactive'=>$request->input('0') ]);
                        $status->appends($request->all());
                        //dd($status);
                        $count = $status->perPage()*($status->currentPage()-1);
                        
                        return view('sites.list', ['count'=>$count],['site_list'=>$status]);
                    }

                
                }
                else{
                    $both_search = Site::query()->where('name','Like',"%{$search}")
                                                ->where('status','Like',"%{$status}")
                                                ->orWhere('username','Like',"%{$search}%")
                                                ->where('status','Like',"%{$status}")
                                                ->orWhere('db_link','Like',"%{$search}%")
                                                ->where('status','Like',"%{$status}")
                                                ->orWhere('db_name','Like',"%{$search}%")
                                                ->where('status','Like',"%{$status}")
                                                ->orWhere('db_user_name','Like',"%{$search}%")
                                                ->where('status','Like',"%{$status}");
                           
                       if($both_search->doesntExist()){
                        return view('sites.blank');
                      }
                       $paginator =$both_search->paginate(2);
                       $paginator->appends($request->all());
                        
                        $count = $paginator->perPage()*($paginator->currentPage()-1);
                        return view('sites.list', ['count'=>$count],['site_list'=>$paginator]);
                    
                }
            

       }

        
        $site_list = $specific_data->paginate(3);
        /*foreach($site_list as $list){
            echo ($list->status);
        }*/
       
        $count = $site_list->perPage()*($site_list->currentPage()-1);
        return view('sites.list',compact('count','site_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   //dd('name');
        return view("sites.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
        
            'name' => 'required|alpha|max:255',
            'username' => 'required|min:3',
            'password' => 'required|min:4',
            'note'    => 'required',
            'status'  => 'required'
        ]);

        $site = Site::create([
            'name' => $request->name,
            'username' =>$request->username,
            'password' =>$request->password,
            'db_link' => $request->db_link,
            'db_name' => $request->db_name,
            'db_user_name' =>$request->db_user_name,
            'db_password' => $request->db_password,
            'note'  => $request->note,
            'status' => $request->status,

        ]);
        return redirect('/sites');
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
        $find_site_id = Site::find($id);
       //dd($find_site_id);
      //  return view('sites.edit',['find_site_id' =>$find_site_id]);
      return view('sites.edit')->with('find_site_id',$find_site_id);
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

        $site = Site::where('id',$id)->update([

            'name' => $request->name,
            'username' =>$request->username,
            'password' =>Hash::make($request->password),
            'db_link' => $request->db_link,
            'db_name' => $request->db_name,
            'db_user_name' =>$request->db_user_name,
            'db_password' => Hash::make($request->db_password),
            'note'  => $request->note,
            'status' => $request->status,

        ]);
       // dd($site);
        return redirect('/sites');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $find_site = Site::find($id);
        //dd($find_site);
        $find_site->delete();
        return redirect('/sites');
    }
}
