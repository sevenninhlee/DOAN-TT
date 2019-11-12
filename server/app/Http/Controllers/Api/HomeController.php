<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;

use App\Googl;

//use GuzzleHttp\Client;

use Carbon\Carbon;

use App\Client;
use App\User;

class HomeController extends Controller
{
    public function register(Request $request)
    {
    	
        return response()->json([$request->all()]);
    }
    /*public function google_return(Googl $googl, Request $request)
    {
    	

    	$client = $googl->client();

        if ($request->has('code')) 
        {

        	$client->setHttpClient(
			    new Client([
			        'curl' => [
			            CURLOPT_CAINFO => base_path('resources/assets/cacert.pem')
			        ]
			    ])
			);


            $client->authenticate($request->input('code'));
           
            $token = $client->getAccessToken();
            
            $plus = new \Google_Service_Plus($client);

            $google_user = $plus->people->get('me');
            $id = $google_user['id'];

            $email = $google_user['emails'][0]['value'];
            $first_name = $google_user['name']['givenName'];
            $last_name = $google_user['name']['familyName'];

            session([
                'user' => [
                    'email' => $email,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'token' => $token
                ]
            ]);


            $this->drive = $googl->drive($client);
            $result = [];
		    $pageToken = NULL;

		    $three_months_ago = Carbon::now()->subMonths(3)->toRfc3339String();

		    do 
		    {
		    	try
		    	{
		    		$parameters = [
	                    'q' => "viewedByMeTime >= '$three_months_ago' or modifiedTime >= '$three_months_ago' ",
	                    'orderBy' => 'modifiedTime',
	                    'fields' => 'nextPageToken, files(id, name, modifiedTime, iconLink, webViewLink, webContentLink)',
	                ];

                    

		            if ($pageToken) {
		                $parameters['pageToken'] = $pageToken;
		            }

		            $result = $this->drive->files->listFiles($parameters);
		            $files = $result->files;

		            $pageToken = $result->getNextPageToken();

		    	}
		    	catch (Exception $e) 
		    	{
	                return redirect('/files')->with('message',
	                    [
	                        'type' => 'error',
	                        'text' => 'Something went wrong while trying to list the files'
	                    ]
	                );
	              $pageToken = NULL;
            	}

			    
            } while ($pageToken);

           
 
            $title = 'text';

           // $file = json_encode($files);
            
            return view('google-files',compact('files'));

          


            

        } 
        else 
        {
            $auth_url = $client->createAuthUrl();
            //return response()->json($auth_url);
            return redirect($auth_url);
        }
    }*/
    public function dropbox_return()
    {
        return view('drop-files');
    }
    public function introsubmit(Request $request)
    {
       
        $this->validate($request,[
            'first_name' => 'required|regex:/^[a-zA-z ]+$/',
            'last_name' => 'required|regex:/^[a-zA-z ]+$/',
            'purpose' => 'required',
            'company' => 'required',
            'employee' => 'required',
            'job_title' => 'required',
            'industry' => 'required'
        ],[
            'first_name.required' => "Please enter the first name",
            'last_name.required' => "Please enter the last name",
            'purpose.required' => "Please select the purpose",
            'company.required' => "Please enter the company name",
            'employee.required' => "Please select the employee option",
            'job_title.required' => "Please enter the job title",
            'industry.required' => "Please select the industry"
        ]);


        $user = User::where('email', '=', $request->email)->first();


        //User::findOrFail($user->id)->update(['name'=>$request->first_name, 'last_name'=>$request->last_names]);


        //$client = Client::find($id);

        /*$client = Client::firstOrNew(array('user_id' => $user->id));
        $client->company_name = $request->company;
        $client->industry_id = $request->industry;
        $client->department_id = $request->job_title;
        $client->account_type = $request->employee;

        $client->save();*/


        return response()->json(["message"=> 'successfully..']);
    }
    public function file_upload_get(Request $request)
    {
        $file = $request->file;
        return response()->json($file);

    }
   /* public function onedrive_return()
    {
        echo "ddd";die;
    }
    public function dropbox_return_fromdropbox()
    {
        echo "ddd";die;
    }
    public function privacy()
    {

    }
    public function policy()
    {
        
    }*/
}
